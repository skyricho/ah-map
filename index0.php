<!DOCTYPE html>
<html>
  <head>
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

      #info-box {
        background-color: white;
        border: 1px solid black;
        bottom: 30px;
        height: 20px;
        padding: 10px;
        position: absolute;
        left: 30px;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <div id="info-box">?</div>
    <script>
      var map;
      function initMap() {
        var bounds = new google.maps.LatLngBounds();
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: new google.maps.LatLng(-33.78371,151.27346),
          mapTypeId: 'roadmap'
        });
      
        map.data.addListener('click', function(event) {
          map.data.overrideStyle(event.feature, {strokeWeight: 8});
          document.getElementById('info-box').textContent = 
          event.feature.getProperty('id');
        });

        map.data.addListener('addfeature', function(event) {  
          map.data.overrideStyle(event.feature, {
            icon: 'img/icons/' + event.feature.getProperty('imgFilename')            
          });
        });

        map.data.loadGeoJson('map.php?map=<?php echo $_GET['map']; ?>');
      
      // see https://stackoverflow.com/questions/1556921/google-map-api-v3-set-bounds-and-center
      var bounds = new google.maps.LatLngBounds();// bounds experiment line 1
      window.eqfeed_callback = function(results) {
        for (var i = 0; i < results.features.length; i++) {
          var coords = results.features[i].geometry.coordinates;
          var latLng = new google.maps.LatLng(coords[1],coords[0]);
          var marker = new google.maps.Marker({
            position: latLng,
            map: map
          });
          bounds.extend(latLng);// bounds experiment line 2
        }
        map.fitBounds(bounds);// bounds experiment line 3
      }
    }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpVcC59vC1O0WNy72B8HRJjWfCosGi3A8&callback=initMap">
    </script>
  </body>
</html>