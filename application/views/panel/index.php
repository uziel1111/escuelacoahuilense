<style type="text/css">
	.margintop{
		margin-top: 25px;
	}
</style>
<div class="container">
	<div class="row margintop">
		<div class="col-12">
			<div class="card">
				  <div class="card-header">
				    Opciones
				  </div>
				  <div class="container-fluid">
				  	<div class="row">
				    	<div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-6">
                          <div class="form-group form-group-style-1">
                            <?=form_label('Periodo:', 'periodo');?>
                            <?=form_dropdown('periodo', $periodos, 'large', array('class' => 'form-control', 'id' => 'slt_periodo_reactivos'));?>
                          </div>
                        </div><!-- col-md-4 -->
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-6">
                          <div class="form-group form-group-style-1">
                            <?=form_label('Campo disciplinario:', 'campoD');?>
                            <?=form_dropdown('campoD', $camposd, 'large', array('class' => 'form-control', 'id' => 'slt_campod_reactivos'));?>
                          </div>
                        </div><!-- col-md-4 -->
				    </div>
				    <div class="row float-right">
				    	<button type="button" class="btn btn-secondary" id="btn_mostrar_datos_rec">Mostrar</button>
				    </div>
				    <!-- <div class="container-fluid"> -->
								<div class="margintop" id="contenedor_tabla"></div>
						<!-- </div> -->
					</div>
				  </div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Apoyos -->
<div class="modal fade" id="modal_visor_recursos" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-style-1">
            <div class="modal-header bgcolor-4">
                <h5 class="modal-title text-white" id="exampleModalLabel"></h5>
                <button type="button" class="close" id="md_close_visor_recursos" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="div_contenedor_vista">
                	<div class="row">
						<div class="col">
							<button type="button" class="btn btn-info" id="btn_crear_nuevo_recurso">Crear</button>
						</div>
					</div>
					<br>
						<div id="div_contenedor_de_tablarec">
						</div>
						<div id="div_contenedor_hidden"></div>
                </div>
            </div>
            </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Apoyos -->
<div class="modal fade" id="modal_operacion_recursos" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" >
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-style-1">
            <div class="modal-header bgcolor-4">
                <h5 class="modal-title " id="exampleModalLabel">Carga de material de apoyo</h5>
                <button type="button" class="close" id="md_close_operacion_recursos" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<div class="form-group">
				    <label for="tipodematerial">Seleccione tipo de contenido a subir</label>
				    <select class="form-control" id="tipodematerial">
				    	<?php foreach ($contenidos as $key => $value): ?>
						        <option value="<?=$key?>"><?=$value?></option>
						<?php endforeach; ?>
				    </select>
				  </div>
                <div id="div_contenedor_operaciones">
                	<div class="form-group">
					    <label for="inputtitulo">Introdusca un titulo para su contenido: </label>
					    <input type="text" class="form-control" id="inputtitulo" placeholder="Titulo">
					    <p id="mensaje_alertattitulo" style="color:red;">*El titulo es requerido</p>
					  	</div>
						<div class="form-group">
					    <label for="inputcampourl">Introdusca url: </label>
					    <input type="text" class="form-control" id="inputcampourl" placeholder="https://misitiodeapoyo.com">
					    <p id="mensaje_alertaurl" style="color:red;">*El url es requerido</p>
					  	</div>
					  	<div class="form-group">
					    <label for="inputcampofuente">Introdusca fuente: </label>
					    <input type="text" class="form-control" id="inputcampofuente">
					    <p id="mensaje_alertafuente" style="color:red;">*La fuente es requerida</p>
					  	</div>
					  	<input type="hidden" name="idreactivo" id="idreactivoform">
					  	<button type="button" class="btn btn-info" onClick = "obj_recursos.envia_url()">Guardar</button>
                </div>
                <div id="div_contenedor_operaciones_files">
                	<!--el enctype debe soportar subida de archivos con multipart/form-data-->
					<form enctype="multipart/form-data" class="formulario">
						<label>Titulo</label><br />
					    <input name="titulo" type="text" id="titulofile" class="form-control"/>
					    <p id="mensaje_alertatitulo_file" style="color:red;">*El titulo es requerido</p>
					    <input name="archivo" type="file" id="imagen" />
					    <p id="mensaje_alertafile" style="color:red;">*Seleccione un archivo</p>
					    <div class="form-group">
					    <label for="inputcampofuentefile">Introdusca fuente: </label>
					    <input type="text" class="form-control" id="inputcampofuentefile">
					    <p id="mensaje_alertafuente_file" style="color:red;">*La fuente es requerida</p>
					  	</div>
					    <!--div para visualizar mensajes-->
						<div class="messages"></div><br /><br />
						<!--div para visualizar en el caso de imagen-->
						<div class="showImage"></div>
					    <input type="button" value="Subir" class="btn btn-info" id="btn_subir_pdf_imagen" /><br />
					    <input type="hidden" name="tipo" id="idtipofileform">
					    <input type="hidden" name="idreactivo" id="idreactivofileform">
					    <input type="hidden" name="idseleccionadofile" id="idseleccionadofile" value="false">
					</form>
					
                </div>
            </div>
            </div>
    </div>
</div>
<!-- End Modal -->
<script src="<?= base_url('assets/js/panel/panel.js') ?>"></script>
<script src="<?= base_url('assets/js/panel/recursos.js') ?>"></script>
