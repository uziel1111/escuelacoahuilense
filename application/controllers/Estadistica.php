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
			$this->load->model('Estadistica_e_indicadores_xcct_model');

		}

		public function estad_indi_generales()
		{
			$result_municipios = $this->Municipio_model->all();
			$arr_municipios = array();
			$arr_sostenimientos = array();
			$arr_niveles = array();

			if(count($result_municipios)==0){
				$data['arr_municipios'] = array(	'0' => 'Error recuperando los municipios' );
			}else{
				$arr_municipios['0'] = 'TODOS';
				foreach ($result_municipios as $row){
					 $arr_municipios[$row['id_municipio']] = $row['municipio'];
				}
			}

			$result_niveles = $this->Nivel_model->all();
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

			$data['arr_municipios'] = $arr_municipios;
			$data['arr_niveles'] = $arr_niveles;
			$data['arr_sostenimientos'] =$arr_sostenimientos;
			Utilerias::pagina_basica($this, "estadistica/estadi_e_indi_gen", $data);
		}


		public function get_all_municipio_ei()
		{

			$data = array();
			$html = "";
			$result = $this->Estadistica_model->get_all_municipio_ei();

			$html .= "<option value=''> ELIGE TU MUNICIPIO </option>";
			$html .= "<option value=0> ESTADO (TODOS LOS MUNICIPIOS DE PUEBLA) </option>";
			foreach ($result as $res) {
				$html .= "<option value=".$res['id_municipio'].">".utf8_encode($res['nombre_municipio'])."</option>";
			}

			$response = array(
				'status' => 'OK',
				'result'=>$html
			);

			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}// get_all_municipio_ei()

		public function getNiveles_ei()
		{
			$id_municipio = $this->input->post("id_municipio");
			$data = array();
			$html = "";
			$result = $this->Estadistica_model->getNiveles_ei($id_municipio);

			$html .= "<option value=>ELIGE NIVEL</option>";
			$html .= "<option value='TODOS'>TODOS</option>";
			foreach ($result as $res) {
				$html .= "<option value=".$res['num_nivel'].">".utf8_encode($res['nivel'])."</option>";
			}

			$response = array(
				'status' => 'OK',
				'result'=>$html
			);

			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}// getNiveles_ei()

		public function getNiveles_ze()
		{

			$data = array();
			$html = "";
			$result = $this->Estadistica_model->getNiveles_ze();

			$html .= "<option value=>ELIGE NIVEL</option>";
			foreach ($result as $res) {
				$html .= "<option value=".$res['num_nivel'].">".utf8_encode($res['nivel'])."</option>";
			}

			$response = array(
				'status' => 'OK',
				'result'=>$html
			);

			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}// getNiveles_ze()

		public function getze()
		{
			$nivelid = $this->input->post("nivelid");
			$sostenimientoid = $this->input->post("sostenimientoid");

			$data = array();
			$html = "";
			$result = $this->Estadistica_model->getze($nivelid, $sostenimientoid);

			$html .= "<option value=>ELIGE NÚMERO DE ZONA ESCOLAR</option>";
			foreach ($result as $res) {
				$html .= "<option value=".$res['num_zona_escolar'].">".utf8_encode($res['num_zona_escolar'])."</option>";
			}

			$response = array(
				'status' => 'OK',
				'result'=>$html
			);

			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}// getze()

		public function getclave_ze()
		{
			$nivelid = $this->input->post("nivelid");
			$sostenimientoid = $this->input->post("sostenimientoid");
			$num_ze = $this->input->post("num_ze");

			$data = array();
			$html = "";
			$result = $this->Estadistica_model->getclave_ze($nivelid, $sostenimientoid, $num_ze);

			$html .= "<option value=>ELIGE LA CLAVE DE ZONA ESCOLAR</option>";
			foreach ($result as $res) {
				$html .= "<option value=".$res['cct_zona_escolar'].">".utf8_encode($res['cct_zona_escolar'])."</option>";
			}


			$response = array(
				'status' => $result,
				'result'=>$html
			);

			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}// getclave_ze()

		public function get_xmunicipio_xnivel_ei()
		{

		$id_municipio = $this->input->post('id_municipio');
		$id_nivel = $this->input->post('id_nivel');

		$html = "";
		$result = $this->Estadistica_model->get_xmunicipio_xnivel_ei($id_municipio, $id_nivel);
		$html .= "<option value=>ELIGE SOSTENIMIENTO</option>";
		$html .= "<option value='TODOS'>TODOS</option>";
		foreach ($result as $res) {
			$html .= "<option value=".$res['sostenimiento'].">".$res['sostenimiento']."</option>";
		}

		$response = array(
			'status' => 'OK',
			'result'=>$html
		);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}// get_xmunicipio_xnivel_ei()

	public function get_sostenimeinto_ze()
{

	$id_nivel = $this->input->post('id_nivel');

	$html = "";
	$result = $this->Estadistica_model->get_sostenimeinto_ze($id_nivel);
	$html .= "<option value=>ELIGE SOSTENIMIENTO</option>";
	foreach ($result as $res) {
		$html .= "<option value=".$res['sostenimiento_desagregado'].">".$res['sostenimiento_desagregado']."</option>";
	}

	$response = array(
		'status' => 'OK',
		'result'=>$html
	);

	Utilerias::enviaDataJson(200, $response, $this);
	exit;
}// get_sostenimeinto_ze()

	public function get_xmunicipio_xnivel_xsostenimiento()
{

	$id_municipio = $this->input->post('id_municipio');
	$id_nivel = $this->input->post('id_nivel');
	$id_sostenimiento = $this->input->post('id_sostenimiento');

	$html = "";
	$result = $this->Estadistica_model->get_xmunicipio_xnivel_xsostenimiento($id_municipio, $id_nivel, $id_sostenimiento);
	$html .= "<option value=>ELIGE MODALIDAD</option>";
	$html .= "<option value='TODOS'>TODOS</option>";
	foreach ($result as $res) {
		if ($res['modalidad']=='INICIAL') {
			# code...
			$html .= "<option value='".$res['modalidad']."'>ESCOLARIZADA</option>";
		}
		elseif ($res['modalidad']=='NO ESCOLARIZADO') {
			# code...
			$html .= "<option value='".$res['modalidad']."'>NO ESCOLARIZADA</option>";
		}
		else {
			# code...
			$html .= "<option value='".$res['modalidad']."'>".$res['modalidad']."</option>";
		}

	}

	$response = array(
		'status' => 'OK',
		'result'=>$html
	);

	Utilerias::enviaDataJson(200, $response, $this);
	exit;
}// get_xmunicipio_xnivel_xsostenimiento()

public function get_xmunicipio_xnivel_xsostenimiento_xmodalidad()
{

	$id_municipio = $this->input->post('id_municipio');
	$id_nivel = $this->input->post('id_nivel');
	$id_sostenimiento = $this->input->post('id_sostenimiento');
	$id_modalidad = $this->input->post('id_modalidad');

$html = "";
$result = $this->Estadistica_model->get_xmunicipio_xnivel_xsostenimiento_xmodalidad($id_municipio, $id_nivel, $id_sostenimiento, $id_modalidad);

$html .= "<option value=>ELIGE CICLO ESCOLAR</option>";
foreach ($result as $res) {
	$html .= "<option value=".$res['ciclo'].">".$res['ciclo']."</option>";
}

$response = array(
	'status' => 'OK',
	'result'=>$html
);

Utilerias::enviaDataJson(200, $response, $this);
exit;
}// get_xmunicipio_xnivel_xsostenimiento_xmodalidad()


