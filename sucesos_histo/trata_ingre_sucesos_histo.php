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
$db->debug = false;

$fecha_suceso = invertir($_POST['fecha']);
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
$tipo_arma = $_POST['tipo_arma'];; 
$sector = $_POST['sector'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$usuario = $_POST['usuario'];
$estado = 7;


$fechaing = date("Y-m-d H:i:s");

$max_suceso_id = 0;
$stmt = $db->Prepare("INSERT sucesos (fecha_suceso, delito_id, delito_detalle_id, titulo, fuente, otra_fuente1, otra_fuente2, nombre_victima, sexo, edad, tipo_arma, estado, municipio_id, parroquia_id, latitud,
	longitud, sector, usuario, fecha_creado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$args = array($fecha_suceso, $delito_id, $delito_detalle_id, $titulo, $fuente, $otra_fuente1, $otra_fuente2, $nombre_victima, $sexo, $edad, $tipo_arma, $estado, $municipio_id, $parroquia_id, $latitud, $longitud, $sector, $usuario, $fechaing);
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
	
		$max_suceso_id = $rs->fields['max_suceso_id'];
		//$_SESSION['cod_reporte'] = $cod_reporte;
		
		//refresca la pagina
		echo '<ul class="pager">';
		
		echo '<li class="previous"><a href="index.php">&larr; Se ha ingresado un nuevo Suceso Id= '.$suceso_id.'</a></li></ul>'; 
		$db->Close();
	}


?>