<?php namespace iCal\Properties;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

trait Location {
	public function getLocation() {
		return $this->location;
	}

	public function setLocation($location) {
		$this->location = $location;
	}
}