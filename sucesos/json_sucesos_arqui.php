<?php
	include_once '../connections/guayana_s.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC);
	
	// $query_sucesos = $db->Prepare("SELECT suceso_id, fecha_suceso As fecha_suceso, delito_id, delito_detalle_id, titulo, 	 				nombre_victima, fuente, m.descripcion AS municipio, p.descripcion AS parroquia
	//FROM sucesos As s
	//INNER JOIN municipios AS m ON s.municipio_id = m.municipio_id
	//INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id");
	
	$query_sucesos = $db->Prepare("SELECT suceso_id, fecha_suceso, d.descripcion AS tipo_suceso, 
		dd.descripcion AS detalle_delito, trim(titulo) AS titulo, fuente,
		otra_fuente1, otra_fuente2, nombre_victima, sexo, edad, tipo_arma,
		m.descripcion AS municipio, s.parroquia_id, sector, usuario, s.latitud as latitud, s.longitud AS longitud
		FROM sucesos AS s
		INNER JOIN delitos AS d ON s.delito_id =  d.delito_id
		INNER JOIN delitos_detalles AS dd ON s.delito_detalle_id = dd.delito_detalle_id
		INNER JOIN municipios AS m ON s.municipio_id = m.municipio_id
		ORDER BY fecha_suceso DESC");

	$rs_sucesos = $db->Execute($query_sucesos);
	$arr = [];
    $inc = 0;
	while(!$rs_sucesos->EOF){
		$suceso_id = $rs_sucesos->Fields('suceso_id');
		$fecha_suceso = $rs_sucesos->Fields('fecha_suceso');
		$detalle_delito = $rs_sucesos->Fields('detalle_delito');
		$titulo = utf8_encode($rs_sucesos->Fields('titulo'));
		$fuente = utf8_encode($rs_sucesos->Fields('fuente'));
		$latitud = $rs_sucesos->Fields('latitud');
		$longitud = $rs_sucesos->Fields('longitud');
		//echo $titulo ."<BR>";
		$json = array(array('suceso_id' => $suceso_id), 
					array('fecha_suceso' => $fecha_suceso),
					array('detalle_delito' => $detalle_delito),
					array('titulo' => $titulo),
					array('fuente' => $fuente),
					array('latitud' => $latitud),
					array('longitud' => $longitud)
				);
		$arr[$inc] = $json;
		$inc++;
		$rs_sucesos->MoveNext();
    }
	echo json_encode($arr );

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Documento sin t&iacute;tulo</title>
</head>

<body>

</body>
</html>