public function get_llenado_tablas1()
{
	$municipioid = $this->input->post('municipioid');
	$municipionomb = $this->input->post('municipionomb');
	$nivelid = $this->input->post('nivelid');
	$nivelnomb = $this->input->post('nivelnomb');
	$sostenimientonomb = $this->input->post('sostenimientonomb');
	$modalidadnomb = $this->input->post('modalidadnomb');
	$ciclonomb = $this->input->post('ciclonomb');
	$GLOBALS['valor_id_nivel']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_moda']="";
	$GLOBALS['valor_id_sost']="";
$GLOBALS['valor_id_sosty']="";
$html = "";
$result = $this->Estadistica_model->get_llenado_tabla1_0($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb);





	foreach ($result as $row ) {

		if($row['Sostenimiento_X']=="Total" && $row['Modalidad_X']=="Total") {

			switch($row['Nivel_X'])
			{
				case 'Especial':     	$GLOBALS['valor_id_nivel']="esp"; break;
				case 'Inicial':      	$GLOBALS['valor_id_nivel']="ini"; break;
				case 'Preescolar':   	$GLOBALS['valor_id_nivel']="pre"; break;
				case 'Primaria':  	 	$GLOBALS['valor_id_nivel']="pri"; break;
				case 'Secundaria': 	 	$GLOBALS['valor_id_nivel']="sec"; break;
				case 'Media Superior': 	$GLOBALS['valor_id_nivel']="bac"; break;
			}

			$html .= '<tr class="parent" id="'.$GLOBALS['valor_id_nivel'].'">';

			if($row['Nivel_X']=='Total (todos los niveles)'){

			$html .= '<td  id="mis_td" style="text-align: left; background-color: #FFFFFF">'.$row['Nivel_X'].'</td>';
			}
			else{
			$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF" ><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>'.$row['Nivel_X'].'</td>';
			}
		}
		elseif ($row['Sostenimiento_X']!=="Total" && $row['Modalidad_X']=="Total") {

			switch($row['Sostenimiento_X'])
			{
				case 'Público':   $GLOBALS['valor_id_sost']="pub"; break;
				case 'Autónomo':  $GLOBALS['valor_id_sost']="aut"; break;
				case 'Privado':   $GLOBALS['valor_id_sost']="pri"; break;
			}

			$html .= '<tr class="child-'.$GLOBALS['valor_id_nivel'].' child-parent hide-ini" id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].'" title="Click para expander/contraer" style="cursor: pointer;">
			<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 25px"><span class="chevron_toggleable glyphicon glyphicon-chevron-down">
			</span> '.$row['Sostenimiento_X'].'</td>';

		}
		elseif($row['Sostenimiento_X']!=="Total" && $row['Modalidad_X']!="Total")	{

			switch($row['Modalidad_X'])
			{
				case 'CAM':     					$GLOBALS['valor_id_moda']="cam"; break;
				case 'CENDI':     					$GLOBALS['valor_id_moda']="cendi"; break;
				case 'USAER':      					$GLOBALS['valor_id_moda']="usa"; break;
				case 'Escolarizada':   				$GLOBALS['valor_id_moda']="esc"; break;
				case 'General':  	 				$GLOBALS['valor_id_moda']="gen"; break;
				case 'Técnica Industrial': 	 		$GLOBALS['valor_id_moda']="tin"; break;
				case 'Comunitario': 	 		$GLOBALS['valor_id_moda']="comu"; break;
				case 'Técnica': 	 		$GLOBALS['valor_id_moda']="tec"; break;
				case 'Técnica Agropecuaria':		$GLOBALS['valor_id_moda']="tag"; break;
				case 'Para Trabajadores':     		$GLOBALS['valor_id_moda']="ptr"; break;
				case 'Para adultos':     		$GLOBALS['valor_id_moda']="pad"; break;
				case 'Telesecundaria':     			$GLOBALS['valor_id_moda']="tel"; break;
				case 'No Escolarizada':      		$GLOBALS['valor_id_moda']="nes"; break;
				case 'Indígena':   					$GLOBALS['valor_id_moda']="ind"; break;
				case 'CONAFE (COMUNITARIA)':  	 				$GLOBALS['valor_id_moda']="con"; break;
				case 'Bachillerato General':    	$GLOBALS['valor_id_moda']="bge"; break;
				case 'Bachillerato Tecnológico':	$GLOBALS['valor_id_moda']="bte"; break;
				case 'Profesional Técnico':      	$GLOBALS['valor_id_moda']="pte"; break;
				case 'Comunitario'			:      	$GLOBALS['valor_id_moda']="comu"; break;
				case 'Administrativo':      	$GLOBALS['valor_id_moda']="adm"; break;

			}

			$html .= '<tr class="nieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].' class-hide-'.$GLOBALS['valor_id_nivel'].' hide-ini" id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].$GLOBALS['valor_id_moda'].'">
			<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">'.$row['Modalidad_X'].'</td>';

		}

				$html .= '<td id="show">'.number_format($row['Cant_alumnos_M']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_H']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_T']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_1_T']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_2_T']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_3_T']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_4_T']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_5_T']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_6_T']).'</td>
			</tr>';

	}

	$result = $this->Estadistica_model->get_llenado_tabla1_1($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb);


			foreach ($result as $row ) {
					if (($row['Cant_alumnos_T'])!='') {


						if($row['Modalidad_X']=="Total" && $row['Sostenimiento_X']=="Total" && $row['sub_Sostenimiento']=="Total" ) {

							$GLOBALS['valor_id_nivel']="sup";


							$html .= '<tr class="parent" id="'.$GLOBALS['valor_id_nivel'].'" title="Click para expander/contraer" style="cursor: pointer;">
							<td id="mis_td" style="text-align: left; background-color: #FFFFFF" id=""><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>'.$row['Nivel_X'].'</td>';

						}
						elseif ($row['Modalidad_X']!=="Total" && $row['Sostenimiento_X']=="Total"  && $row['sub_Sostenimiento']=="Total") {

							switch($row['Modalidad_X'])
							{
								case 'Universitario y Tecnológico': $GLOBALS['valor_id_moda']="uyt"; break;
								case 'Normal':  					$GLOBALS['valor_id_moda']="nor"; break;
								case 'Posgrado':   					$GLOBALS['valor_id_moda']="pos"; break;
							}

							$html .= '<tr class="child-'.$GLOBALS['valor_id_nivel'].' child-parent hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].'"
								title="Click para expander/contraer" style="cursor: pointer;">
								<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 25px" id=""><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>
								'.$row['Modalidad_X'].'</td>';
						}
						elseif ($row['Sostenimiento_X']!="Total"  && $row['sub_Sostenimiento']=="Total") {

							switch($row['Sostenimiento_X'])
							{
								case 'Público':   $GLOBALS['valor_id_sost']="pub"; break;
								case 'Autónomo':  $GLOBALS['valor_id_sost']="aut"; break;
								case 'Privado':   $GLOBALS['valor_id_sost']="pri"; break;
							}

							$html .= '<tr class="nieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].' child-nieto class-hide-sup hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].'"
								title="Click para expander/contraer" style="cursor: pointer;">';

							if($row['Sostenimiento_X']=='Autónomo' || $row['Sostenimiento_X']=='Privado' ){

							$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">
							'.$row['Sostenimiento_X'].'
							</td>';

							}
							else{

							$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">
							<span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span
							>'.$row['Sostenimiento_X'].'
							</td>';


							}
						}
						elseif($row['Sostenimiento_X']=="Público" && $row['sub_Sostenimiento']!="Total")	{

							switch($row['sub_Sostenimiento'])
							{
								case 'Estatal':     	$GLOBALS['valor_id_sosty']="est"; break;
								case 'Federal':      	$GLOBALS['valor_id_sosty']="fed"; break;
							}

							$html .= '<tr class="bisnieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].' class-hide-sup class-hide-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].' hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].$GLOBALS['valor_id_sosty'].'">
							<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 65px" id="">'.$row['sub_Sostenimiento'].'</td>';

						}
								$html .= '<td id="show">'.number_format($row['Cant_alumnos_M']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_H']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_T']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_1_T']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_2_T']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_3_T']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_4_T']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_5_T']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_6_T']).'</td>
							</tr>';
						}
					}





	$response = array(
	'status' => 'OK',
	'result'=>$html
);

Utilerias::enviaDataJson(200, $response, $this);
exit;
}// get_llenado_tablas1()


public function get_llenado_tablas2()
{
	$municipioid = $this->input->post('municipioid');
	$municipionomb = $this->input->post('municipionomb');
	$nivelid = $this->input->post('nivelid');
	$nivelnomb = $this->input->post('nivelnomb');
	$sostenimientonomb = $this->input->post('sostenimientonomb');
	$modalidadnomb = $this->input->post('modalidadnomb');
	$ciclonomb = $this->input->post('ciclonomb');
	$GLOBALS['valor_id_nivel']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_moda']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_sosty']="";
