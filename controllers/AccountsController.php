<?php
namespace WhizzKids\Controller;

class AccountsController {
	public function __construct() {}

	public function getAccounts() {
		$accounts = [
			['firstname' => 'Lewis', 'surname' => 'Blundell', 'guardian' => 'Deborah Blundell', 'telephone' => '0987654321', 'balance' => '1.23'],
			['firstname' => 'Lauren', 'surname' => 'Blundell', 'guardian' => 'Deborah Blundell', 'telephone' => '0987654321', 'balance' => '1.23'],
			['firstname' => 'Charlotte', 'surname' => 'Blundell', 'guardian' => 'Deborah Blundell', 'telephone' => '0987654321', 'balance' => '1.23']
		];
		return $accounts;
	}
}