<?php namespace iCal;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

class Journal extends Component {
	use Properties\Summary;
	use Properties\Start;

	public function __construct($summary = null, \DateTimeImmutable $start = null, $extraProperties) {
		if ($summary !== null)
			$this->setSummary($summary);

		if ($start !== null)
			$this->setStart($start);

		parent::__construct($extraProperties);
	}
}