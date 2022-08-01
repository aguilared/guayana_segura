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
	$db->debug = true;

	$fecha_suceso = '2017-03-13';
	$hora = '00:05';
	$delito_id = 1;
	$delito_detalle_id = 7;
	$titulo = 'ss';
	$fuente = 'ss';
	$otra_fuente1 = ' ';
	$otra_fuente2 = ' ';
	$municipio_id = 3;
	$parroquia_id = 731;
	$nombre_victima = 'ss';
	$sexo = 'M';
	$edad = 20;
	$profesion_id = 0;
	$tipo_arma = 1;
	$sector = 'sss';
	$usuario = '';
	$mi_resena = 'eale q mas';
	$latitud = '8.3098';
	$longitud = '-62.71';

	$estado = 7;


	$fechaing = date("Y-m-d H:i:s");

	$max_suceso_id = 0;
	$stmt = $db->Prepare("INSERT sucesos (fecha_suceso, hora, delito_id, delito_detalle_id, titulo, fuente, otra_fuente1, otra_fuente2, nombre_victima, sexo, edad, profesion_id, tipo_arma, estado, municipio_id, parroquia_id, latitud, longitud, sector, usuario, mi_resena, fecha_creado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$args = array($fecha_suceso, $hora, $delito_id, $delito_detalle_id, $titulo, $fuente, $otra_fuente1, $otra_fuente2, $nombre_victima, $sexo, $edad, $profesion_id, $tipo_arma, $estado, $municipio_id, $parroquia_id, $latitud, $longitud, $sector, $usuario, $mi_resena, $fechaing);
		$rs = $db->Execute($stmt, $args);

		if ( !$db->affected_rows() ) {
			$error = 1;
			//No inserto datos
			// deshabilitado mensaje q envia php o mysl para que me aparesca el de arriba linea 45
			echo "<strong>Reporte No</strong>. <input name='cod_reporte' id='cod_reporte' type='text' value='".$error."' size='4' maxlength='4'>";
			//print $db->ErrorMsg();
			$db->Close();

		} else { 
			$error = 0;
			//Inserto sin problemas
			//devuelve el ultimo cod_reporte creado el cual es autoincremt
			//printf("Last inserted record has id %d\n", mysql_insert_id());

			$sqlmax = "SELECT max( suceso_id ) as max_suceso_id
					FROM sucesos";
			$rs = $db->Execute($sqlmax); # Executa la busqueda y obtiene el registro .

			$suceso_id = $rs->fields['max_suceso_id'];
			//$_SESSION['cod_reporte'] = $cod_reporte;

			//refresca la pagina
			echo '<ul class="pager">';

			echo '<li class="previous"><a href="index.php">&larr; Se ha ingresado un nuevo Suceso Id= '.$suceso_id.'</a></li></ul>';
			$db->Close();
		}


?>
