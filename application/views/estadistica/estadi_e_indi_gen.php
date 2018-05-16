<div class="container">
  <div class="card">
    <div class="card-header">Estadisticas generales</div>
    <div class="card-body">
      <?= form_label('Seleccione tipo de búsqueda', 'lb_titbusq') ?>
      <ul class="nav nav-tabs" id="tab_busqg" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="xest_muni-tab" data-toggle="tab" href="#xest_muni" role="tab" aria-controls="xest_muni" aria-selected="true">Por Estatdo / Municipio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="xzona-tab" data-toggle="tab" href="#xzona" role="tab" aria-controls="xzona" aria-selected="false">Por zona escolar</a>
        </li>
      </ul>
              <div class="tab-content" id="myTabContent_busqg">

                <div class="tab-pane fade show active" id="xest_muni" role="tabpanel" aria-labelledby="xest_muni-tab">
                  <?= form_open('estadistica/xest_muni_x', array('class' => 'form', 'id' => 'form_xest_muni')) ?>
                  <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 mt-2">
                      <div class="form-group">
                        <?= form_label('Estado / Municipio', 'slc_xest_muni_estmunicipio') ?>
                        <?= form_dropdown('slc_xest_muni_estmunicipio', $arr_municipios, '', array('id' => 'slc_xest_muni_estmunicipio', 'class'=>'form-control')) ?>
                      </div>
                    </div><!-- col-md-4 -->
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 mt-2">
                      <div class="form-group">
                        <?= form_label('Nivel', 'slc_xest_muni_nivel') ?>
                        <?= form_dropdown('slc_xest_muni_nivel', $arr_niveles, '', array('id' => 'slc_xest_muni_nivel', 'class'=>'form-control')) ?>
                      </div>
                    </div><!-- col-md-4 -->
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 mt-2">
                      <div class="form-group">
                        <?= form_label('Sostenimiento', 'slc_xest_muni_sostenimiento') ?>
                        <?= form_dropdown('slc_xest_muni_sostenimiento', $arr_sostenimientos, '', array('id' => 'slc_xest_muni_sostenimiento', 'class'=>'form-control')) ?>
                      </div>
                    </div><!-- col-md-4 -->
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 mt-2">
                      <div class="form-group">
                        <?= form_label('Ciclo escolar', 'slc_xest_muni_cicloe') ?>
                        <?= form_dropdown('slc_xest_muni_cicloe', $arr_ciclos, '', array('id' => 'slc_xest_muni_cicloe', 'class'=>'form-control')) ?>
                      </div>
                    </div><!-- col-md-4 -->
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
                </div><!-- xest_muni -->


                <div class="tab-pane fade" id="xzona" role="tabpanel" aria-labelledby="xzona-tab">
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


    <div id="le_modal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <span class="modal-title">Seleccione el tipo de búsqueda e ingrese los campos</span>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <fieldset id="LA_tipo_busqueda" name="LA_tipo_busqueda" class="row">
                          <ul class="buttons">
                                <li>
                                    <input id="radiobtn_1" class="radiobtn" name="LA_tipo_busqueda" type="radio" value="LE_busqueda_tipo_1" tabindex="1">

                                    <label for="radiobtn_1"> Por estado / municipio:</label>
                                </li>
                                <li>
                                    <input id="radiobtn_3" class="radiobtn" name="LA_tipo_busqueda" type="radio" value="LE_busqueda_tipo_2" tabindex="3">

                                    <label for="radiobtn_3"> Por zona escolar:</label>
                                </li>
                           </ul>
                  </fieldset>
                  <div class="card" id="LE_busqueda_tipo_1"> <!-- Panel 1-->
                    <div class="card-body">
                          <div class="row">
                              <form class="form-horizontal ">
                                  <div class="form-group">
                                      <span class="col-sm-2 " for="le_select_formunicipio">Estado / municipios:</span>
                                      <div class="col-sm-10">
                                        <select id="le_select_idmunicipio_ei" class="form-control"></select>
                                      </div>
                                  </div>
                                  <div class="form-group" id="div_nivel">
                                      <span class="col-sm-2 " for="le_select_nivel">Nivel: </span>
                                      <div class="col-sm-10">
                                        <select id="le_select_nivel_ei" class="form-control"></select>
                                      </div>
                                  </div>
                                  <div class="form-group" id="div_sostenimiento">
                                      <span class="col-sm-2 " for="le_select_sostenimiento" id="sostmuni">Sostenimiento: </span>
                                      <div class="col-sm-10">
                                        <select id="le_select_sostenimiento_ei" class="form-control"></select>
                                      </div>
                                  </div>

                                  <div class="form-group" id="div_modalidad">
                                      <span class="col-sm-2" for="le_select_modalidad" id="modamuni">Modalidad: </span>
                                      <div class="col-sm-10">
                                        <select id="le_select_modalidad_ei" class="form-control"></select>
                                      </div>
                                  </div>

                                  <div class="form-group" id="div_ciclo">
                                      <span class="col-sm-2" for="le_select_sostenimiento">Ciclo Escolar: </span>
                                      <div class="col-sm-10">
                                        <select id="ciclo" class="form-control"></select>
                                      </div>
                                  </div>
                                  <br>
                                  </form>
                            </div><!-- row -->
                    </div>
                </div><!-- End Panel 1-->

                <div class="card"  id="LE_busqueda_tipo_2"> <!-- Panel 2-->
                  <div class="card-body">
                    <div class="row">
                        <form class="form-horizontal ">
                          <div class="form-group" id="div_nivel_ze">
                              <span class="col-sm-2" for="le_select_nivel_ze">Nivel: </span>
                              <div class="col-sm-10">
                                <select id="le_select_nivel_ze" class="form-control"></select>
                              </div>
                          </div>
                          <div class="form-group" id="div_sostenimiento_ze">
                              <span class="col-sm-2" for="le_select_sostenimiento_ze" id="sostmuni_ze">Sostenimiento: </span>
                              <div class="col-sm-10">
                                <select id="le_select_sostenimiento_ze" class="form-control"></select>
                              </div>
                          </div>
                          <div class="form-group" id="div_num_zona_ze">
                              <span class="col-sm-2" for="le_select_num_zona_ze" id="num_zona_ze">Número de zona escolar: </span>
                              <div class="col-sm-10">
                                <select id="le_select_num_zona_ze" class="form-control"></select>
                              </div>
                          </div>
                          <div class="form-group" id="div_clv_zona_ze">
                              <span class="col-sm-2" for="le_select_clv_zona_ze" id="clv_zona_ze">Clave de zona escolar: </span>
                              <div class="col-sm-10">
                                <select id="le_select_clv_zona_ze" class="form-control"></select>
                              </div>
                          </div>
                          <div class="form-group" id="lb_ciclo_ze">
                              <span class="col-sm-2" for="ciclo_ze" >Ciclo Escolar: </span>
                              <div class="col-sm-10">
                                <select id="ciclo_ze" class="form-control"></select>
                              </div>
                          </div>
                          <br>
                        </form>
                    </div><!-- row -->
                  </div>
                </div>  <!-- End Panel 2-->
              </div><!-- modal body -->
            </div>
          </div>
        </div><!-- End modal -->

        <script src="<?php echo base_url('assets/js/est_e_ind/est_e_ind_g.js'); ?>"></script>
