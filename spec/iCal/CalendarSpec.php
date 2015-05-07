<?php

namespace spec\iCal;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use \iCal\Todo;
use \iCal\Event;
use \iCal\Journal;
use \iCal\FreeBusy;
use \iCal\Alarm;


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
	 * Todo
	 */
	function it_can_add_todos(Todo $todo)
	{
		$this->addTodo($todo);
		$this->getTodos()->shouldHaveCount(1);

		$this->addTodo($todo);
		$this->getTodos()->shouldHaveCount(2);
	}

	function it_can_get_todos(Todo $todo) {
		$this->getTodos()->shouldHaveCount(0);
		$this->getTodos()->shouldBeArray();

		$this->addTodo($todo);
		$this->getTodos()->shouldHaveCount(1);
		$this->getTodos()->shouldBeArray();

	}

	function it_can_count_todos(Todo $todo)
	{
		$this->getTodoCount()->shouldBeInt();
		$this->getTodoCount()->shouldBe(0);

		$this->addTodo($todo);
		$this->getTodoCount()->shouldBeInt();
		$this->getTodoCount()->shouldBe(1);
	}

	function it_can_detect_todos(Todo $todo)
	{
		$this->hasTodos()->shouldReturn(false);
		$this->hasTodos()->shouldBeBoolean();

		$this->addTodo($todo);
		$this->hasTodos()->shouldReturn(true);
		$this->hasTodos()->shouldBeBoolean();
	}

	/**
	 * Events
	 */
	function it_can_add_events(Event $event)
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
	function it_can_add_journals(Journal $journal)
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

	/**
	 * FreeBusys
	 */
	function it_can_add_freebusys(FreeBusy $freebusy)
	{
		$this->getFreeBusys()->shouldHaveCount(0);

		$this->addFreeBusy($freebusy);
		$this->getFreeBusys()->shouldHaveCount(1);

		$this->addFreeBusy($freebusy);
		$this->getFreeBusys()->shouldHaveCount(2);
	}

	function it_can_get_freebusys(FreeBusy $freebusy) {
		$this->getFreeBusys()->shouldHaveCount(0);
		$this->getFreeBusys()->shouldBeArray();

		$this->addFreeBusy($freebusy);
		$this->getFreeBusys()->shouldHaveCount(1);
		$this->getFreeBusys()->shouldBeArray();

	}

	function it_can_count_freebusys(FreeBusy $freebusy)
	{
		$this->getFreeBusyCount()->shouldBeInt();
		$this->getFreeBusyCount()->shouldBe(0);

		$this->addFreeBusy($freebusy);
		$this->getFreeBusyCount()->shouldBeInt();
		$this->getFreeBusyCount()->shouldBe(1);
	}

	function it_can_detect_freebusys(FreeBusy $freebusy)
	{
		$this->hasFreeBusys()->shouldReturn(false);
		$this->hasFreeBusys()->shouldBeBoolean();

		$this->addFreeBusy($freebusy);
		$this->hasFreeBusys()->shouldReturn(true);
		$this->hasFreeBusys()->shouldBeBoolean();
	}

	/**
	 * Alarms
	 */
	function it_can_add_alarms(Alarm $alarm)
	{
		$this->getAlarms()->shouldHaveCount(0);

		$this->addAlarm($alarm);
		$this->getAlarms()->shouldHaveCount(1);

		$this->addAlarm($alarm);
		$this->getAlarms()->shouldHaveCount(2);
	}

	function it_can_get_alarms(Alarm $alarm) {
		$this->getAlarms()->shouldHaveCount(0);
		$this->getAlarms()->shouldBeArray();

		$this->addAlarm($alarm);
		$this->getAlarms()->shouldHaveCount(1);
		$this->getAlarms()->shouldBeArray();

	}

	function it_can_count_alarms(Alarm $alarm)
	{
		$this->getAlarmCount()->shouldBeInt();
		$this->getAlarmCount()->shouldBe(0);

		$this->addAlarm($alarm);
		$this->getAlarmCount()->shouldBeInt();
		$this->getAlarmCount()->shouldBe(1);
	}

	function it_can_detect_alarms(Alarm $alarm)
	{
		$this->hasAlarms()->shouldReturn(false);
		$this->hasAlarms()->shouldBeBoolean();

		$this->addAlarm($alarm);
		$this->hasAlarms()->shouldReturn(true);
		$this->hasAlarms()->shouldBeBoolean();
	}

}
