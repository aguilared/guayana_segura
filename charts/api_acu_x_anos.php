<?php
	//setting header to json
	header('Content-Type: application/json');
	//database
  define('DB_HOST', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'venezuela_segura');

	$muni_id = 3;
	$descri_municipio = "Caroni";
	$delito_deta = 7;

	$ano1 = 0;
	$ano2 = 0;
	$ano3 = 0;
	$ano4 = 0;
	$ano5 = 0;
	$ano6 = 0;
	$acu_ano1 = 0;
	$acu_ano2 = 0;
	$acu_ano3 = 0;
	$acu_ano4 = 0;
	$acu_ano5 = 0;
	$acu_ano6 = 0;

	function nombremes($mes){
	$meses = array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic');
	return $meses[$mes-1];
	}

	//get connection
	$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if(!$mysqli){
		die("Connection failed: " . $mysqli->error);
	}

	//query to get data from the table
	//$query = sprintf("SELECT userid, facebook, twitter, googleplus FROM followers");

	$query1 = sprintf("SELECT 2021 AS 'ano', MONTH(fecha_suceso) AS mes, COUNT(fecha_suceso) As ano1	
		FROM sucesos 
		WHERE YEAR(fecha_suceso) = 2021  AND municipio_id = 3 AND delito_detalle_id = 7 
		GROUP BY MONTH(fecha_suceso)");

	$query2 = sprintf("SELECT 2020 AS 'ano', MONTH(fecha_suceso) AS mes, COUNT(fecha_suceso) As ano2	
		FROM sucesos 
		WHERE YEAR(fecha_suceso) = 2020  AND municipio_id = 3 AND delito_detalle_id = 7 
		GROUP BY MONTH(fecha_suceso)");

	$query3 = sprintf("SELECT 2019 AS 'ano', MONTH(fecha_suceso) AS mes, COUNT(fecha_suceso) As ano3	
		FROM sucesos 
		WHERE YEAR(fecha_suceso) = 2019  AND municipio_id = 3 AND delito_detalle_id = 7 
		GROUP BY MONTH(fecha_suceso)");

	$query4 = sprintf("SELECT 2018 AS 'ano', MONTH(fecha_suceso) AS mes, COUNT(fecha_suceso) As ano4 
		FROM sucesos 
		WHERE YEAR(fecha_suceso) = 2018  AND municipio_id = 3 AND delito_detalle_id = 7	
		GROUP BY MONTH(fecha_suceso)");

	$query5 = sprintf("SELECT 2017 AS 'ano', MONTH(fecha_suceso) AS mes, COUNT(fecha_suceso) As ano5
		FROM sucesos 
		WHERE YEAR(fecha_suceso) = 2017  AND municipio_id = 3 AND delito_detalle_id = 7	
		GROUP BY MONTH(fecha_suceso)");

	$query6 = sprintf("SELECT 2016 AS 'ano', MONTH(fecha_suceso) AS mes, COUNT(fecha_suceso) As ano6
		FROM sucesos 
		WHERE YEAR(fecha_suceso) = 2016  AND municipio_id = 3 AND delito_detalle_id = 7	
		GROUP BY MONTH(fecha_suceso)");
	//borrando datos temporal;
	$query_delete = sprintf("DELETE FROM `sucesos_mes`");
	$resul_delete= $mysqli->query($query_delete);
	
	
	$result2 = $mysqli->query($query2); //20
	$result3 = $mysqli->query($query3); //19
	$result4 = $mysqli->query($query4); //18
	$result5 = $mysqli->query($query5); //17
	$result6 = $mysqli->query($query6); //16

	$result1 = $mysqli->query($query1);
	
	// datos año -1
	foreach($result2 as $row){
		$mes = $row["mes"];
		$mes = nombremes($mes);
		$ano2 = $row["ano2"];
		$acu_ano2 = $acu_ano2+$ano2;
		$query_insert = sprintf("INSERT INTO `sucesos_mes` (`mes`,  `ano2`, `acu_ano2`) VALUES('$mes',$ano2,$acu_ano2)");
		$mysqli->query($query_insert);
	}

	// datos año -2
	foreach($result3 as $row){
		$mes = $row["mes"];
		$mes = nombremes($mes);
		$ano3 = $row["ano3"];
		$acu_ano3 = $acu_ano3+$ano3;
		$query_update = sprintf("UPDATE `sucesos_mes` SET `ano3` = $ano3, `acu_ano3` = $acu_ano3 WHERE `sucesos_mes`.`mes` = '$mes'");
		$mysqli->query($query_update);
	}
	// datos año -3
	foreach($result4 as $row){
		$mes = $row["mes"];
		$mes = nombremes($mes);
		$ano4 = $row["ano4"];
		$acu_ano4 = $acu_ano4+$ano4;
		$query_update = sprintf("UPDATE `sucesos_mes` SET `ano4` = $ano4, `acu_ano4` = $acu_ano4 WHERE `sucesos_mes`.`mes` = '$mes'");
		$mysqli->query($query_update);
	}
	// datos año -4
	foreach($result5 as $row){
		$mes = $row["mes"];
		$mes = nombremes($mes);
		$ano5 = $row["ano5"];
		$acu_ano5 = $acu_ano5+$ano5;
		$query_update = sprintf("UPDATE `sucesos_mes` SET `ano5` = $ano5, `acu_ano5` = $acu_ano5 WHERE `sucesos_mes`.`mes` = '$mes'");
		$mysqli->query($query_update);
	}
	// datos año -5
	foreach($result6 as $row){
		$mes = $row["mes"];
		$mes = nombremes($mes);
		$ano6 = $row["ano6"];
		$acu_ano6 = $acu_ano6+$ano6;
		$query_update = sprintf("UPDATE `sucesos_mes` SET `ano6` = $ano6, `acu_ano6` = $acu_ano6 WHERE `sucesos_mes`.`mes` = '$mes'");
		$mysqli->query($query_update);
	}
	
	// datos año actual
	foreach($result1 as $row){
		$mes = $row["mes"];
		$mes = nombremes($mes);
		$ano1 = $row["ano1"];
		$acu_ano1 = $acu_ano1+$ano1;
		$query_update = sprintf("UPDATE `sucesos_mes` SET `ano1` = $ano1, `acu_ano1` = $acu_ano1 WHERE `sucesos_mes`.`mes` = '$mes'");
		$mysqli->query($query_update);
	}

	$query_resumen = sprintf("SELECT * FROM sucesos_mes");
	$result_resumen = $mysqli->query($query_resumen);

	$data = array();

	foreach ($result_resumen as $row) {
		$data[] = $row;  //conviertiendo a json ?
	}
	//free memory associated with result
	$result1->close();
	$result2->close();
	$result3->close();
	$result4->close();
	$result5->close();
	$result6->close();

	//close connection
	$mysqli->close();

	//now print the data
	print json_encode($data);

	