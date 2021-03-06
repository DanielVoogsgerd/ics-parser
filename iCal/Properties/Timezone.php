<?php namespace iCal\Properties;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

trait Timezone {
	private $timezone;

	public function setTimezone(\DateTimeZone $timezone) {
		$this->timezone = $timezone;
	}

	public function getTimezone() {
		return $this->timezone;
	}
}