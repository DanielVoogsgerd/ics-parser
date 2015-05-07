<?php namespace iCal;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

trait CalendarTimezone {
	private $timezone;

	public function setTimezone(Timezone $timezone) {
		$this->timezone = $timezone;
	}

	public function getTimezone() {
		return $this->timezone;
	}
}