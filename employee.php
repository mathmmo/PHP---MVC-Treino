<?php 
//SPL AUTO LOAD
require_once ("config.php");
//Include Header
require_once ("includes/header.php");
//Class stance
$objUser = new Autentication();
//Autentication
$objUser->userCheck();
//Logout
$objUser->logout();

//Name of the user
echo $_SESSION['name'];
?>
<body>
	<div class="container">
		<div class="mt-5">
			<button><a href="?sair=1">LogOut</a></button>
		</div>
	</div>
</body>