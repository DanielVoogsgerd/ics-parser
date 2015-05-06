<?php namespace iCal\Properties;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

trait Trigger {
	private $trigger;

	public function getTrigger() {
	    return $this->trigger;
	}

	public function setTrigger($trigger) {
	    $this->trigger = $trigger;
	}
}