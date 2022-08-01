<?php

	include_once 'connections/guayana_s.php';
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
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
	AND delito_detalle_id = 7 AND parroquia_id = $parro_cacha");

	//parroquias chirica
	$query_homici_mes_parr_chi = $db->Prepare("SELECT count(*) AS acu_mes_parr_chi
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
	AND delito_detalle_id = 7 AND parroquia_id = $parro_chi");

	//parroquias Dalla costa
	$query_homici_mes_parr_dalla = $db->Prepare("SELECT count(*) AS acu_mes_parr_dalla
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
	AND delito_detalle_id = 7 AND parroquia_id = $parro_dalla");

	//parroquias Once de Abril
	$query_homici_mes_parr_once = $db->Prepare("SELECT count(*) AS acu_mes_parr_once
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
	AND delito_detalle_id = 7 AND parroquia_id = $parro_once");

	//parroquias Pozo Verde
	$query_homici_mes_parr_pozo = $db->Prepare("SELECT count(*) AS acu_mes_parr_pozo
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
	AND delito_detalle_id = 7 AND parroquia_id = $parro_pozo");

	//parroquias Simon Bolivar
	$query_homici_mes_parr_simon = $db->Prepare("SELECT count(*) AS acu_mes_parr_simon
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
	AND delito_detalle_id = 7 AND parroquia_id = $parro_simon");

	//parroquias unare
	$query_homici_mes_parr_unare = $db->Prepare("SELECT count(*) AS acu_mes_parr_unare
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
	AND delito_detalle_id = 7 AND parroquia_id = $parro_unare");

	//parroquias universidad
	$query_homici_mes_parr_univer = $db->Prepare("SELECT count(*) AS acu_mes_parr_univer
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
	AND delito_detalle_id = 7 AND parroquia_id = $parro_uni");

	//parroquias Vista al Sol
	$query_homici_mes_parr_vista = $db->Prepare("SELECT count(*) AS acu_mes_parr_vista
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
	AND delito_detalle_id = 7 AND parroquia_id = $parro_vista");

	//parroquias Yocoima
	$query_homici_mes_parr_yoco = $db->Prepare("SELECT count(*) AS acu_mes_parr_yoco
	FROM `sucesos` AS s
	WHERE s.municipio_id = 3 AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
	AND delito_detalle_id = 7 AND parroquia_id = $parro_yoco");

	$query_fechas = $db->Prepare("SELECT year(now()) AS ano, Month(now()) AS mes");
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
	<title>Parroquias del Municipio Caroni, Estado Bolivar, Venezuela</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyA0Cd8lxmZRjPd-JlX0WKhCX_BBjy8D4Yw" type="text/javascript"></script>
  <style>
		.map-responsive{
			overflow:hidden;
			padding-bottom:56.25%;
			position:relative;
			margin: 0px 0px 0px 0px;
		}
		
    
	</style>
</head>
<body>

  <div class="map-responsive">
    <div id="map" style="width: 740px; height: 430px;"></div>
  </div>
	

    <script>
      // This example creates draggable triangles on the map.
      // Note also that the red triangle is geodesic, so its shape changes
      // as you drag it north or south.

      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: 8.3258, lng: -62.724651},
          mapTypeId: 'terrain'
        });

        var cachamayCoords = [
          {lat: 8.33414, lng: -62.71554}, 
          {lat: 8.33758, lng: -62.71425},
          {lat: 8.33932, lng: -62.71674}, 
          {lat: 8.3465, lng: -62.72111}, 
          {lat: 8.3423, lng: -62.74713}, 
          {lat: 8.33567, lng: -62.76481},
          {lat: 8.3359, lng: -62.76882},//   Intercecion unare cachamay  rio orinoco
          {lat: 8.31995, lng: -62.75879}, //
          {lat: 8.2920, lng: -62.7477}, //Makro  intercepcion unare cacha univer
          {lat: 8.30234, lng: -62.73138}, 
          {lat: 8.29908, lng: -62.72012}, 
          {lat: 8.30280, lng: -62.7047}, //parque cachamay
          {lat: 8.30951, lng: -62.6947},
          {lat: 8.31698, lng: -62.68301} //fin este
        ];

        var universidadCoords = [
          {lat: 8.30671, lng: -62.68439}, 
          {lat: 8.30251, lng: -62.67898}, 
          {lat: 8.29864, lng: -62.68267}, 
          {lat: 8.28463, lng: -62.68868}, 
          {lat: 8.28132, lng: -62.70044}, 
          {lat: 8.27512, lng: -62.71116}, 
          {lat: 8.27134, lng: -62.7181}, 
          {lat: 8.26365, lng: -62.7197}, 
          {lat: 8.25724, lng: -62.71882}, 
          {lat: 8.2495, lng: -62.71734}, 
          {lat: 8.24266, lng: -62.72021}, 
          {lat: 8.2428, lng: -62.7376}, //fin unare este rio  intercecio unare universida
          {lat: 8.2497, lng: -62.7363}, // primera arriba
          {lat: 8.2575, lng: -62.7327}, // segunda arriba
          {lat: 8.2665, lng: -62.7361}, 
          {lat: 8.2734, lng: -62.7368}, 
          {lat: 8.2766, lng: -62.73292}, //mas al este unare
          {lat: 8.2830, lng: -62.7403}, 
          {lat: 8.28635, lng: -62.744722}, //Terminal
          {lat: 8.2920, lng: -62.7477}, //Makro  intercepcion unare cacha univer
          {lat: 8.30234, lng: -62.73138}, 
          {lat: 8.29933, lng: -62.71849}, 
          {lat: 8.301, lng: -62.71016}, 
          {lat: 8.30121, lng: -62.70698}, 
          {lat: 8.3026, lng: -62.7038}, 
          {lat: 8.30573, lng: -62.69744}, 
          {lat: 8.31106, lng: -62.69014}, 
          {lat: 8.31232, lng: -62.68662}
        ];

        var unareCoords = [
          {lat: 8.18669, lng: -62.92849}, 
          {lat: 8.14567, lng: -62.94733}, 
          {lat: 8.12726, lng: -62.90351}, 
          {lat: 8.13818, lng: -62.88574}, 
          {lat: 8.14255, lng: -62.87364}, 
          {lat: 8.14183, lng: -62.86188}, 
          {lat: 8.15517, lng: -62.85098}, 
          {lat: 8.15474, lng: -62.84695}, 
          {lat: 8.16014, lng: -62.84495}, 
          {lat: 8.16564, lng: -62.83906}, 
          //{lat: 8.17794, lng: -62.84073}, 
          {lat: 8.1681, lng: -62.82569}, 
          {lat: 8.15987, lng: -62.81936}, 
          {lat: 8.15911, lng: -62.81372}, 
          {lat: 8.16345, lng: -62.80704}, 
          {lat: 8.20436, lng: -62.7988}, 
          {lat: 8.24161, lng: -62.76808}, 
          {lat: 8.2428, lng: -62.7376}, //fin unare este rio
          {lat: 8.2497, lng: -62.7363}, // primera arriba
          {lat: 8.2575, lng: -62.7327}, // segunda arriba
          {lat: 8.2665, lng: -62.7361}, 
          {lat: 8.2734, lng: -62.7368}, 
          {lat: 8.2766, lng: -62.73292}, //mas al este unare
          {lat: 8.2830, lng: -62.7403}, 
          {lat: 8.28635, lng: -62.744722}, //Terminal
          {lat: 8.2920, lng: -62.7477}, //Makro
          {lat: 8.2950, lng: -62.7493}, 
          {lat: 8.31995, lng: -62.75879}, // 
          {lat: 8.3359, lng: -62.76882},//   Intercecion unare cachamay  rio orinoco
          {lat: 8.32818, lng: -62.80611}, 
          {lat: 8.31983, lng: -62.812}, 
          {lat: 8.30024, lng: -62.82774}, 
          {lat: 8.2839, lng: -62.85211}, 
          {lat: 8.2736, lng: -62.86472}, 
          {lat: 8.27084, lng: -62.87292}, 
          {lat: 8.26599, lng: -62.90106}, 
          {lat: 8.27902, lng: -62.94557}, 
          {lat: 8.2514, lng: -62.95967}, 
          {lat: 8.22581, lng: -62.97256}, 
          {lat: 8.21101, lng: -62.95988}, 
          {lat: 8.20904, lng: -62.93732}
        ];

        var dallacostaCoords = [
          {lat: 8.34050, lng: -62.71189}, //Intercon Puente Angosturita dalla con simon bolivar
          {lat: 8.32598, lng: -62.69794}, //campo rojo
          {lat: 8.32309, lng: -62.69142}, //Puente Campo Rojo
          {lat: 8.31902, lng: -62.66601}, //Puente Macagua
          {lat: 8.31664, lng: -62.65932}, 
          {lat: 8.27638, lng: -62.67082}, //FRENTE AL ITALO
          {lat: 8.25388, lng: -62.70915},// Toma de agua toromuerto
          {lat: 8.25000, lng: -62.70915},// Fin sur     
          {lat: 8.24844, lng: -62.68773},// Fin sur 2    
          {lat: 8.27859, lng: -62.65760},// intermedio
          {lat: 8.28938, lng: -62.63668}, // Limite yocoima frent a fracisca duarte
          {lat: 8.29201, lng: -62.63701}, // en via al pao 
          {lat: 8.31976, lng: -62.6422}, //Buen retiro
          {lat: 8.33201, lng: -62.64478}, //Cementerio semaforo bomba 
          {lat: 8.33847, lng: -62.65588}, //Redoma el dorado
          {lat: 8.34220, lng: -62.67554}, //Doña Barbara
          {lat: 8.34815, lng: -62.68884}, //Bomba Borges
        ];

        var simonbolivarCoords = [
          {lat: 8.34815, lng: -62.68884}, //Bomba Borges
          {lat: 8.34220, lng: -62.67554}, //Doña Barbara
          {lat: 8.33847, lng: -62.65588}, //Redoma el dorado
          {lat: 8.34416, lng: -62.65056}, //alcacranes hidrobolivar
          {lat: 8.36089, lng: -62.64888}, //mercado el gallo bajando
          {lat: 8.36131, lng: -62.64644}, //cerro el gallo bajando
          {lat: 8.36522, lng: -62.64287}, //cerro el gallo
          {lat: 8.36751, lng: -62.64754}, //batallas pricipal
          {lat: 8.37192, lng: -62.65262}, //batallas
          {lat: 8.37944, lng: -62.65850}, //Intercon muelle san felix con 11deabril
          {lat: 8.34891, lng: -62.71605}, //limite norte
          {lat: 8.34050, lng: -62.71189}, //Intercon Puente Angosturita dalla con simon bolivar
        ];

        var chiricaCoords = [
          {lat: 8.33847, lng: -62.65588}, //Redoma el dorado
          {lat: 8.34416, lng: -62.65056}, //alcacranes hidrobolivar
          {lat: 8.36089, lng: -62.64888}, //mercado el gallo bajando
          {lat: 8.36131, lng: -62.64644}, //cerro el gallo bajando
          {lat: 8.36522, lng: -62.64287}, //cerro el gallo
          {lat: 8.36377, lng: -62.63925}, //cerro el gallo americas
          {lat: 8.36052, lng: -62.63412}, //once d abri 1 mayoo   BOD
          {lat: 8.32594, lng: -62.62435}, //entrada a trapichito
          {lat: 8.31562, lng: -62.61726}, //cruce rosario 
          {lat: 8.29859, lng: -62.59852}, //Limite yocoima este via a upata
          {lat: 8.28657, lng: -62.61219}, //chirica vieja adentro
          {lat: 8.28938, lng: -62.63668}, //Limite yocoima frent a fracisca duarte
          {lat: 8.31613, lng: -62.6418}, //Buen retiro
          {lat: 8.31976, lng: -62.6422}, //Buen retiro
          {lat: 8.33201, lng: -62.64478}, //Cementerio semaforo bomba 
        ];

        var pozoverdeCoords = [
          {lat: 8.25000, lng: -62.70915},// Ftrente a Toro Muerto  planta Acueducto     
          {lat: 8.24844, lng: -62.68773},// Bahia 
          {lat: 8.27859, lng: -62.65760},// intermedio 
          {lat: 8.28938, lng: -62.63668}, //Limite yocoima frent a fracisca duarte
   
          {lat: 8.27859, lng: -62.65760},// intermedio Interseccion dallacosta 
          {lat: 8.28938, lng: -62.63668}, //Limite yocoima frent a fracisca duarte
  
          {lat: 8.28921, lng: -62.63651}, // en via al pao curva 1

          {lat: 8.28708, lng: -62.63408}, // en via al pao curva 2
          {lat: 8.28369, lng: -62.62915}, // en via al pao 8.206053440215015,-62.7985382080078

          {lat: 8.27793, lng: -62.62584}, // en via al pao curva 5
          {lat: 8.27793, lng: -62.62584}, // en via al pao curva 6
          {lat: 8.25666, lng: -62.62086}, // en via al pao curva 6
          {lat: 8.23204, lng: -62.61589}, // en via al pao curva 7
          {lat: 8.16049, lng: -62.6417},// Pozo verde     
          {lat: 8.15643, lng: -62.79441}, // Fin sur  Carhuachi
          {lat: 8.20843, lng: -62.77414},// Frente Tierra nueva   
        ];

        var yocoimaCoords = [
          {lat: 8.28938, lng: -62.63668}, // Limite yocoima frent a fracisca duarte
          {lat: 8.28708, lng: -62.63408}, // en via al pao curva 2
          {lat: 8.28369, lng: -62.62915}, // en via al pao 8.206053440215015,-62.7985382080078
          {lat: 8.27793, lng: -62.62584}, // en via al pao curva 5
          {lat: 8.25666, lng: -62.62086}, // en via al pao curva 6
          {lat: 8.23204, lng: -62.61589}, // en via al pao curva 7
          {lat: 8.16049, lng: -62.6417},// Pozo verde     
          {lat: 8.22994, lng: -62.50742},// Limite norte    
          
          {lat: 8.27541, lng: -62.33053},// Limite norte  este 
          {lat: 8.35752, lng: -62.47076}, //limite norte delta amacuro yocoima

          {lat: 8.34543, lng: -62.59855}, //la  Victoria
          {lat: 8.34212, lng: -62.60198}, //la  Victoria
         
          {lat: 8.33312, lng: -62.60334}, //Traíchito
          {lat: 8.32495, lng: -62.6150}, // mas abajos de trapichitoTraíchito

          {lat: 8.31562, lng: -62.61726}, //cruce rosario
          {lat: 8.29859, lng: -62.59852}, //Limite yocoima este via a upata
          {lat: 8.28657, lng: -62.61219}, //chirica vieja adentro                     
        ];

        var vistalsolCoords = [
          {lat: 8.31562, lng: -62.61726}, //cruce rosario mas adelant 
          {lat: 8.32495, lng: -62.6150}, // mas abajos de trapichitoTraíchito
          {lat: 8.33312, lng: -62.60334}, //Traíchito
          {lat: 8.34212, lng: -62.60198}, //la  Victoria
          {lat: 8.34543, lng: -62.59855}, //la  Victoria
          {lat: 8.35384, lng: -62.6057}, //la  granja
          {lat: 8.36377, lng: -62.6057}, //limite con 5 julio canal
          {lat: 8.37873, lng: -62.60672}, //limite con 5 julio terminal d busetas
          {lat: 8.37723, lng: -62.61652}, //limite con 11 de abril
          {lat: 8.36745, lng: -62.61498}, //curva mas abajo d casa d madera
          {lat: 8.35825, lng: -62.61881}, //csade madera
          {lat: 8.35504, lng: -62.63239}, //Villa la manga
          {lat: 8.32594, lng: -62.62435}, //entrada a trapichito
            
        ];

        var oncedeabrilCoords = [
          {lat: 8.38712, lng: -62.59117}, //limite con Vistal sol mas al nort la sierra
          {lat: 8.37873, lng: -62.60672}, //limite con 5 julio terminal d busetas
          {lat: 8.37723, lng: -62.61652}, //limite vista al sol 11 de abril
          {lat: 8.36745, lng: -62.61498}, //curva mas abajo d casa d madera
          {lat: 8.35825, lng: -62.61881}, //csade madera
          {lat: 8.35504, lng: -62.63239}, //Villa la manga
          {lat: 8.36114, lng: -62.63457}, //BOD
          {lat: 8.36522, lng: -62.64287}, //Villa la manga
          {lat: 8.36751, lng: -62.64754}, //batallas pricipal
          {lat: 8.37192, lng: -62.65262}, //batallas
          {lat: 8.37944, lng: -62.65850}, //Intercon muelle san felix con 11deabril
          {lat: 8.38981, lng: -62.63924}, //
          {lat: 8.39847, lng: -62.62947}, //limite norte Rio 
          {lat: 8.42508, lng: -62.60854}, //limite norte Rio Claro
          {lat: 8.38952, lng: -62.53555}, //limite norte Rio Claro
            
        ];

        var cincodejulioCoords = [
          {lat: 8.34543, lng: -62.59855}, //la  Victoria
          {lat: 8.35384, lng: -62.6057}, //la  granja
          {lat: 8.36377, lng: -62.6057}, //limite con 5 julio canal
          {lat: 8.37873, lng: -62.60672}, //limite con 5 julio terminal d busetas
          {lat: 8.38713, lng: -62.59121}, //limite con 11 de abril
          {lat: 8.38712, lng: -62.59117}, //limite con 11 de mas al nort la sierra
          {lat: 8.38952, lng: -62.53555}, //limite norte delta amacuro 1
          {lat: 8.35752, lng: -62.47076}, //limite norte delta amacuro yocoima            
        ];


        // Construct a draggable red triangle with geodesic set to true.
        new google.maps.Polygon({
          map: map,
          paths: universidadCoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35,
          draggable: false,
          geodesic: true
        });

        // Construct a draggable blue triangle with geodesic set to false.
        new google.maps.Polygon({
          map: map,
          paths: cachamayCoords,
          strokeColor: '#0000FF',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#0000FF',
          fillOpacity: 0.35,
          draggable: false,
          geodesic: false
        });

        new google.maps.Polygon({
          map: map,
          paths: unareCoords,
          strokeColor: '#32FE38',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#32FE38',
          fillOpacity: 0.35,
          draggable: false,
          geodesic: true
        });

        new google.maps.Polygon({
          map: map,
          paths: dallacostaCoords,
          strokeColor: '#A52A2A',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#A52A2A',
          fillOpacity: 0.35,
          draggable: false,
          geodesic: true
        });

        new google.maps.Polygon({
          map: map,
          paths: simonbolivarCoords,
          strokeColor: '#FFA500',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FFA500',
          fillOpacity: 0.35,
          draggable: false,
          geodesic: true
        });

        new google.maps.Polygon({
          map: map,
          paths: chiricaCoords,
          strokeColor: '#4169E1',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#4169E1',
          fillOpacity: 0.35,
          draggable: false,
          geodesic: true
        });

        new google.maps.Polygon({
          map: map,
          paths: pozoverdeCoords,
          strokeColor: '#FFFF00',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FFFF00',
          fillOpacity: 0.35,
          draggable: false,
          geodesic: true
        });

        new google.maps.Polygon({
          map: map,
          paths: yocoimaCoords,
          strokeColor: '#EE82EE',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#EE82EE',
          fillOpacity: 0.35,
          draggable: false,
          geodesic: true
        });

        new google.maps.Polygon({
          map: map,
          paths: vistalsolCoords,
          strokeColor: '#B22222',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#B22222',
          fillOpacity: 0.35,
          draggable: false,
          geodesic: true
        });

        new google.maps.Polygon({
          map: map,
          paths: oncedeabrilCoords,
          strokeColor: '#006400',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#006400',
          fillOpacity: 0.35,
          draggable: false,
          geodesic: true
        });

        new google.maps.Polygon({
          map: map,
          paths: cincodejulioCoords,
          strokeColor: '#2F4F4F',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#2F4F4F',
          fillOpacity: 0.35,
          draggable: false,
          geodesic: true
        });
        

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
          [cachamay, 8.3108506927, -62.7375140380, 10, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_cacha?>'],
          [chirica, 8.32080042232, -62.63884948730, 9, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_chi?>'],
          [dallacosta, 8.33, -62.694726715, 8, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_dalla?>'],
          [oncedeabril, 8.3603954392, -62.62794971466, 7, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_once?>'],
          [pozoverde, 8.259059870475873, -62.63533187866211, 6, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_pozo?>'],
          [simonbolivar, 8.34655288448, -62.6670885086, 5, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_simon?>'],
          [unare, 8.2677449421, -62.77351856231, 4, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_unare?>'],
          [universidad, 8.27232165765, -62.72884368896, 3, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_uni?>'],
          [vistalsol, 8.3355111123, -62.6166200637, 2, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_vista?>'],
          [yocoima, 8.30369987463, -62.60204876708, 1, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=<?php echo $ano?>&mes=<?php echo $mes?>&parro=<?php echo $parro_yoco?>']
        ];
        console.log(locations);
        for (i = 0; i < locations.length; i++) {
          var marker = new google.maps.Marker({
              animation: google.maps.Animation.DROP,
              label: {
                  text: '+'
              },
              url:locations[i][4],
              map: map,
              position: new google.maps.LatLng(locations[i][1], locations[i][2])
              //position: map.getCenter()
          });
          //coloca marker, una window por cada parro
          infowindow = new google.maps.InfoWindow();
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
          

          //url al marcador
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
            var url= marker.url;
            //window.location.href = marker.url;
            window.open(url,'_blank');
          }
          })(marker, i));

        }
        

        

      }
    </script>
    <script 
      async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEOrxkZ8QcVLGQ3SCJHqoT8rGLf_vC0to&callback=initMap">
    </script>
  </body>
</html>