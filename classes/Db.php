<?php
session_start();
define('servername','us-cdbr-east-03.cleardb.com');
define('username','b8c5d1bb453511');
define('password','483f9647');
define('dbname','heroku_fa93cedb859fa1b');
//483f9647@us-cdbr-east-03.cleardb.com heroku_fa93cedb859fa1b
class db{
    function __construct(){
		$this->connection = new mysqli(servername, username,password,dbname);
		
		if ($this->connection->connect_error) die('Database error -> ' . $this->connection->connect_error);
		
	}
	
	function ret_obj(){
		return $this->connection;
	}


}
?>
