<!DOCTYPE html>
<html lang="en">
<head>
	<title>Listado de Historicos de Homicidios en Ciudad Guaya y Venezuela</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/datepicker.css">
	<link rel="stylesheet" href="../css/dataTables.bootstrap.css">
</head>
	
<body>
	
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Historico de Homicidios en Ciudad Guayana y Venezuela</div>
					<div class="panel-body">
						
						<table class="table table-striped table-bordered" id="datatables">
							<thead>
								<tr>
									<th>Fecha</th>
									<th>Total</th>
									<th>Venezuela</th>
									<th>Fuente</th>
									<th>Fuente1</th>
									<th><a class="btn update btn-success" href="frm_ingre_histo_homicidios.php" class="btn btn-primary btn-lg">Crear Historico</a></th>
								</tr>
							</thead>
							
							<tbody>
								<?php
									include_once '../connections/guayana_s.php';
									$conexion=new Conexion();
									$db=$conexion->getDbConn();
									$db->debug = false;
									$db->SetFetchMode(ADODB_FETCH_ASSOC);
									$query_sucesos = $db->Prepare("SELECT histo_id, ano, total, total_vzla, fuente, otra_fuente1, otra_fuente2
										FROM histo_homicidios ORDER BY ano DESC");
									$rs_sucesos = $db->Execute($query_sucesos);
									while(!$rs_sucesos->EOF){
										echo '<tr>';
										echo '<td><a class="btn ampliar" href="homicidios.php?ano='.$rs_sucesos->Fields('ano').'" class="btn btn-primary btn-lg">'.$rs_sucesos->Fields('ano').'</a></td>';
										echo '<td>'. $rs_sucesos->Fields('total') . '</td>';
										echo '<td>'. $rs_sucesos->Fields('total_vzla') . '</td>';
										echo '<td><a class="btn" href="'.$rs_sucesos->Fields('fuente').'" target="_blank">Fuente</a></td>';
										echo '<td><a class="btn" href="'.$rs_sucesos->Fields('otra_fuente1').'" target="_blank">Fuente</a></td>';
										echo '<td width=250>';
										echo '<a class="btn update btn-success" href="frm_modi_histo_homicidios.php?histo_id='.$rs_sucesos->Fields('histo_id').'" class="btn btn-primary btn-lg">Modifi</a>';
										echo '&nbsp;';
										echo '<a class="btn btn-danger" id="delete" href="trata_borra_suceso.php?histo_id='.$rs_sucesos->Fields('histo_id').'">Delete</a>';
										echo '&nbsp;';
										echo '</td>';
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
			</div>
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
				"order": [[ 0, 'desc' ]]
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
		$(".update").click(function(e){
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