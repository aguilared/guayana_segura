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

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
//$query = sprintf("SELECT userid, facebook, twitter, googleplus FROM followers");

$query = "SELECT
	$ano AS 'ano',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '1' ) THEN 1 ELSE 0 END) AS '1',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '2' ) THEN 1 ELSE 0 END) AS '2',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '3' ) THEN 1 ELSE 0 END) AS '3',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '4' ) THEN 1 ELSE 0 END) AS '4',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '5' ) THEN 1 ELSE 0 END) AS '5',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '6' ) THEN 1 ELSE 0 END) AS '6',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '7' ) THEN 1 ELSE 0 END) AS '7',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '8' ) THEN 1 ELSE 0 END) AS '8',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '9' ) THEN 1 ELSE 0 END) AS '9',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '10' ) THEN 1 ELSE 0 END) AS '10',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '11' ) THEN 1 ELSE 0 END) AS '11',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '12' ) THEN 1 ELSE 0 END) AS '12'
	FROM sucesos
	WHERE YEAR(fecha_suceso) = $ano  AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta";

$query1 = "SELECT
	$ano_ant AS 'ano',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '1' ) THEN 1 ELSE 0 END) AS '1',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '2' ) THEN 1 ELSE 0 END) AS '2',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '3' ) THEN 1 ELSE 0 END) AS '3',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '4' ) THEN 1 ELSE 0 END) AS '4',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '5' ) THEN 1 ELSE 0 END) AS '5',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '6' ) THEN 1 ELSE 0 END) AS '6',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '7' ) THEN 1 ELSE 0 END) AS '7',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '8' ) THEN 1 ELSE 0 END) AS '8',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '9' ) THEN 1 ELSE 0 END) AS '9',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '10' ) THEN 1 ELSE 0 END) AS '10',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '11' ) THEN 1 ELSE 0 END) AS '11',
	SUM(CASE WHEN (MONTH(fecha_suceso)= '12' ) THEN 1 ELSE 0 END) AS '12'
	FROM sucesos
	WHERE YEAR(fecha_suceso) = $ano_ant  AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta";

echo $query."<BR>";
//execute query
$result = $mysqli->query($query);
$result1 = $mysqli->query($query1);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	
	$data[] = $row;
	
}

//foreach ($result1 as $row) {
	//$data[] = $row;
//}
//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);