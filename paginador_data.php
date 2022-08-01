<?php

	include_once 'connections/guayana_s.php';
	$mysqli= new mysqli("localhost","root","","venezuela_segura");
	$mysqli->query("SET NAMES 'utf8'");

	if($mysqli ->connect_errno) {
		echo "Fallo al conectar".$mysqli->connect_errno;
	} else	{

		//$mysqli->set_charset("latin1");

		$jsondata = array();
		$jsondataList = array();

		if($_GET['param1']=="cuantos")
		{

			$myquery = "SELECT COUNT(*) total FROM sucesos";

			$resultado = $mysqli->query($myquery);

			$fila = $resultado ->fetch_assoc();

			$jsondata['total'] = $fila['total'];
		}
		elseif($_GET["param1"]=="dame")
		{
			$myquery = "SELECT * FROM sucesos ORDER BY fecha_suceso DESC LIMIT ".$mysqli->real_escape_string($_GET['limit'])." OFFSET ".$mysqli->real_escape_string($_GET["offset"]);

			$resultado = $mysqli->query($myquery);
			while($fila = $resultado ->fetch_assoc())
			{
				$jsondataperson = array();
				$jsondataperson["suceso_id"] = $fila["suceso_id"];
				$jsondataperson["fecha_suceso"] = normaliza($fila["fecha_suceso"]);
				$jsondataperson["titulo"] = $fila["titulo"];
				$jsondataperson["fuente"] = $fila["fuente"];
				$jsondataperson["nombre_victima"] = $fila["nombre_victima"];

				$jsondataList[]=$jsondataperson;

			}

			$jsondata["lista"] = array_values($jsondataList);
		}

		header("Content-type:application/json; charset = utf-8");
		echo json_encode($jsondata);
		exit();
	}

?>
