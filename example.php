<?php
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

use iCal\iCal;

require 'iCal/iCal.php';
$cal = new iCal('ical.ics');

$cal->sortEvents();

var_dump($cal->isOngoing(new DateTime('Today 11AM')));