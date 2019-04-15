<?php
//SPL AUTO LOAD
require_once ("Connection.php");
//User class
class User{
	private $con;
	private $objFc;
	private $iduser;
	private $name;
	private $deslogin;
	private $despassword;
	private $inadmin;

	//Construct
	public function __construct(){
		$this->con = new Connection();
	}

	//Magic Methods
	public function __set($attribute, $value){
		$this->$attribute = $value;
	}

	public function __get($attribute){
		return $this->$attribute;
	}
	//Function register user
	public function register($name_p, $deslogin_p, $despassword_p, $inadmin_p){
		$this->name = $name_p;
		$this->deslogin = $deslogin_p;
		$this->despassword = sha1($despassword_p);
		$this->inadmin = $inadmin_p;
		$stmt = $this->con->connect()->prepare("INSERT INTO tb_users (name , deslogin, despassword, inadmin) VALUES (:name, :deslogin, :despassword, :inadmin);");
		$stmt->bindParam(":name",$this->name, PDO::PARAM_STR);
		$stmt->bindParam(":deslogin", $this->deslogin, PDO::PARAM_STR);
		$stmt->bindParam(":despassword", $this->despassword, PDO::PARAM_STR);
		$stmt->bindParam(":inadmin", $this->inadmin, PDO::PARAM_INT);
		if($stmt->execute()){
			return "Ok.";
		} else {
			return "Erro ao cadastrar.";
		}
	}
	//Login Method
	public function userlogin($data){
		//Instance the POST variables into the object
		$this->deslogin = $data['deslogin'];
		$this->despassword = sha1($data['despassword']);
		try {
			$stmt = $this->con->connect()->prepare("SELECT iduser, deslogin, despassword, inadmin FROM tb_users WHERE deslogin = :deslogin AND despassword = :despassword;");
			$stmt->bindParam(":deslogin",$this->deslogin, PDO::PARAM_STR);
			$stmt->bindParam(":despassword",$this->despassword, PDO::PARAM_STR);
			$stmt->execute();
			if($stmt->rowCount() == 0){
				header('location: /reembolso-webapp/?login=error');
			} else {
				session_start();
				$rst = $stmt->fetch();
				$_SESSION['user'] = $rst['iduser'];
				$_SESSION['login'] = true;
				if ($rst['inadmin'] == 1){
					header('location: /reembolso-webapp/manager.php');
				} else {
					header('location: /reembolso-webapp/employee.php');
				}
			}
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function userLogged($data){
		$this->iduser = $data;
		$stmt = $this->con->connect()->prepare("SELECT iduser, deslogin, name, inadmin FROM tb_users WHERE iduser = :iduser ;");
		$stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
		$stmt->execute();
		$rst = $stmt->fetch();
		$_SESSION['name'] = $rst['name'];
	}

	public function userLogout(){
		session_destroy();
		header('location:../reembolso-webapp');
	}
}
?>