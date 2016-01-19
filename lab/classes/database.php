<?php 	

	class Database {

		public $conn;

		public function init() {
			$this->conn = new mysqli(HOST, USERNAME, PASS, DB);

			if ($this->conn->connect_error) {
				die("Connection failed : ". $this->conn->connect_error);
			}

			// Change character set to utf-8
			mysqli_set_charset($this->conn, 'utf8');

			return $this->conn;
		}
	}