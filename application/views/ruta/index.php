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
                    <textarea id="txt_rm_identidad" class="form-control fz-20" rows="2" maxlength="80"></textarea>
                  </div>
                  <div class="col-md-6">
                    <label><span class="badge badge-secondary h5 text-white">2.</span> Prioridad del sistema básico de mejora</label><br>
  					<select class="selectpicker form-control">
  					  <option>NORMALIDAD MÍNIMA ESCOLAR</option>
  					  <option>MEJORA DE LOS APRENDIZAJES CON ÉNFASIS EN LECTURA, ESCRITURA Y MATEMÁTICAS</option>
  					  <option>ALTO AL ABANDONO ESCOLAR</option>
  					  <option>CONVIVENCIA ESCOLAR SANA Y PACÍFICA</option>
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
                      <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Objetivo 2</span>
                      </div>
                      <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                  </div>
              </div>
              <div class="row mt-2">
                  <div class="col-md-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Meta 1&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                      </div>
                      <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Meta 2&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                      </div>
                      <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                  </div>
              </div>
              <div class="row mt-15">
                  <div class="col-md-6">
                    <label><span class="badge badge-secondary h5 text-white">4.</span> Problemática por prioridad</label>
  					<select class="selectpicker form-control" id="slc_problem">
  						<option value="1">ALUMNOS QUE NO SABEN LEER</option>
  						<option value="2">ALUMNOS QUE NO SABEN SUMAR Y RESTAR</option>
              <option value="3">COMPRENSIÓN LECTORA</option>
  						<option value="6">OTRO</option>
  					</select>
            <br>
            <textarea id="txt_rm_otroproblematica" class="form-control" rows="1" placeholder="Escriba que otro" hidden="true"></textarea>
                  </div>
                  <div class="col-md-6">
                    <label><span class="badge badge-secondary h5 text-white">5.</span> Evidencias de las problematicas</label>
  					<select class="selectpicker form-control"multiple data-selected-text-format="count > 3" id="slc_evidencias">
  						<option value="1">REPORTE APA</option>
  						<option value="2">SISAT</option>
  						<option value="3">PLANEA</option>
  						<option value="4">LISTAS DE COTEJO</option>
  						<option value="5">WWW.SARAPE.GOB.MX</option>
  						<option value="6">OTRO</option>
  					</select>
            <br>
            <textarea id="txt_rm_otroevidencia" class="form-control" rows="1" placeholder="Escriba que otro" hidden="true"></textarea>
                  </div>

              </div>
              <div class="row mt-15">
                  <div class="col-md-6">
                    <label><span class="badge badge-secondary h5 text-white">6.</span> Programas educativos de apoyo</label>
  					<select class="selectpicker form-control" multiple data-selected-text-format="count > 3" id="slc_pa">
  					  <option>FORTALECIMIENTO DE LA CALIDAD EDUCATIVA</option>
  					  <option>PROGRAMA DE ESCUELAS DE TIEMPO COMPLETO</option>
  					  <option>PROGRAMA PARA LA INCLUSIÓN Y LA EQUIDAD EDUCATIVA</option>
  					  <option>PROGRAMA NACIONAL DE CONVIVENCIA ESCOLAR PROGRAMA DE LA REFORMA EDUCATIVA</option>			 <option>PROGRAMA NACIONAL DE INGLÉS</option>
  					  <option value="6">OTRO</option>
  					</select>
            <br>
            <textarea id="txt_rm_otropa" class="form-control" rows="1" placeholder="Escriba que otro" hidden="true"></textarea>
                </div>
                  <div class="col-md-6">
                    <label><span class="badge badge-secondary h5 text-white">7.</span> ¿Cómo ayudan los programas de apoyo?</label>
                    <br>
                              <textarea id="txt_rm_programayuda" class="form-control" rows="2"></textarea>
                  </div>

              </div>
              <div class="row mt-15">
                  <div class="col-md-6">
                              <label><span class="badge badge-secondary h5 text-white">8.</span> Observaciones del director</label>
                              <textarea id="txt_rm_meta" class="form-control" rows="2"></textarea>
                  </div>
                  <div class="col-6">
                    <label><span class="badge badge-secondary h5 text-white">9.</span> ¿Qué apoyo requerimos por parte de la SE para lograr estos objetivos?</label>
                    <br>
                    <!-- <textarea id="txt_rm_apyreq" class="form-control" rows="2"></textarea> -->
  					<select class="selectpicker form-control" multiple data-selected-text-format="count > 3" id="slc_apoyoreq">
  					  <option>PLANEACIÓN Y ESTADÍSTICA</option>
  					  <option>RECURSOS HUMANOS</option>
  					  <option>PROGRAMAS EDUCATIVOS DE APOYO</option>
  					  <option>JURÍDICO</option>
  					  <option>NIVEL EDUCATIVO</option>
  					  <option>DIRECCIÓN DE EVALUACIÓN</option>
  					  <option>FORMACIÓN DOCENTE</option>
  					  <option value="6">OTRO</option>
  					</select>
            <!--  -->
            <br>
            <textarea id="txt_rm_otroapoyreq" class="form-control" rows="1" placeholder="Escriba que otro" hidden="true"></textarea>
            <br>
            <textarea id="txt_rm_especifiqueapyreq" class="form-control" rows="2" ></textarea>
                  </div>


              </div>

              <div class="row mt-15">
                  <div class="col-12">

                  </div>
              </div>
              <div class="row mt-15">
                  <div class="col-12">
  <button type="button" class="btn btn-primary btn-style-1 mr-10">Grabar</button>
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
                            <button type="button" data-toggle="modal" data-target="#exampleModal" title="Crear actividades" class="btn btn-primary"><i class="fas fa-tasks"></i></button>

                  </div>


              </div>

              <div class="row mt-15">
                  <div class="col-12">
                  <div class='table-responsive'><table id='' class='table table-condensed table-hover  table-bordered'><thead>
                                                                          <tr class=info><th id='idrutamtema' hidden><center>id</center></th><th id='orden' style='width:4%'><center>Orden</center></th><th id='tema' style='width:20%'><center>Prioridad</center></th><th id='problemas' style='width:31%'><center>Problemáticas</center></th><th id='evidencias' style='width:31%'><center>Evidencias</center></th><th id='n_actividades' style='width:8%'><center>Acciones</center></th><th id='objetivo' style='width:6%'><center>Objetivo</center></th></tr></thead><tbody><tr><td id='idrutamtema' data='108' hidden>108</td><td id='orden' data='1' >1</td><td id='tema' data='Normalidad mínima' >Normalidad mínima</td><td id='problemas' data='Asistencia de profesores' >Asistencia de profesores</td><td id='evidencias' data='SISAT' >SISAT</td><td id='n_actividades' data='0' >0</td><td id=''><center><i class="fas fa-check-circle"></i></center></td></tr>
                                                                          <tr><td id='idrutamtema' data='109' hidden>109</td><td id='orden' data='2' >2</td><td id='tema' data='Aprendizajes' >Aprendizajes</td><td id='problemas' data='Uso eficiente del tiempo, Otro' >Uso eficiente del tiempo, Otro</td><td id='evidencias' data='SISAT, Listas de cotejo, Otro' >SISAT, Listas de cotejo, Otro</td><td id='n_actividades' data='0' >0</td><td id=''><center><i class="fas fa-check-circle"></i></center></td></tr></tbody></table></div>              </div>
                <label class="" style="">*Puede modificar el orden de los temas prioritarios arrastando el registro en la posición deseada.</label>
                  </div>


              </div>

          </div>
    </div><!-- card -->
  </div><!-- container -->
                      </div>
                      <div class="tab-pane fade" id="nav-avances" role="tabpanel" aria-labelledby="nav-avances-tab">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Prioridad</th>
                                <th scope="col">Acción</th>

                                <th scope="col">CTE 1</th>
                                <th scope="col">CTE 2</th>
                                <th scope="col">CTE 3</th>
                                <th scope="col">CTE 4</th>
                                <th scope="col">CTE 5</th>
                                <th scope="col">CTE 6</th>
                                <th scope="col">CTE 7</th>
                                <th scope="col">CTE 8</th>
                                <th scope="col">CTE 9</th>
                                <th scope="col">CTE 10</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">NORMALIDAD MÍNIMA ESCOLAR</th>
                                <td>Guardia en la entrada de la escuela</td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row"></th>
                                <td>Pase de lista</td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row"></th>
                                <td>Pláticas de respeto</td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                                <td>
                                  <select>
                                  <option value="audi" selected>0%</option>
                                  <option>10%</option>
                                  <option>20%</option>
                                  <option>30%</option>
                                  <option>40%</option>
                                  <option>50%</option>
                                  <option>60%</option>
                                  <option>70%</option>
                                  <option>80%</option>
                                  <option>90%</option>
                                  <option>100%</option>
                                </select>
                                </td>
                              </tr>
                            </tbody>
                          </table>

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


                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <select class="form-control">
                                <option value="1">EN EL SALÓN DE CLASES</option>
                                <option value="2">ENTRE MAESTROS</option>
                                <option value="3">EN LA ESCUELA</option>
                                <option value="4">CON PADRES DE FAMILIA</option>
                                <option value="5">MATERIALES EDUCATIVOS</option>
                                <option value="6">ASESORÍA TÉCNICA</option>
                              </select>
                  </div>
                </div>
              <div class="row mt-15">
                  <div class="col-md-6">
                              <label>Acción:</label>
                              <textarea id="txt_rm_meta" class="form-control" rows="5"></textarea>
                  </div>
                  <div class="col-md-6">
                              <label>Materiales e insumos a utilizar:</label>
                              <textarea id="txt_rm_obs" class="form-control" rows="5"></textarea>
                  </div>

              </div>
              <div class="row mt-15">

                  <div class="col-md-4">
                              <label>Responsables</label>
                              <select name="ruta_pproapoy" class="form-control">
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
                              <textarea id="txt_rm_indimed" class="form-control" rows="3"></textarea>
                  </div>
              </div>
              <div class="row mt-15">
                  <div class="col-12">
                  <button type="button" class="btn btn-primary btn-style-1 ml-20">Agregar</button>
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
  								<div class='table-responsive'><table id='' class='table table-condensed table-hover  table-bordered'><thead>
                                                                          <tr class=info>
                                                                              <th id='idrutamtema'><center>Acción</center></th>
                                                                          <th id='orden' style='width:4%'><center>Ámbito</center></th>
                                                                          <th id='tema' style='width:20%'><center>Fecha de inicio</center></th>
                                                                          <th id='problemas' style='width:31%'><center>Fecha de término</center></th>
                                                                          <th id='evidencias' style='width:39%'><center>Responsables</center></th>
                                                                          </tr>
                                                                          </thead>
                                                                          <tbody>
                                                                              <tr>
                                                                                  <td colspan="5">No hay datos por mostrar</td>
                                                                          </tr>

                                                                          </tbody>
                                                                      </table>
                                                                  </div>
                  </div>
                  </div>

                              </div>
                              </div>
                      </div>
                  </div>
                  <!-- End Modal -->
  </section>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/multiselect/js/bootstrap-select.js'); ?>"></script>
    <script src="<?= base_url('assets/jquery.validate.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.sticky.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>
