<?php
//SPL AUTO LOAD
require_once ("config.php");
//Autentication class
class Autentication{
	private $user;
	//Construct
	public function __construct(){
		$this->user = new User();
	}

	public function userCheck(){
		session_start();
		if(isset($_SESSION['login'])){
			$this->user->userLogged($_SESSION['user']);
		} else {
			header('location: ../reembolso-webapp');
		}
	}

	public function logout(){
		if(isset($_GET['sair'])){
			$this->user->userLogout();
		}
	}
}
?>