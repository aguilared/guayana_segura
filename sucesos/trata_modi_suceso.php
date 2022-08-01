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

    //$suceso_id = 1200;
    $suceso_id = $_POST['suceso_id'];
    $fecha_suceso = invertir($_POST['fecha']);
    $hora = $_POST['hora'];
   	$fecha_suceso = $fecha_suceso." ".$hora;
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
    $tipo_arma = $_POST['tipo_arma'];
   	$movil_id = $_POST['movil_id'];;
    $sector = $_POST['sector'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $usuario = $_POST['usuario'];
    $mi_resena = $_POST['resena'];
    $fechaing = date("Y-m-d H:i:s");
    
    $file = fopen("log.txt", "a");
        
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
                $record["hora"] = $hora;
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
                $record["profesion_id"] = $profesion_id;
    			$record["tipo_arma"] = $tipo_arma;
    			$record["movil_id"] = $movil_id;
    			$record["sector"] = $sector;
    			$record["latitud"] = $latitud;
    			$record["longitud"] = $longitud;
    			$record["usuario"] = $usuario;
                $record["mi_resena"] = $mi_resena;

    			# Mandar como parametro el recordset y el arreglo conteniendo los datos a actualizar
    			# a la funcion GetUpdateSQL. Esta procesara los datos y regresara el enunciado sql del
    			# update necesario con clausula WHERE correcta.
    			# Si no se modificaron los datos no regresa nada.
    			$updateSQL = $db->GetUpdateSQL($rs, $record);

    			$rs= $db->Execute($updateSQL); # Actualiza el registro en la base de datos
                $e = $db->errorMsg();
    			if ( !$db->affected_rows() ) {
                    
                    //no modifico
    				fwrite($file, $fechaing. $e ." !!NO MODIFICADO SUCESO:!! " . $suceso_id ." " . $titulo . "\r\n" . PHP_EOL);
                    fclose($out);
    				$db->Close();
    			} else {
                   
                    fwrite($file, $fechaing. ", " . $fecha_suceso. "". $e ." !!MODIFICADO SUCESO:!! " . $suceso_id ." " . $titulo . "\r\n" . PHP_EOL);
                    fclose($out);
    				$db->Close();
    				//refresca la pagina
    				echo '<ul class="pager">';

    				echo '<li class="previous"><a href="index.php">&larr; Se ha modificado el Suceso Id= '.$suceso_id.'</a></li></ul>';

    			}
    }

?>
