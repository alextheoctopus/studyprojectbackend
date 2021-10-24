<?php
 require_once('db/DB.php');
 require_once('user/Users.php');

 class Application {
	  function __construct() {
			$db = new DB();
			$this->user = new Users($db);
	  }

	  public function loginMethod($params) {
			if ($params['login'] && $params['password']) {
				return $this->user->login($params['login'], $params['password']);
			}
	  }

	  public function logout($params) {
			if ($params['token']) {
				return $this->user->logout($params['token']);
			}
	  }
 }