<style type="text/css">
  td {border: 1px #DDD solid; padding: 5px; cursor: pointer;}

.selected {
    background-color: #9ccc65;
    color: #FFF;
}
</style>
<section class="main-area">
  <div class="container">


    <div class="row justify-content-center flex-column mb-3">
      <nav>
        <div class="nav nav-tabs nav-tabs-style-1" id="nav-tab" role="tablist">
          <a class="nav-item nav-link nav-link-style-1 active" id="nav-ruta-tab" data-toggle="tab" href="#nav-ruta" role="tab" aria-controls="nav-ruta" aria-selected="true">Captura de la Ruta de Mejora</a>
          <a class="nav-item nav-link nav-link-style-1" id="nav-avances-tab" data-toggle="tab" href="#nav-avances" role="tab" aria-controls="nav-avances" aria-selected="false">Avances por acciones</a>
          <a class="nav-item nav-link nav-link-style-1" id="nav-indicadores-tab" data-toggle="tab" href="#nav-indicadores" role="tab" aria-controls="nav-indicadores" aria-selected="false">Indicadores sugeridos</a>
          <a class="nav-item nav-link nav-link-style-1" id="nav-instrucc-tab" data-toggle="tab" href="#nav-instrucc" role="tab" aria-controls="nav-instrucc" aria-selected="false">Instructivo</a>
        </div>
      </nav>
      <div class="tab-content tab-content-style-1" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-ruta" role="tabpanel" aria-labelledby="nav-ruta-tab">
          <div class="form-group form-group-style-1">
            <div class="row">
              <div class="col-6">
                <label><span class="badge badge-secondary h5 text-white">1.</span> En este ciclo escolar quiero que mi escuela (Misión): <em class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="En esta sección se hace una descripción
                  breve (de no más de 80 palabras aproximadamente) que clarifique cuál es
                  la contribución que debe hacer la escuela a la comunidad donde radica,
                  dónde se verá su impacto positivo y de qué forma deberá ser vista por
                  quienes interactúan con ella (alumnos, padres de familia, autoridades
                  locales, sociedad en general)"></em></label>
                  <textarea id="txt_rm_identidad" class="form-control fz-20" rows="2" maxlength="80"><?= $mision ?></textarea>
                </div>
                <div class="col-md-6">
                  <label><span class="badge badge-secondary h5 text-white">2.</span> Prioridad del sistema básico de mejora</label><br>
                  <select class="selectpicker form-control" title="SELECCIONE UNA OPCIÓN" id="slc_rm_prioridad">
                    <!-- <option value="">SELECCIONE UNA OPCIÓN</option> -->
                    <?php foreach ($arr_prioridades as $item): ?>
                            <option value="<?= $item['id_prioridad'] ?>"><?= $item['prioridad'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="row mt-15">
                <div class="col-12">
                  <label><span class="badge badge-secondary h5 text-white">3.</span> Objetivos y sus metas <em class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="Para la prioridad seleccionada escribe un objetivo que
                    inicie con uno de los siguientes verbos (aumentar, disminuir, alcanzar o
                    eliminar) seguido por un indicador concreto (por ejemplo: asistencia,
                    aprovechamiento, y en algunos casos enfocados a un nivel educativo,
                    a un grado en particular, a una asignatura), continuando con una meta
                    numérica de mejora del indicador y finalizando con una fecha de
                    cumplimiento máximo (si es para el final del período escolar se puede
                    omitir este elemento dándolo por entendido)"></em></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Objetivo 1</span>
                      </div>
                      <textarea class="form-control" aria-label="With textarea" maxlength="80" id="txt_rm_ob1"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Objetivo 2</span>
                      </div>
                      <textarea class="form-control" aria-label="With textarea" maxlength="80"id="txt_rm_ob2"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Meta 1&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                      </div>
                      <textarea class="form-control" aria-label="With textarea" maxlength="80" id="txt_rm_met1"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Meta 2&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                      </div>
                      <textarea class="form-control" aria-label="With textarea" maxlength="80" id="txt_rm_met2"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row mt-15">
                  <div class="col-md-6">
                    <label><span class="badge badge-secondary h5 text-white">4.</span> Problemática por prioridad</label>
                    <textarea id="txt_rm_problem" class="form-control" rows="2" maxlength="80"></textarea>
                    <!-- <select class="selectpicker form-control" id="slc_problem">
                      <option value="">SELECCIONE UNA OPCIÓN</option>
                      <?php foreach ($arr_problematicas as $item): ?>
                              <option value="<?= $item['id_problematica'] ?>"><?= $item['problematica'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <br>
                    <textarea id="txt_rm_otroproblematica" class="form-control" rows="1" placeholder="Escriba que otro" hidden="true"></textarea> -->
                  </div>
                  <div class="col-md-6">
                    <label><span class="badge badge-secondary h5 text-white">5.</span> Evidencias de las problematicas</label>
                    <textarea id="txt_rm_eviden" class="form-control" rows="2" maxlength="80"></textarea>
                    <!-- <select class="selectpicker form-control"multiple data-selected-text-format="count > 3" id="slc_evidencias">
                      <option value="">SELECCIONE UNA OPCIÓN</option>
                      <?php foreach ($arr_evidencias as $item): ?>
                              <option value="<?= $item['id_evidencia'] ?>"><?= $item['evidencia'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <br>
                    <textarea id="txt_rm_otroevidencia" class="form-control" rows="1" placeholder="Escriba que otro" hidden="true"></textarea> -->
                  </div>

                </div>
                <div class="row mt-15">
                  <div class="col-md-6">
                    <label><span class="badge badge-secondary h5 text-white">6.</span> Programas educativos de apoyo</label>
                    <select class="selectpicker form-control" multiple data-selected-text-format="count > 3" id="slc_pa" title="SELECCIONE UNA OPCIÓN">

                      <?php foreach ($arr_progsapoyo as $item): ?>
                              <option value="<?= $item['id_programa_apoyo'] ?>"><?= $item['descripcion'] ?></option>
                      <?php endforeach; ?>
                      <option value="0">OTRO</option>
                    </select>
                    <br>
                    <textarea id="txt_rm_otropa" class="form-control" rows="1" placeholder="Escriba que otro" hidden="true"></textarea>
                  </div>
                  <div class="col-md-6">
                    <label><span class="badge badge-secondary h5 text-white">7.</span> ¿Cómo ayudan los programas de apoyo?</label>
                    <br>
                    <textarea id="txt_rm_programayuda" class="form-control" rows="2" maxlength="80"></textarea>
                  </div>

                </div>
                <div class="row mt-15">
                  <div class="col-md-6">
                    <label><span class="badge badge-secondary h5 text-white">8.</span> Observaciones del director</label>
                    <textarea id="txt_rm_obs_direc" class="form-control" rows="2" maxlength="80"></textarea>
                  </div>
                  <div class="col-6">
                    <label><span class="badge badge-secondary h5 text-white">9.</span> ¿Qué apoyo requerimos por parte de la SE para lograr estos objetivos?</label>
                    <br>
                    <!-- <textarea id="txt_rm_apyreq" class="form-control" rows="2"></textarea> -->
                    <select class="selectpicker form-control" multiple data-selected-text-format="count > 3" id="slc_apoyoreq" title="SELECCIONE UNA OPCIÓN">
                      <?php foreach ($arr_apoyosreq as $item): ?>
                              <option value="<?= $item['id_apoyo_req_se'] ?>"><?= $item['apoyo_req_se'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <!--  -->
                    <input type="text" name="" id="inp_tmp_id_tprioritario" value="" hidden>
                    <br>
                    <textarea id="txt_rm_otroapoyreq" class="form-control" rows="1" placeholder="Escriba que otro" hidden="true" maxlength="80"></textarea>
                    <br>
                    <textarea id="txt_rm_especifiqueapyreq" class="form-control" rows="2" maxlength="80"></textarea>
                  </div>


                </div>

                <div class="row mt-15">
                  <div class="col-12">

                  </div>
                </div>
                <div class="row mt-15">
                  <div class="col-1">
                    <button type="button" class="btn btn-primary btn-style-1 mr-1" id="btn_grabar_tp">Grabar</button>
                  </div>
                  <div class="col-1">
                    <button type="button" class="btn btn-primary btn-style-1 mr-1" id="btn_actualizar_tp" hidden>Actualizar</button>
                  </div>
                </div>

              </div>
              <div class="container">
                <div class="card mb-3 card-style-1">
                  <div class="card-header card-1-header bg-light">Detalle</div>
                  <div class="card-body">
                    <div class="card-block">
                      <div class="row mt-15">
                        <div class="col-12">
                          <button id="btn_get_reporte" type="button" data-toggle="tooltip" title="Imprimir" class="btn btn-primary"><i class="fas fa-print"></i></button>
                          <button id="btn_rutamejora_editar" type="button" data-toggle="tooltip" title="Editar" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                          <button id="btn_rutamejora_eliminareg" type="button" data-toggle="tooltip" title="Eliminar" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button>
                          <button id="btn_rutamejora_acciones" type="button" data-toggle="modal" data-target="#exampleModal" title="Crear actividades" class="btn btn-primary"><i class="fas fa-tasks"></i></button>

                        </div>


                      </div>

                      <div class="row mt-15">
                        <div class="col-12">
                          <!-- aqui ira el html de la tabla             -->
                          <div id="contenedor_tabla"></div>
                        </div>
                              <label class="" style="">*Puede modificar el orden de los temas prioritarios arrastando el registro en la posición deseada.</label>
                            </div>


                          </div>

                        </div>
                      </div><!-- card -->
                    </div><!-- container -->
                  </div>
                  <div class="tab-pane fade" id="nav-avances" role="tabpanel" aria-labelledby="nav-avances-tab">
                    <?= $tab_avances?>
                  </div>
                  <div class="tab-pane fade" id="nav-indicadores" role="tabpanel" aria-labelledby="nav-indicadores-tab">
                    <table class="table table-style-1 table-striped table-hover">
                      <thead class="bgcolor-4">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Indicador</th>
                          <th scope="col">Resultado</th>
                          <th scope="col">Meta propuesta</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>ALUMNOS EN MUY ALTO RIESGO DE ABANDONO ESCOLAR</td>
                          <td>30%</td>
                          <td>10%</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>ALUMNOS EN NIVEL 1 DE PLANEA MATEMÁTICAS</td>
                          <td>70%</td>
                          <td>30%</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>ALUMNOS EN EXTRAEDAD EN GRADOS DESFASADOS</td>
                          <td>20 </td>
                          <td>10 </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="nav-instrucc" role="tabpanel" aria-labelledby="nav-instrucc-tab">
                    <div class="card bg-light mb-3">
                      <div class="card-header"><span class="badge badge-secondary h5 text-white">O</span> Deberá ingresar mediante el usuario y contraseña que utiliza actualmente para hacerlo en el Sistema de Control Escolar (SIECEC).</div>
                      <div class="card-body">
                        <p class="card-text">
                          <span class="badge badge-secondary h5 text-white">O</span> Una vez que haya ingresado deberá capturar la información en dos etapas:<br>
                          <span class="badge badge-secondary h5 text-white">• </span>Primera, definir las Prioridades del Sistema Básico de Mejora
                          En esta etapa, deberá registrarse una o más prioridades definidas en la etapa intensiva de la planeación de la Ruta de Mejora por el colectivo de docentes de la escuela, así mismo, para cada prioridad deberán complementarse la siguiente información:<br>
                          &nbsp(1) Misión.- Se refiere a la definición de la contribución de la escuela a su propia comunidad y como deberá percibirse por las personas de su propio entorno social.<br>
                          &nbsp(2) Prioridades.- Definirá una o más prioridades a atender durante el trascurso del ciclo escolar vigente.<br>
                          &nbsp(3) Objetivos y metas.- En esta parte deberá capturarse una o dos metas y objetivos planteados por el colectivo de docentes y deberá procurar que inicien con los siguientes verbos: aumentar, disminuir, alcanzar o eliminar y seguido por un indicador concreto (ejem: asistencia, aprovechamiento, abandono), continuando por una meta numérica.<br>
                          &nbsp(4) Problemática por prioridad.- En este campo establecerá uno o más tipos de problemáticas que estén relacionados con la prioridad seleccionada, si no aparece en el catálogo, podrá seleccionar la opción otros y especificarla.<br>
                          &nbsp(5) Evidencias de las problemáticas.- Especificará la o las evidencias en que el colectivo de docentes se basó para determinar la prioridad.<br>
                          &nbsp(6) Programas Educativos.- En este espacio indicará que programas(as) con los que cuenta la escuela apoyarán para alcanzar las metas y objetivos planteados, y en el campo.<br>
                          &nbsp(7)  podrá registrar una explicación más amplia.<br>
                          &nbsp(8) Observaciones del director.- Espacio destinado para enviar algún mensaje pertinente a las autoridades o padres de familia.<br>
                          &nbsp(9) ¿Qué apoyo requerimos por parte de la Secretaría de Educación (SE) para lograr estos objetivos?
                          En este espacio podrá indicar que apoyo requiere por parte de las autoridades y la información complementaria en cada una de ellas, por ejemplo:<br>
                          &nbsp&nbspo
                        </p>
                      </div>
                    </div>

                  </div>

                </div>

              </div>
            </div><!-- container -->
        </section>
        <!-- Modal -->
            <div class="modal fade" id="exampleModalacciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-style-1">
                  <div class="modal-header bgcolor-2">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Acciones por prioridad del Sistema Básico de Mejora</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="alert alert-info" role="alert">
                      Escuela: <span class="fw800">NOMBRE DE LA ESCUELA</span><br>

                      Prioridad: <span class="fw800">Convivencia escolar</span><br>

                      Problemática(s): <span class="fw800">Asistencia de profesores</span><br>

                      Evidencia(s): <span class="fw800">www.sarape.org</span>
                    </div>
                    <div class="card mb-3 card-style-1">
                      <div class="card-header card-1-header bg-light">Estrategia global de mejora</div>
                      <div class="card-body">
                        <div class="card-block">
                          <div class="form-group form-group-style-1">
                            <div class="row">
                              <div class="col-md-6">
                                <label>Ámbito</label>
                                <select class="selectpicker form-control" id="slc_rm_ambito" title="SELECCIONE UNA OPCIÓN">
                                  <?php foreach ($arr_ambitos as $item): ?>
                                          <option value="<?= $item['id_ambito'] ?>"><?= $item['ambito'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="row mt-15">
                              <div class="col-md-6">
                                <label>Acción:</label>
                                <textarea id="txt_rm_meta" class="form-control" rows="5" maxlength="80"></textarea>
                              </div>
                              <div class="col-md-6">
                                <label>Materiales e insumos a utilizar:</label>
                                <textarea id="txt_rm_obs" class="form-control" rows="5" maxlength="80"></textarea>
                              </div>

                            </div>
                            <div class="row mt-15">

                              <div class="col-md-4">
                                <label>Responsables</label>
                                <select name="ruta_presp" class="selectpicker form-control" id="slc_rm_presp" title="SELECCIONE UNA OPCIÓN">
                                  <option value="0">Otro</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label>Fecha de inicio</label>
                                <input id="datepicker1" />
                                <script>
                                $('#datepicker1').datepicker({
                                  uiLibrary: 'bootstrap4'
                                });
                                </script>
                              </div>

                              <div class="col-md-4">
                                <label>Fecha de término</label>
                                <input id="datepicker2" />
                                <script>
                                $('#datepicker2').datepicker({
                                  uiLibrary: 'bootstrap4'
                                });
                                </script>
                              </div>
                            </div>
                            <div class="row mt-15">
                              <div class="col-md-12">
                                <label>Indicadores de medicion:</label>
                                <textarea id="txt_rm_indimed" class="form-control" rows="3" maxlength="80"></textarea>
                              </div>
                            </div>
                            <div class="row mt-15">
                              <div class="col-12">
                                <button type="button" class="btn btn-primary btn-style-1 ml-20" id="btn_agregar_accion">Agregar</button>
                              </div>
                            </div>




                          </div>

                        </div>
                      </div><!-- card -->
                      <div class="row mt-15">
                        <div class="col-12">
                          <button type="button" data-toggle="tooltip" title="Editar" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                          <button type="button" data-toggle="tooltip" title="Eliminar" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button>


                        </div>


                      </div>

                      <div class="row mt-15">
                        <div class="col-12">
                          <div id="contenedor_acciones_id"></div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <!-- End Modal -->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/multiselect/js/bootstrap-select.js'); ?>"></script>
        <script src="<?= base_url('assets/jquery.validate.js'); ?>"></script>
        <script src="<?= base_url('assets/js/jquery.sticky.js'); ?>"></script>
        <script src="<?= base_url('assets/js/main.js'); ?>"></script>
        <script src="<?= base_url('assets/js/rutademejora/rm_table_operation.js'); ?>"></script>
        <script src="<?= base_url('assets/js/rutademejora/drag.js'); ?>"></script>
        <script src="<?= base_url('assets/js/rutademejora/rutademejora.js'); ?>"></script>
        <script src="<?= base_url('assets/js/rutademejora/rm_tp.js'); ?>"></script>
        <script src="<?= base_url('assets/js/rutademejora/rm_edith_tp.js'); ?>"></script>
        <script src="<?= base_url('assets/js/rutademejora/rm_delete_tp.js'); ?>"></script>
        <script src="<?= base_url('assets/js/rutademejora/acciones.js'); ?>"></script>
        <script src="<?= base_url('assets/js/rutademejora/avances.js'); ?>"></script>
