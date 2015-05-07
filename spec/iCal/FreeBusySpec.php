<?php

namespace spec\iCal;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FreeBusySpec extends ObjectBehavior
{
	private $yesterday;
	private $today;
	private $tomorrow;
	private $contact;

	function let()
	{
		$this->yesterday = new \DateTimeImmutable('yesterday');
		$this->today = new \DateTimeImmutable('today');
		$this->tomorrow = new \DateTimeImmutable('tomorrow');
		$this->contact = 'contact';
	}
    function it_is_initializable()
    {
        $this->shouldHaveType('iCal\FreeBusy');
    }

	function it_can_get_contact()
	{
	    $this->beConstructedWith($this->today, $this->tomorrow, $this->contact);
		$result = $this->getContact();

		$result->shouldBeString();
		$result->shouldBe($this->contact);
	}
	
	function it_can_set_contact()
	{
	    $this->setContact($this->contact);
		$result = $this->getContact();

		$result->shouldBe($this->contact);
	}
	

}
