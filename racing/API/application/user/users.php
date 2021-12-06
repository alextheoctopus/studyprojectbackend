<?php
class Users
{

	function __construct($db)
	{
		$this->db = $db;
	}

	public function login($login, $password) {
		$user = $this->db->getUser($login, $password);
		if ($user) {
			$token = md5(rand());
			$this->db->updateToken($user->id, $token);
			return array(
				'name' => $user->name,
				'token' => $token
			);
		}
	}

	public function logout($token)
	{
		$user = $this->db->getUserByToken($token);
		if ($user) {
			return $this->db->updateToken($user->id, '');
		}
	}

	public function registration($login, $password, $name) {
		$user = $this->db->regUser($login, $password, $name);
		if ($user) {
			return $this->login($login, $password);
		}
	}

	public function getUser($token)
	{
		$user = $this->db->getUser($login, $password);
		if ($user) {
			
		}
	}
}
