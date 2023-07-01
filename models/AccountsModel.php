<?php
namespace WhizzKids\Model;

class AccountsModel {
	private $conn;
	
	public function __construct() {
		$this->conn = mysqli_connect($_ENV['DB_SERVER'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
		if (!$this->conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
	}

	public function getAccounts() {
		$sql = 'SELECT * FROM accounts';
		$result = mysqli_query($this->conn, $sql);
		$accounts = [];
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$accounts[] = $row;
			}
		} 
		mysqli_close($this->conn);
		return $accounts;
	}
}