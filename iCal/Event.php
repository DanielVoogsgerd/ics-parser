<?php namespace iCal;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

class Event extends TimeComponent {
	private $start;
	private $end;
	private $summary;
	private $location;

	public function __construct($summary = null, \DateTimeImmutable $start = null, \DateTimeImmutable $end = null, $location = null, $extraProperties = array()) {
		$this->summary = $summary;
		$this->start = $start;
		$this->end = $end;
		$this->location = $location;

		parent::__construct($extraProperties);
	}

	use Properties\Summary;
	use Properties\Start;
	use Properties\End;
	use Properties\Location;
}