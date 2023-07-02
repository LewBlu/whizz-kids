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

	public function createAccount($account_data) {
		$stmt = mysqli_stmt_init($this->conn);
		mysqli_stmt_prepare($stmt, "INSERT INTO accounts(forename, surname, guardian, telephone) VALUES (?,?,?,?)");
		mysqli_stmt_bind_param($stmt, "ssss", $account_data['forename'], $account_data['surname'],$account_data['guardian'],$account_data['contact_number']);
		mysqli_stmt_execute($stmt);
		$id = mysqli_insert_id($this->conn);
		if($id) {
			return ['success' => true, 'account_id' => $id];
		}
		return ['success' => false, 'message' => 'An error occured when attempting to create the account'];
	}
}