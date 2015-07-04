<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Listado de Sucesos</title>
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
					<div class="panel-heading">Listado de Sucesos</div>
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
									<th><a class="btn update btn-success" href="frm_ingre_suceso.php" class="btn btn-primary btn-lg">Crear suceso</a></th>
								</tr>
							</thead>
							
							<tbody>
								<?php
												include_once '../connections/guayana_s.php';
												$conexion=new Conexion();
												$db=$conexion->getDbConn();
												$db->debug = false;
												$db->SetFetchMode(ADODB_FETCH_ASSOC);
												$query_sucesos = $db->Prepare("SELECT suceso_id, DATE_FORMAT(fecha_suceso,'%d-%m-%Y') As fecha_suceso, delito_id, delito_detalle_id, titulo, nombre_victima, fuente, 
													m.descripcion AS municipio, p.descripcion AS parroquia
												FROM sucesos As s
												INNER JOIN municipios AS m ON s.municipio_id = m.municipio_id
												INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id");
												$rs_sucesos = $db->Execute($query_sucesos);
											while(!$rs_sucesos->EOF){
												echo '<tr>';
													echo '<td><a class="btn ampliar" href="suceso.php?suceso_id='.$rs_sucesos->Fields('suceso_id').'" class="btn btn-primary btn-lg">'.$rs_sucesos->Fields('suceso_id').'</a></td>';
													echo '<td>'. $rs_sucesos->Fields('fecha_suceso') . '</td>';
													echo '<td>'. $rs_sucesos->Fields('titulo') . '</td>';
													echo '<td>'. $rs_sucesos->Fields('nombre_victima') . '</td>';
													echo '<td>'. $rs_sucesos->Fields('municipio') . '</td>';
													echo '<td>'. $rs_sucesos->Fields('parroquia') . '</td>';
													echo '<td><a class="btn" href="'.$rs_sucesos->Fields('fuente').'" target="_blank">Fuente</a></td>';
													echo '<td width=250>';
													echo '<a class="btn update btn-success" href="frm_modi_suceso.php?suceso_id='.$rs_sucesos->Fields('suceso_id').'" class="btn btn-primary btn-lg">Modifi</a>';
													echo '&nbsp;';
													echo '<a class="btn btn-danger" id="delete" href="trata_borra_suceso.php?suceso_id='.$rs_sucesos->Fields('suceso_id').'">Delete</a>';
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