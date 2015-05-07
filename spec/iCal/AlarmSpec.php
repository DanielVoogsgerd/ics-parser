<?php

namespace spec\iCal;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AlarmSpec extends ObjectBehavior
{
	private $action;
	private $trigger;

	function let()
	{
		$this->action = 'action';
		$this->trigger = 'trigger';
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('iCal\Alarm');
    }

	function it_can_get_action()
	{
		$this->beConstructedWith($this->action, $this->trigger);
		$result = $this->getAction();
		$result->shouldBeString();
		$result->shouldBe($this->action);
	}

	function it_can_set_action()
	{
		$this->setAction($this->action);
		$result = $this->getAction();
		$result->shouldBe($this->action);
	}

	function it_can_get_trigger()
	{
		$this->beConstructedWith($this->trigger, $this->trigger);
		$result = $this->getTrigger();
		$result->shouldBeString();
		$result->shouldBe($this->trigger);
	}

	function it_can_set_trigger()
	{
		$this->setTrigger($this->trigger);
		$result = $this->getTrigger();
		$result->shouldBe($this->trigger);
	}
}
