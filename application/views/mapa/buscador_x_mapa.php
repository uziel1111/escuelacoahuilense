<div class="container">
    <div class="row">
        <div class="col col-md-4">
          <?=form_label('Municipio', 'minicipio', array('class' => 'mr-sm-2'));?>
          <?=form_dropdown('minicipio', $municipios, 'large', array('class' => 'form-control', 'id' => 'slt_municipio_mapa'));?>
        </div>
        <div class="col col-md-4">
          <?=form_label('Nivel', 'nivel');?>
            <?=form_dropdown('nivel', $niveles, 'large', array('class' => 'form-control', 'id' => 'slt_nivel_mapa'));?>
        </div>
        <div class="col col-md-4">
            <?=form_label('Sostenimiento', 'sostenimiento');?>
            <?=form_dropdown('sostenimiento', $sostenimientos, 'large', array('class' => 'form-control', 'id' => 'slt_sostenimiento_mapa'));?>
        </div>
    </div>
	<div class="row">
        <div class="col">
            <?=form_label('Nombre de la escuela(Opcional)', 'n_escuela');?>
            <?=form_input('n_escuela', '', array('class' => 'form-control', 'id' => 'txt_nombre_escuela'));?>
        </div>
        <div class="col">
             <?=form_label('Clave centro de trabajo(Opcional)', 'cct');?>
            <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text" id="btnGroupAddon">21</div>
                </div>
                <?=form_input('cct', '', array('class' => 'form-control', 'id' => 'txt_cct_escuela'));?>
              </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
        </div>
        <div class="col-1">
            <button class="btn btn-primary" id="btn_ayuda_mapa">Ayuda</button>
        </div>
        <div class="col-1">
            <button class="btn btn-primary" id="btn_buscar_mapa">Buscar</button>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/mapa/funcionalidad_mapa.js') ?>"></script>
