<?php
//setting header to json
header('Content-Type: application/json');
//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'venezuela_segura');

$mes = 7;
$ano = 2017;
$ano_ant = 2016;
$muni_id = 3;
$descri_municipio = "Caroni";
$delito_deta = 7;

$ano1 = 0;
$ano2 = 0;
$acu_ano1 = 0;
$acu_ano2 = 0;

function nombremes($mes){
$meses = array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sept', 'Oct', 'Nov', 'Dic');
return $meses[$mes-1];
}

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
//$query = sprintf("SELECT userid, facebook, twitter, googleplus FROM followers");

$query = sprintf("SELECT 2017 AS 'ano', MONTH(fecha_suceso) AS mes, COUNT(fecha_suceso) As ano1
	FROM sucesos
	WHERE YEAR(fecha_suceso) = 2017  AND municipio_id = 3 AND delito_detalle_id = 7
	GROUP BY MONTH(fecha_suceso)");

$query1 = sprintf("SELECT 2016 AS 'ano', MONTH(fecha_suceso) AS mes, COUNT(fecha_suceso) As ano2
	FROM sucesos
	WHERE YEAR(fecha_suceso) = 2016  AND municipio_id = 3 AND delito_detalle_id = 7
	GROUP BY MONTH(fecha_suceso)");

//borrando datos temporal;
$query_delete = sprintf("DELETE FROM `sucesos_mes`");
$resul_delete= $mysqli->query($query_delete);

$result = $mysqli->query($query);
$result1 = $mysqli->query($query1);

// datos año -1
foreach($result1 as $row){
	$mes = $row["mes"];
	$mes = nombremes($mes);

	$ano2 = $row["ano2"];
	$acu_ano2 = $acu_ano2+$ano2;
	$query_insert = sprintf("INSERT INTO `sucesos_mes` (`mes`, `ano1`, `ano2`, `acu_ano2`) VALUES
('$mes','',$ano2,$acu_ano2)");
	//echo $query_insert."<BR>";
	$mysqli->query($query_insert);
}
// datos año actual
foreach($result as $row){
	$mes = $row["mes"];
	$mes = nombremes($mes);
	$ano1 = $row["ano1"];
	$acu_ano1 = $acu_ano1+$ano1;
	$query_update = sprintf("UPDATE `sucesos_mes` SET `ano1` = $ano1, `acu_ano1` = $acu_ano1 WHERE `sucesos_mes`.`mes` = '$mes'");
	//echo $query_insert."<BR>";
	$mysqli->query($query_update);
}

$query_resumen = sprintf("SELECT * FROM sucesos_mes");
$result_resumen = $mysqli->query($query_resumen);

$data = array();  //declarando Array

foreach ($result_resumen as $row) {
	$data[] = $row;  //conviertiendo a json ?
}
//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);