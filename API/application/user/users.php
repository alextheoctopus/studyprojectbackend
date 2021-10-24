<?php
class Users {

	function __construct($db) {
		$this->db = $db;
	}

	public function login($login, $password) {
		$user = $this->db->getUser($login);
		if ($user) {
			if ($password == $user->password) {
				return array(
					'name' => $user->name,
					'token' => md5(rand())
				);
			}
		}
	}

	public function logout($token) {
		// удалить этот токен из БД
		//...
		return true;
	}
}