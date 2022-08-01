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
$abril = $_POST['abri'];
$mayo = $_POST['mayo'];
$junio = $_POST['junio'];
$julio = $_POST['julio'];
$agosto = $_POST['agosto'];
$septiembre = $_POST['septiembre'];
$octubre = $_POST['octubre'];
$noviembre = $_POST['noviembre'];
$diciembre = $_POST['diciembre'];

$cerror = 1;
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
			$record["resueltos"] = $resueltos;
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
	