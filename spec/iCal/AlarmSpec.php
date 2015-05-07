<?php

namespace spec\iCal;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AlarmSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('iCal\Alarm');
    }
}
