<?php
	include_once '../connections/guayana_s.php';
	//PAra un mes anterior al actual
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC); 

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
	
	

	//parroquias cachamay
	$query_homici_mes_parr_cacha = $db->Prepare("SELECT count(*) AS acu_mes_parr_cacha
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) 
	AND delito_detalle_id = 7 AND parroquia_id = $parro_cacha");

	//parroquias chirica
	$query_homici_mes_parr_chi = $db->Prepare("SELECT count(*) AS acu_mes_parr_chi
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) 
	AND delito_detalle_id = 7 AND parroquia_id = $parro_chi");

	//parroquias Dalla costa
	$query_homici_mes_parr_dalla = $db->Prepare("SELECT count(*) AS acu_mes_parr_dalla
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) 
	AND delito_detalle_id = 7 AND parroquia_id = $parro_dalla");

	//parroquias Once de Abril
	$query_homici_mes_parr_once = $db->Prepare("SELECT count(*) AS acu_mes_parr_once
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) 
	AND delito_detalle_id = 7 AND parroquia_id = $parro_once");

	//parroquias Pozo Verde
	$query_homici_mes_parr_pozo = $db->Prepare("SELECT count(*) AS acu_mes_parr_pozo
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) 
	AND delito_detalle_id = 7 AND parroquia_id = $parro_pozo");

	//parroquias Simon Bolivar
	$query_homici_mes_parr_simon = $db->Prepare("SELECT count(*) AS acu_mes_parr_simon
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) 
	AND delito_detalle_id = 7 AND parroquia_id = $parro_simon");

	//parroquias unare
	$query_homici_mes_parr_unare = $db->Prepare("SELECT count(*) AS acu_mes_parr_unare
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) 
	AND delito_detalle_id = 7 AND parroquia_id = $parro_unare");

	//parroquias universidad
	$query_homici_mes_parr_univer = $db->Prepare("SELECT count(*) AS acu_mes_parr_univer
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) 
	AND delito_detalle_id = 7 AND parroquia_id = $parro_uni");

	//parroquias Vista al Sol
	$query_homici_mes_parr_vista = $db->Prepare("SELECT count(*) AS acu_mes_parr_vista
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) 
	AND delito_detalle_id = 7 AND parroquia_id = $parro_vista");

	//parroquias Yocoima
	$query_homici_mes_parr_yoco = $db->Prepare("SELECT count(*) AS acu_mes_parr_yoco
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) 
	AND delito_detalle_id = 7 AND parroquia_id = $parro_yoco");

	$query_fechas = $db->Prepare("SELECT year(now()) AS ano, MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)) AS mes");
	$rs_fechas = $db->Execute($query_fechas);
	$ano = $rs_fechas->Fields('ano');
	$mes = $rs_fechas->Fields('mes');

	//parroquias
	$rs_homici_mes_parr_cacha = $db->Execute($query_homici_mes_parr_cacha);
	$acu_mes_parr_cacha = "Cachamay: " .$rs_homici_mes_parr_cacha->Fields('acu_mes_parr_cacha');

	$rs_homici_mes_parr_chi = $db->Execute($query_homici_mes_parr_chi);
	$acu_mes_parr_chi = "Chirica: " .$rs_homici_mes_parr_chi->Fields('acu_mes_parr_chi');

	$rs_homici_mes_parr_dalla = $db->Execute($query_homici_mes_parr_dalla);
	$acu_mes_parr_dalla = "Dalla Costa: " .$rs_homici_mes_parr_dalla->Fields('acu_mes_parr_dalla');

	$rs_homici_mes_parr_once = $db->Execute($query_homici_mes_parr_once);
	$acu_mes_parr_once = "Once de Abril: " .$rs_homici_mes_parr_once->Fields('acu_mes_parr_once');

	$rs_homici_mes_parr_pozo = $db->Execute($query_homici_mes_parr_pozo);
	$acu_mes_parr_pozo = "Pozo Verde: " .$rs_homici_mes_parr_pozo->Fields('acu_mes_parr_pozo');

	$rs_homici_mes_parr_simon = $db->Execute($query_homici_mes_parr_simon);
	$acu_mes_parr_simon = "Simon Bolivar: " .$rs_homici_mes_parr_simon->Fields('acu_mes_parr_simon');

	$rs_homici_mes_parr_unare = $db->Execute($query_homici_mes_parr_unare);
	$acu_mes_parr_unare = "Unare: " .$rs_homici_mes_parr_unare->Fields('acu_mes_parr_unare');

	$rs_homici_mes_parr_univer = $db->Execute($query_homici_mes_parr_univer);
	$acu_mes_parr_univer = "Universidad: " .$rs_homici_mes_parr_univer->Fields('acu_mes_parr_univer');

	$rs_homici_mes_parr_vista = $db->Execute($query_homici_mes_parr_vista);
	$acu_mes_parr_vista = "Vista al Sol: " .$rs_homici_mes_parr_vista->Fields('acu_mes_parr_vista');

	$rs_homici_mes_parr_yoco = $db->Execute($query_homici_mes_parr_yoco);
	$acu_mes_parr_yoco = "Yocoima: " .$rs_homici_mes_parr_yoco->Fields('acu_mes_parr_yoco');

