<?php
	include_once '../connections/guayana_s.php';
	include_once '../includes/functions.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC);

	$muni_id = 3;
	$delito_deta = 7;

	$query_sucesos = $db->Prepare("SELECT COUNT(fecha_suceso) AS tot_homi_mes, curdate() AS fecha
		FROM sucesos AS s
		WHERE YEAR(fecha_suceso) = YEAR(now()) AND MONTH(fecha_suceso) = MONTH(now()) AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	$rs_sucesos = $db->Execute($query_sucesos);
	$tot_homi_mes = $rs_sucesos->Fields('tot_homi_mes');
	$fecha =  normaliza($rs_sucesos->Fields('fecha'));

	$sql_tot_homi_mes_ant = $db->Prepare("SELECT COUNT(fecha_suceso) AS tot_homi_mes_ant
		FROM sucesos AS s
		WHERE YEAR(fecha_suceso) = YEAR(now()) AND MONTH(fecha_suceso) = MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))
		AND municipio_id =$muni_id AND delito_detalle_id = $delito_deta");
	$rs_tot_homi_mes_ant = $db->Execute($sql_tot_homi_mes_ant);
	$tot_homi_mes_ant = $rs_tot_homi_mes_ant->Fields('tot_homi_mes_ant');

	//nuevo el d arriba da error primer mes del año,  con una funacion
	$tot_homi_mes_ant = tot_homi_caroni_mes_ant();

	$query_homi_ano = $db->Prepare("SELECT COUNT(fecha_suceso) AS tot_homi_ano
		FROM sucesos AS s
		WHERE YEAR(fecha_suceso) = YEAR(now()) AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	$rs_homi_ano = $db->Execute($query_homi_ano);
	$tot_homi_ano = $rs_homi_ano->Fields('tot_homi_ano');

	//Este para el año anterior a partir del añó 2017 ya datos en tabla sucesos del 2016
	$query_homi_ano_1 = $db->Prepare("SELECT COUNT(fecha_suceso) AS tot_homi_ano_1
		FROM sucesos AS s
		WHERE YEAR(fecha_suceso) = YEAR(now())-1 AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	$rs_homi_ano_1 = $db->Execute($query_homi_ano_1);
	$tot_homi_ano_1 = $rs_homi_ano_1->Fields('tot_homi_ano_1');

	//San felix
	$query_homici_mes_sf = $db->Prepare("SELECT count(*) AS acu_mes_sf
		FROM `sucesos` AS s
		INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
		AND delito_detalle_id = $delito_deta AND capital_sector = 'sf'");
	//puerto Ordaz
	$query_homici_mes_poz = $db->Prepare("SELECT count(*) AS acu_mes_poz
		FROM `sucesos` AS s
		INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
		AND delito_detalle_id = $delito_deta AND capital_sector = 'poz'");

	$rs_homici_mes_sf = $db->Execute($query_homici_mes_sf);
	$acu_mes_sf = $rs_homici_mes_sf->Fields('acu_mes_sf');

	$rs_homici_mes_poz = $db->Execute($query_homici_mes_poz);
	$acu_mes_poz = $rs_homici_mes_poz->Fields('acu_mes_poz');
	//no usar en el año 2017
	//$query_homici_ano_2015 = $db->Prepare("SELECT total AS acu_ano_2015 FROM histo_homicidios WHERE ano =2015");
	//$rs_homi_ano_1 = $db->Execute($query_homici_ano_2015);
	//$tot_homi_ano_1 = $rs_homi_ano_1->Fields('acu_ano_2015');

	//4-1-17 nuevo el d arriba da error primer mes del año
		//$acu_mes_ant = tot_homi_caroni_mes_ant();
		list($tot_homi_mes_ant,$acu_mes_ant_sf, $acu_mes_ant_poz) = tot_homi_caroni_mes_ant();

	$titulo = "Homicidios Municipio Caroni al ".$fecha. ", Mes Actual = ".$tot_homi_mes. ", San Felix = ". $acu_mes_sf. ", Puerto Ordaz = ". $acu_mes_poz. ", Mes Anterior = ". $tot_homi_mes_ant . ", este ano van: ".$tot_homi_ano . ", total final en todo el ano anterior: ".$tot_homi_ano_1;

	//$link = "bit.ly/1Q2QJgP";  45.55.226.230/venezuelasegura_front
	//$link = "http://bit.ly/1Sx70gy";  //45.55.226.230/       
	//$link = "http://bit.ly/2nxjoEL";  //http://23.96.60.84// Azure      
	//$link1 = "http://bit.ly/1VVYMo1"; //venezuela-segura.com 
	//$link = "http://bit.ly/2rWTW10";  //http://venezuelasegura.byethost16.com/venezuelasegura/           
	//$link = "http://bit.ly/2uDbgtb";  //http://34.229.201.249/               
	$link = "https://bit.ly/2Rf8vaf";  // AWS http://18.216.139.132/vs/           
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
//echo "Fecha: ".$fecha;

?>
