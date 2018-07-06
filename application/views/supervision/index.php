<section class="main-area">
  <div class="container">
    <div class="card mb-3 card-style-1">
    <div class="card-header card-1-header bg-light">Supervisión escolar</div>
    <div class="card-body">
      <p>La supervisión escolar es un componente de vital importancia para la implementación del Modelo Educativo Coahuilense: es la instancia sobre la que descansa el reto de lograr que las escuelas cumplan con los objetivos de atender a todos los niños y jóvenes; crear las condiciones para que concluyan al menos la educación media superior; y asegurar que todos ellos adquieran al menos las competencias básicas que establecen los planes y programas.</p>
      <p>Con la finalidad de apoyar el desempeño y fortalecimiento de las y los Supervisores Escolares, se ha creado este espacio en el cual podrán encontrar información sobre los siguientes temas:</p>
      <div class="row">
        <div class="col-lg-3 col-sm-3">
        </div>
        <div class="col-lg-6 col-sm-6">
                <div class="card main-boxes">
                    <div class="card-body">
                        <!-- List group -->
                        <ul class="list-group">
                          <li class="list-group-item"><a id="btn_super_trayecto" href="javascript:void(0)"><span class="color-2"><i class="material-icons">chevron_right</i></span> Trayecto formativo para supervisores escolares</a></li>
                          <li class="list-group-item"><a id="btn_super_mundo" href="javascript:void(0)"><span class="color-2"><i class="material-icons">chevron_right</i></span> Bibliografía sobre "La supervisión escolar en el mundo"</a></li>
                        </ul>
                    </div>
                </div>
        </div>
        <div class="col-lg-3 col-sm-3">
        </div>

    </div>
    </div>
  </div>
</section>
<script type="text/javascript">
$("#btn_super_trayecto").click(function(e){
  e.preventDefault();
  var ruta = base_url+"Supervisor/gettrayectoformativo";
  $.ajax({
    url: ruta,
    method: 'POST',
    data: { 'folder':1, 'file':1 },
    beforeSend: function(xhr) {
      Notification.loading("");
    }
  })
  .done(function( data ) {
    $("#div_generico").empty();
    $("#div_generico").append(data.strView);
    $("#modal_trayectoformativo").modal("show");
  })
  .fail(function(e) {
    console.error("Error in ()"); console.table(e);
  })
  .always(function() {
    swal.close();
  });

});

$("#btn_super_mundo").click(function(e){
  e.preventDefault();
  var ruta = base_url+"Supervisor/getsuperenmundo";
  $.ajax({
    url: ruta,
    method: 'POST',
    data: { 'folder':1, 'file':1 },
    beforeSend: function(xhr) {
      Notification.loading("");
    }
  })
  .done(function( data ) {
    $("#div_generico").empty();
    $("#div_generico").append(data.strView);
    $("#modal_superenmundo").modal("show");
  })
  .fail(function(e) {
    console.error("Error in ()"); console.table(e);
  })
  .always(function() {
    swal.close();
  });

});

</script>
