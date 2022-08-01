<?php
	include_once '../connections/guayana_s.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC);
	
	$ano = 2018;    //   pasar a  año actual 
	$ano_1 = $ano-1; 
	$ano_2 = $ano-2;
	$ano_3 = $ano-3;
	$ano_4 = $ano-4;

	$muni_id = 3;
	$delito_deta = 7;
	$today = date("d-m-Y");

	$mes1 = 1;
	$mes2 = 2;
	$mes3 = 3;
	$mes4 = 4;
	$mes5 = 5;
	$mes6 = 6;
	$mes7 = 7;
	$mes8 = 8;
	$mes9 = 9;
	$mes10 = 10;
	$mes11 = 11;
	$mes12 = 12;
	
		$sql_sucesos = $db->Prepare("SELECT suceso_id, fecha_suceso As fecha_suceso, delito_id, delito_detalle_id,
		titulo,nombre_victima, 	fuente,m.descripcion AS municipio, p.descripcion AS parroquia 
		FROM sucesos As s 
		INNER JOIN municipios AS m ON s.municipio_id = m.municipio_id 
		INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
		WHERE s.municipio_id = $muni_id AND delito_detalle_id = $delito_deta");

	$sql_sucesos_ano_meses = $db->Prepare("SELECT SUM(CASE WHEN (MONTH(fecha_suceso)= '1' ) THEN 1 ELSE 0 END) AS '1',
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
		SUM(CASE WHEN (MONTH(fecha_suceso)= '12' ) THEN 1 ELSE 0 END) AS '12',
		SUM(CASE WHEN (YEAR(fecha_suceso)= $ano ) THEN 1 ELSE 0 END) AS total
		FROM sucesos
		WHERE YEAR(fecha_suceso) = $ano AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	
	$sql_sucesos_ano_meses_1 = $db->Prepare("SELECT SUM(CASE WHEN (MONTH(fecha_suceso)= '1' ) THEN 1 ELSE 0 END) AS '1',
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
		SUM(CASE WHEN (MONTH(fecha_suceso)= '12' ) THEN 1 ELSE 0 END) AS '12',
		SUM(CASE WHEN (YEAR(fecha_suceso)= $ano-1 ) THEN 1 ELSE 0 END) AS total
		FROM sucesos
		WHERE YEAR(fecha_suceso) = $ano_1 AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	
	$sql_sucesos_ano_meses_2 = $db->Prepare("SELECT SUM(CASE WHEN (MONTH(fecha_suceso)= '1' ) THEN 1 ELSE 0 END) AS '1',
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
		SUM(CASE WHEN (MONTH(fecha_suceso)= '12' ) THEN 1 ELSE 0 END) AS '12',
		SUM(CASE WHEN (YEAR(fecha_suceso)= $ano-2 ) THEN 1 ELSE 0 END) AS total
		FROM sucesos
		WHERE YEAR(fecha_suceso) = $ano_2 AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	
	$sql_sucesos_ano_meses_3 = $db->Prepare("SELECT SUM(CASE WHEN (MONTH(fecha_suceso)= '1' ) THEN 1 ELSE 0 END) AS '1',
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
		SUM(CASE WHEN (MONTH(fecha_suceso)= '12' ) THEN 1 ELSE 0 END) AS '12',
		SUM(CASE WHEN (YEAR(fecha_suceso)= $ano-3 ) THEN 1 ELSE 0 END) AS total
		FROM sucesos
		WHERE YEAR(fecha_suceso) = $ano_3 AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	$db->SetFetchMode(ADODB_FETCH_ASSOC);

	$sql_sucesos_ano_meses_4 = $db->Prepare("SELECT SUM(CASE WHEN (MONTH(fecha_suceso)= '1' ) THEN 1 ELSE 0 END) AS '1',
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
		SUM(CASE WHEN (MONTH(fecha_suceso)= '12' ) THEN 1 ELSE 0 END) AS '12',
		SUM(CASE WHEN (YEAR(fecha_suceso)= $ano-3 ) THEN 1 ELSE 0 END) AS total
		FROM sucesos
		WHERE YEAR(fecha_suceso) = $ano_4 AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	$db->SetFetchMode(ADODB_FETCH_ASSOC);
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Historico de Homicidios Municipio Caroni Estado Bolivar </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.css">
</head>

<body>
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">Historico de Homicidios Municipio Caroni Estado Bolivar Venezuela, al : <?php echo $today?></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-responsive table-bordered" id="datat">
							<thead>
								<tr>
									<th>Año</th>
									<th>Total</th>
									<th>Ene</th>
									<th>Feb</th>
									<th>Mar</th>
									<th>Abr</th>
									<th>May</th>
									<th>Jun</th>
									<th>Jul</th>
									<th>Ago</th>
									<th>Sep</th>
									<th>Oct</th>
									<th>Nov</th>
									<th>Dic</th>
								</tr>
							</thead>
							<tbody>
								
								<?php 
									$rs_sucesos_a_m = $db->Execute($sql_sucesos_ano_meses);
									while(!$rs_sucesos_a_m->EOF){
										echo '<tr>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_caro.php?ano='.$ano.'" class="btn btn-primary btn-sm">'.$ano.'</a></td>';
											echo '<td>'. $rs_sucesos_a_m->Fields('total') . '</td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes1.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('1').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes2.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('2').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes3.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('3').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes4.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('4').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes5.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('5').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes6.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('6').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes7.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('7').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes8.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('8').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes9.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('9').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes10.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('10').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes11.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('11').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes12.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('12').'</a></td>';
										echo '</tr>';
										$rs_sucesos_a_m->MoveNext();
									}
									$rs_sucesos_a_m->MoveFirst()
								?>
							
								<?php 
									$rs_sucesos_a_m = $db->Execute($sql_sucesos_ano_meses_1);
									while(!$rs_sucesos_a_m->EOF){
										echo '<tr>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano.php?ano='.$ano_1.'" class="btn btn-primary btn-sm">'.$ano_1.'</a></td>';
											echo '<td>'. $rs_sucesos_a_m->Fields('total') . '</td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_1.'&mes='.$mes1.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('1').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_1.'&mes='.$mes2.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('2').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_1.'&mes='.$mes3.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('3').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_1.'&mes='.$mes4.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('4').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_1.'&mes='.$mes5.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('5').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_1.'&mes='.$mes6.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('6').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_1.'&mes='.$mes7.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('7').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_1.'&mes='.$mes8.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('8').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_1.'&mes='.$mes9.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('9').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_1.'&mes='.$mes10.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('10').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_1.'&mes='.$mes11.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('11').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_1.'&mes='.$mes12.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('12').'</a></td>';
										echo '</tr>';
										$rs_sucesos_a_m->MoveNext();
									}
									$rs_sucesos_a_m->MoveFirst()
								?>
							
								<?php 
									$rs_sucesos_a_m = $db->Execute($sql_sucesos_ano_meses_2);
									while(!$rs_sucesos_a_m->EOF){
										echo '<tr>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano.php?ano='.$ano_2.'" class="btn btn-primary btn-sm">'.$ano_2.'</a></td>';
											echo '<td>'. $rs_sucesos_a_m->Fields('total') . '</td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_2.'&mes='.$mes1.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('1').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_2.'&mes='.$mes2.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('2').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_2.'&mes='.$mes3.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('3').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_2.'&mes='.$mes4.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('4').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_2.'&mes='.$mes5.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('5').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_2.'&mes='.$mes6.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('6').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_2.'&mes='.$mes7.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('7').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_2.'&mes='.$mes8.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('8').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_2.'&mes='.$mes9.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('9').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_2.'&mes='.$mes10.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('10').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_2.'&mes='.$mes11.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('11').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_2.'&mes='.$mes12.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('12').'</a></td>';
										echo '</tr>';
										$rs_sucesos_a_m->MoveNext();
									}
									$rs_sucesos_a_m->MoveFirst()
								?>
								
								<?php 
									$rs_sucesos_a_m = $db->Execute($sql_sucesos_ano_meses_3);
									while(!$rs_sucesos_a_m->EOF){
										echo '<tr>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano.php?ano='.$ano_3.'" class="btn btn-primary btn-sm">'.$ano_3.'</a></td>';
											echo '<td>'. $rs_sucesos_a_m->Fields('total') . '</td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_3.'&mes='.$mes1.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('1').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_3.'&mes='.$mes2.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('2').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_3.'&mes='.$mes3.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('3').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_3.'&mes='.$mes4.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('4').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_3.'&mes='.$mes5.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('5').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_3.'&mes='.$mes6.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('6').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_3.'&mes='.$mes7.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('7').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_3.'&mes='.$mes8.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('8').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_3.'&mes='.$mes9.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('9').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_3.'&mes='.$mes10.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('10').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_3.'&mes='.$mes11.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('11').'</a></td>';
											echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$ano_3.'&mes='.$mes12.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('12').'</a></td>';
										echo '</tr>';
										$rs_sucesos_a_m->MoveNext();
									}
									$rs_sucesos_a_m->MoveFirst()
								?>

							</tbody>
						</table>
					</div>		
				</div> <!-- /container -->
			</div>
		</div> <!-- /container -->
  
	   
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-ui.js"></script>

	<script>
		$(".ampliar").click(function(e){
			//quita la ejecucion regular
			e.preventDefault();
			//traigo el modal
			$.ajax({
				method: "GET",
				url: $(this).attr('href'),		 
			}).done(function(data) {
				//asigno todo el callback en el div "ajaxcont"
				$('.ajaxcont').html(data);
				
			});
		});
	</script>


</body>
</html>
