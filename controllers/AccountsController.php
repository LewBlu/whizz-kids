<?php
namespace WhizzKids\Controller;

class AccountsController extends CoreController {
	private $AccountsModel;

	public function __construct() {
		$this->AccountsModel = new \WhizzKids\Model\AccountsModel();
	}

	public function getAccounts() {
		return $this->AccountsModel->getAccounts();
	}

	public function createAccount($account_data) {
		// Perform check for params
		$isValid = $this->validateParams(['forename', 'surname', 'guardian', 'contact_number'], $account_data);
		if($isValid['success']) {
			$account = $this->AccountsModel->createAccount($account_data);
			return $account;
		}
		return $isValid;
	}
}