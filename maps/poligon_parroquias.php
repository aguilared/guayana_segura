<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Draggable Polygons</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      // This example creates draggable triangles on the map.
      // Note also that the red triangle is geodesic, so its shape changes
      // as you drag it north or south.

      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: 8.285465, lng: -62.719059},
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

        // Construct a draggable blue triangle with geodesic set to false.
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

        var cachamay = "Cachamay: 8";
        var chirica = "chirica 10" ;
        var dallacosta = "Dallacosta 15" ;
        var oncedeabril = "oncedeabril 7" ;
        var pozoverde = "pozoverde 2" ;
        var simonbolivar = "simonbolivar 4" ;
        var unare = "unare 20" ;
        var universidad = "universidad 4" ;
        var vistalsol = "vistalsol 12" ;
        var yocoima = "yocoima 2" ;
        var i  = 1;
        

        var locations = [
          [cachamay, 8.3098506927, -62.7175140380, 10, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=  >'],
          [chirica, 8.33380042232, -62.64884948730, 9, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=  '],
          [dallacosta, 8.3366878397, -62.684726715, 8, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=  '],
          [oncedeabril, 8.3633954392, -62.62794971466, 7, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=  '],
          [pozoverde, 8.259059870475873, -62.62533187866211, 6, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=  '],
          [simonbolivar, 8.35955288448, -62.6670885086, 5, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=  '],
          [unare, 8.2677449421, -62.77351856231, 4, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=  '],
          [universidad, 8.27732165765, -62.72884368896, 3, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=  '],
          [vistalsol, 8.3495111123, -62.6166200637, 2, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=  '],
          [yocoima, 8.27969987463, -62.56404876708, 1, 'sucesos/lis_homicidios_con_ano_mes_caro_parro.php?ano=  ']
        ];
        
        for (i = 0; i < locations.length; i++) {
          var marker = new google.maps.Marker({
              animation: google.maps.Animation.DROP,
              label: {
                  text: '!'
              },
              map: map,
              position: new google.maps.LatLng(locations[i][1], locations[i][2])
              //position: map.getCenter()
          });
          //coloca marker, una window por cada parro
          infowindow = new google.maps.InfoWindow();
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);


        }
        

        

      }
    </script>
    <script 
      async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEOrxkZ8QcVLGQ3SCJHqoT8rGLf_vC0to&callback=initMap">
    </script>
  </body>
</html>