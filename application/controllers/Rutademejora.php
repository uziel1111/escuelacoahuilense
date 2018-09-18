<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rutademejora extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->data = array( );
			$this->logged_in = FALSE;
			$this->load->library('Utilerias');
			$this->load->model('Prioridad_model');
		  $this->load->model('Problematica_model');
		  $this->load->model('Evidencia_model');
		  $this->load->model('Prog_apoyo_xcct_model');
		  $this->load->model('Apoyo_req_model');
		  $this->load->model('Ambito_model');
			$this->load->model('Rutamejora_model');
			$this->cct = array();
		}

		public function index(){
				$data = $this->data;
			    $data['error'] = '';
			    $this->load->view('ruta/login',$data);
			// }
		}// index()

		public function cerrar_sesion(){
			Utilerias::destroy_all_session_cct($this);
	        redirect('Rutademejora/index');
	    }

		public function acceso(){
			    $usuario = $this->input->post('usuario');
			    $pass = $this->input->post('password');
			    $turno = $this->input->post('turno_id');
				$curl = curl_init();
				$method = "POST";
				$url = "http://servicios.seducoahuila.gob.mx/wservice/w_service_login.php";
				$data = array("cct" => $usuario, 'turno' => $turno, 'pwd' => $pass);

			    switch ($method)
			    {
			        case "POST":
			            curl_setopt($curl, CURLOPT_POST, 1);
			            if ($data)
			                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			            break;
			        default:
			            if ($data)
			                $url = sprintf("%s?%s", $url, http_build_query($data));
			    }

			    curl_setopt($curl, CURLOPT_URL, $url);
			    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			    $result = curl_exec($curl);

			    curl_close($curl);
			    $response = json_decode($result);

				if($response->procede == 1 && $response->status == 1){
					$datoscct = $this->Rutamejora_model->getdatoscct($usuario, $turno);
					Utilerias::set_cct_sesion($this, $datoscct);
					$this->cct = Utilerias::get_cct_sesion($this);

					$result_prioridades = $this->Prioridad_model->get_prioridades();
				  if(count($result_prioridades)==0){
				  $data['arr_prioridades'] = array(	'-1' => 'Error recuperando los prioridades' );
				  }else{
				  $data['arr_prioridades'] = $result_prioridades;
				  }
				  $result_problematicas = $this->Problematica_model->get_problematicas();
				  if(count($result_problematicas)==0){
				  $data['arr_problematicas'] = array(	'-1' => 'Error recuperando los problematicas' );
				  }else{
				  $data['arr_problematicas'] = $result_problematicas;
				  }
				  $result_evidencias = $this->Evidencia_model->get_evidencias();
				  if(count($result_evidencias)==0){
				  $data['arr_evidencias'] = array(	'-1' => 'Error recuperando los evidencias' );
				  }else{
				  $data['arr_evidencias'] = $result_evidencias;
				  }
				  $result_progsapoyo = $this->Prog_apoyo_xcct_model->get_prog_apoyo_xcctxciclo(790,4);//id_cct, id_ciclo
				  if(count($result_progsapoyo)==0){
				  $data['arr_progsapoyo'] = array(	'-1' => 'Error recuperando los progsapoyo' );
				  }else{
				  $data['arr_progsapoyo'] = $result_progsapoyo;
				  }
				  $result_apoyosreq = $this->Apoyo_req_model->get_apoyo_req();
				  if(count($result_apoyosreq)==0){
				  $data['arr_apoyosreq'] = array(	'-1' => 'Error recuperando los apoyosreq' );
				  }else{
				  $data['arr_apoyosreq'] = $result_apoyosreq;
				  }
				  $result_ambitos = $this->Ambito_model->get_ambitos();
				  if(count($result_ambitos)==0){
				  $data['arr_ambitos'] = array(	'-1' => 'Error recuperando los ambitos' );
				  }else{
				  $data['arr_ambitos'] = $result_ambitos;
				  }


					$data['nivel'] = $this->cct[0]['nivel'];//$nivel;
					$data['nombreuser'] = $this->cct[0]['nombre_centro'];
					Utilerias::pagina_basica_rm($this, "ruta/index", $data);

				}else{
					$mensaje = $response->statusText;
            		$tipo    = ERRORMESSAGE;
            		$this->session->set_flashdata(MESSAGEREQUEST, Utilerias::get_notification_alert($mensaje, $tipo));
					$this->load->view('ruta/login',$data);
				}
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

		public function insert_tema_prioritario(){
			$id_prioridad = $this->input->post("id_prioridad");
			$objetivo1 = $this->input->post("objetivo1");
			$meta1 = $this->input->post("meta1");
			$objetivo2 = $this->input->post("objetivo2");
			$meta2 = $this->input->post("meta2");
			$problematica = $this->input->post("problematica");
			$evidencia = $this->input->post("evidencia");
			$ids_progapoy = $this->input->post("ids_progapoy");
			$otro_pa = $this->input->post("otro_pa");
			$como_prog_ayuda = $this->input->post("como_prog_ayuda");
			$obs_direct = $this->input->post("obs_direct");
			$ids_apoyreq = $this->input->post("ids_apoyreq");
			$otroapoyreq = $this->input->post("otroapoyreq");
			$especifiqueapyreq = $this->input->post("especifiqueapyreq");

			// $data = $this->Rutamejora_model->delete_ruta($idruta);
			$estatus='ok';

			$response = array('estatus' => $estatus);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}

		public function insert_misioncct(){
			$misioncct = $this->input->post("misioncct");
			// $data = $this->Rutamejora_model->delete_ruta($idruta);
			$estatus='ok';

			$response = array('estatus' => $estatus);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}



}// Rutamedejora
