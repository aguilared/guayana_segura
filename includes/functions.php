<?php
	
	//1-1-2017  se creo function mes_act()

	/*
	función de inicio de sesión.
	Esta función comparará el correo electrónico y la contraseña con la base de datos y, si hay una coincidencia,
	aparecerá como verdadero (true).
	*/
	function login($email, $password, $mysqli) {
		// Usar declaraciones preparadas significa que la inyección de SQL no será posible.
		if ($stmt = $mysqli->prepare("SELECT id, username, password, salt, nivel FROM members WHERE email = ? LIMIT 1")){
			$stmt->bind_param('s', $email);  // Une “$email” al parámetro.
			$stmt->execute();    // Ejecuta la consulta preparada.
			$stmt->store_result();

			// Obtiene las variables del resultado.
			$stmt->bind_result($user_id, $username, $db_password, $salt, $nivel);
			$stmt->fetch();

			// Hace el hash de la contraseña con una sal única.
			$password = hash('sha512', $password . $salt);
			if ($stmt->num_rows == 1) {
				// Si el usuario existe, revisa si la cuenta está bloqueada
				// por muchos intentos de conexión.

				if (checkbrute($user_id, $mysqli) == true) {
					// La cuenta está bloqueada.
					// Envía un correo electrónico al usuario que le informa que su cuenta está bloqueada.
					return false;
				} else {
					// Revisa que la contraseña en la base de datos coincida
					// con la contraseña que el usuario envió.
					if ($db_password == $password) {
						// ¡La contraseña es correcta!
						// Obtén el agente de usuario del usuario.
						$user_browser = $_SERVER['HTTP_USER_AGENT'];
						//  Protección XSS ya que podríamos imprimir este valor.
						$user_id = preg_replace("/[^0-9]+/", "", $user_id);
						$_SESSION['user_id'] = $user_id;
						// Protección XSS ya que podríamos imprimir este valor.
						$username = preg_replace("/[^a-zA-Z0-9_\-]+/","",$username);
						$_SESSION['username'] = $username;
						$_SESSION['nivel'] = $nivel;
						$_SESSION['login_string'] = hash('sha512',$password . $user_browser);
						// Inicio de sesión exitoso
						return true;
					} else {
						// La contraseña no es correcta.
						// Se graba este intento en la base de datos.
						$now = time();
						$mysqli->query("INSERT INTO login_attempts(user_id, time)VALUES ('$user_id', '$now')");
						return false;
					}
				}
			} else {
				// El usuario no existe.
				return false;
			}
		}
	}




	/*
		http://es.wikihow.com/crear-un-script-de-inicio-de-sesi%C3%B3n-segura-en-php-y-MySQL
	Inicia de manera segura la sesión PHP.
	Las sesiones PHP tienen fama de no ser muy seguras, por eso será importante no solo poner “session_start();” en la parte
	superior de cada página que quieras usar para las sesiones PHP. Crearemos una función llamada “sec_session_start()”,
	ella iniciará una sesión PHP de manera segura. Deberás llamar esta función en la parte superior de toda página en la que quieras
	tener acceso a una variable de sesión PHP. Si estás realmente preocupado por la seguridad y la privacidad de las cookies,
	Esta función hará que tu script de inicio de sesión sea mucho más seguro. Hará que los crackers dejen de acceder al cookie
	de identificación de la sesión con JavaScript (por ejemplo en un ataque XSS). A su vez, la función “session_regenerate_id()”,
	la cual regenera la identificación de la sesión en cada carga de la página, ayudará a prevenir un robo de sesión.
	ota: si vas a usar HTTPS en tu aplicación de inicio de sesión, configura la variable “$secure” a “verdadero”.
	En un ambiente de producción, será esencial que emplees HTTPS.
	*/

	include_once 'psl-config.php';
	function sec_session_start() {
		$session_name = 'sec_session_id';   // Configura un nombre de sesión personalizado.
		$secure = SECURE;
		// Esto detiene que JavaScript sea capaz de acceder a la identificación de la sesión.
		$httponly = true;
		// Obliga a las sesiones a solo utilizar cookies.
		if (ini_set('session.use_only_cookies', 1) === FALSE) {
			header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
			exit();
		}
		// Obtiene los params de los cookies actuales.
		$cookieParams = session_get_cookie_params();
		session_set_cookie_params($cookieParams["lifetime"],
			$cookieParams["path"],
			$cookieParams["domain"],
			$secure,
			$httponly);
		// Configura el nombre de sesión al configurado arriba.
		session_name($session_name);
		session_start();            // Inicia la sesión PHP.
		session_regenerate_id();    // Regenera la sesión, borra la previa.
	}


	/*
	La función de fuerza bruta.
		Los ataques de fuerza bruta se dan cuando un hacker intenta acceder a una cuenta con 1000 contraseñas diferentes,
		ya sean generadas al azar o de un diccionario. En nuestra secuencia de comandos, si la cuenta de un usuario no
		inicia la sesión después de más de 5 intentos, su cuenta se bloqueará.
	*/
	function checkbrute($user_id, $mysqli) {
		// Obtiene el timestamp del tiempo actual.
		$now = time();

		// Todos los intentos de inicio de sesión se cuentan desde las 2 horas anteriores.
		$valid_attempts = $now - (2 * 60 * 60);

		if ($stmt = $mysqli->prepare("SELECT time
								 FROM login_attempts
								 WHERE user_id = ?
								AND time > '$valid_attempts'")) {
			$stmt->bind_param('i', $user_id);

			// Ejecuta la consulta preparada.
			$stmt->execute();
			$stmt->store_result();

			// Si ha habido más de 5 intentos de inicio de sesión fallidos.
			if ($stmt->num_rows > 5) {
				return true;
			} else {
				return false;
			}
		}
	}


	/*
	Revisa el estado de la sesión iniciada.
	Lo haremos mediante la comprobación de “user_id” y las variables de sesión “login_string”.
	La variable SESSION “login_string” tiene la información del navegador de los usuarios junto con la contraseña
	unida mediante una función hash. Utilizamos la información del navegador, ya que es muy poco probable que el
	usuario lo vaya a cambiar a la mitad de la sesión. Hacerlo ayudará a prevenir un robo de sesión.
	*/
	function login_check($mysqli) {
		// Revisa si todas las variables de sesión están configuradas.
		if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {

			$user_id = $_SESSION['user_id'];
			$login_string = $_SESSION['login_string'];
			$username = $_SESSION['username'];

			// Obtiene la cadena de agente de usuario del usuario.
			$user_browser = $_SERVER['HTTP_USER_AGENT'];

			if ($stmt = $mysqli->prepare("SELECT password
										  FROM members
										  WHERE id = ? LIMIT 1")) {
				// Une “$user_id” al parámetro.
				$stmt->bind_param('i', $user_id);
				$stmt->execute();   // Ejecuta la consulta preparada.
				$stmt->store_result();

				if ($stmt->num_rows == 1) {
					// Si el usuario existe, obtiene las variables del resultado.
					$stmt->bind_result($password);
					$stmt->fetch();
					$login_check = hash('sha512', $password . $user_browser);

					if ($login_check == $login_string) {
						// ¡¡Conectado!!
						return true;
					} else {
						// No conectado.
						return false;
					}
				} else {
					// No conectado.
					return false;
				}
			} else {
				// No conectado.
				return false;
			}
		} else {
			// No conectado.
			return false;
		}
	}

	/*
	Esta función sanea la salida de la variable del servidor PHP_SELF. Es una modificación de una función del
	mismo nombre usada por el sistema de gestión de contenido WordPress:
	*/
	function esc_url($url) {

		if ('' == $url) {
			return $url;
		}

		$url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

		$strip = array('%0d', '%0a', '%0D', '%0A');
		$url = (string) $url;

		$count = 1;
		while ($count) {
			$url = str_replace($strip, '', $url, $count);
		}

		$url = str_replace(';//', '://', $url);

		$url = htmlentities($url);

		$url = str_replace('&amp;', '&#038;', $url);
		$url = str_replace("'", '&#039;', $url);

		if ($url[0] !== '/') {
			// Solo nos interesan los enlaces relativos de  $_SERVER['PHP_SELF']
			return '';
		} else {
			return $url;
		}
	}

	/*
	El problema de usar una variable de servidor no filtrada es que podría usarse en un ataque de secuencias de comandos en sitios cruzados.
	Según la mayoría de referencias, solo tendrás que filtrarla con “htmlentities()”, sin embargo, sigue siendo insuficiente, por eso
	existen excesivas medidas de seguridad para esta función.
	Otros sugieren dejar en blanco el atributo de acción del formulario o configurarlo a una cadena vacía. Pero hacerlo así podría dar
	lugar a un ataque de secuestro de clic iframe.
	*/

	function nivel($email, $mysqli){
		$stmt = $mysqli->prepare("SELECT id, nivel FROM members WHERE email = ? LIMIT 1");
		$stmt->bind_param('s', $email);  // Une “$email” al parámetro.
		$stmt->execute();    // Ejecuta la consulta preparada.
		$stmt->store_result();

		// Obtiene las variables del resultado.
		$stmt->bind_result($user_id, $nivel);
		$stmt->fetch();

		return $nivel;
	}

	//meto sucesos en array ultimos 5
	function top_sucesos() {
		include_once 'connections/guayana_s.php';
		$conexion=new Conexion();
		$db=$conexion->getDbConn();
		$db->debug = false;
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$query_sucesos = $db->Prepare("SELECT suceso_id, fecha_suceso As fecha_suceso, delito_id, delito_detalle_id,
			titulo, nombre_victima, fuente
			FROM sucesos As s
			ORDER BY fecha_suceso DESC
			LIMIT 10");
		$rs_sucesos = $db->Execute($query_sucesos);
		$i = 0;
		foreach ($rs_sucesos as $suceso) {
			$sucesos[$i]['suceso_id'] = $suceso['suceso_id'];
			$sucesos[$i]['titulo'] = $suceso['titulo'];
			$sucesos[$i]['fecha_suceso'] = $suceso['fecha_suceso'];
			$sucesos[$i]['fuente'] = $suceso['fuente'];
			$i++;
		}
		return $sucesos;
	}

	//meto sucesos en array ultimos 5
	function tot_homi_caroni_mes() {
		include_once 'connections/guayana_s.php';
		$conexion=new Conexion();
		$db=$conexion->getDbConn();
		$db->debug = false;
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$muni_id = 3;
		$delito_deta = 7;
		$query_sucesos = $db->Prepare("SELECT COUNT(fecha_suceso) AS tot_homi_me, YEAR(now()) AS an, MONTH(now()) AS me
			FROM sucesos AS s
			WHERE YEAR(fecha_suceso) = YEAR(now()) AND MONTH(fecha_suceso) = MONTH(now()) AND municipio_id = $municipio_id AND delito_detalle_id = $delito_deta");
		$rs_sucesos = $db->Execute($query_sucesos);
		$i = 0;
		$sucesos = array();
		foreach ($rs_sucesos as $suceso) {
			$sucesos[$i][1] = $suceso['tot_homi_me'];
			$sucesos[$i][2] = $suceso['an'];
			$sucesos[$i][3] = $suceso['me'];
			$i++;
		}
		//$sucesos[$i]["tot_homi_mes"] = $rs_sucesos->Fields('tot_homi_me');
		//$sucesos[$i]["ano"] = $rs_sucesos->Fields('an');
		//$sucesos[$i]["mes"] = $rs_sucesos->Fields('me');

		return $sucesos;
	}

	
	

	function fecha_actual() {
		$conexion=new Conexion();
		$db=$conexion->getDbConn();
		$db->debug = false;
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$query_fecha_actual = $db->Prepare("SELECT now() AS fecha , Month(now()) AS mes_act, MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) AS mes_ant");
		$rs_fecha_actual = $db->Execute($query_fecha_actual);
		$fecha_actual = $rs_fecha_actual->Fields('fecha');

		return $fecha_actual;
	}

	function mes_act() {
		$conexion=new Conexion();
		$db=$conexion->getDbConn();
		$db->debug = false;
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$query_fecha = $db->Prepare("SELECT MONTH(now()) AS mes");
		$rs_fecha = $db->Execute($query_fecha);
		$mes = $rs_fecha->Fields('mes');

		return $mes;
	}

	function ano_act() {
		$conexion=new Conexion();
		$db=$conexion->getDbConn();
		$db->debug = false;
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$query_fecha = $db->Prepare("SELECT YEAR(now()) AS ano");
		$rs_fecha = $db->Execute($query_fecha);
		$ano = $rs_fecha->Fields('ano');

		return $ano;
	}
	function ano_ant() {
		$conexion=new Conexion();
		$db=$conexion->getDbConn();
		$db->debug = false;
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$query_fecha = $db->Prepare("SELECT YEAR(now())-1 AS ano_ant");
		$rs_fecha = $db->Execute($query_fecha);
		$ano_ant = $rs_fecha->Fields('ano_ant');

		return $ano_ant;
	}

	//meto sucesos en array ultimos 5
	function tot_homi_caroni_mes_ant() {
		//include_once 'connections/guayana_s.php';
		$conexion=new Conexion();
		$db=$conexion->getDbConn();
		$db->debug = false;
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$muni_id = 3;
		$delito_deta = 7;

		$mes = mes_act();

		$query_sucesos = $db->Prepare("SELECT COUNT(fecha_suceso) AS tot_car_homi_mes_ant
			FROM sucesos AS s
			WHERE YEAR(fecha_suceso) = YEAR(now()) AND MONTH(fecha_suceso) = MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))
			AND municipio_id = $muni_id AND delito_detalle_id = 7");

		//solo mes 1
		if ($mes==1){
			$query_sucesos = $db->Prepare("SELECT COUNT(fecha_suceso) AS tot_car_homi_mes_ant
			FROM sucesos AS s
			WHERE YEAR(fecha_suceso) = YEAR(now())-1 AND MONTH(fecha_suceso) = MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))
			AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");

		}
		//San Felix
		$query_homici_mes_ant_sf = $db->Prepare("SELECT count(*) AS acu_mes_ant_sf
			FROM `sucesos` AS s
			INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
			WHERE year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=(Month(now())-1)
			AND s.municipio_id = $muni_id AND delito_detalle_id = $delito_deta AND capital_sector = 'sf'");

		//solo mes 1
		if ($mes==1){
			$query_homici_mes_ant_sf = $db->Prepare("SELECT count(*) AS acu_mes_ant_sf
			FROM `sucesos` AS s
			INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
			WHERE YEAR(fecha_suceso) = YEAR(now())-1 AND MONTH(fecha_suceso) = MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))
			AND s.municipio_id = $muni_id AND delito_detalle_id = $delito_deta AND capital_sector = 'sf'");

		}
		//Puerto Ordaz
		$query_homici_mes_ant_poz = $db->Prepare("SELECT count(*) AS acu_mes_ant_poz
			FROM `sucesos` AS s
			INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
			WHERE year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=(Month(now())-1)
			AND s.municipio_id = $muni_id AND delito_detalle_id = $delito_deta AND capital_sector = 'poz'");

		//solo mes 1
		if ($mes==1){
			$query_homici_mes_ant_poz = $db->Prepare("SELECT count(*) AS acu_mes_ant_poz
			FROM `sucesos` AS s
			INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
			WHERE YEAR(fecha_suceso) = YEAR(now())-1 AND MONTH(fecha_suceso) = MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))
			AND s.municipio_id = $muni_id AND delito_detalle_id = $delito_deta AND capital_sector = 'poz'");

		}

		$rs_sucesos = $db->Execute($query_sucesos);
		//4-1-17,   devuelve varias campos tipo endpoint, en un array, para no tener q llamar varias funciones
		$rs_homici_mes_ant_sf = $db->Execute($query_homici_mes_ant_sf);
		$rs_homici_mes_ant_poz = $db->Execute($query_homici_mes_ant_poz);
		

		$homi_car_mes_ant = $rs_sucesos->Fields('tot_car_homi_mes_ant');
		$homi_car_mes_ant_sf = $rs_homici_mes_ant_sf->Fields('acu_mes_ant_sf');
		$homi_car_mes_ant_poz = $rs_homici_mes_ant_poz->Fields('acu_mes_ant_poz');
		return array($homi_car_mes_ant,$homi_car_mes_ant_sf,$homi_car_mes_ant_poz);
		//return $homi_car_mes_ant;
	}

	function tot_homi_caroni_ano() {
		//include_once 'connections/guayana_s.php';
		$conexion=new Conexion();
		$db=$conexion->getDbConn();
		$db->debug = false;
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$muni_id = 3;
		$delito_deta = 7;
		$query_homi_ano = $db->Prepare("SELECT COUNT(fecha_suceso) AS tot_homi_ano, MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))AS mes_ant
			FROM sucesos AS s
			WHERE YEAR(fecha_suceso) = YEAR(now()) AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
		$rs_homi_ano = $db->Execute($query_homi_ano);
		$tot_homi_ano = $rs_homi_ano->Fields('tot_homi_ano');
		return $tot_homi_ano;
	}


?>
