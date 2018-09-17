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

				$data['nivel'] = 'PRIMARIA';//$nivel;
				$data['nombreuser'] = 'BENITO JUAREZ';
				if($response->procede == 1 && $response->status == 1){
					$result_prioridades = $this->Prioridad_model->get_prioridades();
					if(count($result_prioridades)==0){
						$data['arr_prioridades'] = array(	'-1' => 'Error recuperando los prioridades' );
					}else{
						foreach ($result_prioridades as $row){
							 $arr_prioridades[$row['id_prioridad']] = $row['prioridad'];
						}
						$data['arr_prioridades'] = $arr_prioridades;
					}
					$result_problematicas = $this->Problematica_model->get_problematicas();
					if(count($result_problematicas)==0){
						$data['arr_problematicas'] = array(	'-1' => 'Error recuperando los problematicas' );
					}else{
						foreach ($result_problematicas as $row){
							 $arr_problematicas[$row['id_problematica']] = $row['problematica'];
						}
						$data['arr_problematicas'] = $arr_problematicas;
					}
					$result_evidencias = $this->Evidencia_model->get_evidencias();
					if(count($result_evidencias)==0){
						$data['arr_evidencias'] = array(	'-1' => 'Error recuperando los evidencias' );
					}else{
						foreach ($result_evidencias as $row){
							 $arr_evidencias[$row['id_evidencia']] = $row['evidencia'];
						}
						$data['arr_evidencias'] = $arr_evidencias;
					}
					$result_progsapoyo = $this->Prog_apoyo_xcct_model->get_prog_apoyo_xcctxciclo(790,4);//id_cct, id_ciclo
					if(count($result_progsapoyo)==0){
						$data['arr_progsapoyo'] = array(	'-1' => 'Error recuperando los progsapoyo' );
					}else{
						foreach ($result_progsapoyo as $row){
							 $arr_progsapoyo[$row['id_programa_apoyo']] = $row['descripcion'];
						}
						$data['arr_progsapoyo'] = $arr_progsapoyo;
					}
					$result_apoyosreq = $this->Apoyo_req_model->get_apoyo_req();
					if(count($result_apoyosreq)==0){
						$data['arr_apoyosreq'] = array(	'-1' => 'Error recuperando los apoyosreq' );
					}else{
						foreach ($result_apoyosreq as $row){
							 $arr_apoyosreq[$row['id_apoyo_req_se']] = $row['apoyo_req_se'];
						}
						$data['arr_apoyosreq'] = $arr_apoyosreq;
					}
					$result_ambitos = $this->Ambito_model->get_ambitos();
					if(count($result_ambitos)==0){
						$data['arr_ambitos'] = array(	'-1' => 'Error recuperando los ambitos' );
					}else{
						foreach ($result_ambitos as $row){
							 $arr_ambitos[$row['id_ambito']] = $row['ambito'];
						}
						$data['arr_ambitos'] = $arr_ambitos;
					}


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



}// Rutamedejora
