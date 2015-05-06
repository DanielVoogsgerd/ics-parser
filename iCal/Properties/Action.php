<?php namespace iCal\Properties;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

trait Action {
	private $action;

	public function setAction($action) {
	    $this->action = $action;
	}
	
	public function getAction() {
	    return $this->action;
	}
}