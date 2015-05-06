<?php
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

use iCal\Calendar;
use iCal\Event;
use iCal\Todo;

require 'iCal/Calendar.php';
$cal = new Calendar('ical.ics');

$cal->sortEvents();

var_dump($cal->getOngoingEvents(new DateTime('Today 11AM')));

$events = new Event('Title', new DateTimeImmutable('Yesterday'), new DateTimeImmutable('Tomorrow'), 'Location');
$todo   = new Todo('Title', new DateTimeImmutable('Yesterday'), new DateTimeImmutable('Tomorrow'), 'Location');

var_dump($events, $todo);