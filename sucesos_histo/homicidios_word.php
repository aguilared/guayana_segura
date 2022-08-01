<?php 
	include_once 'connections/guayana_s.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	
	$sql_homi_word = $db->Prepare("SELECT * 
		FROM homicidios_word
		ORDER BY posicion ASC");

	$db->SetFetchMode(ADODB_FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<body>
	
	<div class="panel panel-primary">
		<div class="panel-heading">Top tasa de homicidios a nivel mundial</div>
		<div class="panel-body">
			<table class="table table-responsive table-bordered" id="">
				<thead>
					<tr>
						<th>Año</th>
						<th>Posicion</th>
						<th>Pais</th>
						<th>Ciudad</th>
						<th>Homicidios</th>
						<th>Habitantes</th>
						<th>Tasa</th>
					</tr>
				</thead>
					  
				<tbody>
				<?php 
					$rs_homi_word = $db->Execute($sql_homi_word);
					while(!$rs_homi_word->EOF){
						echo '<tr>';
							echo '<td>'. $rs_homi_word->Fields('ano') . '</td>';
							echo '<td>'. $rs_homi_word->Fields('posicion') . '</td>';
							echo '<td>'. $rs_homi_word->Fields('pais') . '</td>';
							echo '<td>'. $rs_homi_word->Fields('ciudad') . '</td>';
							echo '<td>'. $rs_homi_word->Fields('homicidios') . '</td>';
							echo '<td>'. $rs_homi_word->Fields('habitantes') . '</td>';
							echo '<td>'. $rs_homi_word->Fields('tasa') . '</td>';
						echo '</tr>';
						$rs_homi_word->MoveNext();
					}
					$rs_homi_word->MoveFirst()
				?>
				</tbody>
			</table>
		</div>
	</div>
		
		
</body>
</html>