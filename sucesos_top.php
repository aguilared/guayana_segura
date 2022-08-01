<?php

	include_once 'connections/guayana_s.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = true;
	$db->SetFetchMode(ADODB_FETCH_ASSOC);
	
	
	$query_sucesos = $db->Prepare("SELECT suceso_id, fecha_suceso As fecha_suceso, delito_id, delito_detalle_id, 
	titulo, nombre_victima, fuente
	FROM sucesos As s
	ORDER BY fecha_suceso DESC
	LIMIT 3");
	$rs_sucesos = $db->Execute($query_sucesos);
	
	$i = 0;
	foreach ($rs_sucesos as $suceso) {
		$sucesos[$i]['suceso_id'] = $suceso['suceso_id'];
		$sucesos[$i]['titulo'] = $suceso['titulo'];
		$sucesos[$i]['fila'][0] = $i;
		$sucesos[$i]['fila'][1] = $i+1;
		$i++;
	}
	echo json_encode($sucesos)."<br>";
	$suceso1 = $sucesos[0]['suceso_id'];
	$suceso2 = $sucesos[1]['suceso_id'];
	$suceso3 = $sucesos[2]['suceso_id'];
	$titulo1 = $sucesos[0]['titulo'];
	$titulo2 = $sucesos[1]['titulo'];
	$titulo3 = $sucesos[2]['titulo'];
	echo $suceso1 ." ". $titulo1 . " ";
	echo $suceso2 ." ". $titulo2 . " ";
	echo $suceso3 ." ". $titulo3 . " ";


?>