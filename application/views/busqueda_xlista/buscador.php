<style media="screen">
  .input_cct{
    font-size: 30px;
    font-weight: bold;
  }
  .label_cct{
    font-size: 30px;
    font-weight: bold;
  }
</style>
<div class="container">
  <div class="card mt-3 mb-3">
    <div class="card-header">Estadísticas por escuela</div>
    <div class="card-body">

              <?= form_label('Seleccione tipo de búsqueda', 'username') ?>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="xmunicipio-tab" data-toggle="tab" href="#xmunicipio" role="tab" aria-controls="xmunicipio" aria-selected="true">Por municipio, nivel, sostenimiento o nombre</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="xcct-tab" data-toggle="tab" href="#xcct" role="tab" aria-controls="xcct" aria-selected="false">Por Clave de Centro de Trabjo</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="xmunicipio" role="tabpanel" aria-labelledby="xmunicipio-tab">
                  <?= form_open('estadistica/escuelas', array('class' => 'form', 'id' => 'form_busquedalista')) ?>
                  <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 mt-2">
                      <div class="form-group">
                        <?= form_label('Municipio', 'slc_busquedalista_municipio') ?>
                        <?= form_dropdown('slc_busquedalista_municipio', $arr_municipios, '', array('id' => 'slc_busquedalista_municipio', 'class'=>'form-control')) ?>
                      </div>
                    </div><!-- col-md-4 -->
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 mt-2">
                      <div class="form-group">
                        <?= form_label('Nivel', 'slc_busquedalista_nivel') ?>
                        <?= form_dropdown('slc_busquedalista_nivel', $arr_niveles, '', array('id' => 'slc_busquedalista_nivel', 'class'=>'form-control')) ?>
                      </div>
                    </div><!-- col-md-4 -->
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 mt-2">
                      <div class="form-group">
                        <?= form_label('Sostenimiento', 'slc_busquedalista_sostenimiento') ?>
                        <?= form_dropdown('slc_busquedalista_sostenimiento', $arr_sostenimientos, '', array('id' => 'slc_busquedalista_sostenimiento', 'class'=>'form-control')) ?>
                      </div>
                    </div><!-- col-md-4 -->
                  </div><!-- row -->

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                          <?= form_label('Nombre de la escuela, opcional', 'itxt_busquedalista_nombreescuela') ?>
                          <?= form_input('itxt_busquedalista_nombreescuela', '', array('id' => 'itxt_busquedalista_nombreescuela', 'class'=>'form-control' )) ?>
                      </div>
                    </div><!--  col-sm-12 -->
                  </div><!-- row -->

                  <div class="row">
                    <div class="col-0 col-sm-0 col-md-8 col-lg-8 mt-2"></div><!--  col-0 -->
                    <div class="col-6 col-sm-6 col-md-2 col-lg-2 mt-2">
                      <?= anchor(base_url(), 'Regresar', array('class' => 'btn btn-default btn-block')) ?>
                    </div><!--  col-sm-6 -->

                    <div class="col-6 col-sm-6 col-md-2 col-lg-2 mt-2">
                      <?= form_submit('mysubmit', 'Buscar', array('id' => '', 'class'=>'btn btn-info btn-block' )); ?>
                    </div><!--  col-sm-6 -->
                  </div><!-- row -->

                  <?= form_hidden('hidden_municipio', 'Todos') ?>
                  <?= form_hidden('hidden_nivel', 'Todos') ?>
                  <?= form_hidden('hidden_sostenimiento', 'Todos') ?>
                  <?= form_close() ?>
                </div><!-- xmunicipio -->

                <div class="tab-pane fade" id="xcct" role="tabpanel" aria-labelledby="xcct-tab">
                  <div class="row pt-4">
                    <div class="col-sm-12">
                      <div class="form-group">
                          <?= form_label('Clave de centro de trabajo', 'itxt_busquedalista_cct') ?>
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text label_cct">05</span>
                                <?= form_input('itxt_busquedalista_cct', '', array('id' => 'itxt_busquedalista_cct', 'class'=>'form-control input_cct' )) ?>
                            </div>
                        </div>
                      </div>
                    </div><!--  col-sm-12 -->
                  </div><!-- row -->

                  <div class="row">
                    <div class="col-0 col-sm-0 col-md-8 col-lg-8 mt-2"></div><!--  col-0 -->
                    <div class="col-6 col-sm-6 col-md-2 col-lg-2 mt-2">
                      <?= anchor(base_url(), 'Regresar', array('class' => 'btn btn-default btn-block')) ?>
                    </div><!--  col-sm-6 -->

                    <div class="col-6 col-sm-6 col-md-2 col-lg-2 mt-2">
                      <?= form_submit('mysubmit', 'Buscar', array('id' => '', 'class'=>'btn btn-info btn-block' )); ?>
                    </div><!--  col-sm-6 -->
                  </div><!-- row -->
                </div>
              </div>

    </div><!-- card-body -->
  </div><!-- card -->
