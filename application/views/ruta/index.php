<section class="main-area">
<div class="container">
  <div class="card mb-3 card-style-1">
    <div class="card-header card-1-header bg-light">Captura de la Ruta de Mejora</div>
    <div class="card-body">
        <div class="card-block">
            <div class="form-group form-group-style-1"> 
            <div class="row">
                <div class="col-12">
                        <label>En este ciclo escolar quiero que mi escuela (Identidad de mi escuela): <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="¿Cúal es la identidad de tu escuela?"></i></label>
                        <textarea id="txt_rm_identidad" class="form-control" rows="5"></textarea>
                </div>
            </div>            
            <div class="row mt-15">
                <div class="col-md-6">
                            <label>Prioridad del sistema básico de mejora</label>
                            <select id="ruta_tema" name="ruta_tema" class="form-control">
                                    <option value="0">Seleccione</option>
                                                                                <option value="1">Normalidad mínima</option>
                                                                                <option value="2">Continuidad</option>
                                                                                <option value="3">Aprendizajes</option>
                                                                                <option value="4">Convivencia escolar</option>
                                                                </select>
                </div>
                <div class="col-md-6">
                            <label>Principales problemáticas</label>
                            <select id="ruta_pprobematicas" name="ruta_pprobematicas" class="form-control">
                                                                                <option value="1">Asistencia de profesores</option>
                                                                                <option value="2">Uso eficiente del tiempo</option>
                                                                                <option value="3">Otro</option>
                                                                </select>
                </div>

            </div>  
            <div class="row mt-15">
                <div class="col-md-6">
                            <label>Evidencias utilizadas</label>
                            <select id="ruta_evidenciasutilizadas" class="form-control">
                                                                                <option value="1">Reporte ACA</option>
                                                                                <option value="2">SISAT</option>
                                                                                <option value="3">PLANEA</option>
                                                                                <option value="4">Listas de cotejo</option>
                                                                                <option value="5">www.sarape.gob.mx</option>
                                                                                <option value="6">Otro</option>
                                                                </select>
                </div>
                <div class="col-md-6">
                            <label>Programas de apoyo</label>
                            <select id="ruta_pproapoy" name="ruta_pproapoy" class="form-control">
                                                                        <option value="0">Otro</option>
                            </select>
                </div>

            </div>   
            <div class="row mt-15">
                <div class="col-md-6">
                        <label>¿En qué nos proponemos avanzar este ciclo escolar?<br>(Objetivo)</label>
                            <textarea id="txt_rm_objetivo" class="form-control" rows="4"></textarea>
                </div>
                <div class="col-md-6">
                            <label>¿Cómo ayudan el (los) programa(s) seleccionado(s) a la prioridad del sistema básico de mejora?</label><br>
                            <textarea id="txt_rm_programayuda" class="form-control" rows="4"></textarea>
                </div>

            </div>   
            <div class="row mt-15">
                <div class="col-md-6">
                            <label>¿Hasta dónde podemos llegar con los recursos disponibles?(Meta)</label>
                            <textarea id="txt_rm_meta" class="form-control" rows="5"></textarea>
                </div>
                <div class="col-md-6">
                            <label>Observaciones del director:</label>
                            <textarea id="txt_rm_obs" class="form-control" rows="5"></textarea>
                </div>

            </div>   
            <!-- <div class="row mt-15"> -->
                <!-- <div class="col-12">
                            <label>Recomendaciones del Supervisor Escolar con base en la visita de acompañamiento realizada:</label>
                            <textarea id="txt_rm_obssuper" class="form-control" rows="5" disabled="true"></textarea>
                </div> -->


            <!-- </div>  -->
            <div class="row mt-15">
                <div class="col-12">
<button type="button" class="btn btn-primary btn-style-1 mr-10">Grabar</button>
                </div>


            </div>                 
                
                </div>
        </div>
        </div>
  </div><!-- card -->
