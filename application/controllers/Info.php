<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			$this->load->model('Info_model');
			$this->load->model('Estadistica_e_indicadores_xcct_model');
			$this->load->model('Escuela_model');
			$this->load->model('Planeaxescuela_model');
			$this->load->model('Planea_nacionalxnivel_model');
			$this->load->model('Planeaxesc_reactivo_model');
		}

	public function index(){
		$id_cct = $this->input->post("id_cct");
		if(isset($id_cct) && $id_cct != ""){
			$data = array();
			$escuela = $this->Info_model->get_info_escuela($id_cct);
			// echo "<pre>";print_r($estadis_alumnos_escuela);die();
			$planea15_escuela = $this->Planeaxescuela_model->get_planea_xidcct($id_cct,'2015');
			$planea16_escuela = $this->Planeaxescuela_model->get_planea_xidcct($id_cct,'2016');

			$planea15_nacional = $this->Planea_nacionalxnivel_model->get_planea_xnac($escuela[0]['nivel'],'14_15');
			$planea16_nacional = $this->Planea_nacionalxnivel_model->get_planea_xnac($escuela[0]['nivel'],'15_16');

			$data['id_cct'] = $id_cct;
			$data['planea15_escuela'] = $planea15_escuela;
			$data['planea16_escuela'] = $planea16_escuela;
			$data['planea15_nacional'] = $planea15_nacional;
			$data['planea16_nacional'] = $planea16_nacional;
			$data['nombre_centro'] = $escuela[0]['nombre_centro'];
			$data['cve_centro'] = $escuela[0]['cve_centro'];
			$data['turno'] = $escuela[0]['turno'];
			$data['nivel'] = $escuela[0]['nivel'];
			$data['modalidad'] = $escuela[0]['modalidad'];
			$data['sostenimiento'] = $escuela[0]['sostenimiento'];
			$data['region'] = $escuela[0]['region'];
			$data['domicilio'] = $escuela[0]['domicilio'];
			$data['localidad'] = $escuela[0]['localidad'];
			$data['municipio'] = $escuela[0]['municipio'];
			$data['nombre_director'] = $escuela[0]['nombre_director'];
			$data['estatus'] = $escuela[0]['estatus'];
			Utilerias::pagina_basica($this, "info/index", $data);
		}

	}
	public function info_graficas(){
		$id_cct = $this->input->post("id_cct");
		$estadis_alumnos_escuela = $this->Estadistica_e_indicadores_xcct_model->get_nalumnos_xesc($id_cct);
		$estadis_docentes_escuela = $this->Estadistica_e_indicadores_xcct_model->get_ndocentes_xesc($id_cct);
		$estadis_grupos_escuela = $this->Estadistica_e_indicadores_xcct_model->get_ngrupos_xesc($id_cct);
		$nivel = $this->Escuela_model->get_nivel_xidcct($id_cct);

		$planea15_escuela = $this->Planeaxescuela_model->get_planea_xidcct($id_cct,'2015');
		$planea16_escuela = $this->Planeaxescuela_model->get_planea_xidcct($id_cct,'2016');

		$planea15_escuela = $this->Planeaxescuela_model->get_planea_xidcct($id_cct,'2015');
		$planea16_escuela = $this->Planeaxescuela_model->get_planea_xidcct($id_cct,'2016');

		$graph_cont_tema_lyc = $this->Planeaxesc_reactivo_model->get_planea_xconttem_reac($id_cct,1,2);
		$graph_cont_tema_mate = $this->Planeaxesc_reactivo_model->get_planea_xconttem_reac($id_cct,1,1);

		// echo "<pre>";print_r($graph_cont_tema_lyc);die();
		$response = array(
			'id_cct'=>$id_cct,
			'nivel'=>$nivel,
			'estadis_alumnos_escuela'=>$estadis_alumnos_escuela,
			'estadis_docentes_escuela'=>$estadis_docentes_escuela,
			'estadis_grupos_escuela'=>$estadis_grupos_escuela,
			'planea15_escuela'=>$planea15_escuela,
			'planea16_escuela'=>$planea16_escuela,
			'graph_cont_tema_lyc'=>$graph_cont_tema_lyc,
			'graph_cont_tema_mate'=>$graph_cont_tema_mate
		);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}



	public function info_xcont_xcct(){
		$id_cont = $this->input->post("id_cont");
		$id_cct = $this->input->post("id_cct");
		$periodo = $this->input->post("periodo");
		$idcampodis = $this->input->post("idcampodis");

		$graph_cont_reactivos_xcctxcont = $this->Planeaxesc_reactivo_model->get_reactivos_xcctxcont($id_cct,$id_cont,$periodo,$idcampodis);

		// echo "<pre>";print_r($graph_cont_tema_lyc);die();
		$response = array(
			'graph_cont_reactivos_xcctxcont'=>$graph_cont_reactivos_xcctxcont
		);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}


}// Mapa
