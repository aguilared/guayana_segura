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
	$db->debug = true;

	$ano = 2016;
	$usuario = 9504;
	$delito_id = 1;  
	$delito_detalle_id = 1;
	$total = 10;
	$resueltos = 0;
	$impunidad = 10;
	$hombres = 10;
	$menores = 0;
	$mujeres = 0;
	$arma_d_fuego = 10;
	$arma_blanca = 0;
	$arma_contusa = 0;
	$fuente = "";
	$otra_fuente1 = "";
	$otra_fuente2 = "";

	$enero = 10;
	$febrero = 0;
	$marzo = 0;
	$abril = 0;
	$mayo = 0;
	$junio = 0;
	$julio = 0;
	$agosto = 0;
	$septiembre = 0;
	$octubre = 0;
	$noviembre = 0;
	$diciembre = 0;

	$fechaing = date("Y-m-d H:i:s");

	$max_suceso_id = 0;

	$cerror = 0;
	if ($cerror > 0) {
		sale($errores);
	} else {
									
		$sql = "SELECT * FROM histo_homicidios
					WHERE ano = $ano"; 
		# Selecciona el registro a actualizar
		$rs = $db->Execute($sql); # Executa la busqueda y obtiene el registro a actualizar.
		$record = array(); # Inicializa el arreglo que contiene los datos a modificar
		
		# Asignar el valor de los campos en el registro
		$record["ano"] = $ano;
		$record["usuario"] = $usuario;
		$record["delito_id "] = $delito_id ;
		$record["delito_detalle_id"] = $delito_detalle_id;
		$record["total"] = $total;
		$record["total_resueltos"] = $resueltos;
		$record["impunidad"] = $impunidad;
		$record["hombres"] = $hombres;
		$record["menores"] = $menores;
		$record["mujeres"] = $mujeres;
		$record["arma_d_fuego"] = $arma_d_fuego;
		$record["arma_blanca"] = $arma_blanca;
		$record["arma_contusa"] = $arma_contusa;
		
		$record["enero"] = $enero;
		$record["febrero"] = $febrero;
		$record["marzo"] = $marzo;
		$record["abril"] = $abril;
		$record["mayo"] = $mayo;
		$record["junio"] = $junio;
		$record["julio"] = $julio;
		$record["agosto"] = $agosto;
		$record["septiembre"] = $septiembre;
		$record["octubre"] = $octubre;
		$record["noviembre"] = $noviembre;
		$record["diciembre"] = $diciembre;
					
		$record["fuente"] = $fuente;
		$record["otra_fuente1"] = $otra_fuente1;
		$record["otra_fuente2"] = $otra_fuente2;
		
		# Mandar como parametro el recordset y el arreglo conteniendo los datos a actualizar
		# a la funcion GetUpdateSQL. Esta procesara los datos y regresara el enunciado sql del
		# update necesario con clausula WHERE correcta.
		# Si no se modificaron los datos no regresa nada.
		$updateSQL = $db->GetUpdateSQL($rs, $record);
		
		$rs= $db->Execute($updateSQL); # Actualiza el registro en la base de datos
		
		if (!$rs){
			$db->Close();
			echo '<ul class="pager">';
			echo '<li class="previous"><a href="index.php">&larr; Nooooo Se ha modificado un Historico de Homicidios Id= '.$ano.'</a></li></ul>'; 
			
		} else {
			//inserto en tabla historica de modificaciones
			$stmt = $db->Prepare("INSERT histo_homicidios_modifi (ano, usuario, delito_id, delito_detalle_id, total, total_resueltos, 
			impunidad, hombres, menores, mujeres, arma_d_fuego, arma_blanca, arma_contusa, fuente, otra_fuente1, otra_fuente2,	enero, 
			febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, fecha_ingreso_data) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$args = array($ano, $usuario, $delito_id, $delito_detalle_id, $total, $resueltos, 
				$impunidad, $hombres, $menores, $mujeres, $arma_d_fuego, $arma_blanca, $arma_contusa, $fuente, $otra_fuente1, $otra_fuente2, $enero, 
				$febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $septiembre, $octubre, $noviembre, $diciembre, $fechaing);
			$rs = $db->Execute($stmt, $args);
		
			$db->Close();
			//refresca la pagina
			echo '<ul class="pager">';
			
			echo '<li class="previous"><a href="index.php">&larr; Se ha modificado un Historico de Homicidios Id= '.$ano.'</a></li></ul>'; 
			
		}
	}



?>

<body >
</body>
</html>
	