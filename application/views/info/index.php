<section class="main-area">
<div class="container">
	<div class="card mb-3 card-style-1">
	  <div class="card-header card-1-header bg-light">
	    Datos generales
			<input hidden type="text" id="in_id_cct" value="<?=$id_cct?>">
	  </div>
	  <div class="card-body">
	  	<div class="row">
	  		<div class="col">
	  			Nombre del centro de trabajo: <label class="fw800"><?=$nombre_centro?></label>
	  		</div>
	  	</div>
	    <div class="row">
	  		<div class="col">
	  			CCT: <label class="fw800"><?=$cve_centro?></label>
	  		</div>
	  		<div class="col">
	  			Turno: <label class="fw800"><?=$turno?></label>
	  		</div>
	  		<div class="col">
	  			Nivel: <label class="fw800"><?=$nivel?></label>
	  		</div>
	  	</div>
	  	<div class="row">
	  		<div class="col">
	  			Modalidad: <label class="fw800"><?=$modalidad?></label>
	  		</div>
	  		<div class="col">
	  			Sostenimiento: <label class="fw800"><?=$sostenimiento?></label>
	  		</div>
	  		<div class="col">
	  			Región: <label class="fw800"><?=$region?></label>
	  		</div>
	  	</div>
	  	<div class="row">
	  		<div class="col">
	  			Domicilio: <label class="fw800"><?=$domicilio?></label>
	  		</div>
	  		<div class="col">
	  			Localidad: <label class="fw800"><?=$localidad?></label>
	  		</div>
	  		<div class="col">
	  			Municipio: <label class="fw800"><?=$municipio?></label>
	  		</div>
	  	</div>
	  	<div class="row">
	  		<div class="col">
	  			Nombre del director: <label class="fw800"><?=$nombre_director?></label>
	  		</div>
	  		<div class="col">
	  			Estatus de la escuela: <label class="fw800"><?=$estatus?></label>
	  		</div>
	  	</div>
	  </div>
	</div>

                    <div class="card mb-3 card-style-1">
                      <div class="card-header card-1-header bgcolor-2 text-white">Indicadores del modelo educativo de Coahuila</div>
                      <div class="card-body">

 		<div class="row">
                    <div class="col-12 text-center">
                    <div class="btn-group" role="group" aria-label="Indicadores">
                      <button type="button" class="btn btn-secondary btn-style-1" id="btn_info_asist"><span class="fz-30"><i class="material-icons">done_all</i></span><br><span class="h3 color-6">Asistencia</span></button>
                      <button type="button" class="btn btn-secondary btn-style-1" id="btn_info_perma"><span class="fz-30"><i class="material-icons">timeline</i></span><br><span class="h3 color-6">Permanencia</span></button>
                      <button type="button" class="btn btn-secondary btn-style-1" id="btn_info_aprendiz"><span class="fz-30"><i class="material-icons">school</i></span><br><span class="h3 color-6">Aprendizaje</span></button>
                    </div>
                   </div>
		</div>


<div hidden id="dv_info_asistencia" class="container mt-3">
    <div id="accordion" class="accordion-style-1">
        <div class="card-accordion-style-1">
            <div class="accordion-style-1-header" id="estadEsc">
                <a class="collapsed d-block" data-toggle="collapse" data-target="#est_alum_doc_grup" aria-expanded="true" aria-controls="est_alum_doc_grup">
                    <i class="fa fa-chevron-down pull-right"></i>
                    Estadística escolar: alumnos, grupos y docentes
                </a>                
            </div>
            <div id="est_alum_doc_grup" class="collapse" aria-labelledby="estadEsc" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div id="dv_info_graf_alumn"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div id="dv_info_graf_docen"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div id="dv_info_graf_grupos"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div hidden id="dv_info_permanencia" class="container mt-3">
    <?php
    $arr_bimestres['1'] = '1er BIMESTRE';
    $arr_bimestres['2'] = '2do BIMESTRE';
    $arr_bimestres['3'] = '3er BIMESTRE';
    $arr_bimestres['4'] = '4to BIMESTRE';
    $arr_bimestres['5'] = '5to BIMESTRE';
    $arr_ciclos['2017-2018'] = '2017-2018'; ?>    
    <div id="accordion" class="accordion-style-1">
        <div class="card-accordion-style-1" class="accordion-style-1">
            <div class="accordion-style-1-header" id="chriesgo">
                <a class="collapsed d-block" data-toggle="collapse" data-target="#riesgo_esc" aria-expanded="true" aria-controls="riesgo_esc">
                    <i class="fa fa-chevron-down pull-right"></i>
                    Riesgo de abandono escolar
                </a>                 
            </div>
            <div id="riesgo_esc" class="collapse" aria-labelledby="chriesgo" data-parent="#accordion">
                <div class="card-body">
			<div class="row mt-2">
				<div class="col col-md-12 text-secondary fw800">Por combinar inasistencias, bajas calificaciones y/o años sobre la edad ideal del grado.</div>
			</div>
			<div class="row mt-3">
			<div class="col col-md-4">
				<div class="form-group form-group-style-1">
					<?=form_label('Bimestre', 'bimestre');?>
					<?=form_dropdown('bimestre',$arr_bimestres , 'large', array('class' => 'form-control', 'id' => 'slt_bimestre_ries'));?>
			</div>
			</div>
			<div class="col col-md-4">
				<div class="form-group form-group-style-1">
					<?=form_label('Ciclo', 'ciclo');?>
					<?=form_dropdown('ciclo', $arr_ciclos, 'large', array('class' => 'form-control', 'id' => 'slt_ciclo_ries'));?>
			  </div>
			</div>
			<div class="col col-md-1">
				<?=form_label(' ', ' ');?>
					<button class="btn btn-info btn-style-1" id="btn_buscar_ries_esc">Buscar</button>
			</div>
			</div>
			<div class="row">
					<div class="col">
						<div id="dv_riesgo_esc_pie"></div>
						<div id="dv_riesgotab_esc_pie"></div>
					</div>
			</div>
                        
			<div class="row">
					<div class="col">
						<div id="dv_riesgo_esc_bar"></div>
						<div id="dv_riesgtab_esc_bar"></div>
					</div>
			</div>
                </div>
            </div>
        </div>
    </div>


