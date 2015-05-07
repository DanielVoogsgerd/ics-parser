<?php

namespace spec\iCal;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TimezoneSpec extends ObjectBehavior
{
	function it_is_initializable()
	{
		$this->shouldHaveType('iCal\Timezone');
	}

	function it_is_initializable_with_timezone()
	{
		$this->beConstructedWith(new \DateTimeZone('Europe/Amsterdam'));
		$this->shouldHaveType('iCal\Timezone');
	}

	function it_throws_when_invalid_timezone()
	{
		$this->shouldThrow('\Exception')->during('setTimezone', new \DateTimeZone('Mars'));
	}
}