$html = "";
$result = $this->Estadistica_model->get_llenado_tabla2_0($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb);



	foreach ($result as $row ) {

		if($row['Sostenimiento_X']=="Total" && $row['Modalidad_X']=="Total") {

			switch($row['Nivel_X'])
			{
				case 'Especial':     	$GLOBALS['valor_id_nivel']="esp2"; break;
				case 'Inicial':      	$GLOBALS['valor_id_nivel']="ini2"; break;
				case 'Preescolar':   	$GLOBALS['valor_id_nivel']="pre2"; break;
				case 'Primaria':  	 	$GLOBALS['valor_id_nivel']="pri2"; break;
				case 'Secundaria': 	 	$GLOBALS['valor_id_nivel']="sec2"; break;
				case 'Media Superior': 	$GLOBALS['valor_id_nivel']="bac2"; break;
				case 'Superior':     	$GLOBALS['valor_id_nivel']="sup2"; break;
			}

			$html .= '<tr class="parent" id="'.$GLOBALS['valor_id_nivel'].'">';

			if($row['Nivel_X']=='Total (todos los niveles)'){

			$html .= '<td  id="mis_td" style="text-align: left; background-color: #FFFFFF">'.$row['Nivel_X'].'</td>';
			}
			else{
			$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF" ><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>'.$row['Nivel_X'].'</td>';
			}
		}
		elseif ($row['Sostenimiento_X']!=="Total" && $row['Modalidad_X']=="Total") {

			switch($row['Sostenimiento_X'])
			{
				case 'Público':   $GLOBALS['valor_id_sost']="pub2"; break;
				case 'Autónomo':  $GLOBALS['valor_id_sost']="aut2"; break;
				case 'Privado':   $GLOBALS['valor_id_sost']="pri2"; break;
			}

			$html .= '<tr class="child-'.$GLOBALS['valor_id_nivel'].' child-parent hide-ini" id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].'" title="Click para expander/contraer" style="cursor: pointer;">
			<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 25px"><span class="chevron_toggleable glyphicon glyphicon-chevron-down">
			</span> '.$row['Sostenimiento_X'].'</td>';

		}
		elseif($row['Sostenimiento_X']!=="Total" && $row['Modalidad_X']!="Total")	{

			switch($row['Modalidad_X'])
			{
				case 'CAM':     					$GLOBALS['valor_id_moda']="cam2"; break;
				case 'CENDI':     					$GLOBALS['valor_id_moda']="cendi2"; break;
				case 'USAER':      					$GLOBALS['valor_id_moda']="usa2"; break;
				case 'Escolarizada':   				$GLOBALS['valor_id_moda']="esc2"; break;
				case 'General':  	 				$GLOBALS['valor_id_moda']="gen2"; break;
				case 'Técnica Industrial': 	 		$GLOBALS['valor_id_moda']="tin2"; break;
				case 'Comunitario': 	 		$GLOBALS['valor_id_moda']="comu2"; break;
				case 'Técnica': 	 		$GLOBALS['valor_id_moda']="tec2"; break;
				case 'Técnica Agropecuaria':		$GLOBALS['valor_id_moda']="tag2"; break;
				case 'Para Trabajadores':     		$GLOBALS['valor_id_moda']="ptr2"; break;
				case 'Para adultos':     		$GLOBALS['valor_id_moda']="pad2"; break;
				case 'Telesecundaria':     			$GLOBALS['valor_id_moda']="tel2"; break;
				case 'No Escolarizada':      		$GLOBALS['valor_id_moda']="nes2"; break;
				case 'Indígena':   					$GLOBALS['valor_id_moda']="ind2"; break;
				case 'CONAFE (COMUNITARIA)':  	 				$GLOBALS['valor_id_moda']="con2"; break;
				case 'Bachillerato General':    	$GLOBALS['valor_id_moda']="bge2"; break;
				case 'Bachillerato Tecnológico':	$GLOBALS['valor_id_moda']="bte2"; break;
				case 'Profesional Técnico':      	$GLOBALS['valor_id_moda']="pte2"; break;
				case 'Universitaria':   			$GLOBALS['valor_id_moda']="uni2"; break;
				case 'Normal':  	 				$GLOBALS['valor_id_moda']="nor2"; break;

				case 'Administrativo':      	$GLOBALS['valor_id_moda']="adm2"; break;
			}

			$html .= '<tr class="nieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].' class-hide-'.$GLOBALS['valor_id_nivel'].' hide-ini" id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].$GLOBALS['valor_id_moda'].'">
			<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">'.$row['Modalidad_X'].'</td>';

		}

				$html .= '<td id="show">'.number_format($row['Cant_docentes_M']).'</td>
					<td id="show">'.number_format($row['Cant_docentes_H']).'</td>
					<td id="show">'.number_format($row['Cant_docentes_T']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_con_grupo_M']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_con_grupo_H']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_con_grupo_T']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_sin_grupo_M']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_sin_grupo_H']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_sin_grupo_T']).'</td>
				</tr>';

	}

	$result = $this->Estadistica_model->get_llenado_tabla2_1($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb);


			foreach ($result as $row ) {
						if($row['Modalidad_X']=="Total" && $row['Sostenimiento_X']=="Total" && $row['sub_Sostenimiento']=="Total" ) {

							$GLOBALS['valor_id_nivel']="sup2";


							$html .= '<tr class="parent" id="'.$GLOBALS['valor_id_nivel'].'" title="Click para expander/contraer" style="cursor: pointer;">
							<td id="mis_td" style="text-align: left; background-color: #FFFFFF" id=""><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>'.$row['Nivel_X'].'</td>';

						}
						elseif ($row['Modalidad_X']!=="Total" && $row['Sostenimiento_X']=="Total"  && $row['sub_Sostenimiento']=="Total") {

							switch($row['Modalidad_X'])
							{
								case 'Universitario y Tecnológico': $GLOBALS['valor_id_moda']="uyt2"; break;
								case 'Normal':  					$GLOBALS['valor_id_moda']="nor2"; break;
								case 'Posgrado':   					$GLOBALS['valor_id_moda']="pos2"; break;
							}

							$html .= '<tr class="child-'.$GLOBALS['valor_id_nivel'].' child-parent hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].'"
								title="Click para expander/contraer" style="cursor: pointer;">
								<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 25px" id=""><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>
								'.$row['Modalidad_X'].'</td>';
						}
						elseif ($row['Sostenimiento_X']!="Total"  && $row['sub_Sostenimiento']=="Total") {

							switch($row['Sostenimiento_X'])
							{
								case 'Público':   $GLOBALS['valor_id_sost']="pub2"; break;
								case 'Autónomo':  $GLOBALS['valor_id_sost']="aut2"; break;
								case 'Privado':   $GLOBALS['valor_id_sost']="pri2"; break;
							}

							$html .= '<tr class="nieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].' child-nieto class-hide-sup hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].'"
								title="Click para expander/contraer" style="cursor: pointer;">';

							if($row['Sostenimiento_X']=='Autónomo' || $row['Sostenimiento_X']=='Privado' ){

							$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">
							'.$row['Sostenimiento_X'].'
							</td>';

							}
							else{

							$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">
							<span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span
							>'.$row['Sostenimiento_X'].'
							</td>';


							}
						}
						elseif($row['Sostenimiento_X']=="Público" && $row['sub_Sostenimiento']!="Total")	{

							switch($row['sub_Sostenimiento'])
							{
								case 'Estatal':     	$GLOBALS['valor_id_sosty']="est2"; break;
								case 'Federal':      	$GLOBALS['valor_id_sosty']="fed2"; break;
							}

							$html .= '<tr class="bisnieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].' class-hide-sup class-hide-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].' hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].$GLOBALS['valor_id_sosty'].'">
							<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 65px" id="">'.$row['sub_Sostenimiento'].'</td>';

						}
								$html .= '<td id="show">'.number_format($row['Cant_docentes_M']).'</td>
					<td id="show">'.number_format($row['Cant_docentes_H']).'</td>
					<td id="show">'.number_format($row['Cant_docentes_T']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_con_grupo_M']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_con_grupo_H']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_con_grupo_T']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_sin_grupo_M']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_sin_grupo_H']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_sin_grupo_T']).'</td>
				</tr>';

					}





	$response = array(
	'status' => 'OK',
	'result'=>$html
);

Utilerias::enviaDataJson(200, $response, $this);
exit;
}// get_llenado_tablas2()

public function get_llenado_tablas3()
{
	$municipioid = $this->input->post('municipioid');
	$municipionomb = $this->input->post('municipionomb');
	$nivelid = $this->input->post('nivelid');
	$nivelnomb = $this->input->post('nivelnomb');
	$sostenimientonomb = $this->input->post('sostenimientonomb');
	$modalidadnomb = $this->input->post('modalidadnomb');
	$ciclonomb = $this->input->post('ciclonomb');
	$GLOBALS['valor_id_nivel']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_moda']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_sosty']="";
