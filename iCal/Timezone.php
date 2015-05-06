<?php namespace iCal;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

class Timezone extends Component {
	use Properties\Timezone;

	public function __construct(\DateTimeZone $timezone = null, $extraProperties = array()) {
		if($timezone !== null)
			$this->setTimezone($timezone);

		parent::__construct($extraProperties);
	}
}