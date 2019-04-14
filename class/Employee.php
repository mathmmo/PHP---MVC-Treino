<?php
//Classes
requeire_once "Connection.php";
// funcionario class
class Employee{
private $con;
private $objFc;
private $iduser;
private $name;
private $deslogin;
private $password;

//Construct
public function __construct(){
	$this-con = new Connection();
}

//Magic Methods
public function __set($attribute, $value){
	$this->$attribute = $value;
}

public function __get($attribute){
	return $this->$attribute;
}

public function login($data){
	$this->deslogin = $data['deslogin'];
	$this->password = sha1($data['password']);
	try {
		$cst = $this->con->connect()->prepare("SELECT 'iduser', 'deslogin','despassword', 'inadmin' FROM 'tb_users' WHERE 'deslogin' = :deslogin AND 'dessenha' = :dessenha");
		$cst->bindParam(":deslogin",$deslogin, PDO::PDO_PARAM_STR);
		$cst->bindParam(":dessenha",$dessenha, PDO::PDO_PARAM_STR);
		$cst->execute();
		if($cst->rowCount() == 0){
			header('location: /reembolso-webapp');
		} else {
			session_start();
			$rst = $cst->fecth();
			$_SESSION['user'] = $rst['iduser'];
			$_SESSION['loged'] = $rst['inadmin'];
			header('locarion: /reembolso-webapp/admin');
		}
	} catch (PDOException $e) {
		return $e->getMessage();
	}
}




?>