$html = "";
$result = $this->Estadistica_model->get_llenado_tabla3_0($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb);



	foreach ($result as $row ) {

		if($row['Sostenimiento_X']=="Total" && $row['Modalidad_X']=="Total") {

			switch($row['Nivel_X'])
			{
				case 'Especial':     	$GLOBALS['valor_id_nivel']="esp3"; break;
				case 'Inicial':      	$GLOBALS['valor_id_nivel']="ini3"; break;
				case 'Preescolar':   	$GLOBALS['valor_id_nivel']="pre3"; break;
				case 'Primaria':  	 	$GLOBALS['valor_id_nivel']="pri3"; break;
				case 'Secundaria': 	 	$GLOBALS['valor_id_nivel']="sec3"; break;
				case 'Media Superior': 	$GLOBALS['valor_id_nivel']="bac3"; break;
				case 'Superior':     	$GLOBALS['valor_id_nivel']="sup3"; break;
				case 'Capacitacion para el trabajo':     	$GLOBALS['valor_id_nivel']="sup3"; break;
				case 'Adultos':     	$GLOBALS['valor_id_nivel']="sup3"; break;
			}

			$html .= '<tr class="parent" id="'.$GLOBALS['valor_id_nivel'].'">';

			if($row['Nivel_X']=='Total (todos los niveles)'){

			$html .= '<td  id="mis_td" style="text-align: left; background-color: #FFFFFF">'.$row['Nivel_X'].'</td>';
			}
			else{
			$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF" ><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>'.$row['Nivel_X'].'</td>';
			}
		}
		elseif ($row['Sostenimiento_X']!=="Total" && $row['Modalidad_X']=="Total") {

			switch($row['Sostenimiento_X'])
			{
				case 'Público':   $GLOBALS['valor_id_sost']="pub3"; break;
				case 'Autónomo':  $GLOBALS['valor_id_sost']="aut3"; break;
				case 'Privado':   $GLOBALS['valor_id_sost']="pri3"; break;
			}

			$html .= '<tr class="child-'.$GLOBALS['valor_id_nivel'].' child-parent hide-ini" id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].'" title="Click para expander/contraer" style="cursor: pointer;">
			<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 25px"><span class="chevron_toggleable glyphicon glyphicon-chevron-down">
			</span> '.$row['Sostenimiento_X'].'</td>';

		}
		elseif($row['Sostenimiento_X']!=="Total" && $row['Modalidad_X']!="Total")	{

			switch($row['Modalidad_X'])
			{
				case 'CAM':     					$GLOBALS['valor_id_moda']="cam3"; break;
				case 'CENDI':     					$GLOBALS['valor_id_moda']="cendi3"; break;
				case 'USAER':      					$GLOBALS['valor_id_moda']="usa3"; break;
				case 'Escolarizada':   				$GLOBALS['valor_id_moda']="esc3"; break;
				case 'General':  	 				$GLOBALS['valor_id_moda']="gen3"; break;
				case 'Técnica Industrial': 	 		$GLOBALS['valor_id_moda']="tin3"; break;
				case 'Comunitario': 	 		$GLOBALS['valor_id_moda']="comu3"; break;
				case 'Técnica': 	 		$GLOBALS['valor_id_moda']="tec3"; break;
				case 'Técnica Agropecuaria':		$GLOBALS['valor_id_moda']="tag3"; break;
				case 'Para Trabajadores':     		$GLOBALS['valor_id_moda']="ptr3"; break;
				case 'Para adultos':     		$GLOBALS['valor_id_moda']="pad3"; break;
				case 'Telesecundaria':     			$GLOBALS['valor_id_moda']="tel3"; break;
				case 'No Escolarizada':      		$GLOBALS['valor_id_moda']="nes3"; break;
				case 'Indígena':   					$GLOBALS['valor_id_moda']="ind3"; break;
				case 'CONAFE (COMUNITARIA)':  	 				$GLOBALS['valor_id_moda']="con3"; break;
				case 'Bachillerato General':    	$GLOBALS['valor_id_moda']="bge3"; break;
				case 'Bachillerato Tecnológico':	$GLOBALS['valor_id_moda']="bte3"; break;
				case 'Profesional Técnico':      	$GLOBALS['valor_id_moda']="pte3"; break;
				case 'Universitaria':   			$GLOBALS['valor_id_moda']="uni3"; break;
				case 'Normal':  	 				$GLOBALS['valor_id_moda']="nor3"; break;
				case 'Administrativo':      	$GLOBALS['valor_id_moda']="adm3"; break;
			}

			$html .= '<tr class="nieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].' class-hide-'.$GLOBALS['valor_id_nivel'].' hide-ini" id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].$GLOBALS['valor_id_moda'].'">
			<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">'.$row['Modalidad_X'].'</td>';

		}

				$html .= '<td id="show">'.number_format($row['escuelas']).'</td>
					<td id="show">'.number_format($row['Cant_aulas_en_uso']).'</td>
					<td id="show">'.number_format($row['Cant_grupos_1']).'</td>
					<td id="show">'.number_format($row['Cant_grupos_2']).'</td>
					<td id="show">'.number_format($row['Cant_grupos_3']).'</td>
					<td id="show">'.number_format($row['Cant_grupos_4']).'</td>
					<td id="show">'.number_format($row['Cant_grupos_5']).'</td>
					<td id="show">'.number_format($row['Cant_grupos_6']).'</td>
					<td id="show">'.number_format($row['Cant_grupos_multigrado']).'</td>
					<td id="show">'.number_format($row['Cant_grupos']).'</td>
				</tr>';

	}

	$result = $this->Estadistica_model->get_llenado_tabla3_1($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb);


			foreach ($result as $row ) {
						if($row['Modalidad_X']=="Total" && $row['Sostenimiento_X']=="Total" && $row['sub_Sostenimiento']=="Total" ) {

							$GLOBALS['valor_id_nivel']="sup3";


							$html .= '<tr class="parent" id="'.$GLOBALS['valor_id_nivel'].'" title="Click para expander/contraer" style="cursor: pointer;">
							<td id="mis_td" style="text-align: left; background-color: #FFFFFF" id=""><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>'.$row['Nivel_X'].'</td>';

						}
						elseif ($row['Modalidad_X']!=="Total" && $row['Sostenimiento_X']=="Total"  && $row['sub_Sostenimiento']=="Total") {

							switch($row['Modalidad_X'])
							{
								case 'Universitario y Tecnológico': $GLOBALS['valor_id_moda']="uyt3"; break;
								case 'Normal':  					$GLOBALS['valor_id_moda']="nor3"; break;
								case 'Posgrado':   					$GLOBALS['valor_id_moda']="pos3"; break;
							}

							$html .= '<tr class="child-'.$GLOBALS['valor_id_nivel'].' child-parent hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].'"
								title="Click para expander/contraer" style="cursor: pointer;">
								<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 25px" id=""><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>
								'.$row['Modalidad_X'].'</td>';
						}
						elseif ($row['Sostenimiento_X']!="Total"  && $row['sub_Sostenimiento']=="Total") {

							switch($row['Sostenimiento_X'])
							{
								case 'Público':   $GLOBALS['valor_id_sost']="pub3"; break;
								case 'Autónomo':  $GLOBALS['valor_id_sost']="aut3"; break;
								case 'Privado':   $GLOBALS['valor_id_sost']="pri3"; break;
							}

							$html .= '<tr class="nieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].' child-nieto class-hide-sup hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].'"
								title="Click para expander/contraer" style="cursor: pointer;">';

							if($row['Sostenimiento_X']=='Autónomo' || $row['Sostenimiento_X']=='Privado' ){

							$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">
							'.$row['Sostenimiento_X'].'
							</td>';

							}
							else{

							$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">
							<span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span
							>'.$row['Sostenimiento_X'].'
							</td>';


							}
						}
						elseif($row['Sostenimiento_X']=="Público" && $row['sub_Sostenimiento']!="Total")	{

							switch($row['sub_Sostenimiento'])
							{
								case 'Estatal':     	$GLOBALS['valor_id_sosty']="est3"; break;
								case 'Federal':      	$GLOBALS['valor_id_sosty']="fed3"; break;
							}

							$html .= '<tr class="bisnieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].' class-hide-sup class-hide-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].' hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].$GLOBALS['valor_id_sosty'].'">
							<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 65px" id="">'.$row['sub_Sostenimiento'].'</td>';

						}
								$html .= '<td id="show">'.number_format($row['escuelas']).'</td>
									<td id="show">'.number_format($row['Cant_aulas_en_uso']).'</td>
									<td id="show">'.number_format($row['Cant_grupos_1']).'</td>
									<td id="show">'.number_format($row['Cant_grupos_2']).'</td>
									<td id="show">'.number_format($row['Cant_grupos_3']).'</td>
									<td id="show">'.number_format($row['Cant_grupos_4']).'</td>
									<td id="show">'.number_format($row['Cant_grupos_5']).'</td>
									<td id="show">'.number_format($row['Cant_grupos_6']).'</td>
									<td id="show">'.number_format($row['Cant_grupos_multigrado']).'</td>
									<td id="show">'.number_format($row['Cant_grupos']).'</td>
				</tr>';

					}





	$response = array(
	'status' => 'OK',
	'result'=>$html
);

Utilerias::enviaDataJson(200, $response, $this);
exit;
}// get_llenado_tablas3()

public function get_llenado_tablas4()
{
	$municipioid = $this->input->post('municipioid');
	$municipionomb = $this->input->post('municipionomb');
	$nivelid = $this->input->post('nivelid');
	$nivelnomb = $this->input->post('nivelnomb');
	$sostenimientonomb = $this->input->post('sostenimientonomb');
	$modalidadnomb = $this->input->post('modalidadnomb');
	$ciclonomb = $this->input->post('ciclonomb');
	$GLOBALS['valor_id_nivel']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_moda']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_sosty']="";
$html = "";
$result = $this->Estadistica_model->get_llenado_tabla4($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb);




	foreach ($result as $row ) {

		$html .= '<tr>
				<td>'.$row['nivel'].'</td>
				<td>'.$row['cobertura'].'</td>
				<td>'.$row['cpos'].'</td>
				<td>'.$row['absorcion'].'</td>
				<td>'.$row['apos'].'</td>
			</tr>';

	}






	$response = array(
	'status' => 'OK',
	'result'=>$html
);

Utilerias::enviaDataJson(200, $response, $this);
exit;
}// get_llenado_tablas4()

public function get_llenado_tablas5()
{
	$municipioid = $this->input->post('municipioid');
	$municipionomb = $this->input->post('municipionomb');
	$nivelid = $this->input->post('nivelid');
	$nivelnomb = $this->input->post('nivelnomb');
	$sostenimientonomb = $this->input->post('sostenimientonomb');
	$modalidadnomb = $this->input->post('modalidadnomb');
	$ciclonomb = $this->input->post('ciclonomb');
	$GLOBALS['valor_id_nivel']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_moda']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_sosty']="";
$html = "";
$result = $this->Estadistica_model->get_llenado_tabla5($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb);



	foreach ($result as $row ) {

		$html .= '<tr>
		<td>Primaria</td>
		<td>'.$row['retencion_primaria'].'</td>
		<td>'.$row['aprobacion_primaria'].'</td>
		<td>'.$row['eficiencia_terminal_primaria'].'</td>
			</tr>';
			$html .= '<tr>
			<td>Secundaria</td>
			<td>'.$row['retencion_secundaria'].'</td>
			<td>'.$row['aprobacion_secundaria'].'</td>
			<td>'.$row['eficiencia_terminal_secundaria'].'</td>
				</tr>';
				$html .= '<tr>
				<td>Media Superior</td>
				<td>'.$row['retencion_media_superior'].'</td>
				<td>'.$row['aprobacion_media_superior'].'</td>
				<td>'.$row['eficiencia_terminal_media_superior'].'</td>
					</tr>';











	}






	$response = array(
	'status' => 'OK',
	'result'=>$html
);

Utilerias::enviaDataJson(200, $response, $this);
exit;
}// get_llenado_tablas5()

public function get_llenado_tablas6()
{
	$municipioid = $this->input->post('municipioid');
	$municipionomb = $this->input->post('municipionomb');
	$nivelid = $this->input->post('nivelid');
	$nivelnomb = $this->input->post('nivelnomb');
	$sostenimientonomb = $this->input->post('sostenimientonomb');
	$modalidadnomb = $this->input->post('modalidadnomb');
	$ciclonomb = $this->input->post('ciclonomb');
	$GLOBALS['valor_id_nivel']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_moda']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_sosty']="";
	if (substr($ciclonomb, 5, 4)=='2017') {
		$periodo_planea='2016';
	}
	else {
		$periodo_planea=substr($ciclonomb, 5, 4);
	}
$html = "";
$result = $this->Estadistica_model->get_llenado_tabla6($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb);

