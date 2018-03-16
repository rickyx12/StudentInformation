<?php

	class Student {

		private $host;
		private $username;
		private $password;
		private $database;

		public function __construct() {
		  $this->host = $_SERVER['DB_HOST'];
		  $this->username = $_SERVER['DB_USER'];
		  $this->password = $_SERVER['DB_PASS'];
		  $this->database = $_SERVER['DB_DB'];
		}			


		private $getStudent_id;

		public function getStudent_id() {
			return $this->getStudent_id;
		}

		public function getStudent() {
			$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
			$result = mysqli_query($connection, " SELECT id FROM student ORDER BY id ASC ") or die("Query fail: " . mysqli_error()); 
			while($row = mysqli_fetch_array($result))
			{
				$this->getStudent_id[] = $row['id'];
			}	
		}
	}

?>