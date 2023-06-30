<?php
namespace WhizzKids\Controller;

class UserController {
	public function __construct() {}

	public function getUsers() {
		$users = [
			['firstname' => 'Lewis', 'surname' => 'Blundell', 'email' => 'example@test.com', 'telephone' => '0987654321', 'active' => true],
			['firstname' => 'Lauren', 'surname' => 'Blundell', 'email' => 'example@test.com', 'telephone' => '0987654321', 'active' => true],
			['firstname' => 'Charlotte', 'surname' => 'Blundell', 'email' => 'example@test.com', 'telephone' => '0987654321', 'active' => true]
		];
		return $users;
	}
}