$html .= '<div class="well_">
      <a name="Indicadores de Aprendizaje'.$ciclonomb.' de Cursos" style="text-decoration:none; color:black;">
        <h3 id="well_">Indicadores de Aprendizaje </h3>
				<h3 id="well_">PLANEA '.$periodo_planea.'</h3>
      </a>
    </div>
		<div style="overflow-x:auto;">
		<table class="table table-bordered">
	<thead>
		<tr class="informa">
		    <th class="informa leftRadiusEdgeTop" rowspan="2">Resultados de la prueba Planea</th>
		    <th class="informa" colspan="5">Lenguaje y Comunicación</th>
			<th class="informa thtd_right rightRadiusEdgeTop" colspan="5">Matemáticas</th>
		</tr>
	  	<tr class="informa">
	    	<th class="informa" colspan="4">Nivel de dominio</th>
	    	<th class="informa" rowspan="2">Porcentaje de alumnos con nivel bueno y excelente</th>
	    	<th class="informa" colspan="4">Nivel de dominio</th>
	    	<th class="informa thtd_right" rowspan="2">Porcentaje de alumnos con nivel bueno y excelente</th>
	  	</tr>
	  	<tr class="informa">
	    	<th class="informa">Nivel</th>
	    	<th class="informa"><center>I<br><sub>Insuficiente</sub></center></th>
	    	<th class="informa"><center>II<br><sub>Elemental</sub></center></th>
	    	<th class="informa"><center>III<br><sub>Bueno</sub></center></th>
	    	<th class="informa"><center>IV<br><sub>Excelente</sub></center></th>
	    	<th class="informa"><center>I<br><sub>Insuficiente</sub></center></th>
	    	<th class="informa"><center>II<br><sub>Elemental</sub></center></th>
	    	<th class="informa"><center>III<br><sub>Bueno</sub></center></th>
	    	<th class="informa"><center>IV<br><sub>Excelente</sub></center></th>
	  	</tr>
	</thead>
	<tbody>';

	foreach ($result as $row ) {

		$html .= '<tr>
				<td>'.$row['Nivel'].'</td>
				<td>'.$row['lyc_I'].'</td>
				<td>'.$row['lyc_II'].'</td>
				<td>'.$row['lyc_III'].'</td>
				<td>'.$row['lyc_IV'].'</td>
				<td>'.$row['lyc_III_mas_IV'].'</td>
				<td>'.$row['mat_I'].'</td>
				<td>'.$row['mat_II'].'</td>
				<td>'.$row['mat_III'].'</td>
				<td>'.$row['mat_IV'].'</td>
				<td>'.$row['mat_III_mas_IV'].'</td>
			</tr>';

	}


				$html .= '</tbody>
			</table>

			<div class="pie_tabla">
			        <div id="fuentes_pie">Fuente: SEP Federal.</div>
			</div>';




	$response = array(
	'status' => 'OK',
	'result'=>$html
);

Utilerias::enviaDataJson(200, $response, $this);
exit;
}// get_llenado_tablas6()


public function get_llenado_tablas7()
{
	$municipioid = $this->input->post('municipioid');
	$municipionomb = $this->input->post('municipionomb');
	$nivelid = $this->input->post('nivelid');
	$nivelnomb = $this->input->post('nivelnomb');
	$sostenimientonomb = $this->input->post('sostenimientonomb');
	$modalidadnomb = $this->input->post('modalidadnomb');
	$ciclonomb = $this->input->post('ciclonomb');
	$GLOBALS['valor_id_nivel']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_moda']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_sosty']="";
$html = "";
$result = $this->Estadistica_model->get_llenado_tabla7($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb);

$html .= '<div class="well_">
      <a name="Rezago Educativo'.$ciclonomb.' de Cursos" style="text-decoration:none; color:black;">
        <h3 id="well_">Rezago Educativo</h3>
      </a>
    </div>
		<div style="overflow-x:auto;">
		<table class="table table-bordered">
          <tr>
            <th class="informa leftRadiusEdgeTop">Inasistencia escolar</th>
            <th class="informa" colspan="3">Población total</th>
            <th class="informa thtd_right rightRadiusEdgeTop" colspan="3">Población que no asiste a la escuela</th>
          </tr>
          <tr class="informa">
            <th class="informa" id="rezago">Población por grupo de edad que no asiste a la escuela</th>
            <th class="informa">Hombres</th>
            <th class="informa">Mujeres</th>
            <th class="informa">Total</th>
            <th class="informa">Hombres</th>
            <th class="informa">Mujeres</th>
            <th class="informa thtd_right">Total</th>
          </tr>
	</thead>
	<tbody>';

	foreach ($result as $row ) {

		$html .= '<tr id="tres">
            <td id="mis_td">3 a 5 años</td>
            <td id="show">'.number_format($row['TH_3_5']).'</td>
            <td id="show">'.number_format($row['TM_3_5']).'</td>
            <td id="show">'.number_format($row['TT_3_5']).'</td>
            <td id="show">'.number_format($row['INH_3_5']).'</td>
            <td id="show">'.number_format($row['INM_3_5']).'</td>
            <td class="thtd_right" id="show">'.number_format($row['INT_3_5']).'</td>
          </tr>
          <tr id="seis">
            <td id="mis_td">6 a 11 años</td>
            <td id="show">'.number_format($row['TH_6_11']).'</td>
            <td id="show">'.number_format($row['TM_6_11']).'</td>
            <td id="show">'.number_format($row['TT_6_11']).'</td>
            <td id="show">'.number_format($row['INH_6_11']).'</td>
            <td id="show">'.number_format($row['INM_6_11']).'</td>
            <td class="thtd_right" id="show">'.number_format($row['INT_6_11']).'</td>
          </tr>
          <tr id="doce">
            <td id="mis_td">12 a 14 años</td>
            <td id="show">'.number_format($row['TH_12_14']).'</td>
            <td id="show">'.number_format($row['TM_12_14']).'</td>
            <td id="show">'.number_format($row['TT_12_14']).'</td>
            <td id="show">'.number_format($row['INH_12_14']).'</td>
            <td id="show">'.number_format($row['INM_12_14']).'</td>
            <td class="thtd_right" id="show">'.number_format($row['INT_12_14']).'</td>
          </tr>
          <tr id="quince">
            <td id="mis_td">15 a 17 años</td>
            <td id="show">'.number_format($row['TH_15_17']).'</td>
            <td id="show">'.number_format($row['TM_15_17']).'</td>
            <td id="show">'.number_format($row['TT_15_17']).'</td>
            <td id="show">'.number_format($row['INH_15_17']).'</td>
            <td id="show">'.number_format($row['INM_15_17']).'</td>
            <td class="thtd_right" id="show">'.number_format($row['INT_15_17']).'</td>
          </tr>
          <tr id="dieciocho">
            <td class="thtd_bottom leftRadiusEdgeBottom" id="mis_td">18 a 22 años</td>
            <td id="show">'.number_format($row['TH_18_22']).'</td>
            <td id="show">'.number_format($row['TM_18_22']).'</td>
            <td id="show">'.number_format($row['TT_18_22']).'</td>
            <td id="show">'.number_format($row['INH_18_22']).'</td>
            <td id="show">'.number_format($row['INM_18_22']).'</td>
            <td class="thtd_right" id="show">'.number_format($row['INT_18_22']).'</td>
          </tr>';

	}


				$html .= '</tbody>
			</table>

			<div class="pie_tabla">
			        <div id="fuentes_pie">Fuente: INEGI. encuesta intercensal 2015.</div>
			</div>';




	$response = array(
	'status' => 'OK',
	'result'=>$html
);

Utilerias::enviaDataJson(200, $response, $this);
exit;
}// get_llenado_tablas7()

public function get_llenado_tablas8()
{
	$municipioid = $this->input->post('municipioid');
	$municipionomb = $this->input->post('municipionomb');
	$nivelid = $this->input->post('nivelid');
	$nivelnomb = $this->input->post('nivelnomb');
	$sostenimientonomb = $this->input->post('sostenimientonomb');
	$modalidadnomb = $this->input->post('modalidadnomb');
	$ciclonomb = $this->input->post('ciclonomb');
	$GLOBALS['valor_id_nivel']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_moda']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_sosty']="";
$html = "";
$result = $this->Estadistica_model->get_llenado_tabla8($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb);

$html .= '<div class="well_">
      <a name="Analfabetismo'.$ciclonomb.' de Cursos" style="text-decoration:none; color:black;">
        <h3 id="well_">Analfabetismo</h3>
      </a>
    </div>
		<div style="overflow-x:auto;">
		<table class="table table-bordered">
					 <tr class="informa">
						 <th class="informa leftRadiusEdgeTop"></th>
						 <th  class="informa">Hombres</th>
						 <th  class="informa">Mujeres</th>
						 <th class=" informa thtd_right rightRadiusEdgeTop">Total</th>
					 </tr>
	</thead>
	<tbody>';

	foreach ($result as $row ) {

		$html .= '<tr id="analfabe">
              <td class="thtd_bottom leftRadiusEdgeBottom" id="mis_td">Población de 8 a 14 años que no saben leer ni escribir</td>
              <td class="thtd_bottom" id="show">'.number_format($row['ANH_8_14']).'</td>
              <td class="thtd_bottom" id="show">'.number_format($row['ANM_8_14']).'</td>
              <td class="thtd_right thtd_bottom" id="show">'.number_format($row['ANT_8_14']).'</td>
            </tr>
            <tr id="analfabe">
              <td class="thtd_bottom leftRadiusEdgeBottom" id="mis_td">Población mayor de 15 años que no saben leer ni escribir</td>
              <td class="thtd_bottom" id="show">'.number_format($row['ANH_15_OM']).'</td>
              <td class="thtd_bottom" id="show">'.number_format($row['ANM_15_OM']).'</td>
              <td class="thtd_right thtd_bottom" id="show">'.number_format($row['ANT_15_OM']).'</td>
            </tr>';

	}


				$html .= '</tbody>
			</table>

			<div class="pie_tabla">
			        <div id="fuentes_pie">Fuente: INEGI. encuesta intercensal 2015.</div>
			</div>';




	$response = array(
	'status' => 'OK',
	'result'=>$html
);

