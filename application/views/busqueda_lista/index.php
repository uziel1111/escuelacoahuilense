<div class="container">
  <div class="card mt-3 mb-3">
    <div class="card-header">Estadísticas por escuela</div>
    <div class="card-body">

              <?= form_label('Seleccione tipo de búsqueda', 'username') ?>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" id="xmunicipio-tab" data-toggle="tab" href="#xmunicipio" role="tab" aria-controls="xmunicipio" aria-selected="true">Por municipio, nivel, sostenimiento o nombre</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="xcct-tab" data-toggle="tab" href="#xcct" role="tab" aria-controls="xcct" aria-selected="false">Por Clave de Centro de Trabjo</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show" id="xmunicipio" role="tabpanel" aria-labelledby="xmunicipio-tab">

                  <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 mt-2">
                      <div class="form-group">
                        <?= form_label('Municipio', 'slc_busquedalista_municipio') ?>
                        <?php
                        $options = array(
                                  '1' => 'Municipio 1',
                                  '2' => 'Municipio 2',
                                  '3' => 'Municipio 3',
                                  '4' => 'Municipio 4'
                          );
                          // $shirts_on_sale = array('1','3');
                          ?>
                          <?= form_dropdown('slc_busquedalista_municipio', $options, '', array('id' => 'slc_busquedalista_municipio', 'class'=>'form-control')) ?>
                      </div>
                    </div><!-- col-md-4 -->
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 mt-2">
                      <div class="form-group">
                        <?= form_label('Nivel', 'slc_busquedalista_nivel') ?>
                        <?php
                        $options = array(
                                  '1' => 'Nivel 1',
                                  '2' => 'Nivel 2',
                                  '3' => 'Nvel 3'
                          );
                          ?>
                          <?= form_dropdown('slc_busquedalista_nivel', $options, '', array('id' => 'slc_busquedalista_nivel', 'class'=>'form-control')) ?>
                      </div>
                    </div><!-- col-md-4 -->
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 mt-2">
                      <div class="form-group">
                        <?= form_label('Sostenimiento', 'slc_busquedalista_sostenimiento') ?>
                        <?php
                        $options = array(
                                  '1' => 'Sostenimiento 1',
                                  '2' => 'Sostenimiento 2'
                          );
                          ?>
                          <?= form_dropdown('slc_busquedalista_sostenimiento', $options, '', array('id' => 'slc_busquedalista_sostenimiento', 'class'=>'form-control')) ?>
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
                      <?= form_submit('mysubmit', 'Cancelar', array('id' => '', 'class'=>'btn btn-default btn-block' )); ?>
                    </div><!--  col-sm-6 -->

                    <div class="col-6 col-sm-6 col-md-2 col-lg-2 mt-2">
                      <?= form_submit('mysubmit', 'Buscar', array('id' => '', 'class'=>'btn btn-info btn-block' )); ?>
                    </div><!--  col-sm-6 -->

                  </div><!-- row -->
                </div><!-- xmunicipio -->

                <div class="tab-pane fade" id="xcct" role="tabpanel" aria-labelledby="xcct-tab">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                          <?= form_label('Clave de centro de trabajo', 'itxt_busquedalista_cct') ?>
                          <?= form_input('itxt_busquedalista_cct', '', array('id' => 'itxt_busquedalista_cct', 'class'=>'form-control' )) ?>
                      </div>
                    </div><!--  col-sm-12 -->
                  </div><!-- row -->

                  <div class="row">
                    <div class="col-0 col-sm-0 col-md-8 col-lg-8 mt-2"></div><!--  col-0 -->
                    <div class="col-6 col-sm-6 col-md-2 col-lg-2 mt-2">
                      <?= form_submit('mysubmit', 'Cancelar', array('id' => '', 'class'=>'btn btn-default btn-block' )); ?>
                    </div><!--  col-sm-6 -->

                    <div class="col-6 col-sm-6 col-md-2 col-lg-2 mt-2">
                      <?= form_submit('mysubmit', 'Buscar', array('id' => '', 'class'=>'btn btn-info btn-block' )); ?>
                    </div><!--  col-sm-6 -->
                  </div><!-- row -->
                </div>
              </div>



    </div><!-- card-body -->
  </div><!-- card -->
        <?= form_open('email/send', array('class' => 'form', 'id' => 'form_busquedalista')) ?>
        <?= form_close() ?>
</div><!-- container -->


<!--
        <?= form_input('username', '', array('id' => 'itxt_bl_cct', 'class'=>'form-control' )) ?>
        <?= form_input('username', '', array('id' => 'itxt_bl_cct', 'class'=>'form-control' )) ?>
        <?= form_input('username', '', array('id' => 'itxt_bl_cct', 'class'=>'form-control' )) ?> -->
<!--
<div class="form-group">
    <?= form_label('Seleccione tipo de búsqueda', 'username') ?>
    <?= form_radio(array('name' => 'radio_busquedalista_tipo', 'value' => 'M', 'checked' => ('municipio' == "") ? TRUE : FALSE, 'id' => 'Por municipio, nivel, sostenimiento o nombre')) ?>
    <?= form_radio(array('name' => 'radio_busquedalista_tipo', 'value' => 'F', 'checked' => ('cct' == "") ? TRUE : FALSE, 'id' => 'Por Clave de Centro de Trabajo')) ?>
</div>
-->
