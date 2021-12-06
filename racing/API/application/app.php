<?php
require_once('db/DB.php');
require_once('user/Users.php');
require_once('arrival/Arrival.php');

class Application
{
	function __construct()
	{
		$db = new DB();
		$this->user = new Users($db);
	}

	public function loginMethod($params)
	{
		if ($params['login'] && $params['password']) {
		return $this->user->login($params['login'], $params['password']);
			/*$user = $this->user->login($params['login'], $params['password']);
			return $this->arrival->login($params['login'], $params['password']);*/
		}
	}

	public function logout($params)
	{
		if ($params['token']) {
			return $this->user->logout($params['token']);
		}
	}
	public function regMethod($params)
	{
		if ($params['login'] && $params['password'] && $params['name']) {			
			return $this->user->registration($params['login'], $params['password'], $params['name']);
		} else {			
			return false;
		}
	}

	public function getRaces($params)			//ВСЕ запросы "подписываются" токеном
	{
		if ($params['token']) {
			$user = $this->user->getUser($params['token']);

		}
	}
}
