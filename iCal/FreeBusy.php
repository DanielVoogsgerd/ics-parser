<?php namespace iCal;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

class FreeBusy extends TimeComponent {
	use Properties\Start;
	use Properties\End;
	use Properties\Contact;

	public function __construct(\DateTimeImmutable $start = null, \DateTimeImmutable $end = null, $contact = null, $extraProperties = array()) {
		if ($start !== null)
			$this->setStart($start);

		if ($end !== null)
			$this->setEnd($end);

		if ($contact !== null)
			$this->setContact($contact);

		parent::__construct($extraProperties);
	}
}