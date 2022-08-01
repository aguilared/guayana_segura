

<?php
	include_once '../connections/guayana_s.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC);
	$muni_id = 3;
	$delito_deta = 7;
   $skip = $_GET['skip'];
   $top = $_GET['top'];

	$query_sucesos = $db->Prepare("SELECT suceso_id, fecha_suceso As fecha_suceso, delito_id, delito_detalle_id, titulo, nombre_victima, fuente,
		m.descripcion AS municipio, p.descripcion AS parroquia
		FROM sucesos As s
		INNER JOIN municipios AS m ON s.municipio_id = m.municipio_id
		INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
      ORDER BY fecha_suceso DESC
      LIMIT ".$skip.", ".$top
   );
   $rs_sucesos = $db->Execute($query_sucesos);
   echo $rs_sucesos;
   if($rs_sucesos){
		header('Content-type: application/json; charset=utf-8');

		echo json_encode(["success" => true, "data" => $rs_sucesos]);
		//exit();

      // $auxObj = [
      //    "suceso_id" => $rs_sucesos->fields['suceso_id'],
      //    "titulo" => $rs_sucesos->fields['titulo'],
      //    "fecha_suceso" => $rs_sucesos->fields['fecha_suceso'],
      //    "fuente" => $rs_sucesos->fields['fuente'],
		//
      // ];



   // }else{
   //    header('Content-type: application/json; charset=utf-8');
   //    echo json_encode(["success" => false, "error" => true]);
   //    exit();
   // 
   }

?>
