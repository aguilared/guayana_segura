<?php
	include_once '../connections/guayana_s.php';
	$conexion=new Conexion();
		$db=$conexion->getDbConn();
		$db->debug = false;
		$db->SetFetchMode(ADODB_FETCH_ASSOC); 
	
	//$parroquia_id = $_POST['parroquia_id'];
	$parroquia_id = $_GET['parroquia_id'];
	//$parroquia_id = "751";
	$query_parroquia = $db->Prepare("SELECT parroquia_id, municipio_id, descripcion,
		latitud, longitud
		FROM parroquias
		WHERE parroquia_id = '$parroquia_id'");
	
	$rs_parroquia  = $db->Execute($query_parroquia);
	$parroquia = $rs_parroquia->Fields('descripcion');
	$latitud_parro = $rs_parroquia->Fields('latitud');
	$longitud_parro = $rs_parroquia->Fields('longitud');
	
	$latitud = $latitud_parro;
	$longitud = $longitud_parro;
	$json = array(array('field' => 'latitud', 
                    'value' => $latitud), 
              array('field' => 'longitud', 
                    'value' => $longitud));
	
	echo json_encode($json );

?>