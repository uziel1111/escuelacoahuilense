<div class="alert alert-info" role="alert">
	Escuela: <span class="fw800">NOMBRE DE LA ESCUELA</span><br> Prioridad: <span class="fw800">Convivencia escolar</span><br> Problemática(s): <span class="fw800">Asistencia de profesores</span><br> Evidencia(s): <span class="fw800">www.sarape.org</span>
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
						<div role="wrapper" class="gj-datepicker gj-datepicker-bootstrap gj-unselectable input-group"><input id="datepicker1" data-type="datepicker" data-guid="2dab2477-2174-500c-f1f5-ac80e2e1f0b3" data-datepicker="true" class="form-control" role="input"><span class="input-group-append" role="right-icon"><button class="btn btn-outline-secondary border-left-0" type="button"><i class="gj-icon">event</i></button></span></div>
						<script>
							$( '#datepicker1' ).datepicker( {
								uiLibrary: 'bootstrap4'
							} );
						</script>
					</div>
					<div class="col-md-4">
						<label>Fecha de término</label>
						<div role="wrapper" class="gj-datepicker gj-datepicker-bootstrap gj-unselectable input-group"><input id="datepicker2" data-type="datepicker" data-guid="80a7af2c-eef8-599e-8c21-e6d36f842e6d" data-datepicker="true" class="form-control" role="input"><span class="input-group-append" role="right-icon"><button class="btn btn-outline-secondary border-left-0" type="button"><i class="gj-icon">event</i></button></span></div>
						<script>
							$( '#datepicker2' ).datepicker( {
								uiLibrary: 'bootstrap4'
							} );
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
</div>

<div class="row mt-15">
	<div class="col-12">
		<button type="button" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Editar"><i class="fas fa-edit"></i></button>
		<button type="button" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Eliminar"><i class="fas fa-trash-alt"></i></button>
	</div>
</div>

<div class="row mt-15">
	<div class="col-12">
		<div class="table-responsive">
			<table id="" class="table table-condensed table-hover  table-bordered">
				<thead>
					<tr class="info">
						<th id="idrutamtema" hidden="">
							<center>Actividades</center>
						</th>
						<th id="orden" style="width:4%">
							<center>Ámbito</center>
						</th>
						<th id="tema" style="width:20%">
							<center>Fecha de inicio</center>
						</th>
						<th id="problemas" style="width:31%">
							<center>Fecha de término</center>
						</th>
						<th id="evidencias" style="width:31%">
							<center>Recursos</center>
						</th>
						<th id="n_actividades" style="width:8%">
							<center>Avance</center>
						</th>
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
