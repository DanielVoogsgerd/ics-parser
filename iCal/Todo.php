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
		$this->summary = $summary;
		$this->start = $start;
		$this->due = $due;
		$this->location = $location;

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