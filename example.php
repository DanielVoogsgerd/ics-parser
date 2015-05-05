<?php
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

use iCal\Calendar;

require 'iCal/Calendar.php';
$cal = new Calendar('ical.ics');

$cal->sortEvents();

var_dump($cal->isOngoing(new DateTime('Today 11AM')));