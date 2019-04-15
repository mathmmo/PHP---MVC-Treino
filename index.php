<?php
//Header
include_once('includes/header.php');
//Config, SPL AUTOLOAD Classes
require_once('config.php');
//Class stance
$objUser = new User();
//Login
if(isset($_POST['btnLogin'])){
	$objUser->userLogin($_POST);
}
?>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-4"></div>
			<div class="col-md-4 mt-5 form-mid">
				<center><h3>Realize o Login</h3></center>
				<br />
				<form method="post" action="" id="formLogin">
					<div class="form-group">
						<input type="text" class="form-control" id="user" name="deslogin" placeholder="Usuário" required="requiored">
					</div>			
					<div class="form-group">
						<input type="password" class="form-control" id="password" name="despassword" placeholder="Senha" required="requiored">
					</div>
					<button type="submit" class="btn btn-primary form-control" name="btnLogin">Login</button>
				</form>
		        <?php if(isset($_GET["login"]) == "error"){ ?>
		       		<div class="alert alert-danger alert-block alert-aling mt-3" role="alert">Ops! E-mail ou Senha estão errados.</div>
		        <?php } ?>
			</div>
			<div class="col-md-4"></div>
		</div>
		<div class="row">
			<div class="col-md-12"><center><small class="login-warning">Para consultar dados de login, acessar readme.txt</small></center></div>
		</div>
	</div>
</body>
<?php
include_once('includes/footer.php');
?>