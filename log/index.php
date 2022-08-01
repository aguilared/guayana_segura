<?php
/*
Esta es una forma de HTML con dos campos de texto, titulados “correo electrónico” y “contraseña”. 
El botón de envío del formulario llamará a la función de JavaScript “formhash()”, la cual generará una contraseña con hash 
y enviará el contenido de “correo electrónico” y “p” (contraseña con hash) al servidor. 

Al iniciar la sesión, lo más recomendable será utilizar algo que no sea público. En la presente guía usaremos el c
orreo electrónico como ID de inicio de sesión, pero el nombre de usuario podrá utilizarse después para identificar al usuario. 
Si el correo electrónico se oculta en alguna página dentro de la aplicación más amplia, se añadirá otra variable 
desconocida para crackear las cuentas.

Nota: pese a que hemos encriptado la contraseña de modo que no se envíe en texto simple, será vital 
que uses el protocolo HTTPS (TLS/SSL) a la hora de enviar las contraseñas a un sistema de producción. 
No está por demás insistir en que simplemente poner un hash a la contraseña será insuficiente. Podrías 
sufrir un ataque “man-in-the-middle” que podría leer el hash enviado y usarlo para iniciar sesión.
*/


include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();

$message =""; 

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <link rel="stylesheet" href="styles/main.css" />
		
		<link rel="STYLESHEET" href="css/bootstrap.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="STYLESHEET" href="css/style.css" type="text/css" media="screen" charset="utf-8" />
		
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    
		<script>	
			function enfocar(){

					 document.getElementById("usuario").focus();

			}
		</script>

</head>
	
	<body onLoad="enfocar()">        
		<?php
			if (isset($_GET['error'])) {
				//$message ="Error al Logearte";
			}
        ?> 
			
		<div class="container">
			
			<div class="page-header">

				<div class="row">
					<div class="col-lg-12">
						<img style="width:100%" src="img/cintillo-mppi.jpg" alt="Cintillo MPPI">
					</div>
				</div>

				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-2">
						<img  style="height:100px" src="img/logo-alcasa.jpg" class="img-responsive pull-left" alt="Cintillo MPPI">
					</div>
					<div class="col-md-8 col-sm-8  col-xs-8 titulo">
						<h1 class="text-center text-primary">SUPERINTENDENCIA DE CONTROL DE PROCESOS</h1>
						<h2 class="text-center">Bitacora de los Tecnicos de Control de Procesos - Planta Extrusora</h2>
					</div>
					<div class="col-md-2 col-sm-2  col-xs-2">
						<img style="height:100px" src="img/logo-cvg.png" class="img-responsive pull-left" alt="Logo cvg">
					</div>
					

				</div>
				<!-- /.row -->
				

			</div>
			<!-- /.page-header -->

		

		
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

								<?php echo $message; ?>

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
					   
					  </div>
					  <!-- /.panelbody -->
					</div>
					<!-- /.paneldefault -->
					
					
				</div>
				<!-- /.collg6 -->
			</div>
			<!-- /.row -->
			
			<p> Si no tiene una cuenta, por favor<a href="register.php">regístrese.</a></p>
			<p> Si ha terminado, por favor<a href="includes/logout.php">cierre la sesión.</a></p>
			<p>Está conectado.<?php echo $logged ?>.</p>
			
			<footer>
				<p class="text-muted text-center">COPYRIGHT SUPERINTENDENCIA DE CONTROL DE PROCESOS ALCASA</p>

			</footer>

		</div>
		<!-- /.container -->
		
</body>
</html>