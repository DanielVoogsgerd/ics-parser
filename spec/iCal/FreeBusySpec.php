<?php

namespace spec\iCal;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FreeBusySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('iCal\FreeBusy');
    }
}
