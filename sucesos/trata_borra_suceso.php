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

$suceso_id = $_GET['suceso_id'];  

$rs=$db->Execute("DELETE `sucesos`.* FROM sucesos WHERE suceso_id='$suceso_id'");

if (!$db->affected_rows()) { 
	$db->Close();
	//mensaje de error si la modificaci�n fall� o no se modifico nada
	echo ("<script> alert ('No se ha Borrado el Equipo')</script>");
	echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=index.php?cod_area='>";
	//Cierra la ventana actual ella misma se llama y se cierra
	echo ("<script> cerrar_misma() </script>");
} else {
	$db->Close();

	//refresca la pagina
	echo '<ul class="pager">';
	
	echo '<li class="previous"><a href="index.php">&larr; Se ha borrado el Suceso Id: '.$suceso_id.'</a></li></ul>';
}    
?>
