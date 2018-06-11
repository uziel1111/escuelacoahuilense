<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			$this->load->model('Info_model');
		}

	public function index(){
		$id_cct = $this->input->post("id_cct");
		if(isset($id_cct) && $id_cct != ""){
			$data = array();
			$escuela = $this->Info_model->get_info_escuela($id_cct);
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


}// Mapa