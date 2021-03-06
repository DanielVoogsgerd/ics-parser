<?php namespace iCal\Properties;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

trait End {
	private $end;

	public function getEnd() {
		return $this->end;
	}

	public function setEnd(\DateTimeImmutable $end) {
		$this->end = $end;
	}
}