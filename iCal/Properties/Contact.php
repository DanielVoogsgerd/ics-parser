<?php namespace iCal\Properties;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

trait Contact {
	private $contact = '';

	public function getContact() {
		return $this->contact;
	}

	public function setContact($contact) {
		$this->contact = $contact;
	}
}