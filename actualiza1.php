<?php
  
  //invertir fecha para BD sql 02-02-2015
	function invertir($fecha){
		return substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2);
	}
	//normaliza fecha para vizualizar 2015-06-02 00:00:00
	function normaliza($fecha){
		return substr($fecha, 0, 10);
	}

  $mysqli= new mysqli("localhost","root","","venezuela_segura");
	$mysqli->query("SET NAMES 'utf8'");

	if($mysqli ->connect_errno) {
		echo "Fallo al conectar".$mysqli->connect_errno;
	} else	{
    $myquery = "SELECT * FROM sucesos ORDER BY suceso_id ASC";

    $cuenta = 0;
    $resultado = $mysqli->query($myquery);
    while($fila = $resultado ->fetch_assoc())
    {
      $suceso_id = $fila["suceso_id"];
      $fechan = $fila["fecha_suceso1"];

      $cuenta = "UPDATE sucesos SET sucesos.fecha_suceso = '$fechan' WHERE sucesos.suceso_id = $suceso_id";
      echo $cuenta."<BR>";
      $mysqli->query("UPDATE sucesos SET sucesos.fecha_suceso = '$fechan' WHERE sucesos.suceso_id = $suceso_id");
      printf("Affected rows (UPDATE): %d\n", $mysqli->affected_rows);
      
      $cuenta= $cuenta+1;

    }
    echo $cuenta;
  }
  exit();
?>