</div><!-- container -->

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
                                                                        <tr class=info><th id='idrutamtema' hidden><center>id</center></th><th id='orden' style='width:4%'><center>Orden</center></th><th id='tema' style='width:20%'><center>Temas prioritarios</center></th><th id='problemas' style='width:31%'><center>Problemáticas</center></th><th id='evidencias' style='width:31%'><center>Evidencias</center></th><th id='n_actividades' style='width:8%'><center>Actividades</center></th><th id='objetivo' style='width:6%'><center>Objetivo</center></th></tr></thead><tbody><tr><td id='idrutamtema' data='108' hidden>108</td><td id='orden' data='1' >1</td><td id='tema' data='Normalidad mínima' >Normalidad mínima</td><td id='problemas' data='Asistencia de profesores' >Asistencia de profesores</td><td id='evidencias' data='SISAT' >SISAT</td><td id='n_actividades' data='0' >0</td><td id=''><center><i class="fas fa-check-circle"></i></center></td></tr>
                                                                        <tr><td id='idrutamtema' data='109' hidden>109</td><td id='orden' data='2' >2</td><td id='tema' data='Aprendizajes' >Aprendizajes</td><td id='problemas' data='Uso eficiente del tiempo, Otro' >Uso eficiente del tiempo, Otro</td><td id='evidencias' data='SISAT, Listas de cotejo, Otro' >SISAT, Listas de cotejo, Otro</td><td id='n_actividades' data='0' >0</td><td id=''><center><i class="fas fa-check-circle"></i></center></td></tr></tbody></table></div>							</div>
							<label class="" style="">*Puede modificar el orden de los temas prioritarios arrastando el registro en la posición deseada.</label>
                </div>


            </div>  
       
        </div>
  </div><!-- card -->
</div><!-- container -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content modal-style-1">
                            <div class="modal-header bgcolor-2">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Edición de prioridad del sistema básico de mejora</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
<div class="alert alert-info" role="alert">
    Escuela: <span class="fw800">NOMBRE DE LA ESCUELA</span><br>

Tema: <span class="fw800">Convivencia escolar</span><br>

Problemática(s): <span class="fw800">Asistencia de profesores</span><br>

Evidencia(s): <span class="fw800">www.sarape.org</span> 
</div>
  <div class="card mb-3 card-style-1">
    <div class="card-header card-1-header bg-light">Actividades</div>
    <div class="card-body">
        <div class="card-block">
            <div class="form-group form-group-style-1"> 
            <div class="row">
                <div class="col-md-6">
                            <label>Actividad:</label>
                            <textarea id="txt_rm_meta" class="form-control" rows="5"></textarea>
                </div>
                <div class="col-md-6">
                            <label>Recursos:</label>
                            <textarea id="txt_rm_obs" class="form-control" rows="5"></textarea>
                </div>

            </div> 
            <div class="row mt-15">
                <div class="col-md-6">
                            <label>Ámbito</label>
                            <select class="form-control">
                                                                                <option value="1">Seleccione opción</option>
                                                                                <option value="2">Salón de clases</option>
                                                                                <option value="3">Entre maestros</option>
                                                                                <option value="4">Escuelas</option>
                                                                                <option value="5">Padres de familia</option>
                                                                                <option value="6">Materiales</option>
                                                                </select>
                </div>
                <div class="col-md-6">
                            <label>Responsables</label>
                            <select name="ruta_pproapoy" class="form-control">
                                                                        <option value="0">Otro</option>
                            </select>
                </div>

            </div> 
            <div class="row mt-15">
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
    <div class="col-md-4">
    <label>Avance</label>                    
    <select class="form-control">
        <option value="1">Seleccione opción</option>
        <option value="2">0%</option>
        <option value="3">25%</option>
        <option value="4">50%</option>
        <option value="5">75%</option>
        <option value="6">100%</option>
    </select>
                </div> 
            <div class="row mt-15">
                <div class="col-12">
<button type="button" class="btn btn-primary btn-style-1 ml-20">Agregar actividad</button>
                </div>


            </div>                 

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
                                                                            <th id='idrutamtema' hidden><center>Actividades</center></th>
                                                                        <th id='orden' style='width:4%'><center>Ámbito</center></th>
                                                                        <th id='tema' style='width:20%'><center>Fecha de inicio</center></th>
                                                                        <th id='problemas' style='width:31%'><center>Fecha de término</center></th>
                                                                        <th id='evidencias' style='width:31%'><center>Recursos</center></th>
                                                                        <th id='n_actividades' style='width:8%'><center>Avance</center></th>
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
        <!-- End Main Area -->


        <!-- Start Cta Area -->
        <section class="cta-area">
                <div class="container">
                        <div class="row justify-content-center">
                                <div class="col-lg-8 d-flex no-flex-xs justify-content-center align-items-center">
                                    <a href="#" class="smooth"><img height="80px" src="assets/img/fuerte-coahuila.png" alt=""></a>
                                </div>
                        </div>
                </div>
        </section>