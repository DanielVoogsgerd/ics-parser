<?php namespace iCal;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

class Alarm extends Component {
	use Properties\Action;
	use Properties\Trigger;

	public function __construct($action = null, $trigger = null, $extraProperties = array()) {
		if ($action !== null)
			$this->setAction($action);

		if ($trigger !== null)
			$this->setTrigger($trigger);

		parent::__construct($extraProperties);
	}
}