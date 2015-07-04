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
$suceso_id = $_POST['suceso_id'];
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
$tipo_arma = $_POST['tipo_arma'];
$sector = $_POST['sector'];
$usuario = $_POST['usuario'];


$cerror = 0;
if ($cerror > 0) {
	sale($errores);
} else {
									
			// Codigo para UPDATE
			
			$sql = "SELECT * FROM sucesos as s
						WHERE suceso_id = $suceso_id"; 
			# Selecciona el registro a actualizar
			$rs = $db->Execute($sql); # Executa la busqueda y obtiene el registro a actualizar.
			
			$record = array(); # Inicializa el arreglo que contiene los datos a modificar
			
			# Asignar el valor de los campos en el registro
						
			$record["fecha_suceso"] = $fecha_suceso; 
			$record["delito_id "] = $delito_id ;
			$record["delito_detalle_id"] = $delito_detalle_id;
			$record["titulo"] = $titulo;
			$record["fuente"] = $fuente;
			$record["otra_fuente1"] = $otra_fuente1;
			$record["otra_fuente2"] = $otra_fuente2;
			$record["municipio_id"] = $municipio_id;
			$record["parroquia_id"] = $parroquia_id;
			$record["nombre_victima"] = $nombre_victima;
			$record["sexo"] = $sexo;
			$record["edad"] = $edad;
			$record["tipo_arma"] = $tipo_arma;
			$record["sector"] = $sector;
			$record["usuario"] = $usuario;
			
						
			# Mandar como parametro el recordset y el arreglo conteniendo los datos a actualizar
			# a la funcion GetUpdateSQL. Esta procesara los datos y regresara el enunciado sql del
			# update necesario con clausula WHERE correcta.
			# Si no se modificaron los datos no regresa nada.
			$updateSQL = $db->GetUpdateSQL($rs, $record);
			
			$rs= $db->Execute($updateSQL); # Actualiza el registro en la base de datos
			
			if (!$rs){
				//echo "<td colspan ='2' class='blue'>Errores al Guardar:<input type='hidden' name='cod_reporte_d' value='0'/></td>";
				//print $db->ErrorMsg();
				echo "<td colspan ='2' class='blue'>Errores al Modificar:<input type='hidden' name='cod_reporte_d' id='cod_reporte_d' value='0'/></td>";
				$db->Close();
			} else {
				$db->Close();
				//refresca la pagina
				echo '<ul class="pager">';
				
				echo '<li class="previous"><a href="index.php">&larr; Se ha modificado el Suceso Id= '.$suceso_id.'</a></li></ul>'; 
				
			}
}



?>

<body >
</body>
</html>
	