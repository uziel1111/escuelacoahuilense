<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estadistica extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('Utilerias');
			$this->load->model('Municipio_model');
			$this->load->model('Nivel_model');
			$this->load->model('Sostenimiento_model');
			$this->load->model('Modalidad_model');
			$this->load->model('Ciclo_model');
			$this->load->model('Estadistica_e_indicadores_xcct_model');
			$this->load->model('Planeaxmuni_model');
			$this->load->model('Inegixmuni_model');
			$this->load->model('Supervision_model');
			$this->load->model('Subsostenimiento_model');

		}

		public function estad_indi_generales()
		{
			$result_municipios = $this->Municipio_model->getall_xest_ind();
			$arr_municipios = array();
			$arr_sostenimientos = array();
			$arr_modalidad = array();
			$arr_niveles = array();
			$arr_ciclo = array();

			if(count($result_municipios)==0){
				$data['arr_municipios'] = array(	'0' => 'Error recuperando los municipios' );
			}else{
				$arr_municipios['0'] = 'TODOS';
				foreach ($result_municipios as $row){
					 $arr_municipios[$row['id_municipio']] = $row['municipio'];
				}
			}

			$result_niveles = $this->Nivel_model->getall_est_ind();
			if(count($result_niveles)==0){
				$data['arr_niveles'] = array(	'0' => 'Error recuperando los niveles' );
			}else{
				$arr_niveles['0'] = 'TODOS';
				foreach ($result_niveles as $row){
					 $arr_niveles[$row['id_nivel']] = $row['nivel'];
				}
			}

			$result_sostenimientos = $this->Sostenimiento_model->all();
			if(count($result_sostenimientos)==0){
				$data['arr_sostenimientos'] = array(	'0' => 'Error recuperando los sostenimientos' );
			}else{
				$arr_sostenimientos['0'] = 'TODOS';
				foreach ($result_sostenimientos as $row){
					 $arr_sostenimientos[$row['id_sostenimiento']] = $row['sostenimiento'];
				}
			}

			$result_modalidad = $this->Modalidad_model->all();
			if(count($result_modalidad)==0){
				$data['arr_modalidad'] = array(	'0' => 'Error recuperando los modalidad' );
			}else{
				$arr_modalidad['0'] = 'TODOS';
				foreach ($result_modalidad as $row){
					 $arr_modalidad[$row['id_modalidad']] = $row['modalidad'];
				}
			}

			$result_subsostenimientos = $this->Subsostenimiento_model->all();
			if(count($result_subsostenimientos)==0){
				$data['arr_subsostenimientos'] = array(	'0' => 'Error recuperando los subsostenimientos' );
			}else{
				$arr_subsostenimientos['0'] = 'TODOS';
				foreach ($result_subsostenimientos as $row){
					 $arr_subsostenimientos[$row['id_subsostenimiento']] = $row['subsostenimiento'];
				}
			}

			$result_ciclo = $this->Ciclo_model->all();
			if(count($result_ciclo)==0){
				$data['arr_ciclo'] = array(	'0' => 'Error recuperando los sostenimientos' );
			}else{
				// $arr_ciclo['0'] = 'ELIGE UN CLICO ESCOLAR';
				foreach ($result_ciclo as $row){
					 $arr_ciclo[$row['id_ciclo']] = $row['ciclo'];
				}
			}

			$result_nzonae = $this->Supervision_model->allzonas();
			if(count($result_nzonae)==0){
				$data['arr_nzonae'] = array(	'0' => 'Error recuperando los sostenimientos' );
			}else{
				$arr_nzonae['0'] = 'ELIGE UNA ZONA ESCOLAR';
				foreach ($result_nzonae as $row){
					 $arr_nzonae[$row['id_supervision']] = $row['zona_escolar'];
				}
			}

			$data['arr_municipios'] = $arr_municipios;
			$data['arr_niveles'] = $arr_niveles;
			$data['arr_sostenimientos'] =$arr_sostenimientos;
			$data['arr_modalidad'] =$arr_modalidad;
			$data['arr_subsostenimientos'] =$arr_subsostenimientos;
			$data['arr_nzonae'] =$arr_nzonae;
			$data['arr_ciclos'] =$arr_ciclo;
			Utilerias::pagina_basica($this, "estadistica/estadi_e_indi_gen", $data);
		}//estad_indi_generales()

		public function estad_indi_generales_getnivel()
		{
			$id_municipio = $this->input->post('id_municipio');
			$arr_niveles = array();
			$result_niveles = $this->Nivel_model->getall_est_indxmuni($id_municipio);
			if(count($result_niveles)==0){
				$data['arr_niveles'] = array(	'0' => 'Error recuperando los niveles' );
			}else{
				$arr_niveles['0'] = 'TODOS';
				foreach ($result_niveles as $row){
					 $arr_niveles[$row['id_nivel']] = $row['nivel'];
				}
			}
			Utilerias::enviaDataJson(200, $arr_niveles, $this);
			exit;
		}//estad_indi_generales_getnivel()

		public function estad_indi_generales_getsost()
		{
			$id_municipio = $this->input->post('id_municipio');
			$id_nivel = $this->input->post('id_nivel');

			$arr_sost = array();
			$result_sost = $this->Sostenimiento_model->getsost_xidmun_idnivel($id_municipio,$id_nivel);
			if(count($result_sost)==0){
				$data['arr_sost'] = array(	'0' => 'Error recuperando los niveles' );
			}else{
				$arr_sost['0'] = 'TODOS';
				foreach ($result_sost as $row){
					 $arr_sost[$row['id_sostenimiento']] = $row['sostenimiento'];
				}
			}
			Utilerias::enviaDataJson(200, $arr_sost, $this);
			exit;
		}//estad_indi_generales_getsost()

		public function estad_indi_generales_getmodali()
		{
			$id_municipio = $this->input->post('id_municipio');
			$id_nivel = $this->input->post('id_nivel');
			$id_sostenimiento = $this->input->post('id_sostenimiento');

			$arr_modali = array();
			$result_modali = $this->Modalidad_model->getmodali_xidmun_idnivel_idsost($id_municipio,$id_nivel,$id_sostenimiento);
			if(count($result_modali)==0){
				$data['arr_modali'] = array(	'0' => 'Error recuperando las modalidades' );
			}else{
				$arr_modali['0'] = 'TODOS';
				foreach ($result_modali as $row){
					 $arr_modali[$row['id_modalidad']] = $row['modalidad'];
				}
			}
			Utilerias::enviaDataJson(200, $arr_modali, $this);
			exit;
		}//estad_indi_generales_getmodali()

		public function estad_indi_generales_getciclo()
		{
			$id_municipio = $this->input->post('id_municipio');
			$id_nivel = $this->input->post('id_nivel');
			$id_sostenimiento = $this->input->post('id_sostenimiento');
			$id_modalidad = $this->input->post('id_modalidad');

			$arr_cicloe = array();
			$result_cicloe = $this->Ciclo_model->getciclo_xidmun_idnivel_xsost_idmod($id_municipio,$id_nivel,$id_sostenimiento,$id_modalidad);
			if(count($result_cicloe)==0){
				$data['arr_cicloe'] = array(	'0' => 'Error recuperando los niveles' );
			}else{
				$arr_cicloe['0'] = 'TODOS';
				foreach ($result_cicloe as $row){
					 $arr_cicloe[$row['id_ciclo']] = $row['ciclo'];
				}
			}
			Utilerias::enviaDataJson(200, $arr_cicloe, $this);
			exit;
		}//estad_indi_generales_getciclo()

		public function estad_indi_generales_getsubsost_zona()
		{
			$id_nivel = $this->input->post('id_nivel');
			$arr_subsost = array();
			$result_subsost = $this->Subsostenimiento_model->getsubsost_xidnivel($id_nivel);
			if(count($result_subsost)==0){
				$data['arr_subsost'] = array(	'0' => 'Error recuperando subsostenimientos' );
			}else{
				$arr_subsost['0'] = 'TODOS';
				foreach ($result_subsost as $row){
					 $arr_subsost[$row['id_subsostenimiento']] = $row['subsostenimiento'];
				}
			}
			Utilerias::enviaDataJson(200, $arr_subsost, $this);
			exit;
		}//estad_indi_generales_getsubsost_zona()

		public function estad_indi_generales_getzonassubsost_zona()
		{
			$id_nivel = $this->input->post('id_nivel');
			$id_subsost = $this->input->post('id_subsost');
			$arr_nzonae = array();
			$result_nzonae = $this->Supervision_model->getzona_idnivel_xsost($id_nivel, $id_subsost);
			if(count($result_nzonae)==0){
				$data['arr_nzonae'] = array(	'0' => 'Error recuperando nuemro de zona escolar' );
			}else{
				$arr_nzonae['0'] = 'TODOS';
				foreach ($result_nzonae as $row){
					 $arr_nzonae[$row['id_supervision']] = $row['zona_escolar'];
				}
			}
			Utilerias::enviaDataJson(200, $arr_nzonae, $this);
			exit;
		}//estad_indi_generales_getzonassubsost_zona()

		public function estad_indi_generales_getcicloxnxsubxz_zona()
		{
			$id_nivel = $this->input->post('id_nivel');
			$id_subsost = $this->input->post('id_subsost');
			$id_zona = $this->input->post('id_zona');
			$arr_cicloe = array();
			$result_cicloe = $this->Ciclo_model->getciclo_idnivel_xsost_xzona($id_nivel, $id_subsost, $id_zona);
			if(count($result_cicloe)==0){
				$data['arr_cicloe'] = array(	'0' => 'Error recuperando nuemro de zona escolar' );
			}else{
				$arr_cicloe['0'] = 'TODOS';
				foreach ($result_cicloe as $row){
					 $arr_cicloe[$row['id_ciclo']] = $row['ciclo'];
				}
			}
			Utilerias::enviaDataJson(200, $arr_cicloe, $this);
			exit;
		}//estad_indi_generales_getcicloxnxsubxz_zona()

		public function xest_muni_x(){
			$id_municipio = $this->input->post('slc_xest_muni_estmunicipio');
			$id_nivel = $this->input->post('slc_xest_muni_nivel');
			$id_sostenimiento = $this->input->post('slc_xest_muni_sostenimiento');
			$id_modalidad = $this->input->post('slc_xest_muni_modalidad');
			$id_ciclo = $this->input->post('slc_xest_muni_cicloe');

			$data["srt_tab_alumnos"] = $this->tabla_alumnos($id_municipio,$id_nivel,$id_sostenimiento,$id_modalidad, $id_ciclo);
			$data["srt_tab_pdocentes"] = $this->tabla_pdocentes($id_municipio,$id_nivel,$id_sostenimiento,$id_modalidad, $id_ciclo);
			$data["srt_tab_infraestructura"] = $this->tabla_infraestructura($id_municipio,$id_nivel,$id_sostenimiento,$id_modalidad, $id_ciclo);
			$data["srt_tab_planea"] = $this->tabla_planea($id_municipio,$id_nivel,$id_sostenimiento,$id_modalidad, $id_ciclo);
			$data["srt_tab_rezag_inegi"] = $this->tabla_rezinegi($id_municipio,$id_nivel,$id_sostenimiento,$id_modalidad, $id_ciclo);
			$data["srt_tab_analf_inegi"] = $this->tabla_analfinegi($id_municipio,$id_nivel,$id_sostenimiento,$id_modalidad, $id_ciclo);

			Utilerias::pagina_basica($this,"estadistica/estadi_e_indi_gen_tab", $data);

		}//xest_muni_x

		function tabla_alumnos($id_municipio,$id_nivel,$id_sostenimiento,$id_modalidad, $id_ciclo){
			$result_alumnos = $this->Estadistica_e_indicadores_xcct_model->get_nalumnos_xmunciclo($id_municipio, $id_ciclo);
			$str_html_alumn='<table class="table">
          	<thead>
          		<tr>
          			<th rowspan="3">Nivel Educativo</th>
          			<th colspan="21">Alumnos</th>
          		</tr>
          		<tr>
          			<th  colspan="3">Total</th>
          			<th  rowspan="2">1°</th>
          			<th rowspan="2">2°</th>
          			<th rowspan="2">3°</th>
          			<th rowspan="2">4°</th>
          			<th rowspan="2">5°</th>
          			<th rowspan="2">6°</th>
          		</tr>
          		<tr>
          			<th>M</th>
          			<th>H</th>
          			<th>T</th>
          		</tr>
          	</thead>
						<tbody>';

			foreach ($result_alumnos as $row){
				if ($row['sostenimiento']=='total' && $row['modalidad']=='total') {
					if ($row['id_nivel']==$id_nivel) {
						$str_html_alumn.='<tr style="background-color:#FF8000" class="parent" id="'.$row['nivel'].'">';
					}
					else {
						$str_html_alumn.='<tr class="parent" id="'.$row['nivel'].'">';
					}

					$str_html_alumn.='<td class="pl-0"><img style="width:20px" src="'.base_url("assets/img/expand-button.svg").'" >'.$row['nivel'].'</td>';
				}
				elseif ($row['sostenimiento']!='total' && $row['modalidad']=='total') {
					if ($row['id_nivel']==$id_nivel && $row['id_sostenimiento']==$id_sostenimiento) {
						$str_html_alumn.='<tr style="background-color:#FAAC58" class="child-'.$row['nivel'].' child-parent" id="'.$row['nivel'].$row['sostenimiento'].'">';
					}
					else {
						$str_html_alumn.='<tr class="child-'.$row['nivel'].' child-parent hide-ini" id="'.$row['nivel'].$row['sostenimiento'].'">';
					}

					$str_html_alumn.='<td class="pl-3"><img style="width:20px" src="'.base_url("assets/img/expand-button.svg").'" >'.$row['sostenimiento'].'</td>';
				}
				elseif ($row['sostenimiento']!='total' && $row['modalidad']!='total') {
					if ($row['id_nivel']==$id_nivel && $row['id_sostenimiento']==$id_sostenimiento && $row['id_modalidad']==$id_modalidad) {
						$str_html_alumn.='<tr style="background-color:#F5D0A9" class="nieto-'.$row['nivel'].$row['sostenimiento'].'  class-hide-'.$row['nivel'].' ">';
					}
					else {
						$str_html_alumn.='<tr class="nieto-'.$row['nivel'].$row['sostenimiento'].'  class-hide-'.$row['nivel'].' hide-ini">';
					}

					$str_html_alumn.='<td class="pl-5">'.$row['modalidad'].'</td>';
				}
				$str_html_alumn.='<td>'.number_format($row['alumn_m_t']).'</td><td>'.number_format($row['alumn_h_t']).'</td><td>'.number_format($row['alumn_t_t']).'</td>
				<td>'.number_format($row['alumn_t_1']).'</td><td>'.number_format($row['alumn_t_2']).'</td><td>'.number_format($row['alumn_t_3']).'</td>
				<td>'.number_format($row['alumn_t_4']).'</td><td>'.number_format($row['alumn_t_5']).'</td><td>'.number_format($row['alumn_t_6']).'</td>
				</tr>';
			}
			$str_html_alumn.='</tbody>
          			</table>

          			<div class="pie_tabla">
          			        <div id="fuentes_pie">Fuente: SEP Puebla con base en el Formato 911.</div>
          			</div>';

			return $str_html_alumn;
		}//tabla_alumnos()

		function tabla_pdocentes($id_municipio,$id_nivel,$id_sostenimiento,$id_modalidad, $id_ciclo){
			$result_alumnos = $this->Estadistica_e_indicadores_xcct_model->get_pdocente_xmunciclo($id_municipio, $id_ciclo);
			$str_html_alumn='<table class="table">
          	<thead>
          		<tr>
          	    	<th rowspan="2">Nivel educativo</th>
          	    	<th colspan="3">Docentes</th>
          	    	<th colspan="3">Directivo con grupo</th>
          	    	<th colspan="3">Directivo sin grupo</th>
          	    </tr>
          	    <tr>
          	    	<th>Mujeres</th>
          	    	<th>Hombres</th>
          	    	<th>Total</th>
									<th>Mujeres</th>
          	    	<th>Hombres</th>
          	    	<th>Total</th>
									<th>Mujeres</th>
          	    	<th>Hombres</th>
          	    	<th>Total</th>
          	    </tr>
						</thead>
						<tbody>';

			foreach ($result_alumnos as $row){
				if ($row['sostenimiento']=='total' && $row['modalidad']=='total') {
					if ($row['id_nivel']==$id_nivel) {
						$str_html_alumn.='<tr style="background-color:#FF8000" class="parent" id="'.$row['nivel'].'">';
					}
					else {
						$str_html_alumn.='<tr class="parent" id="'.$row['nivel'].'">';
					}

					$str_html_alumn.='<td class="pl-0"><img style="width:20px" src="'.base_url("assets/img/expand-button.svg").'" >'.$row['nivel'].'</td>';
				}
				elseif ($row['sostenimiento']!='total' && $row['modalidad']=='total') {
					if ($row['id_nivel']==$id_nivel && $row['id_sostenimiento']==$id_sostenimiento) {
						$str_html_alumn.='<tr style="background-color:#FAAC58" class="child-'.$row['nivel'].' child-parent" id="'.$row['nivel'].$row['sostenimiento'].'">';
					}
					else {
						$str_html_alumn.='<tr class="child-'.$row['nivel'].' child-parent hide-ini" id="'.$row['nivel'].$row['sostenimiento'].'">';
					}

					$str_html_alumn.='<td class="pl-3"><img style="width:20px" src="'.base_url("assets/img/expand-button.svg").'" >'.$row['sostenimiento'].'</td>';
				}
				elseif ($row['sostenimiento']!='total' && $row['modalidad']!='total') {
					if ($row['id_nivel']==$id_nivel && $row['id_sostenimiento']==$id_sostenimiento && $row['id_modalidad']==$id_modalidad) {
						$str_html_alumn.='<tr style="background-color:#F5D0A9" class="nieto-'.$row['nivel'].$row['sostenimiento'].'  class-hide-'.$row['nivel'].' ">';
					}
					else {
						$str_html_alumn.='<tr class="nieto-'.$row['nivel'].$row['sostenimiento'].'  class-hide-'.$row['nivel'].' hide-ini">';
					}

					$str_html_alumn.='<td class="pl-5">'.$row['modalidad'].'</td>';
				}

				$str_html_alumn.='
				<td>'.number_format($row['docente_m']).'</td><td>'.number_format($row['docente_h']).'</td><td>'.number_format($row['docentes_t_g']).'</td>
				<td>'.number_format($row['directivo_m_congrup']).'</td><td>'.number_format($row['directivo_h_congrup']).'</td><td>'.number_format($row['directivo_t_congrup']).'</td>
				<td>'.number_format($row['directivo_m_singrup']).'</td><td>'.number_format($row['directivo_h_singrup']).'</td><td>'.number_format($row['directivo_t_singrup']).'</td>
				</tr>';
			}
			$str_html_alumn.='</tbody>
								</table>

								<div class="pie_tabla">
												<div id="fuentes_pie">Fuente: SEP Puebla con base en el Formato 911.</div>
								</div>';

			return $str_html_alumn;
		}//tabla_pdocentes()

		function tabla_infraestructura($id_municipio,$id_nivel,$id_sostenimiento,$id_modalidad, $id_ciclo){
			$result_alumnos = $this->Estadistica_e_indicadores_xcct_model->get_infraest_xmunciclo($id_municipio, $id_ciclo);
			$str_html_alumn='<table class="table">
          	<thead>
          		  	<tr>
          	    	<th rowspan="2">Nivel Educativo</th>
          	    	<th rowspan="2">Escuelas</th>
          	    	<th colspan="8">Grupos</th>
          	    </tr>
          		<tr>
          		  	<th>1°</th>
          		  	<th>2°</th>
          		  	<th>3°</th>
          		  	<th>4°</th>
          		  	<th>5°</th>
          		  	<th>6°</th>
          		  	<th>Multigrado</th>
          		  	<th>Total</th>
          		</tr>
          	</thead>
						<tbody>';

			foreach ($result_alumnos as $row){
				if ($row['sostenimiento']=='total' && $row['modalidad']=='total') {
					if ($row['id_nivel']==$id_nivel) {
						$str_html_alumn.='<tr style="background-color:#FF8000" class="parent" id="'.$row['nivel'].'">';
					}
					else {
						$str_html_alumn.='<tr class="parent" id="'.$row['nivel'].'">';
					}

					$str_html_alumn.='<td class="pl-0"><img style="width:20px" src="'.base_url("assets/img/expand-button.svg").'" >'.$row['nivel'].'</td>';
				}
				elseif ($row['sostenimiento']!='total' && $row['modalidad']=='total') {
					if ($row['id_nivel']==$id_nivel && $row['id_sostenimiento']==$id_sostenimiento) {
						$str_html_alumn.='<tr style="background-color:#FAAC58" class="child-'.$row['nivel'].' child-parent" id="'.$row['nivel'].$row['sostenimiento'].'">';
					}
					else {
						$str_html_alumn.='<tr class="child-'.$row['nivel'].' child-parent hide-ini" id="'.$row['nivel'].$row['sostenimiento'].'">';
					}

					$str_html_alumn.='<td class="pl-3"><img style="width:20px" src="'.base_url("assets/img/expand-button.svg").'" >'.$row['sostenimiento'].'</td>';
				}
				elseif ($row['sostenimiento']!='total' && $row['modalidad']!='total') {
					if ($row['id_nivel']==$id_nivel && $row['id_sostenimiento']==$id_sostenimiento && $row['id_modalidad']==$id_modalidad) {
						$str_html_alumn.='<tr style="background-color:#F5D0A9" class="nieto-'.$row['nivel'].$row['sostenimiento'].'  class-hide-'.$row['nivel'].' ">';
					}
					else {
						$str_html_alumn.='<tr class="nieto-'.$row['nivel'].$row['sostenimiento'].'  class-hide-'.$row['nivel'].' hide-ini">';
					}

					$str_html_alumn.='<td class="pl-5">'.$row['modalidad'].'</td>';
				}

				$str_html_alumn.='
				<td>'.number_format($row['nescuelas']).'</td><td>'.number_format($row['grupos_1']).'</td><td>'.number_format($row['grupos_2']).'</td>
				<td>'.number_format($row['grupos_3']).'</td><td>'.number_format($row['grupos_4']).'</td><td>'.number_format($row['grupos_5']).'</td>
				<td>'.number_format($row['grupos_6']).'</td><td>'.number_format($row['grupos_multi']).'</td><td>'.number_format($row['grupos_t']).'</td>
				</tr>';
			}
			$str_html_alumn.='</tbody>
								</table>

								<div class="pie_tabla">
												<div id="fuentes_pie">Fuente: SEP Puebla con base en el Formato 911.</div>
								</div>';

			return $str_html_alumn;
		}//tabla_infraestructura()

		function tabla_planea($id_municipio,$id_nivel,$id_sostenimiento,$id_modalidad, $id_ciclo){
			 $result_planea = $this->Planeaxmuni_model->get_planea_xmunciclo($id_municipio, $id_ciclo);
			 // echo "<pre>";print_r($result_planea); die();
			$str_html_alumn='<table class="table">
							<thead>
				<tr>
					<th rowspan="2">Resultados de la prueba Planea</th>
					<th colspan="5">Lenguaje y Comunicación</th>
				<th colspan="5">Matemáticas</th>
				</tr>
				<tr>
					<th colspan="4">Nivel de dominio</th>
					<th rowspan="2">Porcentaje de alumnos con nivel bueno y excelente</th>
					<th colspan="4">Nivel de dominio</th>
					<th rowspan="2">Porcentaje de alumnos con nivel bueno y excelente</th>
				</tr>
				<tr>
					<th>Nivel</th>
					<th><center>I<br><sub>Insuficiente</sub></center></th>
					<th><center>II<br><sub>Elemental</sub></center></th>
					<th><center>III<br><sub>Bueno</sub></center></th>
					<th><center>IV<br><sub>Excelente</sub></center></th>
					<th><center>I<br><sub>Insuficiente</sub></center></th>
					<th><center>II<br><sub>Elemental</sub></center></th>
					<th><center>III<br><sub>Bueno</sub></center></th>
					<th><center>IV<br><sub>Excelente</sub></center></th>
				</tr>
				</thead>
				<tbody>';

			foreach ($result_planea as $row){

				$str_html_alumn.='
				<tr>
				<td>'.$row['nivel'].'</td>
				<td>'.($row['lyc_i']).'%</td><td>'.($row['lyc_ii']).'%</td><td>'.($row['lyc_iii']).'%</td><td>'.($row['lyc_iv']).'%</td>
				<td>'.($row['lyc_iii']+$row['lyc_iv']).'%</td>
				<td>'.($row['mat_i']).'%</td><td>'.($row['mat_ii']).'%</td><td>'.($row['mat_iii']).'%</td><td>'.($row['mat_iv']).'%</td>
				<td>'.($row['mat_iii']+$row['mat_iv']).'%</td>
				</tr>';
			}
			$str_html_alumn.='</tbody>
								</table>

								<div class="pie_tabla">
												<div id="fuentes_pie">Fuente: SEP Federal.</div>
								</div>';

			return $str_html_alumn;
		}//tabla_planea()




		function tabla_rezinegi($id_municipio,$id_nivel,$id_sostenimiento,$id_modalidad, $id_ciclo){
			 $result_rezinegi = $this->Inegixmuni_model->get_rezago_xmunciclo($id_municipio, '2010');
			 // echo "<pre>";print_r($result_rezinegi); die();
			$str_html_rezinegi='<table class="table">
          <tr>
            <th>Inasistencia escolar</th>
            <th colspan="3">Población total</th>
            <th colspan="3">Población que no asiste a la escuela</th>
          </tr>
          <tr>
            <th id="rezago">Población por grupo de edad que no asiste a la escuela</th>
            <th>Hombres</th>
            <th>Mujeres</th>
            <th>Total</th>
            <th>Hombres</th>
            <th>Mujeres</th>
            <th>Total</th>
          </tr>
	</thead>
	<tbody>';

			foreach ($result_rezinegi as $row){

				$str_html_rezinegi.='
				<tr>
				<td>3 a 5 años</td>
				<td>'.number_format($row['P_3A5_M']).'</td><td>'.number_format($row['P_3A5_F']).'</td><td>'.number_format($row['P_3A5_M']+$row['P_3A5_F']).'</td>
				<td>'.number_format($row['P3A5_NOA_M']).'</td><td>'.number_format($row['P3A5_NOA_F']).'</td><td>'.number_format($row['P3A5_NOA_M']+$row['P3A5_NOA_F']).'</td>
				</tr>
				<tr>
				<td>6 a 11 años</td>
				<td>'.number_format($row['P_6A11_M']).'</td><td>'.number_format($row['P_6A11_F']).'</td><td>'.number_format($row['P_6A11_M']+$row['P_6A11_F']).'</td>
				<td>'.number_format($row['P6A11_NOAM']).'</td><td>'.number_format($row['P6A11_NOAF']).'</td><td>'.number_format($row['P6A11_NOAM']+$row['P6A11_NOAF']).'</td>
				</tr>
				<tr>
				<td>12 a 14 años</td>
				<td>'.number_format($row['P_12A14_M']).'</td><td>'.number_format($row['P_12A14_F']).'</td><td>'.number_format($row['P_12A14_M']+$row['P_12A14_F']).'</td>
				<td>'.number_format($row['P12A14NOAM']).'</td><td>'.number_format($row['P12A14NOAF']).'</td><td>'.number_format($row['P12A14NOAM']+$row['P12A14NOAF']).'</td>
				</tr>
				<tr>
				<td>15 a 17 años</td>
				<td>'.number_format($row['P_15A17_M']).'</td><td>'.number_format($row['P_15A17_F']).'</td><td>'.number_format($row['P_15A17_M']+$row['P_15A17_F']).'</td>
				<td>'.number_format($row['P_15A17_M']-$row['P15A17A_M']).'</td><td>'.number_format($row['P_15A17_F']-$row['P15A17A_F']).'</td><td>'.number_format(($row['P_15A17_M']+$row['P_15A17_F'])-$row['P15A17A_M']+$row['P15A17A_F']).'</td>
				</tr>
				<tr>
				<td>18 a 22 años</td>
				<td>'.number_format($row['P_18A24_M']).'</td><td>'.number_format($row['P_18A24_F']).'</td><td>'.number_format($row['P_18A24_M']+$row['P_18A24_F']).'</td>
				<td>'.number_format($row['P_18A24_M']-$row['P18A24A_M']).'</td><td>'.number_format($row['P_18A24_F']-$row['P18A24A_F']).'</td><td>'.number_format(($row['P_18A24_M']+$row['P_18A24_F'])-$row['P18A24A_M']+$row['P18A24A_F']).'</td>
				</tr>
				';
			}
			$str_html_rezinegi.='</tbody>
								</table>

								<div class="pie_tabla">
												<div id="fuentes_pie">Fuente:  INEGI. 2010</div>
								</div>';

			return $str_html_rezinegi;
		}//tabla_rezinegi()


		function tabla_analfinegi($id_municipio,$id_nivel,$id_sostenimiento,$id_modalidad, $id_ciclo){
			 $result_analfinegi = $this->Inegixmuni_model->get_analf_xmunciclo($id_municipio, '2010');
			 // echo "<pre>";print_r($result_analfinegi); die();
			$str_html_analfinegi='<table class="table">
					 <tr>
						 <th></th>
						 <th>Hombres</th>
						 <th>Mujeres</th>
						 <th>Total</th>
					 </tr>
	</thead>
	<tbody>';

			foreach ($result_analfinegi as $row){

				$str_html_analfinegi.='
				<tr>
				<td>Población de 8 a 14 años que no saben leer ni escribir</td>
				<td>'.number_format($row['P8A14AN_M']).'</td><td>'.number_format($row['P8A14AN_F']).'</td><td>'.number_format($row['P8A14AN_M']+$row['P8A14AN_F']).'</td>
				</tr>
				<tr>
				<td>Población mayor de 15 años que no saben leer ni escribir</td>
				<td>'.number_format($row['P15YM_AN_M']).'</td><td>'.number_format($row['P15YM_AN_F']).'</td><td>'.number_format($row['P15YM_AN_M']+$row['P15YM_AN_F']).'</td>
				</tr>
				';
			}
			$str_html_analfinegi.='</tbody>
								</table>

								<div class="pie_tabla">
												<div id="fuentes_pie">Fuente:  INEGI. 2010</div>
								</div>';

			return $str_html_analfinegi;
		}//tabla_analfinegi()

		public function xest_zona_x(){
			$id_nivel_z = $this->input->post('slc_xest_nivel_zona');
			$id_sostenimiento_z = $this->input->post('slc_xest_sostenimiento_zona');
			$id_zona_z = $this->input->post('slc_xest_zona');
			$id_ciclo_z = $this->input->post('slc_xest_cicloe_zona');
			// echo "<pre>";print_r($_POST);die();

		}//xest_zona_x

}//Estadistica
