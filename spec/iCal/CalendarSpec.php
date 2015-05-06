<?php

namespace spec\iCal;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use \iCal\Event;
use \iCal\Journal;


class CalendarSpec extends ObjectBehavior
{
	public function let() {
		$this->beConstructedWith();
	}

	function it_is_initializable()
    {
		$this->shouldHaveType('iCal\Calendar');
    }

	/**
	 * Events
	 */
	function it_can_add_events (Event $event)
	{
		$this->addEvent($event);
		$this->getEvents()->shouldHaveCount(1);

		$this->addEvent($event);
		$this->getEvents()->shouldHaveCount(2);
	}

	function it_can_get_events(Event $event) {
		$this->getEvents()->shouldHaveCount(0);
		$this->getEvents()->shouldBeArray();

		$this->addEvent($event);
		$this->getEvents()->shouldHaveCount(1);
		$this->getEvents()->shouldBeArray();

	}

	function it_can_count_events(Event $event)
	{
		$this->getEventCount()->shouldBeInt();
		$this->getEventCount()->shouldBe(0);

		$this->addEvent($event);
		$this->getEventCount()->shouldBeInt();
		$this->getEventCount()->shouldBe(1);
	}

	function it_can_detect_events(Event $event)
	{
		$this->hasEvents()->shouldReturn(false);
		$this->hasEvents()->shouldBeBoolean();

		$this->addEvent($event);
		$this->hasEvents()->shouldReturn(true);
		$this->hasEvents()->shouldBeBoolean();
	}

	/**
	 * Journals
	 */
	function it_can_add_journals (Journal $journal)
	{
		$this->getJournals()->shouldHaveCount(0);

		$this->addJournal($journal);
		$this->getJournals()->shouldHaveCount(1);

		$this->addJournal($journal);
		$this->getJournals()->shouldHaveCount(2);
	}

	function it_can_get_journals(Journal $journal) {
		$this->getJournals()->shouldHaveCount(0);
		$this->getJournals()->shouldBeArray();

		$this->addJournal($journal);
		$this->getJournals()->shouldHaveCount(1);
		$this->getJournals()->shouldBeArray();

	}

	function it_can_count_journals(Journal $journal)
	{
		$this->getJournalCount()->shouldBeInt();
		$this->getJournalCount()->shouldBe(0);

		$this->addJournal($journal);
		$this->getJournalCount()->shouldBeInt();
		$this->getJournalCount()->shouldBe(1);
	}

	function it_can_detect_journals(Journal $journal)
	{
		$this->hasJournals()->shouldReturn(false);
		$this->hasJournals()->shouldBeBoolean();

		$this->addJournal($journal);
		$this->hasJournals()->shouldReturn(true);
		$this->hasJournals()->shouldBeBoolean();
	}

}
