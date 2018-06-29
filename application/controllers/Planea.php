<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planea extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			// $this->load->model('Escuela_model');
			$this->load->model('Municipio_model');
			$this->load->model('Nivel_model');
			$this->load->model('Supervision_model');
			$this->load->model('Planeaxmuni_model');
			$this->load->model('Planeaxesc_reactivo_model');
			$this->load->helper('form');
		}

		public function index(){
			$data=array();
			$municipios = $this->Municipio_model->all();
			$arr_municipios['0'] = 'TODOS';
			foreach ($municipios as $municipio){
				 $arr_municipios[$municipio['id_municipio']] = $municipio['municipio'];
			}
			// $niveles = $this->Nivel_model->all();
			$arr_niveles['0'] = 'SELECCIONE';
			$arr_niveles['4'] = 'PRIMARIA';
			$arr_niveles['5'] = 'SECUNDARIA';
			// foreach ($niveles as $nivel){
			// 	 $arr_niveles[$nivel['id_nivel']] = $nivel['nivel'];
			// }

			$periodos = $this->Planeaxmuni_model->allperiodos();
			$arr_periodos = array();
			foreach ($periodos as $periodo){
				 $arr_periodos[$periodo['id_periodo']] = $periodo['periodo'];
			}

			$result_nzonae = $this->Supervision_model->allzonas();
			$arr_zonas = array();
			$arr_zonas['0'] = 'TODAS';
			foreach ($result_nzonae as $zona){
				 $arr_zonas[$zona['id_supervision']] = $zona['zona_escolar'];
			}

			$data['municipios'] = $arr_municipios;
			$data['niveles'] = $arr_niveles;
			$data['periodos'] = $arr_periodos;
			$data['zonas'] = $arr_zonas;
			Utilerias::pagina_basica($this, "planea/index", $data);
		}

		public function get_xmunicipio(){
			$municipio = $this->input->post("idmunicipio");
			$nivel = $this->input->post("nivel");
			$periodo = $this->input->post("periodo");

			$datos_lyc = $this->Planeaxesc_reactivo_model->estadisticas_x_estadomunicipio($municipio, $nivel, $periodo, 2);
			$datos_mate = $this->Planeaxesc_reactivo_model->estadisticas_x_estadomunicipio($municipio, $nivel, $periodo, 1);
			$response = array('datos_lyc' => $datos_lyc, 'datos_mate' => $datos_mate, 'id_municipio' => $municipio);
		        Utilerias::enviaDataJson(200, $response, $this);
		        exit;
		}

		public function get_xregion(){
			$region = $this->input->post("id_supervision");
			$nivel = $this->input->post("nivel");
			$periodo = $this->input->post("periodo");

			$datos_lyc = $this->Planeaxesc_reactivo_model->estadisticas_x_region($region, $nivel, $periodo, 2);
			$datos_mate = $this->Planeaxesc_reactivo_model->estadisticas_x_region($region, $nivel, $periodo, 1);
			$response = array('datos_lyc' => $datos_lyc, 'datos_mate' => $datos_mate, 'id_region' => $region);
		        Utilerias::enviaDataJson(200, $response, $this);
		        exit;
		}

		public function planea_xcont_xmunicipio(){
			$id_contenido = $this->input->post("id_cont");
		    $id_zona_municipio = $this->input->post("id_xzona_o_municipio");
		    $id_perioso = $this->input->post("periodo");
		    $idcampodis = $this->input->post("idcampodis");
		    $tipo_filtro =$this->input->post("tipo_filtro");
		    if($tipo_filtro == "municipio"){
		    	$datos = $this->Planeaxesc_reactivo_model->get_reactivos_xcctxcont_municipio($id_zona_municipio,$id_contenido,$id_perioso,$idcampodis);
		    }else{
		    	$datos = $this->Planeaxesc_reactivo_model->get_reactivos_xcctxcont_zona($id_zona_municipio,$id_contenido,$id_perioso,$idcampodis);
		    }

		    $response = array('graph_cont_reactivos_xcctxcont' => $datos);
		        Utilerias::enviaDataJson(200, $response, $this);
		        exit;
			
		}



}// Planea