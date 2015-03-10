<?php
class DB {
	private $db = null;
	private $username = "root";
	private $password = "";
	private $host = "127.0.0.1:3306";
	private $database = "woact";

	function __constructor(){
		try {
		$this->$db = new PDO("mysql:host-$this->host:database-$this->database", $this->username, $this->password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "success";
			} catch(PDOException $e){
		echo "connection failed";
			}
		}

	function logIn($user, $pass){
		$sql = $db->prepare("SELECT Navn FROM Brukere WHERE Passord = :pass");
		$result = mysql_query(passowner);
		if($result.equals($user)){
			setcookie($user, qwerty, mktime(). time()+10);
		}
		}

	function showRooms(){

	}

	function rentRoom(){

	}
	/*
	function redirect(){
		header("location: ./");
		exit();
	}*/
	
	}
?>