Utilerias::enviaDataJson(200, $response, $this);
exit;
}// get_llenado_tablas8()


public function getciclo_ze()
{
	$nivelid = $this->input->post('nivelid');
	$sostenimientoid = $this->input->post('sostenimientoid');
	$num_ze = $this->input->post('num_ze');
	$cct_ze = $this->input->post('cct_ze');

$html = "";
$result = $this->Estadistica_model->getciclo_ze($nivelid, $sostenimientoid, $num_ze, $cct_ze);

$html .= "<option value=>ELIGE CICLO ESCOLAR</option>";
foreach ($result as $res) {
	$html .= "<option value=".$res['ciclo'].">".$res['ciclo']."</option>";
}


	$response = array(
	'status' => 'OK',
	'result'=>$html
);

Utilerias::enviaDataJson(200, $response, $this);
exit;
}// getciclo_ze()


public function get_llenado_tablas1_ze()
{

	$nivelid = $this->input->post('nivelid');
	$sostenimientoid = $this->input->post('sostenimientoid');
	$num_ze = $this->input->post('num_ze');
	$cct_ze = $this->input->post('cct_ze');

	$GLOBALS['valor_id_nivel']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_moda']="";
	$GLOBALS['valor_id_sost']="";
$GLOBALS['valor_id_sosty']="";
$html = "";
$result = $this->Estadistica_model->get_llenado_tabla1_0_ze($nivelid, $sostenimientoid, $num_ze, $cct_ze);


	foreach ($result as $row ) {

		if($row['Sostenimiento_X']=="Total" && $row['Modalidad_X']=="Total") {

			switch($row['Nivel_X'])
			{
				case 'Especial':     	$GLOBALS['valor_id_nivel']="esp"; break;
				case 'Inicial':      	$GLOBALS['valor_id_nivel']="ini"; break;
				case 'Preescolar':   	$GLOBALS['valor_id_nivel']="pre"; break;
				case 'Primaria':  	 	$GLOBALS['valor_id_nivel']="pri"; break;
				case 'Secundaria': 	 	$GLOBALS['valor_id_nivel']="sec"; break;
				case 'Media Superior': 	$GLOBALS['valor_id_nivel']="bac"; break;
				case 'Superior':     	$GLOBALS['valor_id_nivel']="sup"; break;
			}

			$html .= '<tr class="parent" id="'.$GLOBALS['valor_id_nivel'].'">';

			if($row['Nivel_X']=='Total (todos los niveles)'){

			$html .= '<td  id="mis_td" style="text-align: left; background-color: #FFFFFF">'.$row['Nivel_X'].'</td>';
			}
			else{
			$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF" ><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>'.$row['Nivel_X'].'</td>';
			}
		}
		elseif ($row['Sostenimiento_X']!=="Total" && $row['Modalidad_X']=="Total") {

			switch($row['Sostenimiento_X'])
			{
				case 'Público':   $GLOBALS['valor_id_sost']="pub"; break;
				case 'Autónomo':  $GLOBALS['valor_id_sost']="aut"; break;
				case 'Privado':   $GLOBALS['valor_id_sost']="pri"; break;
			}

			$html .= '<tr class="child-'.$GLOBALS['valor_id_nivel'].' child-parent hide-ini" id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].'" title="Click para expander/contraer" style="cursor: pointer;">
			<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 25px"><span class="chevron_toggleable glyphicon glyphicon-chevron-down">
			</span> '.$row['Sostenimiento_X'].'</td>';

		}
		elseif($row['Sostenimiento_X']!=="Total" && $row['Modalidad_X']!="Total")	{

			switch($row['Modalidad_X'])
			{
				case 'CAM':     					$GLOBALS['valor_id_moda']="cam"; break;
				case 'USAER':      					$GLOBALS['valor_id_moda']="usa"; break;
				case 'Escolarizada':   				$GLOBALS['valor_id_moda']="esc"; break;
				case 'General':  	 				$GLOBALS['valor_id_moda']="gen"; break;
				case 'Técnica Industrial': 	 		$GLOBALS['valor_id_moda']="tin"; break;
				case 'Comunitario': 	 		$GLOBALS['valor_id_moda']="comu"; break;
				case 'Técnica': 	 		$GLOBALS['valor_id_moda']="tec"; break;
				case 'Técnica Agropecuaria':		$GLOBALS['valor_id_moda']="tag"; break;
				case 'Para Trabajadores':     		$GLOBALS['valor_id_moda']="ptr"; break;
				case 'Para adultos':     		$GLOBALS['valor_id_moda']="pad"; break;
				case 'Telesecundaria':     			$GLOBALS['valor_id_moda']="tel"; break;
				case 'No Escolarizada':      		$GLOBALS['valor_id_moda']="nes"; break;
				case 'Indígena':   					$GLOBALS['valor_id_moda']="ind"; break;
				case 'CONAFE (COMUNITARIA)':  	 				$GLOBALS['valor_id_moda']="con"; break;
				case 'Bachillerato General':    	$GLOBALS['valor_id_moda']="bge"; break;
				case 'Bachillerato Tecnológico':	$GLOBALS['valor_id_moda']="bte"; break;
				case 'Profesional Técnico':      	$GLOBALS['valor_id_moda']="pte"; break;
				case 'Universitaria':   			$GLOBALS['valor_id_moda']="uni"; break;
				case 'Normal':  	 				$GLOBALS['valor_id_moda']="nor"; break;
				case 'Administrativo':      	$GLOBALS['valor_id_moda']="adm"; break;
			}

			$html .= '<tr class="nieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].' class-hide-'.$GLOBALS['valor_id_nivel'].' hide-ini" id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].$GLOBALS['valor_id_moda'].'">
			<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">'.$row['Modalidad_X'].'</td>';

		}

				$html .= '<td id="show">'.number_format($row['Cant_alumnos_M']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_H']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_T']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_1_T']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_2_T']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_3_T']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_4_T']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_5_T']).'</td>
				<td id="show">'.number_format($row['Cant_alumnos_6_T']).'</td>
			</tr>';

	}

	$result = $this->Estadistica_model->get_llenado_tabla1_1_ze($nivelid, $sostenimientoid, $num_ze, $cct_ze);


			foreach ($result as $row ) {
					if (($row['Cant_alumnos_T'])!='') {


						if($row['Modalidad_X']=="Total" && $row['Sostenimiento_X']=="Total" && $row['sub_Sostenimiento']=="Total" ) {

							$GLOBALS['valor_id_nivel']="sup";


							$html .= '<tr class="parent" id="'.$GLOBALS['valor_id_nivel'].'" title="Click para expander/contraer" style="cursor: pointer;">
							<td id="mis_td" style="text-align: left; background-color: #FFFFFF" id=""><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>'.$row['Nivel_X'].'</td>';

						}
						elseif ($row['Modalidad_X']!=="Total" && $row['Sostenimiento_X']=="Total"  && $row['sub_Sostenimiento']=="Total") {

							switch($row['Modalidad_X'])
							{
								case 'Universitario y Tecnológico': $GLOBALS['valor_id_moda']="uyt"; break;
								case 'Normal':  					$GLOBALS['valor_id_moda']="nor"; break;
								case 'Posgrado':   					$GLOBALS['valor_id_moda']="pos"; break;
							}

							$html .= '<tr class="child-'.$GLOBALS['valor_id_nivel'].' child-parent hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].'"
								title="Click para expander/contraer" style="cursor: pointer;">
								<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 25px" id=""><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>
								'.$row['Modalidad_X'].'</td>';
						}
						elseif ($row['Sostenimiento_X']!="Total"  && $row['sub_Sostenimiento']=="Total") {

							switch($row['Sostenimiento_X'])
							{
								case 'Público':   $GLOBALS['valor_id_sost']="pub"; break;
								case 'Autónomo':  $GLOBALS['valor_id_sost']="aut"; break;
								case 'Privado':   $GLOBALS['valor_id_sost']="pri"; break;
							}

							$html .= '<tr class="nieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].' child-nieto class-hide-sup hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].'"
								title="Click para expander/contraer" style="cursor: pointer;">';

							if($row['Sostenimiento_X']=='Autónomo' || $row['Sostenimiento_X']=='Privado' ){

							$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">
							'.$row['Sostenimiento_X'].'
							</td>';

							}
							else{

							$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">
							<span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span
							>'.$row['Sostenimiento_X'].'
							</td>';


							}
						}
						elseif($row['Sostenimiento_X']=="Público" && $row['sub_Sostenimiento']!="Total")	{

							switch($row['sub_Sostenimiento'])
							{
								case 'Estatal':     	$GLOBALS['valor_id_sosty']="est"; break;
								case 'Federal':      	$GLOBALS['valor_id_sosty']="fed"; break;
							}

							$html .= '<tr class="bisnieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].' class-hide-sup class-hide-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].' hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].$GLOBALS['valor_id_sosty'].'">
							<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 65px" id="">'.$row['sub_Sostenimiento'].'</td>';

						}
								$html .= '<td id="show">'.number_format($row['Cant_alumnos_M']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_H']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_T']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_1_T']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_2_T']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_3_T']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_4_T']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_5_T']).'</td>
								<td id="show">'.number_format($row['Cant_alumnos_6_T']).'</td>
							</tr>';
						}
					}





	$response = array(
	'status' => 'OK',
	'result'=>$html
);

