<?php
/**
 * Author: Daniel Voogsgerd
 * All rights reserved
 */

require 'class.iCalReader.php';
require 'class.iCalEvent.php';
require 'class.iCalTodo.php';

$cal = new iCal('ical.ics');

$cal->sortEvents();

var_dump($cal->isOngoing(new DateTime('Today 11AM')));