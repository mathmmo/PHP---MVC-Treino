<?php 
//SPL AUTO LOAD
require_once ("config.php");
//Class stance
$objUser = new Autentication();
//Autentication
$objUser->userCheck();
//Logout


//Name of the user
echo $_SESSION['name'];
?>