</div><!-- container -->

<div id='busquedalista_modal' class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Seleccione una escuela</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_dropdown('slc_busquedalista_modal', array(), '', array('id' => 'busquedalista_modal', 'class'=>'form-control')) ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/js/regularexpression.js') ?>"></script>

<script type="text/javascript">
  $("#slc_busquedalista_municipio").change(function (){
    // $("input[name=hidden_municipio]").val( $("#slc_busquedalista_municipio option:selected").text() );
    $("input[name=hidden_municipio]").val( $('option:selected',this).text() );

    let cve_municipio = $('#slc_busquedalista_municipio').val();
    if(cve_municipio=='-1'){
      $("#slc_busquedalista_nivel").empty();
      $("#slc_busquedalista_nivel").append('<option value=-1> Todos </option>');
    }else{
        $("#slc_busquedalista_sostenimiento").empty();
        $("#slc_busquedalista_sostenimiento").append('<option value=-1> Todos </option>');
        get_niveles(cve_municipio);
    }
  });

  $("#slc_busquedalista_nivel").change(function (){
    // $("input[name=hidden_nivel]").val( $("#slc_busquedalista_nivel option:selected").text() );
    $("input[name=hidden_nivel]").val( $('option:selected',this).text() );

    let cve_nivel = $('#slc_busquedalista_nivel').val();
    $("#slc_busquedalista_sostenimiento").empty();
    if(cve_nivel=='-a'){
      $("#slc_busquedalista_sostenimiento").append('<option value=-1> Todos </option>');
    }else{
        $("#slc_busquedalista_sostenimiento").append('<option value=-1> Todos </option>');
        get_sostenimientos(cve_nivel);
    }
  });

  $("#slc_busquedalista_sostenimiento").change(function (){
    $("input[name=hidden_sostenimiento]").val( $('option:selected',this).text() );
  });

  function get_niveles(cve_municipio){
    let ruta = base_url+"Catalogos/getniveles_xcvemunicipio";
        $.ajax({
          url: ruta,
          method: 'POST',
          data: {'cve_municipio':cve_municipio}
        })
        .done(function( data ) {
          $("#slc_busquedalista_nivel").empty();
          $("#slc_busquedalista_nivel").append(data.str_select);
        })
        .fail(function(e) {
          console.error("Error in get_niveles()"); console.table(e);
        });
  }// get_niveles()
  function get_sostenimientos(cve_nivel){
    let ruta = base_url+"Catalogos/getsostenimientos_xcvenivel";
        $.ajax({
          url: ruta,
          method: 'POST',
          data: {'cve_nivel':cve_nivel}
        })
        .done(function( data ) {
          $("#slc_busquedalista_sostenimiento").empty();
          $("#slc_busquedalista_sostenimiento").append(data.str_select);
        })
        .fail(function(e) {
          console.error("Error in get_sostenimientos()"); console.table(e);
        });
  }// get_niveles()

  $("#itxt_busquedalista_cct").keyup(function() {
    if($(this).val().length==8){
        let obj_re = new Regularexpression();
        let valid = obj_re.cct(this.value);
        if(valid){
          alert("correct!");
          get_xcvecentro(this.value);
        }
    }
    else if ($(this).val().length>8) {
      alert('longitud incorrecta');
      this.value = this.value.substring(0, this.value.length - 1);
    }

  });

  function get_xcvecentro(cve_centro){
    let ruta = base_url+"Busqueda_xlista/escuelas_xcvecentro";
        $.ajax({
          url: ruta,
          method: 'POST',
          data: {'cve_centro':cve_centro}
        })
        .done(function( data ) {
          if(data.total_escuelas==1){
            let id_cct = data.result_escuelas[0]['id_cct'];
            alert('id_cct: '+id_cct);
            // form(id_cct);
            $("#busquedalista_modal").modal("show");
          }
          else if (data.total_escuelas>1) {
            alert('mas de 1 escuela con la cct');
          }
        })
        .fail(function(e) {
          console.error("Error in get_xcvecentro()"); console.table(e);
        });
  }// get_xcvecentro()

  function form(id_cct){
    var form = document.createElement("form");
    form.name = "form_getinfo";
    form.id = "form_getinfo";
    form.method = "POST";
    form.target = "_self";
    form.action = base_url+"usuario/update";

    var element1 = document.createElement("input");
    element1.type="hidden";
    element1.name="id_cct";
    element1.value=id_cct;
    form.appendChild(element1);

    document.body.appendChild(form);
    form.submit();
  }// form()

</script>
