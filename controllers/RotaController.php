<?php
namespace WhizzKids\Controller;

class RotaController {
	public function __construct() {}

	public function getCalendarConfiguration($date = null) {
		$date = (!is_null($date) ? $date : date("Y-m-d"));
		$firstDateOfMonth = substr($date, 0, -2).'01';
		$totalDaysToSkip = date('w', strtotime($firstDateOfMonth));
		
		$data = [
			'selectedDate' => $date,
			'totalDaysInMonth' => date('t', strtotime($date)),
			'daysToSkip' => $totalDaysToSkip,
			'totalRows' => ceil((date('t', strtotime($date))+$totalDaysToSkip)/7),
			'calendarHeader' => date('F Y', strtotime($date)),
			'next' => date('Y-m-d', strtotime('+1 month', strtotime($date))),
			'previous' => date('Y-m-d', strtotime('-1 month', strtotime($date)))
		];
		return $data;
	}
}