<!DOCTYPE html>
<html> 
<head> 
	<title>Parroquias del Municipio Caroni, Estado Bolivar, Venezuela</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>
	<div class="panel panel-primary">
		<div class="panel-heading">Guayana Segura. Mapa Distribucion homicidios por Parroquia</div>
			<div class="panel-body">
				<div id="map" style="width: 940px; height: 550px;"></div>
			</div>
		</div>
	</div>

  <script type="text/javascript"> 
    //las parroquias
	var cachamay = 'Cachamay 2';
  var locations = [
      ['cachamay, 8.3098506927, -62.7175140380, 10],
      ['CHIRICA 5', 8.33380042232, -62.64884948730, 9],
      ['DALLA COSTA 1', 8.3366878397, -62.684726715, 8],
      ['ONCE DE ABRIL 2', 8.3633954392, -62.62794971466, 7],
      ['POZO VERDE 0', 8.16635769386, -62.6429915428, 6],
	  ['SIMON BOLIVAR 11', 8.35955288448, -62.6670885086, 5],
	  ['UNARE 5', 8.2677449421, -62.77351856231, 4],
	  ['UNIVERSIDAD 0', 8.27732165765, -62.72884368896, 3],
	  ['VISTA AL SOL 2', 8.3495111123, -62.6166200637, 2],
	  ['YOCOIMA 1', 8.27969987463, -62.56404876708, 1]
    ];
	
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: new google.maps.LatLng(8.31, -62.73),
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