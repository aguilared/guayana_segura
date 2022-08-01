<?php
$latitud = $_GET['latitud'];
$longitud = $_GET['longitud'];
$parroquia = $_GET['parroquia'];
$homic = $_GET['homic'];
//$latitud = $_GET['8.298102254726853'];
//$longitud = $_GET['62.73571014404297'];

?>

<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    html, body { height: 90%; margin: 0; padding: 0;}
    #map-canvas { height: 100%; margin: 0; padding: 0;}
    #abajo-mapa {height: 10px; background-color: black;}
  </style>
</head>
<body>

  <div id="map-canvas" style="display: none;"></div>
    
  <script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBybrNGGcfaWIkR_53AnYfUOszJUI-fKLA">
  </script>
  <script src="jquery-1.11.3.js"></script>
  <script src="jquery-migrate-1.2.1.min.js"></script>

  <script type="text/javascript">

    function initialize() {

      $( "#map-canvas" ).fadeIn( 1000 );

      /*INICIALIZAMOS EL MAPA*/
		var parroquia = "<?php echo $parroquia.". Homici: ".$homic; ?>";
		var latitud = <?php echo $latitud; ?>;
		var longitud = <?php echo $longitud; ?>;
		var mapOptions = {
        center: { lat: latitud, lng: longitud},
        zoom: 12,
		mapTypeControl: true,
		mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        position: google.maps.ControlPosition.TOP_CENTER
		},
		zoomControl: true,
		zoomControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		scaleControl: true,
		streetViewControl: true,
		streetViewControlOptions: {
			position: google.maps.ControlPosition.LEFT_TOP
		}
      };
	  
      var map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);

      /*MARCADOR INICIAL*/

      var marcador = new google.maps.Marker({
		  icon:'../img/blue-dot.png',
		  position: new google.maps.LatLng(latitud, longitud),
		  map: map,
		  title:'Ubicacion',
		  animation: google.maps.Animation.DROP

      });
	  
	  /*AGREGAMOS EL CIRCULO*/

        var populationOptions = {
          strokeColor: '#FF0000  ',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000  ',
          fillOpacity: 0.35,
          map: map,
          center: marcador.getPosition(),
          radius: 2500
        };
        
        cityCircle = new google.maps.Circle(populationOptions);

      /*DIALOGO TOLTIP DEL MARCADOR INICIAL*/

      var infowindow = new google.maps.InfoWindow({ content: parroquia });
      google.maps.event.addListener(marcador, 'click', function() {
          infowindow.open(map,marcador);
      });        
      infowindow.open(map,marcador);


        

    }      

    //google.maps.event.addDomListener(window, 'load', initialize);

  </script>
	<script type="text/javascript">initialize()</script>
</body>
</html>