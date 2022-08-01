<?php

  include_once 'connections/guayana_s.php';
  $conexion=new Conexion();
  $db=$conexion->getDbConn();
  $db->debug = false;
  $db->SetFetchMode(ADODB_FETCH_ASSOC); 

  //parroquias cachamay
  $query_homici_mes_parr_cacha = $db->Prepare("SELECT count(*) AS acu_mes_parr_cacha
    FROM `sucesos` AS s
    WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now()) 
    AND delito_detalle_id = 7 AND parroquia_id = 731");

  //parroquias chirica
  $query_homici_mes_parr_chi = $db->Prepare("SELECT count(*) AS acu_mes_parr_chi
    FROM `sucesos` AS s
    WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now()) 
    AND delito_detalle_id = 7 AND parroquia_id = 732");

  //parroquias Dalla costa
  $query_homici_mes_parr_dalla = $db->Prepare("SELECT count(*) AS acu_mes_parr_dalla
    FROM `sucesos` AS s
    WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now()) 
    AND delito_detalle_id = 7 AND parroquia_id = 733");
  
  //parroquias Once de Abril
  $query_homici_mes_parr_once = $db->Prepare("SELECT count(*) AS acu_mes_parr_once
    FROM `sucesos` AS s
    WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now()) 
    AND delito_detalle_id = 7 AND parroquia_id = 734");
  
  //parroquias Pozo Verde
  $query_homici_mes_parr_pozo = $db->Prepare("SELECT count(*) AS acu_mes_parr_pozo
    FROM `sucesos` AS s
    WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now()) 
    AND delito_detalle_id = 7 AND parroquia_id = 735");
  
  //parroquias Simon Bolivar
  $query_homici_mes_parr_simon = $db->Prepare("SELECT count(*) AS acu_mes_parr_simon
    FROM `sucesos` AS s
    WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now()) 
    AND delito_detalle_id = 7 AND parroquia_id = 736");
  
  //parroquias unare
  $query_homici_mes_parr_unare = $db->Prepare("SELECT count(*) AS acu_mes_parr_unare
    FROM `sucesos` AS s
    WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now()) 
    AND delito_detalle_id = 7 AND parroquia_id = 737");
  
  //parroquias universidad
  $query_homici_mes_parr_univer = $db->Prepare("SELECT count(*) AS acu_mes_parr_univer
    FROM `sucesos` AS s
    WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now()) 
    AND delito_detalle_id = 7 AND parroquia_id = 738");
  
  //parroquias Vista al Sol
  $query_homici_mes_parr_vista = $db->Prepare("SELECT count(*) AS acu_mes_parr_vista
    FROM `sucesos` AS s
    WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now()) 
    AND delito_detalle_id = 7 AND parroquia_id = 739");
  
  //parroquias Yocoima
  $query_homici_mes_parr_yoco = $db->Prepare("SELECT count(*) AS acu_mes_parr_yoco
    FROM `sucesos` AS s
    WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now()) 
    AND delito_detalle_id = 7 AND parroquia_id = 7310");

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

<!DOCTYPE html>
<html> 
<head> 
	<title>Parroquias del Municipio Caroni, Estado Bolivar, Venezuela</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>
	<div class="panel panel-primary">
		<div class="panel-heading">Guayana Segura. Mapa Distribucion Acumulada de homicidios por Parroquias, Municipio Caroni, Mes Actual</div>
			<div class="panel-body">
				<div id="map" style="width: 840px; height: 400px;"></div>
			</div>
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
    [cachamay, 8.3098506927, -62.7175140380, 10],
    [chirica, 8.33380042232, -62.64884948730, 9],
    [dallacosta, 8.3366878397, -62.684726715, 8],
    [oncedeabril, 8.3633954392, -62.62794971466, 7],
    [pozoverde, 8.259059870475873, -62.62533187866211, 6],
	  [simonbolivar, 8.35955288448, -62.6670885086, 5],
	  [unare, 8.2677449421, -62.77351856231, 4],
	  [universidad, 8.27732165765, -62.72884368896, 3],
	  [vistalsol, 8.3495111123, -62.6166200637, 2],
	  [yocoima, 8.27969987463, -62.56404876708, 1]
    ];
	
    var map = new google.maps.Map(document.getElementById('map'), {
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

    var infowindow = new google.maps.InfoWindow();
	var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
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
		
  </script>
</body>
</html>