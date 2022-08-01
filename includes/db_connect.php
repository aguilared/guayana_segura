<?php

	include_once 'psl-config.php';   // Ya que functions.php no está incluido.
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

	if($mysqli){
        //echo 'La conexion de la base de datos se ha hecho satisfactoriamente  ';
        mysqli_set_charset($mysqli, "utf8_decode"); //formato de datos utf8
        //echo 'conexion a la base de datos';
    }else{
        echo 'Ha sucedido un error inexperado en la conexion de la base de datos';
    }

?>