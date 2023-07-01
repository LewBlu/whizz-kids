<?php
namespace WhizzKids\Controller;

class BookingsController {
	public function __construct() {}

	public function getRegister() {
		$bookings = [
			'breakfast_club' => [
				['name' => 'Lewis', 'present' => 1],
				['name' => 'Liam', 'present' => 0],
				['name' => 'Ben', 'present' => 1],
				['name' => 'Lauren', 'present' => 1],
				['name' => 'Charlotte', 'present' => 0],
				['name' => 'Debbie', 'present' => 1],
				['name' => 'Lewis', 'present' => 1],
			],
			'toast_club' => [
				['name' => 'Lewis', 'present' => 1],
				['name' => 'Charlotte', 'present' => 0],
				['name' => 'Debbie', 'present' => 1],
				['name' => 'Lewis', 'present' => 1],
			],
			'after_school_club' => [
				['name' => 'Lewis', 'present' => 1],
				['name' => 'Liam', 'present' => 0],
				['name' => 'Ben', 'present' => 1],
				['name' => 'Lauren', 'present' => 1],
				['name' => 'Charlotte', 'present' => 0],
			]
		];
		return $bookings;
	}
}