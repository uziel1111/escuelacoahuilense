<div class="container">
	<br><br><br><br><br><br>
	<div class="card">
	  <div class="card-header">
	    <center><h5 class="card-title">DATOS GENERALES</h5></center>
			<input hidden type="text" id="in_id_cct" value="<?=$id_cct?>">
	  </div>
	  <div class="card-body">
	  	<div class="row">
	  		<div class="col">
	  			Nombre del centro de trabajo: <label><h6><?=$nombre_centro?></h6></label>
	  		</div>
	  	</div>
	    <div class="row">
	  		<div class="col">
	  			CCT: <label><h6><?=$cve_centro?></h6></label>
	  		</div>
	  		<div class="col">
	  			Turno: <label><h6><?=$turno?></h6></label>
	  		</div>
	  		<div class="col">
	  			Nivel: <label><h6><?=$nivel?></h6></label>
	  		</div>
	  	</div>
	  	<div class="row">
	  		<div class="col">
	  			Modalidad: <label><h6><?=$modalidad?></h6></label>
	  		</div>
	  		<div class="col">
	  			Sostenimiento: <label><h6><?=$sostenimiento?></h6></label>
	  		</div>
	  		<div class="col">
	  			Región: <label><h6><?=$region?></h6></label>
	  		</div>
	  	</div>
	  	<div class="row">
	  		<div class="col">
	  			Domicilio: <label><h6><?=$domicilio?></h6></label>
	  		</div>
	  		<div class="col">
	  			Localidad: <label><h6><?=$localidad?></h6></label>
	  		</div>
	  		<div class="col">
	  			Municipio: <label><h6><?=$municipio?></h6></label>
	  		</div>
	  	</div>
	  	<div class="row">
	  		<div class="col">
	  			Nombre del director: <label><h6><?=$nombre_director?></h6></label>
	  		</div>
	  		<div class="col">
	  			Estatus de la escuela: <label><h6><?=$estatus?></h6></label>
	  		</div>
	  	</div>
	  </div>
	</div>
</div>
<div class="container">
	<center>
		<div class="row">
			<div class="col">
				<h1>CONSULTA LOS INDICADORES DEL MODELO EDUCATIVO COAHUILA</h1>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<button class="btn btn-info btn-md" id="btn_info_asist">Asistencia</button>
			</div>
			<div class="col">
				<button class="btn btn-info btn-md" id="btn_info_perma">Permanencia</button>
			</div>
			<div class="col">
				<button class="btn btn-info btn-md" id="btn_info_aprendiz">Aprendizaje</button>
			</div>
		</div>
	</center>
</div>
<div hidden id="dv_info_asistencia" class="container">
	<center>
		<div class="row">
			<div class="col">
				<div class='panel-heading panel_head ft-responsive' role='button' data-toggle='collapse' data-target='#est_alum_doc_grup' title='Clic para desplegar'><h3>Estadística escolar: alumnos, grupos y docentes</h3></div>
			</div>
		</div>
		<div id='est_alum_doc_grup' class='collapse panel-body'>
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
	</center>
</div>

<div hidden id="dv_info_permanencia" class="container">
	<?php
	$arr_bimestres['1'] = '1er BIMESTRE';
	$arr_bimestres['2'] = '2do BIMESTRE';
	$arr_bimestres['3'] = '3er BIMESTRE';
	$arr_bimestres['4'] = '4to BIMESTRE';
	$arr_bimestres['5'] = '5to BIMESTRE';

	$arr_ciclos['2017-2018'] = '2017-2018'; ?>
	<center>
		<div class="row">
			<div class="col">
				<div class='panel-heading panel_head ft-responsive' role='button' data-toggle='collapse' data-target='#riesgo_esc' title='Clic para desplegar'><h3>Riesgo de abandono escolar</h3></div>
			</div>
		</div>
		<div id='riesgo_esc' class='collapse panel-body'>
			<div class="row">
				<div class="col col-md-12">Por combinar inasistencias, bajas calificaciones y/o años sobre la edad ideal del grado.</div>
			</div>
			<div class="row">
			<div class="col col-md-4">
					<?=form_label('Bimestre', 'bimestre');?>
					<?=form_dropdown('bimestre',$arr_bimestres , 'large', array('class' => 'form-control', 'id' => 'slt_bimestre_ries'));?>
			</div>
			<div class="col col-md-4">
					<?=form_label('Ciclo', 'ciclo');?>
					<?=form_dropdown('ciclo', $arr_ciclos, 'large', array('class' => 'form-control', 'id' => 'slt_ciclo_ries'));?>
			</div>
			<div class="col col-md-1">
				<?=form_label('_', '_');?>
					<button class="btn btn-primary" id="btn_buscar_ries_esc">Buscar</button>
			</div>
			</div>
			<div class="row">
					<div class="col">
						<div id="dv_riesgo_esc_pie"></div>
					</div>
			</div>
			<div class="row">
					<div class="col">
						<div id="dv_riesgo_esc_bar"></div>
					</div>
			</div>
		</div>
	</center>
</div>

<div hidden id="dv_info_aprendizaje" class="container">
	<center>
		<div class="row">
			<div class="col">
				<div class='panel-heading panel_head ft-responsive' role='button' data-toggle='collapse' data-target='#planea_cont_lyc' title='Clic para desplegar'><h3>PLANEA por contenido temático <br>Lenguaje y Comunicación
</h3></div>
			</div>
		</div>
		<div id='planea_cont_lyc' class='collapse panel-body'>
			<div class="row">
					<div class="col">
						<div id="dv_info_graf_contlyc"></div>
					</div>
			</div>
	</div>
	<div class="row">
		<div class="col">
			<div class='panel-heading panel_head ft-responsive' role='button' data-toggle='collapse' data-target='#planea_cont_mat' title='Clic para desplegar'><h3>PLANEA por contenido temático <br>Matemáticas</h3></div>
		</div>
	</div>
	<div id='planea_cont_mat' class='collapse panel-body'>
		<div class="row">
				<div class="col">
					<div id="dv_info_graf_contmat"></div>
				</div>
		</div>
</div>

		<div class="row">
			<div class="col">
				<div class='panel-heading panel_head ft-responsive' role='button' data-toggle='collapse' data-target='#planea_n_logro' title='Clic para desplegar'><h3>PLANEA por niveles de logro</h3></div>
			</div>
		</div>
		<div id='planea_n_logro' class='collapse panel-body'>
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
	</center>
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
<script src="<?= base_url('assets/js/info/graficos_1.js'); ?>"></script>
<script src="<?= base_url('assets/js/info/graficos_riesgo.js'); ?>"></script>
<script src="<?= base_url('assets/js/info/info_funcionalidad.js'); ?>"></script>
