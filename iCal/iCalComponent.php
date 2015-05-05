<?php namespace iCal;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

abstract class iCalComponent {
	protected $extraProperties;

	protected function __construct($extraProperties) {
		$this->extraProperties;
	}

	public function setProperty($key, $value) {
		$this->extraProperties[$key] = $value;
	}

	public function appendProperty($key, $value) {
		$this->extraProperties[$key] .= $value;
	}

	public function getProperty($key) {
		return isset($this->extraProperties[$key]) ? $this->extraProperties[$key] : null;
	}
}