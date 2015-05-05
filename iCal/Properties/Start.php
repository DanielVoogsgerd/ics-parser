<?php namespace iCal\Properties;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

trait Start {
	public function getStart() {
		return $this->start;
	}

	public function setStart(\DateTimeImmutable $start) {
		$this->start = $start;
	}
}