<div class="form-group form-group-style-1">
	<div class="row">
		<div class="col-sm-12">
			<label><span class="badge badge-secondary h5 text-white">1.</span> Prioridad del sistema básico de mejora</label><br>
			<select class="form-control" id="opt_prioridad" onchange="show($(this).val())">
				<option value="0">SELECCIONAR PRIORIDAD</option>
				<?php foreach ($prioridades as $prioridad): ?>
						<option value="<?= $prioridad['id_prioridad'] ?>"><?= $prioridad['prioridad'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="col-sm-12" id="normalidad" style="margin-top:15px;">
			<label>Selecciona una opción</label><br>
			<select class="form-control" id="opt_prioridad_especial">
			</select>
		</div>
	</div>
	<div id="hiddenDiv1" style="display:none">
		<div class="row mt-4">
			<div class="col-12">
				<label><span class="badge badge-secondary h5 text-white">2.</span> Objetivos y sus metas <em class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Para la prioridad seleccionada escribe un objetivo que inicie con uno de los siguientes verbos (aumentar, disminuir, alcanzar o eliminar) seguido por un indicador concreto (por ejemplo: asistencia, aprovechamiento, ... y en algunos casos enfocados a un nivel educativo, a un grado en particular, a una asignatura...), continuando con una meta numérica de mejora del indicador y finalizando con una fecha de cumplimiento máximo (si es para el final del período escolar se puede omitir este elemento dándolo por entendido)"></em></label>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="alert alert-info" role="alert">
					<div class="row">

						<div class="col">
							<label class="mb-1">
								<span class="badge badge-secondary h5 text-white">1.Verbo </span>
								<span class="badge badge-success h5 text-white ml-2">
									<i class="fas fa-angle-double-right"></i>
								</span>
							</label>

							<select class="form-control" id="slt_verbo" tabindex="-98" onchange="boxes($(this).val())">
								<option selected="" value="0">SELECCIONAR</option>
								<option>LOGRAR</option>
								<option>AUMENTAR</option>
								<option>ELIMINAR</option>
								<option>DISMINUIR</option>
							</select>
						</div>

						<div class="col">
							<label class="mb-1">
								<span class="badge badge-secondary h5 text-white">2.Indicador</span>
								<span class="badge badge-success h5 text-white ml-2">
									<i class="fas fa-angle-double-right"></i>
								</span>
							</label>
							<select class="form-control" id="slt_indicador" tabindex="-98" onchange="boxes($(this).val())">
							</select>
						</div>

						<div class="col">
							<label class="mb-1">
								<span class="badge badge-secondary h5 text-white">3.Metrica</span>
								<span class="badge badge-success h5 text-white ml-2">
									<i class="fas fa-angle-double-right"></i>
								</span>
							</label>
							<select class="form-control" id="slt_metrica" tabindex="-98">
								<option value="-1">SELECCIONAR</option>
							</select>
						</div>

						<div class="col">
							<label class="mb-1"><span class="badge badge-secondary h5 text-white">4.Meta</span><span class="badge badge-success h5 text-white ml-2"><i class="fas fa-angle-double-right"></i> </span></label>
							<select class="form-control" id="slt_meta" tabindex="-98" onchange="boxes($(this).val())">
								<option selected="" value="0">SELECCIONAR</option>
								<option>OPCIÓN 1</option>
								<option>OPCIÓN 2</option>
								<option>OPCIÓN 3</option>
								<option>OPCIÓN 4</option>
							</select>
						</div>


						<div class="col">
							<label class="mb-1"><span class="badge badge-secondary h5 text-white">5.Fecha</span><span class="badge badge-success h5 text-white ml-2"><i class="fas fa-angle-double-right"></i> </span></label>

							<select class="form-control" id="slt_fecha" tabindex="-98" onchange="boxes($(this).val())">
								<option selected="" value="0">SELECCIONAR</option>
								<option>Agosto</option>
								<option>Septiembre</option>
								<option>Octubre</option>
								<option>Noviembre</option>
								<option>Diciembre</option>
								<option>Enero</option>
								<option>Febrero</option>
								<option>Marzo</option>
								<option>Abril</option>
								<option>Mayo</option>
								<option>Junio</option>
								<option>Julio</option>
								<option>Otro</option>
							</select>
						</div>

						<!-- Boton generar -->
						<div class="col-auto">
							<label class="mb-1 d-block"><span class="badge badge-secondary h5 text-white">6.Generar</span><span class="badge badge-success h5 text-white ml-2"><i class="fas fa-angle-double-down"></i> </span></label>
							<button id="writeText" type="button" class="btn btn-dark btn-block">Generar <i class="fas fa-i-cursor"></i>
							</button>
						</div>

					</div> <!-- row -->


					<div class="row mt-3">
						<div class="col">
							<label class="mb-1"><span class="badge badge-secondary h5 text-white">7.Objetivo</span><span class="badge badge-success h5 text-white ml-2"><i class="fas fa-angle-double-right"></i> </span></label>
							<textarea id="CAPoutput" class="form-control" rows="4" style="text-transform: uppercase;"></textarea>
							<small id="passwordHelpInline" class="text-muted">Máximo 400 caracteres.</small>

							<input type="hidden" id="update_flag" name="" value="">
						</div>
						<div class="col-auto">
							<label class="mb-1 d-block"><span class="badge badge-secondary h5 text-white">8.Guardar</span><span class="badge badge-success h5 text-white ml-2"><i class="fas fa-angle-double-down"></i> </span></label>
							<button id="grabar_objetivo" type="button" class="btn btn-dark btn-block"><i class="fas fa-check-circle"></i></button>
							<hr class="my-2">

							<button id="limpiar" type="button" class="btn btn-success btn-block"><i class="fas fa-plus-circle"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- row -->

		<div class="row">
			<div class="col-12">
				<div class="alert alert-info" role="alert">
					<div class="row">
						<div id="objetivo_meta" class="table-responsive">

						</div>
					</div>
				</div>
			</div>
		</div>

		<form id="t_prioritario" enctype="multipart/form-data">
			<div class="row mt-3">
				<div class="col-lg-6">
					<label><span class="badge badge-secondary h5 text-white">3.</span> Problemática por prioridad</label><br>
					<textarea id="evidencias_problematicas" name="problematica" class="form-control" rows="2" maxlength="400"></textarea>
				</div>

				<div class="col-lg-6 mt-3 mt-lg-0">
					<label><span class="badge badge-secondary h5 text-white">4.</span> Evidencias de las problematicas</label>
					<br>
					<textarea id="evidencias_problematicas" name="evidencia" class="form-control" rows="2" maxlength="400"></textarea>
				</div>
			</div>

			<div class="row mt-4">
				<div class="col-lg-6">
					<label><span class="badge badge-secondary h5 text-white">5.</span> Observaciones del director</label>
					<textarea id="txt_rm_meta" name="comentario_dir" class="form-control" rows="2"></textarea>
				</div>

				<div class="col-lg-6 mt-2 mt-lg-0">
					<label><span class="badge badge-secondary h5 text-white">6.</span> Observaciones del supervisor</label>
					<br>
					<textarea id="txt_rm_programayuda" class="form-control" rows="2" maxlength="400"></textarea>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-12 mt-2 mt-lg-0">
					<label><span class="badge badge-secondary h5 text-white">7.</span> Subir evidencia (imágen o pdf)</label>
					<small id="" class="text-muted d-block">Disponible a partir del Consejo Técnico Escolar 2.</small>
					<div class="input-group mb-3">
					  <div class="custom-file">
					    <input type="file" class="custom-file-input" id="userFile" name="archivo">
					    <label class="custom-file-label" for="inputGroupFile01">Selecciona un archivo</label>
					  </div>
					</div>
				</div>
			</div>
			<div class="row mt-15">
				<div class="col-12">
					<button type="button" id="grabar_prioridad" class="btn btn-primary btn-style-1 mr-10">Grabar</button>
				</div>
			</div>
			<input type="hidden" id="tema_prioritario" name="tema_prioritario">
		</form>
	</div>
</div>

<input type="hidden" id="nivel" value="<?php echo $this->cct[0]['nivel']; ?>">
<input type="hidden" value="" id="tema_prioritario" name="tema_prioritario">
<input type="hidden" value="" id="id_objetivo">



<script type="text/javascript" src="<?= base_url('assets/js/rutademejora/rutademejora_new/btn_prioridad.js') ?>"></script>