</div>                          
<div hidden id="dv_info_aprendizaje" class="container mt-3">
    <div id="accordion" class="accordion-style-1">
        <div class="card-accordion-style-1 mb-3">
            <div class="accordion-style-1-header" id="chplaneaLC">
                <a class="collapsed d-block" data-toggle="collapse" data-target="#planea_cont_lyc" aria-expanded="true" aria-controls="planea_cont_lyc">
                    <i class="fa fa-chevron-down pull-right"></i>
                    PLANEA por contenido temático: Lenguaje y Comunicación
                </a>                 
            </div>
            <div id="planea_cont_lyc" class="collapse" aria-labelledby="chplaneaLC" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div id="dv_info_graf_contlyc"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-accordion-style-1 mb-3">
            <div class="accordion-style-1-header" id="chplaneaMAT">
                <a class="collapsed d-block" data-toggle="collapse" data-target="#planea_cont_mat" aria-expanded="true" aria-controls="planea_cont_mat">
                    <i class="fa fa-chevron-down pull-right"></i>
                    PLANEA por contenido temático: Matemáticas
                </a>                 
            </div>
            <div id="planea_cont_mat" class="collapse" aria-labelledby="chplaneaMAT" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div id="dv_info_graf_contmat"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <div class="card-accordion-style-1 mb-3">
            <div class="accordion-style-1-header" id="chplaneaLO">
                <a class="collapsed d-block" data-toggle="collapse" data-target="#planea_n_logro" aria-expanded="true" aria-controls="planea_n_logro">
                    <i class="fa fa-chevron-down pull-right"></i>
                    PLANEA por niveles de logro
                </a>                
            </div>
            <div id="planea_n_logro" class="collapse" aria-labelledby="chplaneaLO" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">

	    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div style="display:inline-block; width:20px; height:20px; background-color:#ECC462; border: 1px solid black;"></div>
            <p style="display:inline-block; font-size:1.5em; margin-left:10px;">2015</p>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <div style="display:inline-block; width:20px; height:20px; background-color:#D5831C; border: 1px solid black;"></div>
            <p style="display:inline-block; font-size:1.5em; margin-left:10px;">2016</p>
          </div>
			<div class="row">
					<div class="col">
						<div id="dv_info_graf_nlogrolyc"></div>
					</div>
			</div>
			<div class="row">
					<div class="col">
						<div id="dv_info_graf_nlogromat"></div>
					</div>
			</div>
			<div class="row">
      <div class='table-responsive col-sm-12'  style='whith:80%;'>

      <table id='tabla_planea' class='table table-gray table-hover'>
      <thead>
      <tr>
      <th class='text-center' rowspan='2'></th>
      <th class='text-center' colspan='4'>Lenguaje y Comunicación</th>
      <th class='text-center' colspan='4'>Matemáticas</th> </tr><tr>
      <th class='text-center'>I
      <br><span style='font-weight:normal'>Insuficiente</span></th>
      <th class='text-center'>II
      <br><span style='font-weight:normal'>Elemental</span>
      </th>    <th class='text-center'>III
      <br><span style='font-weight:normal'>Bueno</span></th>
      <th class='text-center'>IV
      <br><span style='font-weight:normal'>Excelente</span></th>
      <th class='text-center'>I
      <br><span style='font-weight:normal'>Insuficiente</span></th>
      <th class='text-center'>II
       <br><span style='font-weight:normal'>Elemental</span></th>
      <th class='text-center'>III
      <br><span style='font-weight:normal'>Bueno</span></th>
      <th class='text-center'>IV
      <br><span style='font-weight:normal'>Excelente</span></th></tr>
		</thead>
			<tbody>
				<tr><td colspan='9' style='background-color:silver;'>PLANEA 2015</td></tr>
				<tr>
				<th class='text-center'>Tu escuela</th>
				<?php foreach ($planea15_escuela as $key => $value): ?>
					<th class='text-center'><?=$value['lyc_i'] ?>%</th>
					<th class='text-center'><?=$value['lyc_ii'] ?>%</th>
					<th class='text-center'><?=$value['lyc_iii'] ?>%</th>
					<th class='text-center'><?=$value['lyc_iv'] ?>%</th>
					<th class='text-center'><?=$value['mat_i'] ?>%</th>
					<th class='text-center'><?=$value['mat_ii'] ?>%</th>
					<th class='text-center'><?=$value['mat_iii'] ?>%</th>
					<th class='text-center'><?=$value['mat_iv'] ?>%</th>
				<?php endforeach; ?>
				</tr>
				<tr>
				<th class='text-center'>Estado de Coahuila</th>
				</tr>
				<tr>
				<th class='text-center'>Nacional</th>
				<?php foreach ($planea15_nacional as $key => $value): ?>
					<th class='text-center'><?=$value['lyc_i'] ?></th>
					<th class='text-center'><?=$value['lyc_ii'] ?></th>
					<th class='text-center'><?=$value['lyc_iii'] ?></th>
					<th class='text-center'><?=$value['lyc_iv'] ?></th>
					<th class='text-center'><?=$value['mat_i'] ?></th>
					<th class='text-center'><?=$value['mat_ii'] ?></th>
					<th class='text-center'><?=$value['mat_iii'] ?></th>
					<th class='text-center'><?=$value['mat_iv'] ?></th>
				<?php endforeach; ?>
				</tr>
				<tr><td colspan='9' style='background-color:silver;'>PLANEA 2016</td></tr>
				<tr>
				<th class='text-center'>Tu escuela</th>
				<?php foreach ($planea16_escuela as $key => $value): ?>
					<th class='text-center'><?=$value['lyc_i'] ?>%</th>
					<th class='text-center'><?=$value['lyc_ii'] ?>%</th>
					<th class='text-center'><?=$value['lyc_iii'] ?>%</th>
					<th class='text-center'><?=$value['lyc_iv'] ?>%</th>
					<th class='text-center'><?=$value['mat_i'] ?>%</th>
					<th class='text-center'><?=$value['mat_ii'] ?>%</th>
					<th class='text-center'><?=$value['mat_iii'] ?>%</th>
					<th class='text-center'><?=$value['mat_iv'] ?>%</th>
				<?php endforeach; ?>
				</tr>
				<tr>
				<th class='text-center'>Estado de Coahuila</th>
				</tr>
				<tr>
				<th class='text-center'>Nacional</th>
				<?php foreach ($planea16_nacional as $key => $value): ?>
					<th class='text-center'><?=$value['lyc_i'] ?></th>
					<th class='text-center'><?=$value['lyc_ii'] ?></th>
					<th class='text-center'><?=$value['lyc_iii'] ?></th>
					<th class='text-center'><?=$value['lyc_iv'] ?></th>
					<th class='text-center'><?=$value['mat_i'] ?></th>
					<th class='text-center'><?=$value['mat_ii'] ?></th>
					<th class='text-center'><?=$value['mat_iii'] ?></th>
					<th class='text-center'><?=$value['mat_iv'] ?></th>
				<?php endforeach; ?>
				</tr>
      </tbody>
      </table>
      </div>
		</div>
	
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>    

</div>
<div id="modal_visor_reactivos" class="modal fade modal100 grises in" role="dialog" data-keyboard="false" data-backdrop="static" >
   <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header modal_head">
            <span  class="modal-title card-header card-1-header bgcolor-2 text-white" id="modal_reactivos_title"></span>
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

</div>
</div>
</div>

</section>
<script src="<?= base_url('assets/highcharts5.0.3/highcharts.js'); ?>"></script><!--Problemas con esta versión <script src="https://code.highcharts.com/highcharts.js"></script>-->
<script src="<?= base_url('assets/highcharts5.0.3/modules/data.js'); ?>"></script><!--Problemas con esta versión <script src="https://code.highcharts.com/modules/data.js"></script>-->
<script src="<?= base_url('assets/highcharts5.0.3/modules/drilldown.js'); ?>"></script><!--Problemas con esta versión<script src="https://code.highcharts.com/modules/drilldown.js"></script>-->
<script src="<?= base_url('assets/js/info/graficos_1.js'); ?>"></script>
<script src="<?= base_url('assets/js/info/graficos_riesgo.js'); ?>"></script>
<script src="<?= base_url('assets/js/info/info_funcionalidad.js'); ?>"></script>
