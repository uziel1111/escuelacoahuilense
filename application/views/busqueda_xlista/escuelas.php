<div class="container-fluid mb-5" style="padding-top:75px;">

  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
      <p><center>
        <h5>Conozca los datos de matrícula, maestros y desempeño de cada escuela haciendo clic en su CCT o <?= anchor('estadistica', 'regrese a la búsqueda', 'class="link-class"') ?></h5>
      </center></p>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-2">
      <?php
        $mensaje = '';
      ?>
      <span><?= $total_escuelas ?> escuelas encontradas del municipio: <?= $municipio ?>, nivel: <?= $nivel ?> y sotenimiento: <?= $sostenimiento ?></span>
    </div><!-- col-md-5 -->
    <div class="col-12 col-sm-12 col-md-6 col-lg-6">

      <div class="row">
        <div class="col-9 col-sm-9 col-md-10 col-lg-10 mt-2">
          <?= form_open('estadistica/escuelas') ?>
          <?= form_hidden('slc_busquedalista_municipio', $cve_municipio) ?>
          <?= form_hidden('slc_busquedalista_nivel', $cve_nivel) ?>
          <?= form_hidden('slc_busquedalista_sostenimiento', $cve_sostenimiento) ?>

          <?= form_hidden('hidden_municipio', $municipio) ?>
          <?= form_hidden('hidden_nivel', $nivel) ?>
          <?= form_hidden('hidden_sostenimiento', $sostenimiento) ?>
          <?= form_input('itxt_busquedalista_nombreescuela', $nombre_escuela, array('id' => 'itxt_busquedalista_nombreescuela', 'class'=>'form-control',
                                                                                    'placeholder'=>'Use este campo para buscar una escuela dentro de la tabla de resultados, ingrese parte del nombre de la escuela' )) ?>
        </div>
        <div class="col-3 col-sm-3 col-md-1 col-lg-1 mt-2">
          <?php
          $data = array(
              'name' => '',
              'id' => '',
              'value' => 'true',
              'type' => 'submit',
              'class'=>'btn btn-info btn-block',
              'content' => '<i class="fa fa-search"></i>',
              'data-toggle' => "tooltip",
              'data-placement' => "top",
              'title' => ''
          );
          echo form_button($data);
          ?>
          <?= form_close() ?>
        </div><!-- col-md-1 -->


        <div class="col-12 col-sm-12 col-md-1 col-lg-1 mt-2">
          <?= form_open('Report/por_escuela') ?>
          <?= form_hidden('slc_busquedalista_municipio_reporte', $cve_municipio) ?>
          <?= form_hidden('slc_busquedalista_nivel_reporte', $cve_nivel) ?>
          <?= form_hidden('slc_busquedalista_sostenimiento_reporte', $cve_sostenimiento) ?>
          <?= form_hidden('itxt_busquedalista_nombreescuela_reporte', $nombre_escuela, array('id' => 'itxt_busquedalista_nombreescuela_reporte')) ?>
          <?php
          $data = array(
              'name' => 'btn_busquedaxlista_xlsx',
              'id' => 'btn_busquedaxlista_xlsx',
              'value' => 'true',
              'type' => 'submit',
              'class'=>'btn btn-primary btn-block',
              'content' => '<i class="fa fa-file-excel-o"></i>',
              'data-toggle' => "tooltip",
              'data-placement' => "top",
              'title' => 'Exportar los resultados'
          );
          echo form_button($data);
          ?>
          <?= form_close() ?>
        </div><!-- col-md-1 -->
      </div><!-- row -->
    </div><!-- col-md-7 -->
  </div><!-- row -->

<div class="row mt-3">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
      <div id="table_escuelas">
      <div class="table-responsive">
      <table class="table table-hover table-sm">
        <thead>
          <tr class="table-secondary">
            <th scope="col">CCT</th>
            <th scope="col">Turno</th>
            <th scope="col">Nombre</th>
            <th scope="col">Nivel</th>
            <th scope="col">Municipio</th>
            <th scope="col">Localidad</th>
            <th scope="col">Domicilio</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($arr_escuelas as $escuela) { ?>
            <tr data-idescuela="<?= $escuela['id_cct'] ?>">
              <td>
                <?= $escuela['cve_centro'] ?>
              </td>
              <td><?= $escuela['turno'] ?></td>
              <td><?= $escuela['nombre_centro'] ?></td>
              <td><?= $escuela['nivel'] ?></td>
              <td><?= $escuela['municipio'] ?></td>
              <td>Pendiente</td>
              <td><?= $escuela['domicilio'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div><!-- table-responsive -->
    </div>
  </div><!-- col-12 -->
  </div><!-- row -->

</div><!-- container-fluid -->

<script type="text/javascript">
  $("#itxt_busquedalista_nombreescuela").keyup(function() {
    $("#itxt_busquedalista_nombreescuela_reporte").val($(this).val());
  });

  $(document).on("click", "#table_escuelas tbody tr", function(e) {
    var idescuela = $(this).data('idescuela');

    var form = document.createElement("form");
    var element1 = document.createElement("input");

    element1.type = "hidden";
    element1.name="id_cct";
    element1.value = idescuela;

    form.name = "form_escuelas_getinfo";
    form.id = "form_escuelas_getinfo";
    form.method = "POST";
    form.target = "_self";
    form.action = base_url+"Escuela/get_info/";

    document.body.appendChild(form);
    form.appendChild(element1);
    form.submit();
});
</script>