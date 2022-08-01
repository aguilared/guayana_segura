<?php
	$muni_id = 3;
	$descri_municipio = "Caroni";
	$delito_deta = 7;

	if (isset($_GET['ano'])) {
		$ano = $_GET['ano'];
		//$mes = $_GET['mes'];
		//$mes_letras = mes__($mes);
	}
	//$ano = 2016;
	$mes =0;
	$parro_cacha = 731;
	$parro_chi = 732;
	$parro_dalla = 733;
	$parro_once = 734;
	$parro_pozo = 735;
	$parro_simon = 736;
	$parro_unare = 737;
	$parro_uni = 738;
	$parro_vista = 739;
	$parro_yoco = 7310;

	$query_fecha_actual = $db->Prepare("SELECT now() AS fecha , Month(now()) AS mes_act, MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) AS mes_ant");
	$rs_fecha_actual = $db->Execute($query_fecha_actual);
	$fecha = normaliza($rs_fecha_actual->Fields('fecha'));
	$mes_act = $rs_fecha_actual->Fields('mes_act');

	//San felix
	$query_homici_mes_sf = $db->Prepare("SELECT count(*) AS acu_mes_sf
		FROM `sucesos` AS s
		INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =$ano 
		AND delito_detalle_id = $delito_deta AND capital_sector = 'sf'");
	//puerto Ordaz
	$query_homici_mes_poz = $db->Prepare("SELECT count(*) AS acu_mes_poz
		FROM `sucesos` AS s
		INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =$ano 
		AND delito_detalle_id = $delito_deta AND capital_sector = 'poz'");
	//San felix
	$query_homici_mes_ant_sf = $db->Prepare("SELECT count(*) AS acu_mes_ant_sf
		FROM `sucesos` AS s
		INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =$ano AND MONTH(fecha_suceso)=(Month(now())-1)
		AND delito_detalle_id = $delito_deta AND capital_sector = 'sf'");
	//puerto Ordaz
	$query_homici_mes_ant_poz = $db->Prepare("SELECT count(*) AS acu_mes_ant_poz
		FROM `sucesos` AS s
		INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =$ano AND MONTH(fecha_suceso)=(Month(now())-1)
		AND delito_detalle_id = $delito_deta AND capital_sector = 'poz'");

	//parroquias cachamay
	$query_homici_mes_parr_cacha = $db->Prepare("SELECT count(*) AS acu_mes_parr_cacha
		FROM `sucesos` AS s
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =$ano 
		AND delito_detalle_id = $delito_deta AND parroquia_id = 731");

	//parroquias chirica
	$query_homici_mes_parr_chi = $db->Prepare("SELECT count(*) AS acu_mes_parr_chi
		FROM `sucesos` AS s
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =$ano 
		AND delito_detalle_id = $delito_deta AND parroquia_id = 732");

	//parroquias Dalla costa
	$query_homici_mes_parr_dalla = $db->Prepare("SELECT count(*) AS acu_mes_parr_dalla
		FROM `sucesos` AS s
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =$ano 
		AND delito_detalle_id = $delito_deta AND parroquia_id = 733");

	//parroquias Once de Abril
	$query_homici_mes_parr_once = $db->Prepare("SELECT count(*) AS acu_mes_parr_once
		FROM `sucesos` AS s
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =$ano 
		AND delito_detalle_id = $delito_deta AND parroquia_id = 734");

	//parroquias Pozo Verde
	$query_homici_mes_parr_pozo = $db->Prepare("SELECT count(*) AS acu_mes_parr_pozo
		FROM `sucesos` AS s
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =$ano 
		AND delito_detalle_id = $delito_deta AND parroquia_id = 735");

	//parroquias Simon Bolivar
	$query_homici_mes_parr_simon = $db->Prepare("SELECT count(*) AS acu_mes_parr_simon
		FROM `sucesos` AS s
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =$ano 
		AND delito_detalle_id = $delito_deta AND parroquia_id = 736");

	//parroquias unare
	$query_homici_mes_parr_unare = $db->Prepare("SELECT count(*) AS acu_mes_parr_unare
		FROM `sucesos` AS s
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =$ano 
		AND delito_detalle_id = $delito_deta AND parroquia_id = 737");

	//parroquias universidad
	$query_homici_mes_parr_univer = $db->Prepare("SELECT count(*) AS acu_mes_parr_univer
		FROM `sucesos` AS s
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =$ano 
		AND delito_detalle_id = $delito_deta AND parroquia_id = 738");

	//parroquias Vista al Sol
	$query_homici_mes_parr_vista = $db->Prepare("SELECT count(*) AS acu_mes_parr_vista
		FROM `sucesos` AS s
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =$ano 
		AND delito_detalle_id = $delito_deta AND parroquia_id = 739");

	//parroquias Yocoima
	$query_homici_mes_parr_yoco = $db->Prepare("SELECT count(*) AS acu_mes_parr_yoco
		FROM `sucesos` AS s
		WHERE s.municipio_id = $muni_id AND year(fecha_suceso) =$ano 
		AND delito_detalle_id = $delito_deta AND parroquia_id = 7310");

	$query_sucesos = $db->Prepare("SELECT suceso_id, fecha_suceso As fecha_suceso, delito_id, delito_detalle_id, titulo, nombre_victima, fuente,
		m.descripcion AS municipio, p.descripcion AS parroquia
	FROM sucesos As s
	INNER JOIN municipios AS m ON s.municipio_id = m.municipio_id
	INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id");


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

</head>
<body>
	
	<div class="panel panel-primary">
		<div class="panel-heading">Municipio <?php echo $descri_municipio?>. Acumulado de Homicidios del A&ntildeo por Parroquias a esta fecha: <?php echo $fecha;?></div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-responsive table-bordered" id="datatablesss">

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
							<th><a target="_blank" href="../maps/parroquias_caroni_ano.php?latitud=<?php echo "";?>&longitud=<?php echo "";?>"><span class="glyphicon glyphicon-star"></span>Maps</a></th>
							<th><a target="_blank" href="sucesos/lis_homicidios_con_ano_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_cacha?>" class="btn btn-primary btn-sm"</a><?php echo $acu_mes_parr_cacha; ?></th>
							<th><a target="_blank" href="sucesos/lis_homicidios_con_ano_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_chi?>" class="btn btn-primary btn-sm"</a><?php echo $acu_mes_parr_chi; ?></th>
							<th><a target="_blank" href="sucesos/lis_homicidios_con_ano_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_dalla?>" class="btn btn-primary btn-sm"</a><?php echo $acu_mes_parr_dalla; ?></th>
							<th><a target="_blank" href="sucesos/lis_homicidios_con_ano_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_once?>" class="btn btn-primary btn-sm"</a><?php echo $acu_mes_parr_once; ?></th>
							<th><a target="_blank" href="sucesos/lis_homicidios_con_ano_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_pozo?>" class="btn btn-primary btn-sm"</a><?php echo $acu_mes_parr_pozo; ?></th>
							<th><a target="_blank" href="sucesos/lis_homicidios_con_ano_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_simon?>" class="btn btn-primary btn-sm"</a><?php echo $acu_mes_parr_simon; ?></th>
							<th><a target="_blank" href="sucesos/lis_homicidios_con_ano_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_unare?>" class="btn btn-primary btn-sm"</a><?php echo $acu_mes_parr_unare; ?></th>
							<th><a target="_blank" href="sucesos/lis_homicidios_con_ano_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_uni?>" class="btn btn-primary btn-sm"</a><?php echo $acu_mes_parr_univer; ?></th>
							<th><a target="_blank" href="sucesos/lis_homicidios_con_ano_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_vista?>" class="btn btn-primary btn-sm"</a><?php echo $acu_mes_parr_vista; ?></th>
							<th><a target="_blank" href="sucesos/lis_homicidios_con_ano_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_yoco?>" class="btn btn-primary btn-sm"</a><?php echo $acu_mes_parr_yoco; ?></th>
							<th><?php echo " "; ?></th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>




</body>
</html>
