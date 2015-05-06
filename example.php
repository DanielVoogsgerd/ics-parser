<?php
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */
require 'vendor/autoload.php';

use iCal\Calendar;
use iCal\Event;
use iCal\Todo;
use iCal\Journal;
use iCal\FreeBusy;
use iCal\Alarm;

$cal = new Calendar('ical.ics');
var_dump($cal);

$cal->sortEvents();

//var_dump($cal->getOngoingEvents(new DateTime('Today 11AM')));

$events   = new Event('Event Title', new DateTimeImmutable('Yesterday'), new DateTimeImmutable('Tomorrow'), 'Location', [ 'testProperty' => 'testValue' ]);
$todo     = new Todo('Todo Title', new DateTimeImmutable('Yesterday'), new DateTimeImmutable('Tomorrow'), 'Location', [ 'testProperty' => 'testValue' ]);
$journal  = new Journal('Journal Title', new DateTimeImmutable('Yesterday'), [ 'testProperty' => 'testValue' ]);
$freebusy = new FreeBusy(new DateTimeImmutable('Yesterday'), new DateTimeImmutable('Tomorrow'), [ 'testProperty' => 'testValue' ]);
$alarm    = new Alarm('Action', 'Trigger');

//var_dump($events, $todo, $journal, $freebusy, $alarm);