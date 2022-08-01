<?php
	include_once 'connections/guayana_s.php';
	include_once 'includes/functions.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC);

	$fecha = fecha_actual();
	$fecha = normaliza($fecha);

	$mes = mes_act();
	$ano = ano_act();
	$ano_ant = ano_ant();
	$mes_letras = mes__($mes);
	$muni_id = 3;
	$descri_municipio = "Caroni";
	$delito_deta = 7;
		


	//$ano = 2016;    //   pasar a  año actual
	//$muni_id = 3;
	//$delito_deta = 7;
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

	
	$sql_sucesos_ano_meses = $db->Prepare("SELECT 
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
		WHERE YEAR(fecha_suceso) = $ano  AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	$db->SetFetchMode(ADODB_FETCH_ASSOC);

	$sql_sucesos_ano_ant_meses = $db->Prepare("SELECT 
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
		WHERE YEAR(fecha_suceso) = $ano_ant  AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	$db->SetFetchMode(ADODB_FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
</head>

<body>
	
	<div class="panel panel-primary">

		<div class="panel-heading">Municipio <?php echo $descri_municipio?>. Comparacion de Homicidios por A&ntildeos/Meses a esta fecha: <?php echo $fecha;?> </div>
			<div class="panel-body">

				<table class="table table-striped table-bordered" id="">
					<thead>
						<tr>
							<th>Año</th>
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
								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_caro.php?ano='.$ano.'" class="btn btn-primary btn-sm">'.$ano.'</a></td>';
								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes1.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('1').'</a></td>';
								$acu = $rs_sucesos_a_m->Fields('1');
								$acu = $acu+$rs_sucesos_a_m->Fields('2');
								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes2.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('2')."  /".$acu.'</a></td>';
									$acu = $acu+$rs_sucesos_a_m->Fields('3');
								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes3.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('3')."  /".$acu.'</a></td>';
									$acu = $acu+$rs_sucesos_a_m->Fields('4');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes4.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('4')."  /".$acu.'</a></td>';
									$acu = $acu+$rs_sucesos_a_m->Fields('5');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes5.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('5')."  /".$acu.'</a></td>';
									$acu = $acu+$rs_sucesos_a_m->Fields('6');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes6.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('6')."  /".$acu.'</a></td>';
									$acu = $acu+$rs_sucesos_a_m->Fields('7');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes7.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('7')."  /".$acu.'</a></td>';
									$acu = $acu+$rs_sucesos_a_m->Fields('8');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes8.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('8')."  /".$acu.'</a></td>';
									$acu = $acu+$rs_sucesos_a_m->Fields('9');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes9.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('9')."  /".$acu.'</a></td>';
									$acu = $acu+$rs_sucesos_a_m->Fields('10');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes10.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('10')."  /".$acu.'</a></td>';
									$acu = $acu+$rs_sucesos_a_m->Fields('11');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes11.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('11')."  /".$acu.'</a></td>';
									$acu = $acu+$rs_sucesos_a_m->Fields('12');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano.'&mes='.$mes12.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('12')."  /".$acu.'</a></td>';
							echo '</tr>';
							$rs_sucesos_a_m->MoveNext();
						}
						$rs_sucesos_a_m->MoveFirst()
					?>

					</tbody>
					<tbody>
					<?php
						$rs_sucesos_ano_ant_m = $db->Execute($sql_sucesos_ano_ant_meses);
						while(!$rs_sucesos_ano_ant_m->EOF){
							echo '<tr>';
								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_caro.php?ano='.$ano_ant.'" class="btn btn-primary btn-sm">'.$ano_ant.'</a></td>';
								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano_ant.'&mes='.$mes1.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('1').'</a></td>';
								$acu = $rs_sucesos_ano_ant_m->Fields('1');
								$acu = $acu+$rs_sucesos_ano_ant_m->Fields('2');
								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano_ant.'&mes='.$mes2.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('2')."  /".$acu.'</a></td>';
								$acu = $acu+$rs_sucesos_ano_ant_m->Fields('3');
								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano_ant.'&mes='.$mes3.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('3')."  /".$acu.'</a></td>';
								$acu = $acu+$rs_sucesos_ano_ant_m->Fields('4');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano_ant.'&mes='.$mes4.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('4')."  /".$acu.'</a></td>';
								$acu = $acu+$rs_sucesos_ano_ant_m->Fields('5');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano_ant.'&mes='.$mes5.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('5')."  /".$acu.'</a></td>';
								$acu = $acu+$rs_sucesos_ano_ant_m->Fields('6');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano_ant.'&mes='.$mes6.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('6')."  /".$acu.'</a></td>';
								$acu = $acu+$rs_sucesos_ano_ant_m->Fields('7');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano_ant.'&mes='.$mes7.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('7')."  /".$acu.'</a></td>';
								$acu = $acu+$rs_sucesos_ano_ant_m->Fields('8');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano_ant.'&mes='.$mes8.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('8')."  /".$acu.'</a></td>';
								$acu = $acu+$rs_sucesos_ano_ant_m->Fields('9');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano_ant.'&mes='.$mes9.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('9')."  /".$acu.'</a></td>';
								$acu = $acu+$rs_sucesos_ano_ant_m->Fields('10');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano_ant.'&mes='.$mes10.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('10')."  /".$acu.'</a></td>';
								$acu = $acu+$rs_sucesos_ano_ant_m->Fields('11');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano_ant.'&mes='.$mes11.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('11')."  /".$acu.'</a></td>';
								$acu = $acu+$rs_sucesos_ano_ant_m->Fields('12');

								echo '<td><a target="_blank" href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano='.$ano_ant.'&mes='.$mes12.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('12')."  /".$acu.'</a></td>';
							echo '</tr>';
							$rs_sucesos_ano_ant_m->MoveNext();
						}
						$rs_sucesos_ano_ant_m->MoveFirst()
					?>

					</tbody>
				</table>

			</div>
		</div>
		
		


</body>
</html>
