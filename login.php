<?php
include_once('includes/header.php');
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
						<input type="text" class="form-control" id="user" name="user" placeholder="Usuário" required="requiored">
					</div>			
					<div class="form-group">
						<input type="password" class="form-control" id="password" name="password" placeholder="Senha" required="requiored">
					</div>
					<button type="submit" class="btn btn-primary form-control">Login</button>
				</form>
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