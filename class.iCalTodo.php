<?php
/**
 * Author: Daniel Voogsgerd
 * All rights reserved
 */

class iCalTodo {

	private $summary;
	private $start;
	private $due;
	private $location;

	private $extraOptions;


	public function __construct($summary = null, DateTimeImmutable $start = null, DateTimeImmutable $due = null, $location = null, $extraOptions = array()) {
		$this->summary = $summary;
		$this->start = $start;
		$this->due = $due;
		$this->location = $location;

		$this->extraOptions = $extraOptions;
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

	public function setStart(DateTimeImmutable $start) {
		$this->start = $start;
	}

	public function getDue() {
		return $this->due;
	}

	public function setDue(DateTimeImmutable $due) {
		$this->due = $due;
	}

	// Alias for due
	public function getEnd() {
		return $this->due;
	}

	public function setEnd($due) {
		$this->due = $due;
	}

	public function getLocation() {
		return $this->location;
	}

	public function setLocation($location) {
		$this->location = $location;
	}

	public function setOption($key, $value) {
		$this->extraOptions[$key] = $value;
	}

	public function appendOption($key, $value) {
		$this->extraOptions[$key] .= $value;
	}

	public function getOption($key) {
		return isset($this->extraOptions[$key]) ? $this->extraOptions[$key] : null;
	}

	public function isOngoing(DateTime $time = null) {
		if ($time === null)
			$time = new DateTime('Now');

		return $this->getStart() <= $time && $this->getDue() >= $time;
	}

	public function startsWithin(DateInterval $startsWithin, DateTime $time = null) {
		if ($time === null)
			$time = new DateTime('Now');

		return $this->getStart()->sub($startsWithin) <= $time && $this->getStart() <= $time;
	}
}