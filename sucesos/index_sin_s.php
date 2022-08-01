<?php
	include_once '../includes/db_connect.php';
	include_once '../includes/functions.php';
 	//sec_session_start();
?>

<?php
	//$nivel = $_SESSION['nivel'];
	//comienzo login_check
	//if (login_check($mysqli) == true && $nivel ==1) : ?>

	<?php
		include_once '../connections/guayana_s.php';
		$conexion=new Conexion();
		$db=$conexion->getDbConn();
		$db->debug = false;
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$db->query("SET NAMES 'utf8'");
		$muni_id = 3;
		$delito_deta = 7;


		$query_fecha_actual = $db->Prepare("SELECT now() AS fecha , Month(now()) AS mes_act, MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) AS mes_ant");
		$rs_fecha_actual = $db->Execute($query_fecha_actual);
		$fecha = normaliza($rs_fecha_actual->Fields('fecha'));
		$mes_act = $rs_fecha_actual->Fields('mes_act');

		//Datos ya desde esta bitacora
		$query_homici_ano_2016 = $db->Prepare("SELECT COUNT(fecha_suceso) AS acu_ano_2016 FROM sucesos AS s
			WHERE YEAR(fecha_suceso) = 2016 AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");

		$query_homici_ano_2015 = $db->Prepare("SELECT total AS acu_ano_2015 FROM  `histo_homicidios` WHERE ano =2015");

		$query_homici_ano_2014 = $db->Prepare("SELECT total AS acu_ano_2014 FROM  `histo_homicidios` WHERE ano =2014");

		$query_homici_ano_2013 = $db->Prepare("SELECT total AS acu_ano_2013 FROM  `histo_homicidios` WHERE ano =2013");

		$query_homici_ano_2012 = $db->Prepare("SELECT total AS acu_ano_2012 FROM  `histo_homicidios` WHERE ano =2012");

		$query_homici_mes = $db->Prepare("SELECT count(*) AS acu_mes
			FROM `sucesos`
			WHERE `municipio_id` = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now()) AND delito_detalle_id = $delito_deta");

		//29-1-17 ya no uso .   ahora funcion
		$query_homici_mes_ant = $db->Prepare("SELECT count(*) AS acu_mes_ant
			FROM `sucesos`
			WHERE `municipio_id` = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=(Month(now())-1) AND delito_detalle_id = $delito_deta");

		$query_homici_ano = $db->Prepare("SELECT count(*) AS acu_ano
			FROM `sucesos`
			WHERE `municipio_id` = $muni_id AND year(fecha_suceso) =year(now()) AND delito_detalle_id = $delito_deta");

		//San felix
		$query_homici_mes_sf = $db->Prepare("SELECT count(*) AS acu_mes_sf
			FROM `sucesos` AS s
			INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
			WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
			AND delito_detalle_id = $delito_deta AND capital_sector = 'sf'");
		//puerto Ordaz
		$query_homici_mes_poz = $db->Prepare("SELECT count(*) AS acu_mes_poz
			FROM `sucesos` AS s
			INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
			WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
			AND delito_detalle_id = $delito_deta AND capital_sector = 'poz'");
		//San felix
		$query_homici_mes_ant_sf = $db->Prepare("SELECT count(*) AS acu_mes_ant_sf
			FROM `sucesos` AS s
			INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
			WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=(Month(now())-1)
			AND delito_detalle_id = $delito_deta AND capital_sector = 'sf'");
		//puerto Ordaz
		$query_homici_mes_ant_poz = $db->Prepare("SELECT count(*) AS acu_mes_ant_poz
			FROM `sucesos` AS s
			INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
			WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=(Month(now())-1)
			AND delito_detalle_id = $delito_deta AND capital_sector = 'poz'");

		//parroquias cachamay
		$query_homici_mes_parr_cacha = $db->Prepare("SELECT count(*) AS acu_mes_parr_cacha
			FROM `sucesos` AS s
			WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
			AND delito_detalle_id = $delito_deta AND parroquia_id = 731");

		//parroquias chirica
		$query_homici_mes_parr_chi = $db->Prepare("SELECT count(*) AS acu_mes_parr_chi
			FROM `sucesos` AS s
			WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
			AND delito_detalle_id = $delito_deta AND parroquia_id = 732");

		//parroquias Dalla costa
		$query_homici_mes_parr_dalla = $db->Prepare("SELECT count(*) AS acu_mes_parr_dalla
			FROM `sucesos` AS s
			WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
			AND delito_detalle_id = $delito_deta AND parroquia_id = 733");

		//parroquias Once de Abril
		$query_homici_mes_parr_once = $db->Prepare("SELECT count(*) AS acu_mes_parr_once
			FROM `sucesos` AS s
			WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
			AND delito_detalle_id = $delito_deta AND parroquia_id = 734");

		//parroquias Pozo Verde
		$query_homici_mes_parr_pozo = $db->Prepare("SELECT count(*) AS acu_mes_parr_pozo
			FROM `sucesos` AS s
			WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
			AND delito_detalle_id = $delito_deta AND parroquia_id = 735");

		//parroquias Simon Bolivar
		$query_homici_mes_parr_simon = $db->Prepare("SELECT count(*) AS acu_mes_parr_simon
			FROM `sucesos` AS s
			WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
			AND delito_detalle_id = $delito_deta AND parroquia_id = 736");

		//parroquias unare
		$query_homici_mes_parr_unare = $db->Prepare("SELECT count(*) AS acu_mes_parr_unare
			FROM `sucesos` AS s
			WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
			AND delito_detalle_id = $delito_deta AND parroquia_id = 737");

		//parroquias universidad
		$query_homici_mes_parr_univer = $db->Prepare("SELECT count(*) AS acu_mes_parr_univer
			FROM `sucesos` AS s
			WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
			AND delito_detalle_id = $delito_deta AND parroquia_id = 738");

		//parroquias Vista al Sol
		$query_homici_mes_parr_vista = $db->Prepare("SELECT count(*) AS acu_mes_parr_vista
			FROM `sucesos` AS s
			WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
			AND delito_detalle_id = $delito_deta AND parroquia_id = 739");

		//parroquias Yocoima
		$query_homici_mes_parr_yoco = $db->Prepare("SELECT count(*) AS acu_mes_parr_yoco
			FROM `sucesos` AS s
			WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
			AND delito_detalle_id = $delito_deta AND parroquia_id = 7310");

		$query_sucesos = $db->Prepare("SELECT suceso_id, fecha_suceso As fecha_suceso, delito_id, delito_detalle_id, titulo, nombre_victima, fuente,
			m.descripcion AS municipio, p.descripcion AS parroquia
		FROM sucesos As s
		INNER JOIN municipios AS m ON s.municipio_id = m.municipio_id
		INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id");


		$rs_homici_mes = $db->Execute($query_homici_mes);
		$acu_mes = $rs_homici_mes->Fields('acu_mes');

		$rs_homici_mes_ant = $db->Execute($query_homici_mes_ant);
		$acu_mes_ant = $rs_homici_mes_ant->Fields('acu_mes_ant');

		$acu_mes_ant = tot_homi_caroni_mes_ant();

		$rs_homici_ano = $db->Execute($query_homici_ano);
		$acu_ano = $rs_homici_ano->Fields('acu_ano');  // no util ya que se comenzo a ingresar datos en feb marzo

		$rs_homici_mes_sf = $db->Execute($query_homici_mes_sf);
		$acu_mes_sf = $rs_homici_mes_sf->Fields('acu_mes_sf');

		$rs_homici_mes_poz = $db->Execute($query_homici_mes_poz);
		$acu_mes_poz = $rs_homici_mes_poz->Fields('acu_mes_poz');

		$rs_homici_mes_ant_sf = $db->Execute($query_homici_mes_ant_sf);
		$acu_mes_ant_sf = $rs_homici_mes_ant_sf->Fields('acu_mes_ant_sf');

		$rs_homici_mes_ant_poz = $db->Execute($query_homici_mes_ant_poz);
		$acu_mes_ant_poz = $rs_homici_mes_ant_poz->Fields('acu_mes_ant_poz');

		//parroquias
		$rs_homici_mes_parr_cacha = $db->Execute($query_homici_mes_parr_cacha);
		$acu_mes_parr_cacha = $rs_homici_mes_parr_cacha->Fields('acu_mes_parr_cacha');

		$rs_homici_mes_parr_chi = $db->Execute($query_homici_mes_parr_chi);
		$acu_mes_parr_chi = $rs_homici_mes_parr_chi->Fields('acu_mes_parr_chi');

		$rs_homici_mes_parr_dalla = $db->Execute($query_homici_mes_parr_dalla);
		$acu_mes_parr_dalla = $rs_homici_mes_parr_dalla->Fields('acu_mes_parr_dalla');

		$rs_homici_mes_parr_once = $db->Execute($query_homici_mes_parr_once);
		$acu_mes_parr_once = $rs_homici_mes_parr_once->Fields('acu_mes_parr_once');

		$rs_homici_mes_parr_pozo = $db->Execute($query_homici_mes_parr_pozo);
		$acu_mes_parr_pozo = $rs_homici_mes_parr_pozo->Fields('acu_mes_parr_pozo');

		$rs_homici_mes_parr_simon = $db->Execute($query_homici_mes_parr_simon);
		$acu_mes_parr_simon = $rs_homici_mes_parr_simon->Fields('acu_mes_parr_simon');

		$rs_homici_mes_parr_unare = $db->Execute($query_homici_mes_parr_unare);
		$acu_mes_parr_unare = $rs_homici_mes_parr_unare->Fields('acu_mes_parr_unare');

		$rs_homici_mes_parr_univer = $db->Execute($query_homici_mes_parr_univer);
		$acu_mes_parr_univer = $rs_homici_mes_parr_univer->Fields('acu_mes_parr_univer');

		$rs_homici_mes_parr_vista = $db->Execute($query_homici_mes_parr_vista);
		$acu_mes_parr_vista = $rs_homici_mes_parr_vista->Fields('acu_mes_parr_vista');

		$rs_homici_mes_parr_yoco = $db->Execute($query_homici_mes_parr_yoco);
		$acu_mes_parr_yoco = $rs_homici_mes_parr_yoco->Fields('acu_mes_parr_yoco');

		
		$rs_homici_ano_2016 = $db->Execute($query_homici_ano_2016);
		$acu_ano_2016 = $rs_homici_ano_2016->Fields('acu_ano_2016');

		$rs_homici_ano_2015 = $db->Execute($query_homici_ano_2015);
		$acu_ano_2015 = $rs_homici_ano_2015->Fields('acu_ano_2015');
		//$acu_ano = $acu_ano_2015 + $acu_mes + $acu_mes_ant;   // estan hasta julio del historico tomado del correodelcaroni

		$rs_homici_ano_2014 = $db->Execute($query_homici_ano_2014);
		$acu_ano_2014 = $rs_homici_ano_2014->Fields('acu_ano_2014');

		$rs_homici_ano_2013 = $db->Execute($query_homici_ano_2013);
		$acu_ano_2013 = $rs_homici_ano_2013->Fields('acu_ano_2013');

		$rs_homici_ano_2012 = $db->Execute($query_homici_ano_2012);
		$acu_ano_2012 = $rs_homici_ano_2012->Fields('acu_ano_2012');

	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Venezuela Segura. Administracion de Sucesos.  Guayana</title>
		<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/datepicker.css">
		<link rel="stylesheet" href="../css/dataTables.bootstrap.css">
	</head>
	<body>

		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary">  
					<div class="panel-heading">
					<a class="btn-warning" href="/" target="_blank">Venezuela Segura.</a> Administracion de Sucesos. Guayana.</div>

					<div class="panel-body">
						<table class="table table-striped table-bordered" id="datatablesss">
							<tbody>
								<tr class="info">
									<th>Homicidios</th>
									<th>Este mes</th>
									<th>San Felix</th>
									<th>Puerto Ordaz</th>
									<th>Mes anterior</th>
									<th>San Felix Mes ant</th>
									<th>Puerto Ordaz Mes ant</th>
									<th>2017</th>
									<th>2016</th>
									<th>2015</th>
									<th>2014</th>
									<th>2013</th>
									<th>2012</th>

								</tr>

								<tr>
									<th><?php echo '<a class="btn btn-xs copiar btn-success" href="../twitter/envia_acumu.php">Twitear</a>';?></th>
									<th><?php echo $acu_mes; ?></th>
									<th><?php echo $acu_mes_sf; ?></th>
									<th><?php echo $acu_mes_poz; ?></th>
									<th><?php echo $acu_mes_ant; ?></th>
									<th><?php echo $acu_mes_ant_sf; ?></th>
									<th><?php echo $acu_mes_ant_poz; ?></th>
									<th><?php echo $acu_ano; ?></th>
									<th><?php echo $acu_ano_2016; ?></th>
									<th><?php echo $acu_ano_2015; ?></th>
									<th><?php echo $acu_ano_2014; ?></th>
									<th><?php echo $acu_ano_2013; ?></th>
									<th><?php echo $acu_ano_2012; ?></th>
								</tr>
							</tbody>
							<tbody>
								<tr class="info">
									<th>Parroquias</th>
									<th>Cachamay</th>
									<th>Chirica</th>
									<th>Dalla Costa</th>
									<th>Once de Abril</th>
									<th>Pozo Verde</th>
									<th>Simon Bolivar</th>
									<th>Unare</th>
									<th>Universidad</th>
									<th>Vista al Sol</th>
									<th>Yocoima</th>
									<th>5 de Julio</th>
								</tr>

								<tr>
									<th><a target="_blank" href="../maps/parroquias_caroni.php?latitud=<?php echo "";?>&longitud=<?php echo "";?>"><span class="glyphicon glyphicon-star"></span>Maps</a></th>
									<th><?php echo $acu_mes_parr_cacha; ?></th>
									<th><?php echo $acu_mes_parr_chi; ?></th>
									<th><?php echo $acu_mes_parr_dalla; ?></th>
									<th><?php echo $acu_mes_parr_once; ?></th>
									<th><?php echo $acu_mes_parr_pozo; ?></th>
									<th><?php echo $acu_mes_parr_simon; ?></th>
									<th><?php echo $acu_mes_parr_unare; ?></th>
									<th><?php echo $acu_mes_parr_univer; ?></th>
									<th><?php echo $acu_mes_parr_vista; ?></th>
									<th><?php echo $acu_mes_parr_yoco; ?></th>
									<th><?php echo " "; ?></th>
								</tr>
							</tbody>
						</table>
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

									<th><a class="btn update btn-success" href="frm_ingre_suceso.php" >Crear suceso</a></th>
								</tr>
							</thead>

							<tbody>
							<?php
								$rs_sucesos = $db->Execute($query_sucesos);
								while(!$rs_sucesos->EOF){
									$suceso_id= $rs_sucesos->Fields('suceso_id');
									echo '<tr>';
										echo '<td><a class="btn ampliar" href="suceso.php?suceso_id='.$suceso_id.'" class="btn btn-primary btn-lg">'.$suceso_id.'</a></td>';
										echo '<td><span style="display: none;">'. $rs_sucesos->Fields('fecha_suceso') ."</span>".normaliza($rs_sucesos->Fields('fecha_suceso')). '</td>';
										echo '<td>'. $rs_sucesos->Fields('titulo') . '</td>';
										echo '<td>'. $rs_sucesos->Fields('nombre_victima') . '</td>';
										echo '<td>'. $rs_sucesos->Fields('municipio') . '</td>';
										echo '<td>'. $rs_sucesos->Fields('parroquia') . '</td>';
										echo '<td width=250>';
										echo '<a class="btn btn-xs update btn-success" href="frm_modi_suceso.php?suceso_id='.$suceso_id.'">Modificar</a>';
										echo '&nbsp;';
										echo '<button class="btn btn-xs btn-danger" data-href="trata_borra_suceso.php?suceso_id='.$suceso_id.'" data-toggle="modal" data-target="#confirm-delete"><i class="glyphicon glyphicon-trash"></i>Borrar</button>';
										echo '&nbsp;';
										echo '<a class="btn btn-xs copiar btn-success" href="copia_suceso.php?suceso_id='.$suceso_id.'">Copiar</a>';
										echo '&nbsp;';
										echo '<a class="btn btn-xs copiar btn-success" href="../twitter/envia.php?suceso_id='.$suceso_id.'">Twitear</a>';
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
			</div>
		</div>

		<div class="ajaxcont"></div>

		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Borrar Permanentemente</h4>
					</div>
					<div class="modal-body">
						<p>Estas Seguro de Hacer Esto!!!!! ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Borrar</a>
					</div>
				</div>
			</div>
		</div>

		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery-ui.js"></script>
		<script src="../js/jquery.dataTables.js"></script>
		<script src="../js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
		<script src="../js/confirm-bootstrap.js"></script>

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

		<script>
			$(".copiar").click(function(e){
				//quita la ejecucion regular
				e.preventDefault();
				//traigo el modal
				$.ajax({
					method: "GET",
							url: $(this).attr('href'),
				}).done(function(data) {
					//asigno todo el callback en el div "ajaxcont"
					$('.ajaxcont').html(data);
					location.reload();

				});
			});
		</script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('#confirm-delete').on('show.bs.modal', function(e) {
					$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				});

				$("a.external").click(function() {
					url = $(this).attr("href");
					var mds = "width="+(screen.width-300)+"px,height="+(screen.height - 50) + "px,top=10,left=50,scrollbars=YES";
					window.open(url, "ventana4", mds);
				  return false;
			   });

			});
		</script>

<?php //else : ?> <!-- //fin login_check-->
	<p><span class="error">No está autorizado para acceder a esta página.</span> Please <a href="../index1.php">login</a>.</p>
<?php //endif; ?>

</body>
</html>
