<div class="container">
<br><br><br><br>
    <div class="row">
        <div class="col col-md-3">
          <?=form_label('Municipio', 'minicipio', array('class' => 'mr-sm-2'));?>
          <?=form_dropdown('minicipio', $municipios, 'large', array('class' => 'form-control', 'id' => 'slt_municipio_ries'));?>
        </div>
        <div class="col col-md-3">
          <?=form_label('Nivel', 'nivel');?>
            <?=form_dropdown('nivel', $niveles, 'large', array('class' => 'form-control', 'id' => 'slt_nivel_ries'));?>
        </div>
        <div class="col col-md-3">
            <?=form_label('Bimestre', 'bimestre');?>
            <?=form_dropdown('bimestre', $bimestres, 'large', array('class' => 'form-control', 'id' => 'slt_bimestre_ries'));?>
        </div>
        <div class="col col-md-3">
            <?=form_label('Ciclo', 'ciclo');?>
            <?=form_dropdown('ciclo', $ciclos, 'large', array('class' => 'form-control', 'id' => 'slt_ciclo_ries'));?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
        </div>
        <div class="col-1">
            <button class="btn btn-primary" id="btn_ayuda_ries">Ayuda</button>
        </div>
        <div class="col-1">
            <button class="btn btn-primary" id="btn_buscar_ries_muni">Buscar</button>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/riesgo/funcionalidad_riesgo.js') ?>"></script>
<script src="<?= base_url('assets/highcharts5.0.3/highcharts.js'); ?>"></script><!--Problemas con esta versión <script src="https://code.highcharts.com/highcharts.js"></script>-->
<script src="<?= base_url('assets/highcharts5.0.3/modules/data.js'); ?>"></script><!--Problemas con esta versión <script src="https://code.highcharts.com/modules/data.js"></script>-->
<script src="<?= base_url('assets/highcharts5.0.3/modules/drilldown.js'); ?>"></script><!--Problemas con esta versión<script src="https://code.highcharts.com/modules/drilldown.js"></script>-->
<script src="<?= base_url('assets/js/riesgo/grafica.js'); ?>"></script>
