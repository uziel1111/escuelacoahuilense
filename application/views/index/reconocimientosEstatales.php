<!-- Modal -->
<div id="modal_reconocimientosEstatales" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header  bgcolor-2">
        <h5 class="modal-title color-6" id="exampleModalLongTitle">Reconocimientos estatales</h5>
        <button type="button" class="close color-6" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="list-group list-group-flush">
          <a id="btn_reconocimientosEstatales_candelaria" href="javascript:void(0)" class="list-group-item list-group-item-action">MEDALLA MAESTRA CANDELARIA VALDÉS VALDÉS</a>
          <a id="btn_reconocimientosEstatales_felix" href="javascript:void(0)" class="list-group-item list-group-item-action">MEDALLA MAESTRO FELIX CAMPOS CORONA</a>
          <a id="btn_reconocimientosEstatales_ignacio" href="javascript:void(0)" class="list-group-item list-group-item-action">MEDALLA MAESTRO IGNACIO M. ALTAMIRANO</a>
          <a id="btn_reconocimientosEstatales_leopoldo" href="javascript:void(0)" class="list-group-item list-group-item-action">MEDALLA MAESTRO LEOPOLDO VILLAREAL CÁRDENAS</a>
          <a id="btn_reconocimientosEstatales_rafael" href="javascript:void(0)" class="list-group-item list-group-item-action">MEDALLA MAESTRO RAFAEL RAMIREZ</a>
        </div>

      </div>

    </div>
  </div>
</div>

<div id="modal_reconocimientosEstatalesPdf" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header  bgcolor-2">
        <h5 class="modal-title color-6" id="exampleModalLongTitle"></h5>
        <button type="button" class="close color-6" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
    </div>
  </div>
</div>


<script type="text/javascript">
  path_docs = "http://proyectoeducativo.org/escuelacoahuilense/assets/docs/";

  $("#btn_reconocimientosEstatales_candelaria").click(function(e){
    e.preventDefault();
    showPDF("index/reconocimientos_estatales/CANDELARIA.pdf");
  });

  $("#btn_reconocimientosEstatales_felix").click(function(e){
    e.preventDefault();
    showPDF("index/reconocimientos_estatales/FELIX.pdf");
  });

  $("#btn_reconocimientosEstatales_ignacio").click(function(e){
    e.preventDefault();
    showPDF("index/reconocimientos_estatales/IGNACIO.pdf");
  });

  $("#btn_reconocimientosEstatales_leopoldo").click(function(e){
    e.preventDefault();
    showPDF("index/reconocimientos_estatales/LEOPOLDO.pdf");
  });

  $("#btn_reconocimientosEstatales_rafael").click(function(e){
    e.preventDefault();
    showPDF("index/reconocimientos_estatales/RAFAEL.pdf");
  });


  function showPDF(path_pdf){
    path = path_docs+path_pdf;
    var dom = '<iframe src="https://docs.google.com/viewer?url='+path+'&embedded=true" width="100%" height="500" style="border: none;"></iframe>';
    $('#modal_reconocimientosEstatalesPdf .modal-body').empty();
    $('#modal_reconocimientosEstatalesPdf .modal-body').html(dom);

    $('#modal_reconocimientosEstatalesPdf').modal("show");
  };

  $('#modal_reconocimientosEstatales').on('hidden.bs.modal', function (e) {
    // console.info("close");
  });

  $('#modal_reconocimientosEstatalesPdf').on('hidden.bs.modal', function (e) {
    // console.info("close");
  });
</script>
