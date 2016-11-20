<?php

class Database{

	var $user_db = 'root';
	var $pass_db = '';
	var $host_db = 'localhost';
	var $name_db = 'taller';
	var $connection;

	function connect(){
		$this->connection = new PDO("mysql:$this->host_db=;dbname=$this->name_db;", $this->user_db, $this->pass_db);
		echo 'se conecto parce!';
	}

	function close(){
		$this->connection = null;
	}

}
?>