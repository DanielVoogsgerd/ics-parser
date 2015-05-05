<?php namespace iCal\Properties;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

trait Summary {
	public function getSummary() {
		return $this->summary;
	}

	public function setSummary($summary) {
		$this->summary = $summary;
	}
}