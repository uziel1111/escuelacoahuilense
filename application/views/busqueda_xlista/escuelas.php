<div class="container-fluid mb-5">
  <div class="row mb-3">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
      <p><center>
        <h5>Conozca los datos de matrícula, maestros y desempeño de cada escuela haciendo clic en su CCT o <?= anchor('estadistica', 'regrese a la búsqueda', 'class="link-class"') ?></h5>
      </center></p>
    </div>
  </div><!-- row -->


  <div class="row mb-2">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
      <?php
        $mensaje = '';
      ?>
      <span><?= $total_escuelas ?> escuelas encontradas del municipio: <?= $municipio ?>, nivel: <?= $nivel ?> y sotenimiento: <?= $sostenimiento ?></span>
    </div><!-- col-md-5 -->
    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
      <?= form_open('estadistica/escuelas') ?>
      <?= form_hidden('slc_busquedalista_municipio', $cve_municipio) ?>
      <?= form_hidden('slc_busquedalista_nivel', $cve_nivel) ?>
      <?= form_hidden('slc_busquedalista_sostenimiento', $cve_sostenimiento) ?>

      <?= form_hidden('hidden_municipio', $municipio) ?>
      <?= form_hidden('hidden_nivel', $nivel) ?>
      <?= form_hidden('hidden_sostenimiento', $sostenimiento) ?>
      <div class="row">
        <div class="col-9 col-sm-9 col-md-10 col-lg-10">
          <?= form_input('itxt_busquedalista_nombreescuela', $nombre_escuela, array('id' => 'itxt_busquedalista_nombreescuela', 'class'=>'form-control','placeholder'=>'Use este campo para buscar con los filtros que aplicó' )) ?>
        </div>
        <div class="col-3 col-sm-3 col-md-1 col-lg-1">
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
        </div><!-- col-md-1 -->
        <div class="col-12 col-sm-12 col-md-1 col-lg-1">
          <?php
          $data = array(
              'name' => 'btn_busquedaxlista_xlsx',
              'id' => 'btn_busquedaxlista_xlsx',
              'value' => 'true',
              'type' => 'button',
              'class'=>'btn btn-primary btn-block',
              'content' => '<i class="fa fa-file-excel-o"></i>',
              'data-toggle' => "tooltip",
              'data-placement' => "top",
              'title' => 'Exportar los resultados'
          );
          echo form_button($data);
          ?>
        </div><!-- col-md-1 -->
      </div><!-- row -->
    </div><!-- col-md-7 -->
    <?= form_close() ?>
  </div>

  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
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
            <tr>
              <th scope="row"><?= $escuela['cve_centro'] ?></th>
              <td><?= utf8_decode($escuela['turno']) ?></td>
              <td><?= utf8_encode($escuela['nombre_centro']) ?></td>
              <td><?= utf8_encode($escuela['nivel_educativo']) ?></td>
              <td><?= utf8_decode($escuela['municipio']) ?></td>
              <td><?= utf8_decode($escuela['localidad']) ?></td>
              <td><?= utf8_decode($escuela['domicilio']) ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div><!-- table-responsive -->
  </div><!-- col-12 -->
  </div><!-- row -->

</div><!-- container-fluid -->
