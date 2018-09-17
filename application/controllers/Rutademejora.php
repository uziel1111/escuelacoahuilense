<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rutademejora extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->data = array( );
			$this->logged_in = FALSE;
			$this->load->library('Utilerias');
			$this->load->model('Rutamejora_model');
		}

		public function index(){
				$data = $this->data;
			    $data['error'] = '';
			    $this->load->view('ruta/login',$data);
			// }
		}// index()

		public function cerrar_sesion(){
			Utilerias::destroy_all_session($this);
	        redirect('Rutademejora/index');
	    }

		public function acceso(){
			// if(Utilerias::haySesionAbierta($this)){
			// 	$usuario = Utilerias::get_usuario_sesion($this);
			//
			// 	$nivel = "";
			// 	if($usuario[0]['id_nivel'] == 4){
			// 		$nivel = "PRIMARIA";
			// 	}else if($usuario[0]['id_nivel'] == 5){
			// 		$nivel = "SECUNDARIA";
			// 	}else if($usuario[0]['id_nivel'] == 6){
			// 		$nivel = "MEDIA SUPERIOR";
			// 	}
				$data['nivel'] = 'PRIMARIA';//$nivel;
				$data['nombreuser'] = 'BENITO JUAREZ';//$usuario[0]['nombre']. " ".$usuario[0]['paterno']." ".$usuario[0]['materno'];
				// $data = array();
					Utilerias::pagina_basica_rm($this, "ruta/index", $data);
			// }
		}// index()


		public function graba_ruta(){
			$mision = $this->input->post("txt_rm_identidad");
			$prioridad = $this->input->post("txt_rm_prioridad");
			$objetivo1 = $this->input->post("txt_rm_objetivo1");
			$objetivo2 = $this->input->post("txt_rm_objetivo2");
			$problematicaxp = $this->input->post("txt_rm_problematicaxprioridad");
			$evidenciasdp = $this->input->post("txt_rm_evidenciasdproblematicas");
			$programaseducativos = $this->input->post("txt_rm_programaseducativos");
			$comoayudanpa = $this->input->post("txt_rm_comoayudanpa");
			$observacionesdirector = $this->input->post("txt_rm_observacionesdirector");
			$queapoyorequerimos = $this->input->post("txt_rm_queapoyorequerimos");

			// $result = $this->Rutamejora_model->guardaruta($mision, $prioridad, $objetivo1, $objetivo2, $problematicaxp, $evidenciasdp, $programaseducativos, $comoayudanpa, $observacionesdirector, $queapoyorequerimos);

		}

		public function editarRuta(){
			$idruta = $this->input->post('idrutaeditar');
			// $data = $this->Rutamejora_model->recupera_ruta($idruta);

			Utilerias::enviaDataJson(200, $data, $this);
			exit;
		}

		public function eliminaRuta(){
			$idruta = $this->input->post('idrutaeditar');
			// $data = $this->Rutamejora_model->delete_ruta($idruta);
		}



}// Rutamedejora
