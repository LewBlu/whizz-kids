<?php
namespace WhizzKids\Controller;

class AccountsController {
	private $conn;
	public function __construct() {
		$this->conn = mysqli_connect($_ENV['DB_SERVER'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
		if (!$this->conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
	}

	public function getAccounts() {
		$accounts = [
			['forename' => 'Lewis', 'surname' => 'Blundell', 'guardian' => 'Deborah Blundell', 'telephone' => '0987654321', 'balance' => '1.23'],
			['forename' => 'Lauren', 'surname' => 'Blundell', 'guardian' => 'Deborah Blundell', 'telephone' => '0987654321', 'balance' => '1.23'],
			['forename' => 'Charlotte', 'surname' => 'Blundell', 'guardian' => 'Deborah Blundell', 'telephone' => '0987654321', 'balance' => '1.23']
		];
		return $accounts;
	}
}