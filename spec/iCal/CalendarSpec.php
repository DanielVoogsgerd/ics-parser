<?php

namespace spec\iCal;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CalendarSpec extends ObjectBehavior
{
	public function let() {
		$this->beConstructedWith();
	}

	function it_is_initializable()
    {
		$this->shouldHaveType('iCal\Calendar');
    }

	function it_can_add_events (\iCal\Event $event)
	{
		$this->addEvent($event);
		$this->getEvents()->shouldHaveCount(1);

		$this->addEvent($event);
		$this->getEvents()->shouldHaveCount(2);
	}

	function it_can_count_events(\iCal\Event $event)
	{
		$this->getEventCount()->shouldBeInt();
		$this->getEventCount()->shouldBe(0);

		$this->addEvent($event);
		$this->getEventCount()->shouldBeInt();
		$this->getEventCount()->shouldBe(1);
	}

	function it_can_detect_events(\iCal\Event $event)
	{
		$this->hasEvents()->shouldReturn(false);
		$this->hasEvents()->shouldBeBoolean();

		$this->addEvent($event);
		$this->hasEvents()->shouldReturn(true);
		$this->hasEvents()->shouldBeBoolean();
	}
}
