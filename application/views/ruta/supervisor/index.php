<style type="text/css">
	.selected {
    background-color: #9ccc65;
    color: #FFF;
}
.margintop35{
  margin-top: 35px;
}

.margintop10{
  margin-top: 10px;
}
</style>

<div class="container">
	<div class="row">
		<div class="col-6 margintop10">
			<div class="form-group">
			    <label for="exampleSelect1">Escuelas:</label>
			    <select class="form-control" name="slt_cct_excuelasxsuper" id="slt_cct_excuelasxsuper">
			    	<?php foreach ($escuelas as $escuela): ?>
                            <option value="<?= $escuela->b_cct ?>" data-turno="<?= $escuela->b_desc_turno ?>"><?= $escuela->b_nombre ?> [<?=$escuela->b_cct?> - <?=$escuela->b_desc_turno?>]</option>
                    <?php endforeach; ?>
			    </select>

			  </div>
		</div>

		<div class="col-2 margintop35">
			<button class="btn btn-primary" id="btn_get_rutamejoraxcct">Buscar ruta</button>

		</div>
		<?php  echo form_open(''.base_url().'index.php/Reporte/get_reporte_desde_sup', array('target' => '_blank','id' => 'form_imp_rm')); ?>
		<div class="col-2 margintop35" id="dv_btn_imprpdf">
			<button type="submit" class="btn btn-primary" title="Generar reporte"  id="btn_imp_rutamejoraxcct">Imprimir ruta de mejora</button>
			<!-- <a class="btn btn-primary"   href="<?= base_url()?>index.php/Reporte/get_reporte_desde_sup/?cct=<?= $escuelas[0]->b_cct ?>&turno=<?= $escuelas[0]->b_desc_turno ?>" >Imprimir ruta de mejora</a> -->
			<input type="text" name="cct_tmp" id="cct_tmp" value="<?= $escuelas[0]->b_cct ?>" hidden>
			<input type="text" name="turno_tmp" id="turno_tmp" value="<?= $escuelas[0]->b_desc_turno ?>" hidden>
		</div>
		<?= form_close(); ?>
	</div>

	<br>
	<div class="row">
		<div class="col-2">
			<button class="btn btn-secondary" id="btn_cargar_mensaje_super" title="Observación de tema prioritario" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit"></i></button>
			<button class="btn btn-info" id="btn_ver_ruta_super" title="Ver acciones de tema prioritario"><i class="far fa-eye"></i></button>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<small class="form-text text-muted">Selecciona una fila para poder realizar alguna acción</small>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal_ver_evidencia_super" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-style-1">
      <div class="modal-header bgcolor-2">
        <h5 class="modal-title text-white" id="exampleModalLabel"> Archivo evidencia</h5>
        <button type="button" class="close" id="cerrar_modal_ver_evidencia_super" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="form-group form-group-style-1">
                <div class="row mt-15">
                  <div class="col-md-12" id="dv_ver_evidencia_super">
                  </div>
                </div>
              </div>
  </div>
</div>
</div>
</div>
<!-- Modal -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/js/rutademejora/supervisor/operacionesindex.js'); ?>"></script>
