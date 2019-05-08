<style type="text/css">
  td {border: 1px #DDD solid; padding: 5px; cursor: pointer;}

.selected {
    background-color: #9ccc65;
    color: #FFF;
}
.popover-body {
    padding: .5rem .75rem;
    color: #212529;
}
.popover{
    max-width:600px;
}
</style>

	<!-- Start Main Area -->
	<section class="main-area">
		<div class="container">
			<div class="row justify-content-center flex-column mb-3">
				<nav>
					<div class="nav nav-tabs nav-tabs-style-1" id="nav-tab" role="tablist">
						<a class="nav-item nav-link nav-link-style-1 active" id="nav-ruta-tab" data-toggle="tab" href="#nav-ruta" role="tab" aria-controls="nav-ruta" aria-selected="true">Ruta de Mejora</a>
						<a class="nav-item nav-link nav-link-style-1" id="nav-avances-tab" data-toggle="tab" href="#nav-avances" role="tab" aria-controls="nav-avances" aria-selected="false">Avances por acciones</a>
						<a class="nav-item nav-link nav-link-style-1" id="nav-ayuda-tab" data-toggle="tab" href="#nav-ayuda" role="tab" aria-controls="nav-ayuda" aria-selected="false">Ayuda</a>
					</div>
				</nav>
				<div class="tab-content tab-content-style-1" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-ruta" role="tabpanel" aria-labelledby="nav-ruta-tab">
						<div class="row">

							<div class="col">
								<span data-toggle="modal" data-target="#mision">
								<button type="button" id="btn_mision" data-toggle="tooltip" title="Misión" class="btn btn-lg btn-primary"><i class="fas fa-flag" ></i></button>
								</span>

								<span data-toggle="modal" data-target="#prioridad">
								<button type="button" id="btn_prioridad" data-toggle="tooltip" title="Agregar prioridad" class="btn btn-lg btn-primary"><i class="fas fa-plus-square" ></i></button>
								</span>
								<button id="btn_rutamejora_editar" type="button" data-toggle="tooltip" title="Editar" class="btn btn-lg btn-primary" ><i class="fas fa-edit"></i></button>

								<span data-toggle="modal" data-target="#actividades">
								<button type="button" id="btn_rutamejora_acciones" title="Crear actividades" data-toggle="tooltip" title="Crear actividades" class="btn btn-lg btn-primary" ><i class="fas fa-tasks"></i></button>
								</span>
								<button id="btn_get_reporte" type="button" data-toggle="tooltip" title="Imprimir" class="btn btn-lg btn-primary"><i class="fas fa-print"></i></button>

								<button id="btn_rutamejora_eliminareg" type="button" data-toggle="tooltip" title="Eliminar" class="btn btn-lg btn-primary"><i class="fas fa-trash-alt"></i></button>
							</div>

							<div class="col-auto">
								<i class="fas fa-hand-point-right"></i> En esta escuela se cumplen:<br>
								<button type="button" class="btn btn-primary px-2 pt-0">
								  <h6 class="d-inline"><span class="badge badge-light mt-0">1</span></h6> de 2 Líneas de Acción Estratégica.
								</button>

							</div>
						</div>
						<div class="row mt-15">
							<div class="col-12">
								<div id="contenedor_tabla"></div>
							</div>

							<label class="" style="">*Puede modificar el orden de los temas prioritarios arrastando el registro en la posición deseada.</label>
						</div>
					</div> <!-- Ruta mejora -->

					<div class="tab-pane fade" id="nav-avances" role="tabpanel" aria-labelledby="nav-avances-tab">
						<?= $vista_avance ?>
					</div> <!-- Avances -->

					<div class="tab-pane fade" id="nav-ayuda" role="tabpanel" aria-labelledby="nav-ayuda-tab">
						<?= $vista_ayuda ?>
					</div> <!-- Ayuda -->

				</div> <!-- tab-content -->
			</div> <!-- row -->
		</div> <!-- container -->

</section>

<!-- modal -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content modal-style-1">
			<div class="modal-header bg-dark">
				<h5 class="modal-title text-white" id="exampleModalLabel"><i class="far fa-lightbulb"></i> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div id="div_generico">

				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="exampleModalacciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content modal-style-1">
			<div class="modal-header bgcolor-2">
				<h5 class="modal-title text-white" id="exampleModalLabel">Actividades por prioridad del Sistema Básico de Mejora</h5>
				<button type="button" class="close" id="cerrar_modal_acciones" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-info" role="alert">
					Escuela: <span class="fw800"><label id="label_escuela"></label></span><br>

					Prioridad: <span class="fw800"><label id="label_prioridad"></label></span><br>

					Problemática(s): <span class="fw800"><label id="label_problematica"></label></span><br>

					Evidencia(s): <span class="fw800"><label id="label_evidencia"></label></span>
				</div>
				<div class="card mb-3 card-style-1">
					<div class="card-header card-1-header bg-light">Actividades</div>
					<div class="card-body">
						<div class="card-block">
							<div class="form-group form-group-style-1">

								<div class="row mt-15">
									<div class="col-md-6">
										<label><label style="color:red;">*</label>Actividad:</label>
										<textarea id="txt_rm_meta" class="form-control" rows="5" maxlength="150"></textarea>
									</div>
									<div class="col-md-6">
										<label><label style="color:red;">*</label>Recursos:</label>
										<textarea id="txt_rm_obs" class="form-control" rows="5" maxlength="150"></textarea>
									</div>

								</div>
								<div class="row mt-15">
									<div class="col-md-6">
										<label><label style="color:red;">*</label>Ambito:</label>
										<select class="selectpicker form-control" id="slc_rm_ambito" title="SELECCIONA UN AMBITO">
											<?php foreach ($arr_ambitos as $item): ?>
															<option value="<?= $item['id_ambito'] ?>"><?= $item['ambito'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-md-6">
										<label><label style="color:red;">*</label>Responsables (Selecciona uno o más)</label>
										<select class="selectpicker form-control" multiple data-selected-text-format="count > 3" id="slc_responsables" title="SELECCIONA">
										<?= $responsables?>
										</select>
										<br>
										<textarea id="txt_rm_otropa" class="form-control" rows="1" placeholder="Escriba que otro" hidden="true"></textarea>
									</div>
									<div class="col-md-6">
										<label><label style="color:red;">*</label>Fecha de inicio</label>
										<input id="datepicker1" disabled />
										<script>
										$('#datepicker1').datepicker({
											uiLibrary: 'bootstrap4'
										});
										</script>
									</div>

									<div class="col-md-6">
										<label><label style="color:red;">*</label>Fecha de término</label>
										<input id="datepicker2" disabled/>
										<script>
										$('#datepicker2').datepicker({
											uiLibrary: 'bootstrap4'
										});
										</script>
									</div>
								</div>
								<div class="row mt-15">
									<div class="col-md-6" id="div_otro_responsable">
										<label>Otro responsable:</label>
										<input type="text" name="otro_responsable" id="otro_responsable" class="form-control">
									</div>
								</div>
								<div class="row mt-15">
									<!-- <div class="col-md-12">
										<label><label style="color:red;">*</label>Indicadores de medición:</label>
										<textarea id="txt_rm_indimed" class="form-control" rows="3" maxlength="150"></textarea>
									</div>
								</div> -->
								<div class="row mt-15">
									<div class="col-md-12">
										<label style="color:red;">*Datos requeridos</label>
									</div>
								</div>
								<div class="row mt-15">
									<div class="col-12">
										<button type="button" class="btn btn-primary btn-style-1 ml-20" id="btn_agregar_accion">Agregar actividad</button>
										<button type="button" class="btn btn-primary btn-style-1 ml-20" id="btn_editando_accion">Editar</button>
									</div>
								</div>
							</div>

						</div>
					</div><!-- card -->
					<div class="row mt-15">
						<div class="col-12">
							<button id="id_btn_edita_accion" type="button" title="Editar" class="btn btn-primary"><i class="fas fa-edit"></i></button>
							<button id="id_btn_elimina_accion" type="button" title="Eliminar" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button>
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
</div>
<!-- fin modal -->

<!-- scripts -->
<!-- <script type="text/javascript" src="<?= base_url('assets/js/rutademejora/rutademejora_new/acciones.js') ?>"></script> -->
<!-- <script type="text/javascript" src="<?= base_url('assets/js/rutademejora/rutademejora_new/ayuda.js') ?>"></script> -->
<!-- <script type="text/javascript" src="<?= base_url('assets/js/rutademejora/rutademejora_new/ruta.js') ?>"></script> -->


<script src="<?= base_url('assets/js/rutademejora/rm_table_operation.js'); ?>"></script>
<script src="<?= base_url('assets/js/rutademejora/drag.js'); ?>"></script>
<script src="<?= base_url('assets/js/rutademejora/rutademejora.js'); ?>"></script>
<script src="<?= base_url('assets/js/rutademejora/rm_tp.js'); ?>"></script>
<script src="<?= base_url('assets/js/rutademejora/rm_edith_tp.js'); ?>"></script>
<script src="<?= base_url('assets/js/rutademejora/rm_delete_tp.js'); ?>"></script>
<script src="<?= base_url('assets/js/rutademejora/acciones.js'); ?>"></script>
<script src="<?= base_url('assets/js/rutademejora/avances.js'); ?>"></script>
