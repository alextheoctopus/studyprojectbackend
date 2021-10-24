<?php
class DB {
	function __construct() {
		$host='localhost';
		$port='3306';
		$name='is-21';
		$user='root';
		$pass='';
		try {
			$this->db = new PDO(
				'mysql:'.
				'host='.$host.';'.
				'port='.$port.';'
				.'dbname='.$name,
				$user,
				$pass
			);
		} catch(Exception $e) {
			print_r($e->getMessage());
			die();
		}
	}

	function __destruct(){
		$this->db=null;
	}

	public function getUser($login) {
		$query = 'SELECT * FROM users WHERE login="'.$login.'"';
		return $this->db->query($query)->fetchObject();
	}

	public function getUsers(){
		$query = 'SELECT * FROM users';
		$stmt=$this->db->query($query);
		$result=array();
		while($row=$stmt->fetch(PDO::FETCH_OBJ)){
			$result[]=$row;
		}
		return $result;
	}
}