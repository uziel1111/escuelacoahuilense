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
    <!-- BUSCADOR IMPLEMENTADO EN OTRA VISTA -->
    <div class="container">
      <div class="row">
          <?=$buscador;?>
      </div>
    </div>

    <!-- DIV DE IMAGENES -->
    <div class="container-fluid margintop">
      <div class="row">
        <div class="col">
          <label><img src="../../assets/img/markets/marker1.png" width="20px" height="20px"> Especial</label>
        </div>
        <div class="col">
          <label><img src="../../assets/img/markets/marker2.png" width="20px" height="20px"> Inicial</label>
        </div>
        <div class="col">
          <label><img src="../../assets/img/markets/marker3.png" width="20px" height="20px"> Prescolar</label>
        </div>
        <div class="col">
          <label><img src="../../assets/img/markets/marker4.png" width="20px" height="20px"> Primaria</label>
        </div>
        <div class="col">
          <label><img src="../../assets/img/markets/marker5.png" width="20px" height="20px"> Secundaria</label>
        </div>
        <div class="col">
          <label><img src="../../assets/img/markets/marker6.png" width="20px" height="20px"> Media superior</label>
        </div>
        <div class="col">
          <label><img src="../../assets/img/markets/marker7.png" width="20px" height="20px"> Superior</label>
        </div>
        <div class="col">
          <label><img src="../../assets/img/markets/marker8.png" width="20px" height="20px"> Fromación para el trabajo</label>
        </div>
        <div class="col">
          <label><img src="../../assets/img/markets/marker9.png" width="20px" height="20px"> Otro nivel educativo</label>
        </div>
        <div class="col">
          <label><img src="../../assets/img/markets/marker10.png" width="20px" height="20px"> No aplica</label>
        </div>
      </div>
    </div>

<!-- CONTENEDOR DEL MAPA -->
      <div class="h-50 p-3" id="map"></div>

    
    <script src="http://jawj.github.io/OverlappingMarkerSpiderfier/bin/oms.min.js"></script> //added the file
    <script src="<?= base_url('assets/js/mapa/mapa.js') ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDr-mxcs6tJeQWzLDQHLzefGqB79Clbj0I&callback=initMap"
    async defer>
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>