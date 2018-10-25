<style type="text/css">
	.selected {
    background-color: #9ccc65;
    color: #FFF;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="form-group">
			    <label for="exampleSelect1">Escuelas:</label>
			    <select class="form-control" id="slt_cct_excuelasxsuper">
			    	<?php foreach ($escuelas as $escuela): ?>
                            <option value="<?= $escuela->b_cct ?>" data-turno="<?= $escuela->b_desc_turno ?>"><?= $escuela->b_nombre ?></option>
                    <?php endforeach; ?>
			    </select>
			  </div>
		</div>

		<div class="col-6">
			<br>
			<br>
			<button class="btn btn-primary" id="btn_get_rutamejoraxcct">Buscar ruta</button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-2">
			<button class="btn btn-secondary" id="btn_cargar_mensaje_super" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit"></i></button>
			<button class="btn btn-info" id="btn_ver_ruta_super"><i class="far fa-eye"></i></button>
		</div>
	</div>	
	<br>
	<!-- <div class="row"> -->
		<div id="contenedor_tabla_rutas"></div>
	<!-- </div> -->
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mensaje del supervisor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
		    <label for="mensajesupervisor">Escriba su mensaje</label>
		    <textarea class="form-control" id="mensajesupervisor" rows="3"></textarea>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_guarda_msg_super">Guardar mensaje</button>
      </div>
    </div>
  </div>
</div>
<div id="contenedor_vista_acciones"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/js/rutademejora/supervisor/operacionesindex.js'); ?>"></script>