<?php
	/*
		secuencia de comandos para cerrar sesión.
		El script para el cierre de sesión deberá iniciar sesión, destruirla y luego redireccionarla a otro lugar. 
		Nota: te recomendamos añadir una protección CSRF aquí en el caso de que alguien logre enviar un enlace oculto a esta página. 
		Para mayor información sobre CSRF, visita Coding Horror.
	*/
	
	include_once 'includes/functions.php';
	sec_session_start();
	 
	// Desconfigura todos los valores de sesión.
	$_SESSION = array();
	 
	// Obtiene los parámetros de sesión.
	$params = session_get_cookie_params();
	 
	// Borra el cookie actual.
	setcookie(session_name(),
			'', time() - 42000, 
			$params["path"], 
			$params["domain"], 
			$params["secure"], 
			$params["httponly"]);
	 
	// Destruye sesión. 
	session_destroy();
	header('Location: ../ index.php');

?>