<?php

class Arrival{
	function __construct()
	{
		$db = new DB();
		$this->user = new Users($db);
	}

	public function getRaces($params)
	{
		if ($params['token'])
		{

		}
	}
}