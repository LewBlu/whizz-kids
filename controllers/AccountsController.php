<?php
namespace WhizzKids\Controller;

class AccountsController {
	private $AccountsModel;

	public function __construct() {
		$this->AccountsModel = new \WhizzKids\Model\AccountsModel();
	}

	public function getAccounts() {
		return $this->AccountsModel->getAccounts();
	}
}