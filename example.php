<?php
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

require 'class.iCalReader.php';

$cal = new iCal('ical.ics');

$cal->sortEvents();

var_dump($cal->isOngoing(new DateTime('Today 11AM')));