?>

<html>
	<head>
	<link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
	
	<style>
		html, body, #map-canvas  {
		  margin: 0;
		  padding: 0;
		  height: 100%;
		}

		#map-canvas {
		  width:500px;
		  height:480px;
		}
	</style>
	
	</head>
	<script>	
		//las parroquias
		var cachamay = "<?php echo 5; ?>" ;
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
		[cachamay, 8.3098506927, -62.7175140380, 10, '../sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_cacha?>'],
		[chirica, 8.33380042232, -62.64884948730, 9, '../sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_chi?>'],
		[dallacosta, 8.3366878397, -62.684726715, 8, '../sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_dalla?>'],
		[oncedeabril, 8.3633954392, -62.62794971466, 7, '../sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_once?>'],
		[pozoverde, 8.259059870475873, -62.62533187866211, 6, '../sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_pozo?>'],
		  [simonbolivar, 8.35955288448, -62.6670885086, 5, '../sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_simon?>'],
		  [unare, 8.2677449421, -62.77351856231, 4, '../sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_unare?>'],
		  [universidad, 8.27732165765, -62.72884368896, 3, '../sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_uni?>'],
		  [vistalsol, 8.3495111123, -62.6166200637, 2, '../sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_vista?>'],
		  [yocoima, 8.27969987463, -62.56404876708, 1, '../sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_yoco?>']
		];
		
		function initialize() {
		
			var infowindow;
			var marker, i;
	
			var map = new google.maps.Map(document.getElementById('map-canvas'), {
			  zoom: 12,
			  center: new google.maps.LatLng(8.315, -62.68),
			  panControl:true,
			  zoomControl:true,
			  mapTypeControl:true,
			  scaleControl:true,
			  streetViewControl:true,
			  overviewMapControl:true,
			  rotateControl:true,    
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			});
			
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

			//añadiendo el circulo
				var populationOptions = {
				  strokeColor: '#FF0000  ',
				  strokeOpacity: 0.8,
				  strokeWeight: 2,
				  fillColor: '#FF0000  ',
				  fillOpacity: 0.35,
				  map: map,
				  center: marker.getPosition(),
				  radius: 2000
				};
				cityCircle = new google.maps.Circle(populationOptions);

			}
			
		};
		
		
		google.maps.event.addDomListener(window, 'load', initialize);

		google.maps.event.addDomListener(window, "resize", resizingMap());

		$('#myMapModal').on('show.bs.modal', function() {
		   //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
		   resizeMap();
		})

		function resizeMap() {
		   if(typeof map =="undefined") return;
		   setTimeout( function(){resizingMap();} , 400);
		}

		function resizingMap() {
		   if(typeof map =="undefined") return;
		   var center = map.getCenter();
		   google.maps.event.trigger(map, "resize");
		   map.setCenter(center); 
		}
	</script>
<body>
	<h1 class="">Lazy Load Google Map</h1> 
	<a href="#myMapModal" class="btn" data-toggle="modal">Launch Map Modal</a>

	<div class="modal fade" id="myMapModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					 <h4 class="modal-title">Modal title</h4>

				</div>
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div id="map-canvas" class=""></div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</body>
</html>


