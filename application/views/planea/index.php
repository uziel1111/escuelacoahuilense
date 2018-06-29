<div class="container">
<br><br><br><br>
    <div class="card">
    <div class="card-header">Estadisticas Planea</div>
    <div class="card-body">
      <label for="lb_titbusq">Seleccione tipo de búsqueda</label>      
        <ul class="nav nav-tabs" id="tab_busqg" role="tablist">
            <li class="nav-item">
              <a class="nav-link active show" id="xest_muni-tab" data-toggle="tab" href="#xest_muni" role="tab" aria-controls="xest_muni" aria-selected="true">Por Estado / Municipio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="xzona-tab" data-toggle="tab" href="#xzona" role="tab" aria-controls="xzona" aria-selected="false">Por zona escolar</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent_busqg">
            <div class="tab-pane fade active show" id="xest_muni" role="tabpanel" aria-labelledby="xest_muni-tab">
                  <!-- <form action="http://localhost/escuelacoahuilense/index.php/estadistica/xest_muni_x" class="form" id="form_xest_muni" method="post" accept-charset="utf-8"> -->
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 mt-2">
                          <div class="form-group"> 
                            <?=form_label('Municipio', 'minicipio', array('class' => 'mr-sm-2'));?>
                            <?=form_dropdown('minicipio', $municipios, 'large', array('class' => 'form-control', 'id' => 'slt_municipio_mapa'));?>
                          </div>
                        </div><!-- col-md-4 -->
                        <div class="col-12 col-sm-12 col-md-3 col-lg-2 mt-2">
                          <div class="form-group">
                            <?=form_label('Nivel', 'nivel');?>
                            <?=form_dropdown('nivel', $niveles, 'large', array('class' => 'form-control', 'id' => 'slt_nivel_planeaxm'));?>
                          </div>
                        </div><!-- col-md-4 -->
                        <div class="col-12 col-sm-12 col-md-3 col-lg-2 mt-2">
                          <div class="form-group">
                            <?=form_label('Periodo', 'periodo');?>
                            <?=form_dropdown('periodo', $periodos, 'large', array('class' => 'form-control', 'id' => 'slt_periodo_planeaxm'));?>
                          </div>
                        </div><!-- col-md-4 -->
                      </div><!-- row -->

                      <div class="row">
                        <div class="col-0 col-sm-0 col-md-8 col-lg-8 mt-2"></div><!--  col-0 -->
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 mt-2">
                          <a href="http://localhost/escuelacoahuilense/" class="btn btn-default btn-block">Regresar</a>                    
                        </div><!--  col-sm-6 -->
                        <div class="col-6 col-sm-6 col-md-2 col-lg-2 mt-2">
                          <input type="submit" name="mysubmit" value="Buscar" id="btn_busqueda_xestadomun" class="btn btn-info btn-block">
                        </div><!--  col-sm-6 -->
                      </div><!-- row -->
                  <!-- </form> -->
            </div><!-- xest_muni -->
            <div class="tab-pane fade" id="xzona" role="tabpanel" aria-labelledby="xzona-tab">
                <div class="row pt-4">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <!-- <form action="http://localhost/escuelacoahuilense/index.php/estadistica/xest_zona_x" class="form" id="form_xest_zona" method="post" accept-charset="utf-8"> -->
                                <div class="row">
                                  <div class="col-12 col-sm-12 col-md-3 col-lg-3 mt-2">
                                    <div class="form-group"> 
                                        <?=form_label('Zona', 'zona', array('class' => 'mr-sm-2'));?>
                                        <?=form_dropdown('zona', $zonas, 'large', array('class' => 'form-control', 'id' => 'slt_zona_planea'));?>
                                    </div>
                                  </div><!-- col-md-4 -->
                                  <div class="col-12 col-sm-12 col-md-3 col-lg-2 mt-2">
                                      <div class="form-group">
                                        <?=form_label('Nivel', 'nivel');?>
                                        <?=form_dropdown('nivel', $niveles, 'large', array('class' => 'form-control', 'id' => 'slt_nivel_planeaxz'));?>
                                      </div>
                                    </div><!-- col-md-4 -->
                                  <div class="col-12 col-sm-12 col-md-3 col-lg-2 mt-2">
                                      <div class="form-group">
                                        <?=form_label('Periodo', 'periodo');?>
                                        <?=form_dropdown('periodo', $periodos, 'large', array('class' => 'form-control', 'id' => 'slt_periodo_planeaxz'));?>
                                      </div>
                                    </div><!-- col-md-4 -->
                                </div><!-- row -->
                              <!-- </form> -->
                        </div>
                    </div><!--  col-sm-12 -->
                </div><!-- row -->
                <div class="row">
                    <div class="col-0 col-sm-0 col-md-8 col-lg-8 mt-2"></div><!--  col-0 -->
                    <div class="col-6 col-sm-6 col-md-2 col-lg-2 mt-2">
                      <a href="http://localhost/escuelacoahuilense/" class="btn btn-default btn-block">Regresar</a>
                    </div><!--  col-sm-6 -->

                    <div class="col-6 col-sm-6 col-md-2 col-lg-2 mt-2">
                      <input type="submit" name="mysubmit" value="Buscar" id="btn_busqueda_xregion" class="btn btn-info btn-block">
                    </div><!--  col-sm-6 -->
                </div><!-- row -->
            </div>
        </div>
    </div><!-- card-body -->
    <div class="row">
        <div class="col">
            <dir id="div_graficas_masivo_lyc"></dir>
            <dir id="div_graficas_masivo_matematicas"></dir>
        </div>
    </div>
  </div><!-- card -->
</div>

<div id="modal_visor_reactivos" class="modal fade modal100 grises in" role="dialog" data-keyboard="false" data-backdrop="static" >
   <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header modal_head">
            <span class="modal-title" id="modal_reactivos_title">Contenido temático: Aspectos que se consideran en una obra de teatro para pasar de la lectura a la representación.</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
          </div>
          <div class="modal-body">
            <center style="fontSize:24px;">

              <!-- <label id="lbl_unidad_de_analisis"></label></p> -->
           </center>

            <div id="div_reactivos"></div>
          </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/highcharts5.0.3/highcharts.js'); ?>"></script><!--Problemas con esta versión <script src="https://code.highcharts.com/highcharts.js"></script>-->
<script src="<?= base_url('assets/highcharts5.0.3/modules/data.js'); ?>"></script><!--Problemas con esta versión <script src="https://code.highcharts.com/modules/data.js"></script>-->
<script src="<?= base_url('assets/highcharts5.0.3/modules/drilldown.js'); ?>"></script><!--Problemas con esta versión<script src="https://code.highcharts.com/modules/drilldown.js"></script>-->
<script src="<?= base_url('assets/js/planea/graficas.js') ?>"></script>
<script src="<?= base_url('assets/js/planea/planea.js') ?>"></script>