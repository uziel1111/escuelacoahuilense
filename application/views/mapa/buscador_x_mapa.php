
    <div class="row">
        <div class="col col-md-4">
            <div class="form-group form-group-style-1">  
          <?=form_label('Municipio', 'minicipio', array('class' => 'mr-sm-2'));?>
          <?=form_dropdown('minicipio', $municipios, 'large', array('class' => 'form-control', 'id' => 'slt_municipio_mapa'));?>
            </div>
        </div>
        <div class="col col-md-4">
            <div class="form-group form-group-style-1">  
          <?=form_label('Nivel', 'nivel');?>
          <?=form_dropdown('nivel', $niveles, 'large', array('class' => 'form-control', 'id' => 'slt_nivel_mapa'));?>
            </div>                
        </div>
        <div class="col col-md-4">
            <div class="form-group form-group-style-1">  
            <?=form_label('Sostenimiento', 'sostenimiento');?>
            <?=form_dropdown('sostenimiento', $sostenimientos, 'large', array('class' => 'form-control', 'id' => 'slt_sostenimiento_mapa'));?>
            </div>                
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="form-group form-group-style-1">  
            <?=form_label('Nombre de la escuela (Opcional)', 'n_escuela');?>
            <?=form_input('n_escuela', '', array('class' => 'form-control', 'id' => 'txt_nombre_escuela'));?>
            </div>                
        </div>
        <div class="col-4">
            <div class="form-group form-group-style-1">  
             <?=form_label('Clave centro de trabajo(Opcional)', 'cct');?>
            <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text fw800" id="btnGroupAddon">05</div>
                </div>
                <?=form_input('cct', '', array('class' => 'form-control fw800', 'id' => 'txt_cct_escuela'));?>
              </div>
            </div>                
        </div>
    </div>
                  <div class="row">
                    <div class="col-0 col-sm-0 col-md-8 col-lg-8 mt-2"></div><!--  col-0 -->
                    <div class="col-6 col-sm-6 col-md-2 col-lg-2 mt-2">
                      <button class="btn btn-success btn-block btn-style-1" id="btn_ayuda_mapa">Ayuda</button>
                    </div><!--  col-sm-6 -->

                    <div class="col-6 col-sm-6 col-md-2 col-lg-2 mt-2">
                      <button class="btn btn-info btn-block btn-style-1" id="btn_buscar_mapa">Buscar</button>
                    </div><!--  col-sm-6 -->
                  </div><!-- row -->


<script src="<?= base_url('assets/js/mapa/funcionalidad_mapa.js') ?>"></script>
