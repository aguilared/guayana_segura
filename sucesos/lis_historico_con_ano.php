<?php
	include_once '../connections/guayana_s.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC);
	
	if (isset($_GET['ano'])) {
		$ano = $_GET['ano'];
		$muni_id = 3;
		$delito_deta = 7;
	}
	
	$sql_sucesos = $db->Prepare("SELECT suceso_id, fecha_suceso As fecha_suceso, delito_id, delito_detalle_id,
		titulo,nombre_victima, 	fuente,m.descripcion AS municipio, p.descripcion AS parroquia 
		FROM sucesos As s 
		INNER JOIN municipios AS m ON s.municipio_id = m.municipio_id 
		INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
		WHERE YEAR(fecha_suceso) = '$ano'");

	$sql_sucesos_ano_meses = $db->Prepare("SELECT YEAR(fecha_suceso) AS ano,
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
		WHERE YEAR(fecha_suceso) = $ano AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	$db->SetFetchMode(ADODB_FETCH_ASSOC);
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Listado de Homicidios año</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.css">
</head>

<body>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Listado de Homicidios del A&ntilde;o: <?php echo $ano?></div>
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
										echo '<td>'. $rs_sucesos_a_m->Fields('ano') . '</td>';
										echo '<td>'. $rs_sucesos_a_m->Fields('1') . '</td>';
										echo '<td>'. $rs_sucesos_a_m->Fields('2') . '</td>';
										echo '<td>'. $rs_sucesos_a_m->Fields('3') . '</td>';
										echo '<td>'. $rs_sucesos_a_m->Fields('4') . '</td>';
										echo '<td>'. $rs_sucesos_a_m->Fields('5') . '</td>';
										echo '<td>'. $rs_sucesos_a_m->Fields('6') . '</td>';
										echo '<td>'. $rs_sucesos_a_m->Fields('7') . '</td>';
										echo '<td>'. $rs_sucesos_a_m->Fields('8') . '</td>';
										echo '<td>'. $rs_sucesos_a_m->Fields('9') . '</td>';
										echo '<td>'. $rs_sucesos_a_m->Fields('10') . '</td>';
										echo '<td>'. $rs_sucesos_a_m->Fields('11') . '</td>';
										echo '<td>'. $rs_sucesos_a_m->Fields('12') . '</td>';
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
										echo '<td><a class="btn" href="'.$rs_sucesos->Fields('fuente').'" target="_blank">Fuente</a></td>';
										
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


</body>
</html>