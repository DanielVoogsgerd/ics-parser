<?php namespace iCal;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

class Todo extends TimeComponent {
	use Properties\Summary;
	use Properties\Start;
	use Properties\Due;
	use Properties\Location;

	public function __construct($summary = null, \DateTimeImmutable $start = null, \DateTimeImmutable $due = null, $location = null, $extraProperties = array()) {
		if ($summary !== null)
			$this->setSummary($summary);

		if ($start !== null)
			$this->setStart($start);

		if ($due !== null)
			$this->setDue($due);

		if ($location !== null)
			$this->setLocation($location);

		parent::__construct($extraProperties);
	}

	// Alias for due
	public function getEnd() {
		return $this->getDue();
	}

	public function setEnd($due) {
		$this->setDue($due);
	}
}