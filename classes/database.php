<?php

class Database{

	var $user_db = 'root';
	var $pass_db = '';
	var $host_db = 'localhost';
	var $name_db = 'taller';
	var $connection;

	function connect(){
		$this->connection = new PDO("mysql:$this->host_db=;dbname=$this->name_db;charset=utf8", $this->user_db, $this->pass_db);
	}

	function close(){
		$this->connection = null;
	}

}
?>