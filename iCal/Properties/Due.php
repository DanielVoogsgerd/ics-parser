<?php namespace iCal\Properties;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

trait Due {
	private $due;
	
	public function getDue() {
		return $this->due;
	}

	public function setDue(\DateTimeImmutable $due) {
		$this->due = $due;
	}
}