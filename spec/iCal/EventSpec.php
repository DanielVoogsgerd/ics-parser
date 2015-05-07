<?php

namespace spec\iCal;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EventSpec extends ObjectBehavior
{
	private $summary;
	private $yesterday;
	private $tomorrow;
	private $today;
	private $location;
	private $interval;
	private $now;

	function let() {
		$this->summary = 'summary';
		$this->yesterday = new \DateTimeImmutable('Yesterday');
		$this->tomorrow = new \DateTimeImmutable('Tomorrow');
		$this->now = new \DateTimeImmutable('now');
		$this->interval = new \DateInterval('PT24H');
		$this->today = new \DateTimeImmutable('Today');
		$this->location = 'location';

		$this->beConstructedWith($this->summary, $this->today, $this->tomorrow, 'location');
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('iCal\Event');
    }

	function it_can_get_summary()
	{
		$this->beConstructedWith($this->summary, $this->yesterday, $this->tomorrow, $this->location);
		$result = $this->getSummary();
		$result->shouldBeString();
		$result->shouldBe($this->summary);
	}

	function it_can_set_summary()
	{
		$this->setSummary($this->summary);
		$result = $this->getSummary();
		$result->shouldBe($this->summary);
	}

	function it_can_set_start()
	{
		$this->setStart($this->tomorrow);
		$result = $this->getStart();

		$result->shouldBe($this->tomorrow);
	}

	function it_can_get_start()
	{
		$result = $this->getStart();
		$result->shouldHaveType('\DateTimeImmutable');
		$result->shouldBe($this->today);
	}

	function it_can_check_ongoing()
	{
		$result = $this->isongoing($this->now);
		$result->shouldBeBoolean();
		$result->shouldBe(true);
	}

	function it_can_check_startingwithin()
	{
		$result = $this->isStartingWithin($this->interval, $this->yesterday);
		$result->shouldBeBoolean();
		$result->shouldBe(true);

		$this->setStart($this->tomorrow);
		$result = $this->isStartingWithin($this->interval, $this->yesterday);
		$result->shouldBeBoolean();
		$result->shouldBe(false);
	}

	function it_can_get_location()
	{
		$this->beConstructedWith($this->summary, $this->yesterday, $this->tomorrow, $this->location);
		$result = $this->getLocation();
		$result->shouldBeString();
		$result->shouldBe($this->location);
	}

	function it_can_set_location()
	{
		$this->setLocation($this->location);
		$result = $this->getLocation();
		$result->shouldBe($this->location);
	}
}
