<?php

	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';
	 
	sec_session_start();

	$message =""; 

	if (login_check($mysqli) == true) {
		$logged = 'in';
		
	} else {
		$logged = 'out';
		$message ="";

	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Logeo de Usuarios</title>
		
		<link rel="STYLESHEET" href="css/bootstrap.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="STYLESHEET" href="css/style.css" type="text/css" media="screen" charset="utf-8" />
		
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    
		<script>	
			function enfocar(){
					 document.getElementById("email").focus();
			}
		</script>

	</head>
	
	<body onLoad="enfocar()">        
		<?php
			if (isset($_GET['error'])) {
				$error = $_GET['error'];
			} else {
				$error ="";
			}
        ?> 
			
		<div class="container">
			
			<div class="page-header">
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<img  style="height:100px" src="images/logo.jpg" class="img-responsive pull-left" alt="Cintillo MPPI">
					</div>
					<div class="col-md-8 col-sm-8  col-xs-8 titulo">
						<h1 class="text-center text-primary">Guayana Segura</h1>
						<h2 class="text-center">Bitacora de Sucesos</h2>
					</div>
					<div class="col-md-2 col-sm-2  col-xs-2">
						<img style="height:100px" src="images/logo.jpg" class="img-responsive pull-left" alt="Logo cvg">
					</div>
				</div><!-- /.row -->
			</div><!-- /.page-header -->
		
			<div class="row">
				<div class="col-lg-12">
					<h2 class="text-center">ACCESO DE USUARIOS</h2>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<form action="includes/process_login.php" method="post" name="login_form">                      
								<?php if ($error == 1) {
									$message ="Error al Logearte"; ?>
									<div class="alert alert-warning"><?php echo $message ?></div> <?php
								}?>
								

								<div class="form-group">
									<div class="input-group">
									  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									  <input name="email" type="text" id="email" class="form-control" placeholder="Correo electronico:">
									</div>
								</div>

								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-eye-close"></span></span>
										<input name="password" type="password" class="form-control"  id="password" placeholder="Password" >
									</div>
								</div>
								
								<div class="form-group text-center">

									<input type="button" value="Login"  class="btn btn-primary" onclick="formhash(this.form, this.form.password);" /> 
								</div>
							</form>
					  </div><!-- /.panelbody -->
					</div><!-- /.paneldefault -->
				</div><!-- /.collg6 -->
			</div><!-- /.row -->
			
			<p>Conectado.<?php echo $logged ?>.</p>
			
			<footer><p class="text-muted text-center">COPYRIGHT AGUILARED 2015</p></footer>

		</div>
		<!-- /.container -->
		
</body>
</html>