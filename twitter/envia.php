<?php
include_once '../connections/guayana_s.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC);
	$suceso_id = $_GET['suceso_id'];
	//$suceso_id = 583;
	//$suceso_id = 3;
	$query_sucesos = $db->Prepare("SELECT suceso_id, fecha_suceso, d.descripcion AS tipo_delito, dd.descripcion AS detalle_delito, titulo, fuente,
		otra_fuente1, otra_fuente2, nombre_victima, sexo, edad, tipo_arma, s.municipio_id AS municipio_id,
		m.descripcion AS municipio, s.parroquia_id, sector, usuario, s.latitud as latitud, s.longitud AS longitud
		FROM sucesos AS s
		INNER JOIN delitos AS d ON s.delito_id =  d.delito_id
		INNER JOIN delitos_detalles AS dd ON s.delito_detalle_id = dd.delito_detalle_id
		INNER JOIN municipios AS m ON s.municipio_id = m.municipio_id
		WHERE suceso_id = $suceso_id");
	$rs_sucesos = $db->Execute($query_sucesos);

	$suceso_id = $rs_sucesos->Fields('suceso_id');
	$fecha_suceso = normaliza($rs_sucesos->Fields('fecha_suceso'));
	$detalle_delito = $rs_sucesos->Fields('detalle_delito');
	$titulo = $rs_sucesos->Fields('titulo');

	//$link1 = "http://bit.ly/1VVYMo1"; //venezuela-segura.com 
	//$link = "bit.ly/1Q2QJgP";  45.55.226.230/venezuelasegura_front
	//$link = "http://bit.ly/1Sx70gy";  //45.55.226.230/       
	$link = "http://bit.ly/2rWTW10";  //http://venezuelasegura.byethost16.com/venezuelasegura/           
	
	$mensaje = $titulo." ".$link;
	$respuesta = sendTweet($mensaje);
	$json = json_decode($respuesta);

	function sendTweet($mensaje){
	        ini_set('display_errors', 1);
	        require_once('TwitterAPIExchange.php');
	        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
	        $settings = array(
	            'oauth_access_token' => "702600893397639170-SgOPYEqWbZPL6t0IWXGwcmzj16L3C36",
	            'oauth_access_token_secret' => "t7AwSt0N0u0TWyeBe5kiczdNVfRP65UWBCYkzFRwc4huK",
	            'consumer_key' => "G72qavUGJ943aqdF7KDD4pS0w",
	            'consumer_secret' => "2m5EG9FtDnOWeE94FHd8xWvZClFs6RkK84NyGc2POcQL2JKkPJ"
	        );

	        $url = 'https://api.twitter.com/1.1/statuses/update.json';
	        $requestMethod = 'POST';
	        /** POST fields required by the URL above. See relevant docs as above **/
	        $postfields = array( 'status' => $mensaje, );
	        /** Perform a POST request and echo the response **/
	        $twitter = new TwitterAPIExchange($settings);
	        return $twitter->buildOauth($url, $requestMethod)->setPostfields($postfields)->performRequest();
	}


	//echo '<meta charset="utf-8">';
	//echo "Tweet Enviado por: ".$json->user->name." (@".$json->user->screen_name.")";
	//echo "<br>";
	//echo "Tweet: ".$json->text;
	//echo "<br>";
	//echo "Tweet ID: ".$json->id_str;
	//echo "<br>";
	//echo "Fecha Envio: ".$json->created_at;
	//echo "<br>";
	//echo "Titulo: ".$titulo;
	//echo "<br>";
	//echo "Suceso_id: ".$suceso_id;

?>
