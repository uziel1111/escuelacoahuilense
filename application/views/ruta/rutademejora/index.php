
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
								<button type="button" id="btn_actividades" title="Crear actividades" data-toggle="tooltip" title="Crear actividades" class="btn btn-lg btn-primary" ><i class="fas fa-tasks"></i></button>
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
<!-- fin modal -->

<!-- scripts -->
<script type="text/javascript" src="<?= base_url('assets/js/rutademejora/rutademejora_new/acciones.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/rutademejora/rutademejora_new/ayuda.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/rutademejora/rutademejora_new/ruta.js') ?>"></script>
