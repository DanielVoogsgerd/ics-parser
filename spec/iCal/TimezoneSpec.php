<?php

namespace spec\iCal;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TimezoneSpec extends ObjectBehavior
{
	private $timezone;

	function let()
	{
		$this->timezone = new \DateTimeZone('Europe/Amsterdam');
	}
	function it_is_initializable()
	{
		$this->shouldHaveType('iCal\Timezone');
	}

	function it_is_initializable_with_timezone()
	{
		$this->beConstructedWith($this->timezone);
		$this->shouldHaveType('iCal\Timezone');
	}

	function it_can_set_timezone()
	{
		$this->setTimezone($this->timezone);
		$result = $this->getTimezone();

		$result->shouldBe($this->timezone);
	}
}
