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
	//$suceso_id = 1200;
	$ano = $_POST['ano'];
	$usuario = $_POST['usuario'];
	$delito_id = $_POST['delito_id'];  
	$delito_detalle_id = $_POST['delito_detalle_id'];
	$total = $_POST['total'];
	$resueltos = $_POST['resueltos'];
	$impunidad = $_POST['impunidad'];
	$hombres = $_POST['hombres'];
	$menores = $_POST['menores'];
	$mujeres = $_POST['mujeres'];
	$arma_d_fuego = $_POST['arma_d_fuego'];
	$arma_blanca = $_POST['arma_blanca'];
	$arma_contusa = $_POST['arma_contusa'];
	$fuente = $_POST['fuente'];
	$otra_fuente1 = $_POST['otra_fuente1'];
	$otra_fuente2 = $_POST['otra_fuente2'];

	$enero = $_POST['enero'];
	$febrero = $_POST['febrero'];
	$marzo = $_POST['marzo'];
	$abril = $_POST['abril'];
	$mayo = $_POST['mayo'];
	$junio = $_POST['junio'];
	$julio = $_POST['julio'];
	$agosto = $_POST['agosto'];
	$septiembre = $_POST['septiembre'];
	$octubre = $_POST['octubre'];
	$noviembre = $_POST['noviembre'];
	$diciembre = $_POST['diciembre'];
	$fechaing = date("Y-m-d H:i:s");

	$max_suceso_id = 0;
	$stmt = $db->Prepare("INSERT histo_homicidios (ano, usuario, delito_id, delito_detalle_id, total, total_resueltos, 
		impunidad, hombres, menores, mujeres, arma_d_fuego, arma_blanca, arma_contusa, fuente, otra_fuente1, otra_fuente2,	enero, 
		febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, fecha_ingreso_data) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$args = array($ano, $usuario, $delito_id, $delito_detalle_id, $total, $resueltos, 
		$impunidad, $hombres, $menores, $mujeres, $arma_d_fuego, $arma_blanca, $arma_contusa, $fuente, $otra_fuente1, $otra_fuente2, $enero, 
		$febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $septiembre, $octubre, $noviembre, $diciembre, $fechaing);
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