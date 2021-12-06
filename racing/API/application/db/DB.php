<?php
class DB
{
	function __construct()
	{
		$host = 'racing';
		$port = '3306';
		$name = 'is-21';
		$user = 'root';
		$pass = '';
		try {
			$this->db = new PDO(
				'mysql:' .
					'host=' . $host . ';' .
					'port=' . $port . ';'
					. 'dbname=' . $name,
				$user,
				$pass
			);
		} catch (Exception $e) {
			print_r($e->getMessage());
			die();
		}
	}

	function __destruct()
	{
		$this->db = null;
	}

	public function getUser($login, $password) {
		$query = "SELECT * FROM users WHERE login='".$login."' AND password='".$password."'";
		return $this->db->query($query)->fetchObject();
	}

	public function updateToken($id, $token)
	{
		$query = "UPDATE `users` SET `token`='" . $token . "' WHERE `id`='" . $id . "'";
		return $this->db->query($query);
	}

	public function getUserByToken($token)
	{
		$query = "SELECT * FROM `users` 
	WHERE  `token`='" . $token . "'";
		return $this->db->query($query)->fetchObject();
	}

	public function regUser($login, $password, $name) {
		$user = $this->db->query("SELECT * FROM users WHERE login='" . $login . "'")->fetchObject();
		if ($user) {
			return false;
		} else {
			$query = "INSERT INTO `users`(`name`,`password`,`login`) VALUES ('".$name."','".$password."','".$login."')";
			$this->db->query($query);
			return $this->db->query("SELECT * FROM users WHERE login='".$login."'")->fetchObject();
		}
	}

	public function getUsers()
	{
		$query = 'SELECT * FROM users';
		$stmt = $this->db->query($query);
		$result = array();
		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			$result[] = $row;
		}
		return $result;
	}
}
