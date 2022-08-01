<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>

<body>
<script src="../js/bootstrap.min.js"></script>
</body>

<?php
	include_once '../connections/guayana_s.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->query("SET NAMES 'utf8'");
	$db->debug = false;

	$fecha_suceso = invertir($_POST['fecha']);
	$hora = $_POST['hora'];
	$fecha_suceso = $fecha_suceso." ".$hora.":00";
	$delito_id = $_POST['delito_id'];
	$delito_detalle_id = $_POST['delito_detalle_id'];
	$titulo = $_POST['titulo'];
	$fuente = $_POST['fuente'];
	$otra_fuente1 = $_POST['otra_fuente1'];
	$otra_fuente2 = $_POST['otra_fuente2'];
	$municipio_id = $_POST['municipio'];
	$parroquia_id = $_POST['parroquia'];
	$nombre_victima = $_POST['nombre_victima'];
	$sexo = $_POST['sexo'];
	$edad = $_POST['edad'];
	$profesion_id = $_POST['profesion'];
	$tipo_arma = $_POST['tipo_arma'];;
	$movil_id = $_POST['movil_id'];;
	$sector = $_POST['sector'];
	$usuario = $_POST['usuario'];
	$mi_resena = $_POST['resena'];
	$latitud = $_POST['latitud'];
	$longitud = $_POST['longitud'];
	$estado = 7;
	$fechaing = date("Y-m-d H:i:s");
     
    $file = fopen('log.txt', 'a');
	$max_suceso_id = 0;
	$stmt = $db->Prepare("INSERT sucesos (fecha_suceso, hora, delito_id, delito_detalle_id, titulo, fuente, otra_fuente1, otra_fuente2, nombre_victima, sexo, edad, profesion_id, tipo_arma, movil_id, estado, municipio_id, parroquia_id, latitud, longitud, sector, usuario, mi_resena, fecha_creado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$args = array($fecha_suceso, $hora, $delito_id, $delito_detalle_id, $titulo, $fuente, $otra_fuente1, $otra_fuente2, $nombre_victima, $sexo, $edad, $profesion_id, $tipo_arma, $movil_id, $estado, $municipio_id, $parroquia_id, $latitud, $longitud, $sector, $usuario, $mi_resena, $fechaing);
		$rs = $db->Execute($stmt, $args);
 		$e = $db->errorMsg();

		if ( !$db->affected_rows() ) {
			fwrite($file, $fecha_suceso . $fechaing . $e ." !! NO INSERTO !! " . $titulo . PHP_EOL);
            fclose($file);
			$db->Close();

		} else { 
			//Inserto sin problemas
			//devuelve el ultimo cod_reporte creado el cual es autoincremt
			//printf("Last inserted record has id %d\n", mysql_insert_id());

			$sqlmax = "SELECT max( suceso_id ) as max_suceso_id
					FROM sucesos";
			$rs = $db->Execute($sqlmax); # Executa la busqueda y obtiene el registro .

			$suceso_id = $rs->fields['max_suceso_id'];
			fwrite($file, $fechaing . ", " . $fecha_suceso. ", " . $suceso_id .", INGRESADO, !! " . $titulo . PHP_EOL);
            fclose($file);
			$db->Close();
			//refresca la pagina
			echo '<ul class="pager">';

			echo '<li class="previous"><a href="index.php">&larr; Se ha ingresado un nuevo Suceso Id= '.$suceso_id.'</a></li></ul>';
		}


?>
