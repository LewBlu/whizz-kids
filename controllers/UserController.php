<?php
namespace WhizzKids\Controller;

class UserController {
	private $UserModel;

	public function __construct() {
		$this->UserModel = new \WhizzKids\Model\UserModel();
	}

	public function getUsers() {
		return $this->UserModel->getUsers();
	}
}