<?php
	/*	página de procesamiento de inicio de sesión (process_login.php)	*/
	
	include_once 'db_connect.php';
	include_once 'functions.php';
	 
	sec_session_start(); // Nuestra manera personalizada segura de iniciar sesión PHP.
	 
	if (isset($_POST['email'], $_POST['p'])) {
		$email = $_POST['email'];
		$password = $_POST['p']; // La contraseña con hash
	 
		if (login($email, $password, $mysqli) == true) {
			$nivel = $_SESSION['nivel'];
			//$nivel = 2;
			
			
			//$nivel = nivel($email, $mysqli);
			
			
			if ($nivel == 1) {
				// Inicio de sesión exitosa
				header('Location: ../menu.php');
			} else {
				// Inicio de sesión no exitosa
				header('Location: ../menu1.php');
			}
			
		} else {
			// Inicio de sesión fallida
			header('Location: ../index.php?error=1');
			$message="Error en tus claves";
		}
	} else {
		// Las variables POST correctas no se enviaron a esta página.
		echo 'Solicitud no válida';
	}

?>