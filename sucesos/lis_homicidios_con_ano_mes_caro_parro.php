<?php
	include_once '../connections/guayana_s.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->query("SET NAMES 'utf8'");
	$db->SetFetchMode(ADODB_FETCH_ASSOC);
	
	if (isset($_GET['ano'])) {
		$ano = $_GET['ano'];
		$mes = $_GET['mes'];
		$parro = $_GET['parro'];
		$mes_letras = mes__($mes);
		$muni_id = 3;
		$delito_deta = 7;
		
	}
	
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
		WHERE YEAR(fecha_suceso) = '$ano' AND MONTH(fecha_suceso) = '$mes' AND s.municipio_id = $muni_id AND s.parroquia_id = $parro
		AND s.delito_detalle_id = $delito_deta");

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
		SUM(CASE WHEN (MONTH(fecha_suceso)= '12' ) THEN 1 ELSE 0 END) AS '12',
		COUNT(fecha_suceso) AS total
		FROM sucesos
		WHERE YEAR(fecha_suceso) = $ano  AND municipio_id = $muni_id AND parroquia_id = $parro AND delito_detalle_id = $delito_deta");
	
	$sql_parroquia = $db->Prepare("SELECT parroquia_id, descripcion FROM parroquias WHERE parroquia_id = $parro");
	$db->SetFetchMode(ADODB_FETCH_ASSOC);
	
	$rs_parroquia = $db->Execute($sql_parroquia);
	$parroquia = $rs_parroquia->Fields('descripcion');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Listado de Homicidios años meses Caroni Parroquia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.css">
</head>

<body>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Venezuela Segura. Listado de Homicidios Mes: <?php echo $mes_letras;?> A&ntilde;o, <?php echo $ano?> : Municipio Caroni. Parroquia: <?php echo $parroquia; ?></div>
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
										echo '<td><a target="" href="lis_homicidios_con_ano_mes_caro_parro.php?ano='.$ano.'" class="btn btn-primary btn-sm">'.$ano.'</a></td>';
										echo '<td><a target="" href="lis_homicidios_con_ano_mes_caro_parro.php?ano='.$ano.'&mes='.$mes1.'&parro='.$parro.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('1').'</a></td>';
										echo '<td><a target="" href="lis_homicidios_con_ano_mes_caro_parro.php?ano='.$ano.'&mes='.$mes2.'&parro='.$parro.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('2').'</a></td>';
										echo '<td><a target="" href="lis_homicidios_con_ano_mes_caro_parro.php?ano='.$ano.'&mes='.$mes3.'&parro='.$parro.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('3').'</a></td>';
										echo '<td><a target="" href="lis_homicidios_con_ano_mes_caro_parro.php?ano='.$ano.'&mes='.$mes4.'&parro='.$parro.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('4').'</a></td>';
										echo '<td><a target="" href="lis_homicidios_con_ano_mes_caro_parro.php?ano='.$ano.'&mes='.$mes5.'&parro='.$parro.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('5').'</a></td>';
										echo '<td><a target="" href="lis_homicidios_con_ano_mes_caro_parro.php?ano='.$ano.'&mes='.$mes6.'&parro='.$parro.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('6').'</a></td>';
										echo '<td><a target="" href="lis_homicidios_con_ano_mes_caro_parro.php?ano='.$ano.'&mes='.$mes7.'&parro='.$parro.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('7').'</a></td>';
										echo '<td><a target="" href="lis_homicidios_con_ano_mes_caro_parro.php?ano='.$ano.'&mes='.$mes8.'&parro='.$parro.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('8').'</a></td>';
										echo '<td><a target="" href="lis_homicidios_con_ano_mes_caro_parro.php?ano='.$ano.'&mes='.$mes9.'&parro='.$parro.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('9').'</a></td>';
										echo '<td><a target="" href="lis_homicidios_con_ano_mes_caro_parro.php?ano='.$ano.'&mes='.$mes10.'&parro='.$parro.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('10').'</a></td>';
										echo '<td><a target="" href="lis_homicidios_con_ano_mes_caro_parro.php?ano='.$ano.'&mes='.$mes11.'&parro='.$parro.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('11').'</a></td>';
										echo '<td><a target="" href="lis_homicidios_con_ano_mes_caro_parro.php?ano='.$ano.'&mes='.$mes12.'&parro='.$parro.'" class="btn btn-primary btn-sm">'.$rs_sucesos_a_m->Fields('12').'</a></td>';
									echo '</tr>';
									$rs_sucesos_a_m->MoveNext();
								}
								$rs_sucesos_a_m->MoveFirst()
							?>
							
							</tbody>
					
					</div>
					
					<div class="panel-body">
						<table class="table table-striped table-bordered" id="datatables">
							<thead>
								<tr>
									<th>Id</th>
									<th>Fecha</th>
									<th>Titulo</th>
									<th>Victima</th>
									<th>Municipio</th>
									<th>Parroquia</th>
									<th>Fuentes</th>
								</tr>
							</thead>
								  
							</tbody>
						
							<?php
								
								$rs_sucesos = $db->Execute($sql_sucesos);

								while(!$rs_sucesos->EOF){
									echo '<tr>';
										echo '<td><a class="btn ampliar" href="suceso.php?suceso_id='.$rs_sucesos->Fields('suceso_id').'" class="btn btn-primary btn-lg">'.$rs_sucesos->Fields('suceso_id').'</a></td>';
										echo '<td><span style="display: none;">'. $rs_sucesos->Fields('fecha_suceso') ."</span>".normaliza($rs_sucesos->Fields('fecha_suceso')). '</td>';
										echo '<td>'. $rs_sucesos->Fields('titulo') . '</td>';
										echo '<td>'. $rs_sucesos->Fields('nombre_victima') . '</td>';
										echo '<td>'. $rs_sucesos->Fields('municipio') . '</td>';
										echo '<td>'. $rs_sucesos->Fields('parroquia') . '</td>';
										echo '<td><a class="btn" href="'.$rs_sucesos->Fields('fuente').'" target="">Fuente</a></td>';
										
									echo '</tr>';
									$rs_sucesos->MoveNext();
								}
								$rs_sucesos->MoveFirst()
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div> <!-- /container -->
		<div class="ajaxcont"></div>
    </div>
	   
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/jquery.dataTables.js"></script>
	<script src="../js/dataTables.bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#datatables').dataTable({
				"order": [[ 1, 'desc' ]]
			});
		})
	</script>

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

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-51645712-3', 'auto');
		ga('send', 'pageview');

	</script>


</body>
</html>