Utilerias::enviaDataJson(200, $response, $this);
exit;
}// get_llenado_tablas1_ze()


public function get_llenado_tablas2_ze()
{
	$nivelid = $this->input->post('nivelid');
	$sostenimientoid = $this->input->post('sostenimientoid');
	$num_ze = $this->input->post('num_ze');
	$cct_ze = $this->input->post('cct_ze');

	$GLOBALS['valor_id_nivel']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_moda']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_sosty']="";
$html = "";
$result = $this->Estadistica_model->get_llenado_tabla2_0_ze($nivelid, $sostenimientoid, $num_ze, $cct_ze);



	foreach ($result as $row ) {

		if($row['Sostenimiento_X']=="Total" && $row['Modalidad_X']=="Total") {

			switch($row['Nivel_X'])
			{
				case 'Especial':     	$GLOBALS['valor_id_nivel']="esp2"; break;
				case 'Inicial':      	$GLOBALS['valor_id_nivel']="ini2"; break;
				case 'Preescolar':   	$GLOBALS['valor_id_nivel']="pre2"; break;
				case 'Primaria':  	 	$GLOBALS['valor_id_nivel']="pri2"; break;
				case 'Secundaria': 	 	$GLOBALS['valor_id_nivel']="sec2"; break;
				case 'Media Superior': 	$GLOBALS['valor_id_nivel']="bac2"; break;
				case 'Superior':     	$GLOBALS['valor_id_nivel']="sup2"; break;
			}

			$html .= '<tr class="parent" id="'.$GLOBALS['valor_id_nivel'].'">';

			if($row['Nivel_X']=='Total (todos los niveles)'){

			$html .= '<td  id="mis_td" style="text-align: left; background-color: #FFFFFF">'.$row['Nivel_X'].'</td>';
			}
			else{
			$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF" ><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>'.$row['Nivel_X'].'</td>';
			}
		}
		elseif ($row['Sostenimiento_X']!=="Total" && $row['Modalidad_X']=="Total") {

			switch($row['Sostenimiento_X'])
			{
				case 'Público':   $GLOBALS['valor_id_sost']="pub2"; break;
				case 'Autónomo':  $GLOBALS['valor_id_sost']="aut2"; break;
				case 'Privado':   $GLOBALS['valor_id_sost']="pri2"; break;
			}

			$html .= '<tr class="child-'.$GLOBALS['valor_id_nivel'].' child-parent hide-ini" id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].'" title="Click para expander/contraer" style="cursor: pointer;">
			<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 25px"><span class="chevron_toggleable glyphicon glyphicon-chevron-down">
			</span> '.$row['Sostenimiento_X'].'</td>';

		}
		elseif($row['Sostenimiento_X']!=="Total" && $row['Modalidad_X']!="Total")	{

			switch($row['Modalidad_X'])
			{
				case 'CAM':     					$GLOBALS['valor_id_moda']="cam2"; break;
				case 'USAER':      					$GLOBALS['valor_id_moda']="usa2"; break;
				case 'Escolarizada':   				$GLOBALS['valor_id_moda']="esc2"; break;
				case 'General':  	 				$GLOBALS['valor_id_moda']="gen2"; break;
				case 'Técnica Industrial': 	 		$GLOBALS['valor_id_moda']="tin2"; break;
				case 'Comunitario': 	 		$GLOBALS['valor_id_moda']="comu2"; break;
				case 'Técnica': 	 		$GLOBALS['valor_id_moda']="tec2"; break;
				case 'Técnica Agropecuaria':		$GLOBALS['valor_id_moda']="tag2"; break;
				case 'Para Trabajadores':     		$GLOBALS['valor_id_moda']="ptr2"; break;
				case 'Para adultos':     		$GLOBALS['valor_id_moda']="pad2"; break;
				case 'Telesecundaria':     			$GLOBALS['valor_id_moda']="tel2"; break;
				case 'No Escolarizada':      		$GLOBALS['valor_id_moda']="nes2"; break;
				case 'Indígena':   					$GLOBALS['valor_id_moda']="ind2"; break;
				case 'CONAFE (COMUNITARIA)':  	 				$GLOBALS['valor_id_moda']="con2"; break;
				case 'Bachillerato General':    	$GLOBALS['valor_id_moda']="bge2"; break;
				case 'Bachillerato Tecnológico':	$GLOBALS['valor_id_moda']="bte2"; break;
				case 'Profesional Técnico':      	$GLOBALS['valor_id_moda']="pte2"; break;
				case 'Universitaria':   			$GLOBALS['valor_id_moda']="uni2"; break;
				case 'Normal':  	 				$GLOBALS['valor_id_moda']="nor2"; break;
				case 'Administrativo':      	$GLOBALS['valor_id_moda']="adm2"; break;
			}

			$html .= '<tr class="nieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].' class-hide-'.$GLOBALS['valor_id_nivel'].' hide-ini" id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].$GLOBALS['valor_id_moda'].'">
			<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">'.$row['Modalidad_X'].'</td>';

		}

				$html .= '<td id="show">'.number_format($row['Cant_docentes_M']).'</td>
					<td id="show">'.number_format($row['Cant_docentes_H']).'</td>
					<td id="show">'.number_format($row['Cant_docentes_T']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_con_grupo_M']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_con_grupo_H']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_con_grupo_T']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_sin_grupo_M']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_sin_grupo_H']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_sin_grupo_T']).'</td>
				</tr>';

	}

	$result = $this->Estadistica_model->get_llenado_tabla2_1_ze($nivelid, $sostenimientoid, $num_ze, $cct_ze);


			foreach ($result as $row ) {
				if (($row['Cant_docentes_T'])!='') {
						if($row['Modalidad_X']=="Total" && $row['Sostenimiento_X']=="Total" && $row['sub_Sostenimiento']=="Total" ) {

							$GLOBALS['valor_id_nivel']="sup2";


							$html .= '<tr class="parent" id="'.$GLOBALS['valor_id_nivel'].'" title="Click para expander/contraer" style="cursor: pointer;">
							<td id="mis_td" style="text-align: left; background-color: #FFFFFF" id=""><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>'.$row['Nivel_X'].'</td>';

						}
						elseif ($row['Modalidad_X']!=="Total" && $row['Sostenimiento_X']=="Total"  && $row['sub_Sostenimiento']=="Total") {

							switch($row['Modalidad_X'])
							{
								case 'Universitario y Tecnológico': $GLOBALS['valor_id_moda']="uyt2"; break;
								case 'Normal':  					$GLOBALS['valor_id_moda']="nor2"; break;
								case 'Posgrado':   					$GLOBALS['valor_id_moda']="pos2"; break;
							}

							$html .= '<tr class="child-'.$GLOBALS['valor_id_nivel'].' child-parent hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].'"
								title="Click para expander/contraer" style="cursor: pointer;">
								<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 25px" id=""><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>
								'.$row['Modalidad_X'].'</td>';
						}
						elseif ($row['Sostenimiento_X']!="Total"  && $row['sub_Sostenimiento']=="Total") {

							switch($row['Sostenimiento_X'])
							{
								case 'Público':   $GLOBALS['valor_id_sost']="pub2"; break;
								case 'Autónomo':  $GLOBALS['valor_id_sost']="aut2"; break;
								case 'Privado':   $GLOBALS['valor_id_sost']="pri2"; break;
							}

							$html .= '<tr class="nieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].' child-nieto class-hide-sup hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].'"
								title="Click para expander/contraer" style="cursor: pointer;">';

							if($row['Sostenimiento_X']=='Autónomo' || $row['Sostenimiento_X']=='Privado' ){

							$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">
							'.$row['Sostenimiento_X'].'
							</td>';

							}
							else{

							$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">
							<span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span
							>'.$row['Sostenimiento_X'].'
							</td>';


							}
						}
						elseif($row['Sostenimiento_X']=="Público" && $row['sub_Sostenimiento']!="Total")	{

							switch($row['sub_Sostenimiento'])
							{
								case 'Estatal':     	$GLOBALS['valor_id_sosty']="est2"; break;
								case 'Federal':      	$GLOBALS['valor_id_sosty']="fed2"; break;
							}

							$html .= '<tr class="bisnieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].' class-hide-sup class-hide-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].' hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].$GLOBALS['valor_id_sosty'].'">
							<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 65px" id="">'.$row['sub_Sostenimiento'].'</td>';

						}
								$html .= '<td id="show">'.number_format($row['Cant_docentes_M']).'</td>
					<td id="show">'.number_format($row['Cant_docentes_H']).'</td>
					<td id="show">'.number_format($row['Cant_docentes_T']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_con_grupo_M']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_con_grupo_H']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_con_grupo_T']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_sin_grupo_M']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_sin_grupo_H']).'</td>
					<td id="show">'.number_format($row['Cant_directivos_sin_grupo_T']).'</td>
				</tr>';

					}
				}





	$response = array(
	'status' => 'OK',
	'result'=>$html
);

Utilerias::enviaDataJson(200, $response, $this);
exit;
}// get_llenado_tablas2_ze()

