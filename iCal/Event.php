<?php namespace iCal;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

class Event extends Component {
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

	public function getSummary() {
		return $this->summary;
	}

	public function setSummary($summary) {
		$this->summary = $summary;
	}

	public function getStart() {
		return $this->start;
	}

	public function setStart(\DateTimeImmutable $start) {
		$this->start = $start;
	}

	public function getEnd() {
		return $this->end;
	}

	public function setEnd(\DateTimeImmutable $end) {
		$this->end = $end;
	}

	public function getLocation() {
		return $this->location;
	}

	public function setLocation($location) {
		$this->location = $location;
	}

	public function isOngoing(\DateTime $time = null) {
		if ($time === null)
			$time = new \DateTime('Now');

		return $this->getStart() <= $time && $this->getEnd() >= $time;
	}

	public function startsWithin(\DateInterval $startsWithin, \DateTime $time = null) {
		if ($time === null)
			$time = new \DateTime('Now');

		//var_dump($time, $this->getStart()->sub($startsWithin), $this->getStart(), $startsWithin);

		return $this->getStart()->sub($startsWithin) <= $time && $this->getStart() >= $time;
	}
}