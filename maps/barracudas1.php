<?php

	include_once '../connections/guayana_s.php';
	include_once '../includes/functions.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC);

  $lat = $_GET["latitud"];
  $lng = $_GET["longitud"];

	$muni_id = 3;
	$delito_deta = 7;

	$parro_cacha = 1;
	$parro_chi = 2;
	$parro_dalla = 3;
	$parro_once = 4;
	$parro_pozo = 5;
	$parro_simon = 6;
	$parro_unare = 7;
	$parro_uni = 8;
	$parro_vista = 9;
	$parro_yoco = 10;

 
	//parroquias cachamay
	$query_homici_mes_parr_cacha = $db->Prepare("SELECT CASE
    WHEN disponible = 1 THEN 'Disponible' ELSE 'No Disponible' END AS acu_mes_parr_cacha
    FROM `ubibarracudas` AS s
    WHERE s.id_barracuda = $parro_cacha ");

	//parroquias chirica
	$query_homici_mes_parr_chi = $db->Prepare("SELECT CASE
    WHEN disponible = 1 THEN 'Disponible' ELSE 'No Disponible' END AS acu_mes_parr_chi
    FROM `ubibarracudas` AS s
    WHERE s.id_barracuda = $parro_chi");

	//parroquias Dalla costa
	$query_homici_mes_parr_dalla = $db->Prepare("SELECT CASE
    WHEN disponible = 1 THEN 'Disponible' ELSE 'No Disponible' END AS acu_mes_parr_dalla
    FROM `ubibarracudas` AS s
    WHERE s.id_barracuda = $parro_dalla");

	//parroquias Once de Abril
	$query_homici_mes_parr_once = $db->Prepare("SELECT CASE
    WHEN disponible = 1 THEN 'Disponible' ELSE 'No Disponible' END AS acu_mes_parr_once
    FROM `ubibarracudas` AS s
    WHERE s.id_barracuda = $parro_once");

	//parroquias Pozo Verde
	$query_homici_mes_parr_pozo = $db->Prepare("SELECT CASE
    WHEN disponible = 1 THEN 'Disponible' ELSE 'No Disponible' END AS acu_mes_parr_pozo
    FROM `ubibarracudas` AS s
    WHERE s.id_barracuda = $parro_pozo");

	//parroquias Simon Bolivar
	$query_homici_mes_parr_simon = $db->Prepare("SELECT CASE
    WHEN disponible = 1 THEN 'Disponible' ELSE 'No Disponible' END AS acu_mes_parr_simon
    FROM `ubibarracudas` AS s
    WHERE s.id_barracuda = $parro_simon");

	//parroquias unare
	$query_homici_mes_parr_unare = $db->Prepare("SELECT CASE
    WHEN disponible = 1 THEN 'Disponible' ELSE 'No Disponible' END AS acu_mes_parr_unare
    FROM `ubibarracudas` AS s
    WHERE s.id_barracuda = $parro_unare");

	//parroquias universidad
	$query_homici_mes_parr_univer = $db->Prepare("SELECT CASE
    WHEN disponible = 1 THEN 'Disponible' ELSE 'No Disponible' END AS acu_mes_parr_univer
    FROM `ubibarracudas` AS s
    WHERE s.id_barracuda = $parro_uni");

	//parroquias Vista al Sol
	$query_homici_mes_parr_vista = $db->Prepare("SELECT CASE
    WHEN disponible = 1 THEN 'Disponible' ELSE 'No Disponible' END AS acu_mes_parr_vista
    FROM `ubibarracudas` AS s
    WHERE s.id_barracuda = $parro_vista");

	//parroquias Yocoima
	$query_homici_mes_parr_yoco = $db->Prepare("SELECT CASE
    WHEN disponible = 1 THEN 'Disponible' ELSE 'No Disponible' END AS acu_mes_parr_yoco
    FROM `ubibarracudas` AS s
    WHERE s.id_barracuda = $parro_yoco");

	$query_fechas = $db->Prepare("SELECT year(now()) AS ano, Month(now()) AS mes");
	$rs_fechas = $db->Execute($query_fechas);
	$ano = $rs_fechas->Fields('ano');
	$mes = $rs_fechas->Fields('mes');

	//parroquias
	$rs_homici_mes_parr_cacha = $db->Execute($query_homici_mes_parr_cacha);
	$acu_mes_parr_cacha = "Barracuda1: " .$rs_homici_mes_parr_cacha->Fields('acu_mes_parr_cacha');

	$rs_homici_mes_parr_chi = $db->Execute($query_homici_mes_parr_chi);
	$acu_mes_parr_chi = "Barracuda2: " .$rs_homici_mes_parr_chi->Fields('acu_mes_parr_chi');

	$rs_homici_mes_parr_dalla = $db->Execute($query_homici_mes_parr_dalla);
	$acu_mes_parr_dalla = "Barracuda3: " .$rs_homici_mes_parr_dalla->Fields('acu_mes_parr_dalla');

	$rs_homici_mes_parr_once = $db->Execute($query_homici_mes_parr_once);
	$acu_mes_parr_once = "Barracuda4: " .$rs_homici_mes_parr_once->Fields('acu_mes_parr_once');

	$rs_homici_mes_parr_pozo = $db->Execute($query_homici_mes_parr_pozo);
	$acu_mes_parr_pozo = "Barracuda5: " .$rs_homici_mes_parr_pozo->Fields('acu_mes_parr_pozo');

	$rs_homici_mes_parr_simon = $db->Execute($query_homici_mes_parr_simon);
	$acu_mes_parr_simon = "Barracuda6: " .$rs_homici_mes_parr_simon->Fields('acu_mes_parr_simon');

	$rs_homici_mes_parr_unare = $db->Execute($query_homici_mes_parr_unare);
	$acu_mes_parr_unare = "Barracuda7: " .$rs_homici_mes_parr_unare->Fields('acu_mes_parr_unare');

	$rs_homici_mes_parr_univer = $db->Execute($query_homici_mes_parr_univer);
	$acu_mes_parr_univer = "Barracuda8: " .$rs_homici_mes_parr_univer->Fields('acu_mes_parr_univer');

	$rs_homici_mes_parr_vista = $db->Execute($query_homici_mes_parr_vista);
	$acu_mes_parr_vista = "Barracuda9: " .$rs_homici_mes_parr_vista->Fields('acu_mes_parr_vista');

	$rs_homici_mes_parr_yoco = $db->Execute($query_homici_mes_parr_yoco);
	$acu_mes_parr_yoco = "Barracuda10: " .$rs_homici_mes_parr_yoco->Fields('acu_mes_parr_yoco');

	$query_sucesos = $db->Prepare("SELECT COUNT(fecha_suceso) AS tot_homi_mes, YEAR(now()) AS ano, MONTH(now()) AS mes,
		MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))AS mes_ant
		FROM sucesos AS s
		WHERE YEAR(fecha_suceso) = YEAR(now()) AND MONTH(fecha_suceso) = MONTH(now()) AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	$rs_sucesos = $db->Execute($query_sucesos);

	$tot_homi_car_mes = $rs_sucesos->Fields('tot_homi_mes');
	$ano = $rs_sucesos->Fields('ano');
	$mes = $rs_sucesos->Fields('mes');
	$mes_ant = $rs_sucesos->Fields('mes_ant');

	$tot_homi_car_mes_ant = tot_homi_caroni_mes_ant();
	$tot_homi_car_ano = tot_homi_caroni_ano();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Distribucion de Barracudas, Florida en este ejemplo o Segun el ZIP-CODE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyA0Cd8lxmZRjPd-JlX0WKhCX_BBjy8D4Yw" type="text/javascript"></script>

</head>
<body>
	<div class="panel panel-primary">
    <div class="col-md-1 col-sm-1  col-xs-1"></div>
		<div class="panel-heading" "col-md-10 col-sm-10  col-xs-10">Mapa Distribucion de Barracudas: Segun el Cliente: xxxx  con ZIP-CODE= xxxx,  Latitud= <?php echo $lat?> Longitud=<?php echo $lng?></div>
    <div class="col-md-1 col-sm-1  col-xs-1"></div>
    <div class="panel-body">
				<div class="col-md-1 col-sm-1  col-xs-1"></div>
				<div id="map" class="col-md-10 col-sm-10  col-xs-10" style="width: 740px; height: 500px;"></div>
				<div class="col-md-1 col-sm-1  col-xs-1"></div>
		</div>
	</div>



	<script type="text/javascript">
	//las parroquias
	var cachamay = "<?php echo $acu_mes_parr_cacha; ?>" ;
	var chirica = "<?php echo $acu_mes_parr_chi; ?>" ;
	var dallacosta = "<?php echo $acu_mes_parr_dalla; ?>" ;
	var oncedeabril = "<?php echo $acu_mes_parr_once; ?>" ;
	var pozoverde = "<?php echo $acu_mes_parr_pozo; ?>" ;
	var simonbolivar = "<?php echo $acu_mes_parr_simon; ?>" ;
	var unare = "<?php echo $acu_mes_parr_unare; ?>" ;
	var universidad = "<?php echo $acu_mes_parr_univer; ?>" ;
	var vistalsol = "<?php echo $acu_mes_parr_vista; ?>" ;
	var yocoima = "<?php echo $acu_mes_parr_yoco; ?>" ;


	var locations = [
	[cachamay, 28.544212, -81.372605, 10, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_cacha?>'],
	[chirica, 28.550000, -81.380172, 9, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_chi?>'],
	[dallacosta, 28.557010, -81.350530, 8, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_dalla?>'],
	[oncedeabril, 28.577535, -81.394282, 7, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_once?>'],
	[pozoverde, 28.531649, -81.408071, 6, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_pozo?>'],
	  [simonbolivar, 28.513300, -81.359200, 5, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_simon?>'],
	  [unare, 28.554400, -81.298600, 4, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_unare?>'],
	  [universidad, 28.464300, -81.401633, 3, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_uni?>'],
	  [vistalsol, 28.62400, -81.427900, 2, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_vista?>'],
	  [yocoima, 28.62400, -81.427900, 1, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_yoco?>']
	];

  
	var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 12,
	  center: new google.maps.LatLng(<?php echo $lat?>, <?php echo $lng?>),
	  panControl:true,
	  zoomControl:true,
	  mapTypeControl:true,
	  scaleControl:true,
	  streetViewControl:true,
	  overviewMapControl:true,
	  rotateControl:true,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	});
  
  //añadiendo el circulo
		var populationOptions = {
      strokeColor: "#0000FF",
		  strokeOpacity: 0.8,
		  strokeWeight: 2,
		  fillColor: '#FF0000  ',
		  fillOpacity: 0.35,
		  map: map,
	    center: new google.maps.LatLng(<?php echo $lat?>, <?php echo $lng?>),
		  radius: 2000
		};
		cityCircle = new google.maps.Circle(populationOptions);

	var infowindow;
	var marker, i;

	for (i = 0; i < locations.length; i++) {
	  marker = new google.maps.Marker({
		position: new google.maps.LatLng(locations[i][1], locations[i][2]),
		//url: 'http://www.google.com/',
		url:locations[i][4],
		map: map,
	  });

		//coloca marker, una window por cada parro
		infowindow = new google.maps.InfoWindow();
		infowindow.setContent(locations[i][0]);
		infowindow.open(map, marker);


	  google.maps.event.addListener(marker, 'click', (function(marker, i) {
		return function() {
		  infowindow.setContent(locations[i][0]);
		  infowindow.open(map, marker);
		  window.location.href = marker.url;
		}
	  })(marker, i));

	

	}

  </script>
</body>
</html>