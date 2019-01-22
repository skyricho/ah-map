<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    <button id="check" type="button" name="button"> click</button>
    <script>

      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          //zoom: 18,
          //center: new google.maps.LatLng(-33.78371,151.27346),
          mapTypeId: 'roadmap'
        });

        $.get("map.php?map=<?php echo $_GET['map'] ?>", function(result){
          console.log(result)
          setMarkers(map,result.features);
        })

      function setMarkers(map,locations){
        var bounds = new google.maps.LatLngBounds();// bounds experiment line 1
          for (var i = 0; i < locations.length; i++) {
            var coords = locations[i].geometry.coordinates;
            var latLng = new google.maps.LatLng(coords[1],coords[0]);
            var icon = locations[i].properties.imgFilename;
            var marker = new google.maps.Marker({
              position: latLng,
              map: map, 
              icon: 'https://qc.r2labs.com/ah-map/img/icons/' + icon
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
