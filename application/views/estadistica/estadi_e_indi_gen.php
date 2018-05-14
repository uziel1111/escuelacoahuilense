<h4>Estadisticas generales</h4>
  <?php
        echo form_open('empleados/nuevo_empleado');
        echo form_label('Nombre', 'nombre');
        echo form_input('nombre');echo '<br>';
        echo form_label('Sueldo', 'sueldo');
        echo form_input('sueldo');echo '<br>';
        echo form_submit('botonSubmit', 'Enviar');
        echo form_close();
    ?>
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
