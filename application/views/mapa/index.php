<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
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
      .margintop{
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
          <?=$buscador;?>
      </div>
    </div>
    <div id="map"></div>
    <script src="http://jawj.github.io/OverlappingMarkerSpiderfier/bin/oms.min.js"></script> //added the file
    <script src="<?= base_url('assets/js/mapa/mapa.js') ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDr-mxcs6tJeQWzLDQHLzefGqB79Clbj0I&callback=initMap"
    async defer>
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </body>
</html>