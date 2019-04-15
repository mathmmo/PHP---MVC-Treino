<?php
//Connection Class
class Connection{
	//Private Atributes
	private $user;
	private $password;
	private $database;
	private $server;
	private static $pdo;
	//Constructor
	public function __construct(){
		$this->server = "localhost";
		$this->database = "db_reembolso";
		$this->user = "root";
		$this->password = "";
	}
	//Connection method
	public function connect(){
		try {
			if(is_null(self::$pdo)){
				self::$pdo = new PDO ("mysql:host=".$this->server.";dbname=".$this->database, $this->user, $this->password);
			}
			return self::$pdo;
		} catch (Exception $e) {
			echo 'Error: '.$e->getMessage();
		}
	}
}
?>