<?php
	$server = "localhost";
    $user = "dev.arqui";
    $pass = "dev.dev123456789";
    $bd = "venezuela_segura";
 
    $conexion = mysqli_connect($server, $user, $pass,$bd);
 
    if($conexion){
        //echo 'La conexion de la base de datos se ha hecho satisfactoriamente  ';
    }else{
        //echo 'Ha sucedido un error inexperado en la conexion de la base de datos';
    }
	
	$muni_id = 3;
	$delito_deta = 7;
    $skip = $_GET['skip'];
    $top = $_GET['top'];

	$sql = "SELECT suceso_id, fecha_suceso As fecha_suceso, delito_id, delito_detalle_id, titulo, nombre_victima, fuente,
		m.descripcion AS municipio, p.descripcion AS parroquia
		FROM sucesos As s
		INNER JOIN municipios AS m ON s.municipio_id = m.municipio_id
		INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
      ORDER BY fecha_suceso DESC
      LIMIT ".$skip.", ".$top;
	//echo $sql."<BR>";
	
	mysqli_set_charset($conexion, "utf8_decode"); //formato de datos utf8
 
    if(!$result = mysqli_query($conexion, $sql)) die(); //si la conexión cancelar programa
 
    $rawdata = array(); //creamos un array
 
    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;
 
    while($row = mysqli_fetch_array($result))
    {
        $rawdata[$i] = $row;
        $i++;
    }
	header('Content-type: application/json; charset=utf-8');
 
    
	echo json_encode(["success" => true, "data" => $rawdata]);
	exit();

?>