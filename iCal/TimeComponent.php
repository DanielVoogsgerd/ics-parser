<?php namespace iCal;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

abstract class TimeComponent extends Component {
	public function isOngoing(\DateTimeInterface $time = null) {
		if ($time === null)
			$time = new \DateTime('Now');

		return $this->getStart() <= $time && $this->getEnd() >= $time;
	}

	public function isStartingWithin(\DateInterval $startsWithin, \DateTimeInterface $time = null) {
		if ($time === null)
			$time = new \DateTime('Now');

		return $this->getStart()->sub($startsWithin) <= $time && $this->getStart() >= $time;
	}
}