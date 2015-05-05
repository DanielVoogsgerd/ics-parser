<?php namespace iCal;
/**
 * Author: Daniel Voogsgerd
 * License: GNU GPLv2
 */

require_once 'Component.php';
require_once 'Event.php';
require_once 'Todo.php';

class Calendar extends Component {
	private $events = array();
	private $todos = array();

	public function __construct($filename) {
		if (!$filename)
			throw new InvalidArgumentException('No filename provided');

		if(!file_exists($filename))
			throw new InvalidArgumentException('Provided file doensn\'t exist');

		$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

		if (stristr($lines[0], 'BEGIN:VCALENDAR') === false)
			throw new Exception('Content doensn\'t look like iCal to me');

		foreach ($lines as $rawline) {
			foreach (explode('\n', $rawline) as $line) {
				$lineSegments = $this->parseLine($line);

				if(is_array($lineSegments))
					list($keyword, $attributes, $value) = $lineSegments;
				else {
					if (!isset($keyword))
						return false;

					if(isset($current))
						$current->appendProperty($keyword, $lineSegments);

					continue;
				}

				switch ($keyword) {
					case "BEGIN":
						switch ($value) {
							case "VTODO":
								$current = new Todo();
								$this->todos[] = $current;
								break;

							case "VEVENT":
								$current = new Event();
								$this->events[] = $current;
								break;

							case "VTIMEZONE":
								break;
							case "VCALENDAR":
								$current = $this;
								break;
							case "DAYLIGHT":
							case "STANDARD":
								//Recusive behaviour
								unset($current);

								break;
						}

						break;
					case "DTSTART":
						if (isset($current))
							$current->setStart($this->iCalDateToDateTime($value, isset($attributes['TZID']) ? $attributes['TZID'] : null));
						break;

					case "DTEND":
						if (isset($current))
							$current->setEnd($this->iCalDateToDateTime($value, isset($attributes['TZID']) ? $attributes['TZID'] : null));
						break;

					case "SUMMARY":
						if (isset($current))
							$current->setSummary($value);
						break;

					case "LOCATION":
						if (isset($current))
							$current->setLocation($value);
						break;

					case "END":
						if (in_array($value, [
							'VTODO',
							'VEVENT',
							'VCALENDAR',
							'DAYLIGHT',
							'VTIMEZONE',
							'STANDARD'
						])) {
							$current = $this;
							break;
						}
					default:
						if (isset($current))
							$current->setProperty($keyword, $value);
						break;
				}
			}
		}
	}

	private function parseLine($line) {
		$line = trim($line);
		$add = $this->keyValueFromString($line);

		if ($add === false)
			return $line;

		$value = $add[1];

		$raw = explode(';', $add[0]);
		$keyword = array_shift($raw);

		$attributes = array();
		foreach ($raw as $rawAttribute) {
			$attribute = explode('=', $rawAttribute, 2);
			$attributes[$attribute[0]] = isset($attribute[1]) ? trim($attribute[1]) : true;
		}

		$keyword = trim($keyword);
		$value = trim($value);

		return [ $keyword, $attributes, $value ];
	}

	private function keyValueFromString($text) {
		if (!preg_match("/([^:]+)[:]([\w\W]*)/", $text, $matches))
			return false;

		return array_slice($matches, 1, 2);
	}

	private function iCalDateToDateTime($icalDate, $timezone = null) {
		$pattern = '/([0-9]{4})';    // 1: YYYY
		$pattern .= '([0-9]{2})';    // 2: MM
		$pattern .= '([0-9]{2})';    // 3: DD
		$pattern .= 'T';             //    Date/Time delimiter
		$pattern .= '([0-9]{0,2})';  // 4: HH
		$pattern .= '([0-9]{0,2})';  // 5: MM
		$pattern .= '([0-9]{0,2})';  // 6: SS
		$pattern .= '(Z?)/';         // 7: Timezone

		if (!preg_match($pattern, $icalDate, $date)) {
			trigger_error('Date supplied is not a valid ical date');

			return false;
		}

		if ($date[7] !== "Z" && is_null($timezone) && $this->getProperty('TZID')) {
			trigger_error('No timezone was supplied');

			return false;
		}

		return \DateTimeImmutable::createFromFormat('Ymd\THis', $icalDate, new \DateTimeZone($timezone));
	}

	public function getTodos() {
		return $this->todos;
	}

	public function hasTodos() {
		return $this->getTodoCount() > 0;
	}

	public function getTodoCount() {
		return count($this->getTodos());
	}


	public function getEvents() {
		return $this->events;
	}

	public function hasEvents() {
		return $this->getEventCount() > 0;
	}

	public function getEventCount() {
		return count($this->getEvents());
	}

	public function getEventsFromRange(\DateTime $rangeStart = null, \DateTime $rangeEnd = null) {
		return array_filter($this->events(), function ($event) use ($rangeStart, $rangeEnd) {
			return ($rangeStart === null || $rangeStart <= $event->getStart()) &&
			       ($rangeEnd === null || $rangeEnd >= $event->getStart());
		});
	}

	public function sortEvents($order = SORT_ASC) {
		usort($this->events, function ($event1, $event2) use ($order) {
			if ($event1->getStart() === $event2->getStart())
				return 0;

			if ($order === SORT_ASC)
				return ($event1->getStart() > $event2->getStart()) ? 1 : -1;
			else
				return ($event1->getStart() < $event2->getStart()) ? 1 : -1;
		});
	}

	public function getOngoingEvents(\DateTime $time = null) {
		return array_filter($this->getEvents(), function($event) use($time) {
			return $event->isOngoing($time);
		});
	}

	public function getEventsStartingWithin(\DateInterval $startsWithin, \DateTime $time = null) {
		return array_filter($this->getEvents(), function($event) use($startsWithin, $time) {
			return $event->isStartingWithin($startsWithin, $time);
		});
	}
}