<?php namespace iCal;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

class Todo extends Component {
	private $summary;
	private $start;
	private $due;
	private $location;

	public function __construct($summary = null, \DateTimeImmutable $start = null, \DateTimeImmutable $due = null, $location = null, $extraProperties = array()) {
		$this->summary = $summary;
		$this->start = $start;
		$this->due = $due;
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

	public function getDue() {
		return $this->due;
	}

	public function setDue(\DateTimeImmutable $due) {
		$this->due = $due;
	}

	// Alias for due
	public function getEnd() {
		return $this->getDue();
	}

	public function setEnd($due) {
		$this->setDue($due);
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

		return $this->getStart() <= $time && $this->getDue() >= $time;
	}

	public function isStartingWithin(\DateInterval $startsWithin, \DateTime $time = null) {
		if ($time === null)
			$time = new \DateTime('Now');

		return $this->getStart()->sub($startsWithin) <= $time && $this->getStart() <= $time;
	}
}