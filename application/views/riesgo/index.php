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
      <div id="dv_graf_riesgo_mun_zona"></div>
      <div id="dv_tabla_riesgo_mun_zona"></div>
      <div id="dv_tab_riesgo_mun_zona"></div>
      <div id="dv_tablam_riesgo_mun_zona"></div>
      <h4>Alumnos que posiblemente han abandonado la escuela</h4> <h6 style="color:red;" id="total_bajas_muni"></h6>
    </div>
