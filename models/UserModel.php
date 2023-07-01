<?php
namespace WhizzKids\Model;

class UserModel {
	private $conn;
	
	public function __construct() {
		$this->conn = mysqli_connect($_ENV['DB_SERVER'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
		if (!$this->conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
	}

	public function getUsers() {
		$sql = 'SELECT * FROM users';
		$result = mysqli_query($this->conn, $sql);
		$users = [];
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$users[] = $row;
			}
		} 
		mysqli_close($this->conn);
		return $users;
	}
}