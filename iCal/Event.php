<?php namespace iCal;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

class Event extends TimeComponent {
	use Properties\Summary;
	use Properties\Start;
	use Properties\End;
	use Properties\Location;

	public function __construct($summary = null, \DateTimeImmutable $start = null, \DateTimeImmutable $end = null, $location = null, $extraProperties = array()) {
		if ($summary !== null)
			$this->setSummary($summary);

		if ($start !== null)
			$this->setStart($start);

		if ($end !== null)
			$this->setEnd($end);

		if ($location !== null)
			$this->setLocation($location);

		parent::__construct($extraProperties);
	}
}