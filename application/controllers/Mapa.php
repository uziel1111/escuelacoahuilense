<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapa extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			$this->load->model('Escuela_model');
			$this->load->helper('form');
		}

		public function busqueda_x_mapa(){
			$data = array();
			$options = array(
			        'small'         => 'Small Shirt',
			        'med'           => 'Medium Shirt',
			        'large'         => 'Large Shirt',
			        'xlarge'        => 'Extra Large Shirt',
			);
			$data2 = array();
			$data2['options'] = $options;
			$string = $this->load->view('mapa/buscador_x_mapa', $data2, TRUE);
			$data['buscador'] = $string;
			Utilerias::pagina_basica($this, "mapa/index", $data);
		}// index()

		public function get_marcadores(){
			$marcadorb = array();
			$vfinal = array();
			$escuelas = $this->Escuela_model->get_marcadores();
			foreach ($escuelas as $marcador) {
	            array_push($marcadorb, $marcador['nombre_centro']);
	            array_push($marcadorb, (float) $marcador['latitud']);
	            array_push($marcadorb, (float) $marcador['longitud']);
	            array_push($vfinal, $marcadorb);
	            $marcadorb = array();
	        }
	        $response = array('response' => $vfinal);
	        Utilerias::enviaDataJson(200, $response, $this);
	        exit;
		}


}// Mapa