public function get_llenado_tablas3_ze()
{
	$nivelid = $this->input->post('nivelid');
	$sostenimientoid = $this->input->post('sostenimientoid');
	$num_ze = $this->input->post('num_ze');
	$cct_ze = $this->input->post('cct_ze');

	$GLOBALS['valor_id_nivel']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_moda']="";
	$GLOBALS['valor_id_sost']="";
	$GLOBALS['valor_id_sosty']="";
$html = "";
$result = $this->Estadistica_model->get_llenado_tabla3_0_ze($nivelid, $sostenimientoid, $num_ze, $cct_ze);


	foreach ($result as $row ) {

		if($row['Sostenimiento_X']=="Total" && $row['Modalidad_X']=="Total") {

			switch($row['Nivel_X'])
			{
				case 'Especial':     	$GLOBALS['valor_id_nivel']="esp3"; break;
				case 'Inicial':      	$GLOBALS['valor_id_nivel']="ini3"; break;
				case 'Preescolar':   	$GLOBALS['valor_id_nivel']="pre3"; break;
				case 'Primaria':  	 	$GLOBALS['valor_id_nivel']="pri3"; break;
				case 'Secundaria': 	 	$GLOBALS['valor_id_nivel']="sec3"; break;
				case 'Media Superior': 	$GLOBALS['valor_id_nivel']="bac3"; break;
				case 'Superior':     	$GLOBALS['valor_id_nivel']="sup3"; break;
			}

			$html .= '<tr class="parent" id="'.$GLOBALS['valor_id_nivel'].'">';

			if($row['Nivel_X']=='Total (todos los niveles)'){

			$html .= '<td  id="mis_td" style="text-align: left; background-color: #FFFFFF">'.$row['Nivel_X'].'</td>';
			}
			else{
			$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF" ><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>'.$row['Nivel_X'].'</td>';
			}
		}
		elseif ($row['Sostenimiento_X']!=="Total" && $row['Modalidad_X']=="Total") {

			switch($row['Sostenimiento_X'])
			{
				case 'Público':   $GLOBALS['valor_id_sost']="pub3"; break;
				case 'Autónomo':  $GLOBALS['valor_id_sost']="aut3"; break;
				case 'Privado':   $GLOBALS['valor_id_sost']="pri3"; break;
			}

			$html .= '<tr class="child-'.$GLOBALS['valor_id_nivel'].' child-parent hide-ini" id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].'" title="Click para expander/contraer" style="cursor: pointer;">
			<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 25px"><span class="chevron_toggleable glyphicon glyphicon-chevron-down">
			</span> '.$row['Sostenimiento_X'].'</td>';

		}
		elseif($row['Sostenimiento_X']!=="Total" && $row['Modalidad_X']!="Total")	{

			switch($row['Modalidad_X'])
			{
				case 'CAM':     					$GLOBALS['valor_id_moda']="cam3"; break;
				case 'USAER':      					$GLOBALS['valor_id_moda']="usa3"; break;
				case 'Escolarizada':   				$GLOBALS['valor_id_moda']="esc3"; break;
				case 'General':  	 				$GLOBALS['valor_id_moda']="gen3"; break;
				case 'Técnica Industrial': 	 		$GLOBALS['valor_id_moda']="tin3"; break;
				case 'Comunitario': 	 		$GLOBALS['valor_id_moda']="comu3"; break;
				case 'Técnica': 	 		$GLOBALS['valor_id_moda']="tec3"; break;
				case 'Técnica Agropecuaria':		$GLOBALS['valor_id_moda']="tag3"; break;
				case 'Para Trabajadores':     		$GLOBALS['valor_id_moda']="ptr3"; break;
				case 'Para adultos':     		$GLOBALS['valor_id_moda']="pad3"; break;
				case 'Telesecundaria':     			$GLOBALS['valor_id_moda']="tel3"; break;
				case 'No Escolarizada':      		$GLOBALS['valor_id_moda']="nes3"; break;
				case 'Indígena':   					$GLOBALS['valor_id_moda']="ind3"; break;
				case 'CONAFE (COMUNITARIA)':  	 				$GLOBALS['valor_id_moda']="con3"; break;
				case 'Bachillerato General':    	$GLOBALS['valor_id_moda']="bge3"; break;
				case 'Bachillerato Tecnológico':	$GLOBALS['valor_id_moda']="bte3"; break;
				case 'Profesional Técnico':      	$GLOBALS['valor_id_moda']="pte3"; break;
				case 'Universitaria':   			$GLOBALS['valor_id_moda']="uni3"; break;
				case 'Normal':  	 				$GLOBALS['valor_id_moda']="nor3"; break;
				case 'Administrativo':      	$GLOBALS['valor_id_moda']="adm3"; break;
			}

			$html .= '<tr class="nieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].' class-hide-'.$GLOBALS['valor_id_nivel'].' hide-ini" id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_sost'].$GLOBALS['valor_id_moda'].'">
			<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">'.$row['Modalidad_X'].'</td>';

		}

				$html .= '<td id="show">'.number_format($row['escuelas']).'</td>
					<td id="show">'.number_format($row['Cant_aulas_en_uso']).'</td>
					<td id="show">'.number_format($row['Cant_grupos_1']).'</td>
					<td id="show">'.number_format($row['Cant_grupos_2']).'</td>
					<td id="show">'.number_format($row['Cant_grupos_3']).'</td>
					<td id="show">'.number_format($row['Cant_grupos_4']).'</td>
					<td id="show">'.number_format($row['Cant_grupos_5']).'</td>
					<td id="show">'.number_format($row['Cant_grupos_6']).'</td>
					<td id="show">'.number_format($row['Cant_grupos_multigrado']).'</td>
					<td id="show">'.number_format($row['Cant_grupos']).'</td>
				</tr>';

	}

	$result = $this->Estadistica_model->get_llenado_tabla3_1_ze($nivelid, $sostenimientoid, $num_ze, $cct_ze);


			foreach ($result as $row ) {
				if (($row['escuelas'])!=0) {
						if($row['Modalidad_X']=="Total" && $row['Sostenimiento_X']=="Total" && $row['sub_Sostenimiento']=="Total" ) {

							$GLOBALS['valor_id_nivel']="sup3";


							$html .= '<tr class="parent" id="'.$GLOBALS['valor_id_nivel'].'" title="Click para expander/contraer" style="cursor: pointer;">
							<td id="mis_td" style="text-align: left; background-color: #FFFFFF" id=""><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>'.$row['Nivel_X'].'</td>';

						}
						elseif ($row['Modalidad_X']!=="Total" && $row['Sostenimiento_X']=="Total"  && $row['sub_Sostenimiento']=="Total") {

							switch($row['Modalidad_X'])
							{
								case 'Universitario y Tecnológico': $GLOBALS['valor_id_moda']="uyt3"; break;
								case 'Normal':  					$GLOBALS['valor_id_moda']="nor3"; break;
								case 'Posgrado':   					$GLOBALS['valor_id_moda']="pos3"; break;
							}

							$html .= '<tr class="child-'.$GLOBALS['valor_id_nivel'].' child-parent hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].'"
								title="Click para expander/contraer" style="cursor: pointer;">
								<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 25px" id=""><span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>
								'.$row['Modalidad_X'].'</td>';
						}
						elseif ($row['Sostenimiento_X']!="Total"  && $row['sub_Sostenimiento']=="Total") {

							switch($row['Sostenimiento_X'])
							{
								case 'Público':   $GLOBALS['valor_id_sost']="pub3"; break;
								case 'Autónomo':  $GLOBALS['valor_id_sost']="aut3"; break;
								case 'Privado':   $GLOBALS['valor_id_sost']="pri3"; break;
							}

							$html .= '<tr class="nieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].' child-nieto class-hide-sup hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].'"
								title="Click para expander/contraer" style="cursor: pointer;">';

							if($row['Sostenimiento_X']=='Autónomo' || $row['Sostenimiento_X']=='Privado' ){

							$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">
							'.$row['Sostenimiento_X'].'
							</td>';

							}
							else{

							$html .= '<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 45px" id="">
							<span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span
							>'.$row['Sostenimiento_X'].'
							</td>';


							}
						}
						elseif($row['Sostenimiento_X']=="Público" && $row['sub_Sostenimiento']!="Total")	{

							switch($row['sub_Sostenimiento'])
							{
								case 'Estatal':     	$GLOBALS['valor_id_sosty']="est3"; break;
								case 'Federal':      	$GLOBALS['valor_id_sosty']="fed3"; break;
							}

							$html .= '<tr class="bisnieto-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].' class-hide-sup class-hide-'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].' hide-ini"
								id="'.$GLOBALS['valor_id_nivel'].$GLOBALS['valor_id_moda'].$GLOBALS['valor_id_sost'].$GLOBALS['valor_id_sosty'].'">
							<td id="mis_td" style="text-align: left; background-color: #FFFFFF; padding-left: 65px" id="">'.$row['sub_Sostenimiento'].'</td>';

						}
								$html .= '<td id="show">'.number_format($row['escuelas']).'</td>
									<td id="show">'.number_format($row['Cant_aulas_en_uso']).'</td>
									<td id="show">'.number_format($row['Cant_grupos_1']).'</td>
									<td id="show">'.number_format($row['Cant_grupos_2']).'</td>
									<td id="show">'.number_format($row['Cant_grupos_3']).'</td>
									<td id="show">'.number_format($row['Cant_grupos_4']).'</td>
									<td id="show">'.number_format($row['Cant_grupos_5']).'</td>
									<td id="show">'.number_format($row['Cant_grupos_6']).'</td>
									<td id="show">'.number_format($row['Cant_grupos_multigrado']).'</td>
									<td id="show">'.number_format($row['Cant_grupos']).'</td>
				</tr>';

					}
				}





	$response = array(
	'status' => 'OK',
	'result'=>$html
);

Utilerias::enviaDataJson(200, $response, $this);
exit;
}// get_llenado_tablas3_ze()




}
