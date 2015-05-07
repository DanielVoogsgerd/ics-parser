<?php

namespace spec\iCal;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TodoSpec extends ObjectBehavior
{
	private $key = 'key';
	private $value = 'value';
	private $appendValue = 'appendvalue';
	private $totalValue = 'valueappendvalue';

    function it_is_initializable()
    {
        $this->shouldHaveType('iCal\Todo');
    }

	function it_can_set_end()
	{
		$input = new \DateTimeImmutable('Today');
		$this->setEnd($input);
	}

	function it_can_get_end()
	{
		$input = new \DateTimeImmutable('Today');
		$this->beConstructedWith(null, null, $input);
		$result = $this->getEnd();

		$result->shouldHaveType('\DateTimeImmutable');
		$result->shouldBe($input);
	}

	function it_can_set_properties()
	{
		$this->setProperty($this->key, $this->value);
	}

	function it_can_get_properties()
	{
		$this->setProperty($this->key, $this->value);
		$this->getProperty($this->key)->shouldBe($this->value);
	}

	function it_can_append_properties()
	{
		$this->setProperty($this->key, $this->value);
		$this->appendProperty($this->key, $this->appendValue);
		$this->getProperty($this->key)->shouldBe($this->totalValue);
	}
}