<!DOCTYPE html>
<html lang="en">
<head>
    <title>Listado de Sucesos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
		                  <th>Total</th>
						  <th>Venezuela</th>	
						  <th>Fuente</th>
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
								echo '<td><a class="btn ampliar" href="homicidios.php?suceso_id='.$rs_sucesos->Fields('histo_id').'" class="btn btn-primary btn-lg">'.$rs_sucesos->Fields('suceso_id').'</a></td>';
								echo '<td>'. $rs_sucesos->Fields('ano') . '</td>'; 
								echo '<td>'. $rs_sucesos->Fields('total') . '</td>';
								echo '<td>'. $rs_sucesos->Fields('total_vzla') . '</td>';
								echo '<td><a class="btn" href="'.$rs_sucesos->Fields('fuente').'" target="_blank">Fuente</a></td>';
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
	<div class="ajaxcont"></div>
</div>
   
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/jquery.dataTables.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#datatables').dataTable();
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