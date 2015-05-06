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
		$this->summary = $summary;
		$this->start = $start;
		$this->end = $end;
		$this->location = $location;

		parent::__construct($extraProperties);
	}
}