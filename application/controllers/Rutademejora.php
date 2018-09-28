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
			    $usuario = strtoupper($this->input->post('usuario'));
			    $pass = strtoupper($this->input->post('password'));
			    $turno = strtoupper($this->input->post('turno_id'));
					
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
					$responsables = $this->getPersonal($usuario);
					// echo "<pre>";
					// 		print_r($this->cct);
					// 		die();
					$personas = $responsables->Personal;
					$options = "";
					if($responsables->procede == 1 && $responsables->status == 1){
						foreach ($personas as $persona) {
							$options .= "<option value='{$persona->rfc}'>".$persona->nombre_completo."</option>";
						}
                            $options .="<option value='0'>OTRO</option>";
					}else{
						$options .="<option value='0'>OTRO</option>";
					}

					$data['responsables'] = $options;


					$mision = $this->Rutamejora_model->get_misionxcct($this->cct[0]['id_cct'],'4');
					$data['mision'] = $mision;

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


					// echo "<pre>";print_r($this->cct[0]);die();
					$data3 = array();
					$arr_indicadoresxct = $this->Rutamejora_model->get_indicadoresxcct($this->cct[0]['id_cct'],$this->cct[0]['nivel'],'1', '2018');//id_cct,nombre_nivel,bimestre,año
					$data3['arr_indicadores'] = $arr_indicadoresxct;
					// echo "<pre>";print_r($arr_avances);die();
					$string_view_indicadores = $this->load->view('ruta/indicadores', $data3, TRUE);
					$data['tab_indicadores'] = $string_view_indicadores;

					$data4 = array();
					$string_view_instructivo = $this->load->view('ruta/instructivo', $data4, TRUE);
					$data['tab_instructivo'] = $string_view_instructivo;

					$data['nivel'] = $this->cct[0]['nivel'];//$nivel;
					$data['nombreuser'] = $this->cct[0]['nombre_centro'];
					$data['turno'] = $this->cct[0]['turno_single'];
					$data['cct'] = $this->cct[0]['cve_centro'];
					Utilerias::pagina_basica_rm($this, "ruta/index", $data);

				}else{
					$mensaje = $response->statusText;
            		$tipo    = ERRORMESSAGE;
            		$this->session->set_flashdata(MESSAGEREQUEST, Utilerias::get_notification_alert($mensaje, $tipo));
					$this->load->view('ruta/login',$data);
				}
		}// index()

		public function getPersonal($cct){
			if(Utilerias::haySesionAbiertacct($this)){
				$curl = curl_init();
				$method = "POST";
				$url = "http://servicios.seducoahuila.gob.mx/wservice/personal/w_service_personal_by_cct.php";
				$data = array("cct" => $cct);

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
			    return $response = json_decode($result);
			}
		}


		// public function graba_ruta(){
		// 	$mision = $this->input->post("txt_rm_identidad");
		// 	$prioridad = $this->input->post("txt_rm_prioridad");
		// 	$objetivo1 = $this->input->post("txt_rm_objetivo1");
		// 	$objetivo2 = $this->input->post("txt_rm_objetivo2");
		// 	$problematicaxp = $this->input->post("txt_rm_problematicaxprioridad");
		// 	$evidenciasdp = $this->input->post("txt_rm_evidenciasdproblematicas");
		// 	$programaseducativos = $this->input->post("txt_rm_programaseducativos");
		// 	$comoayudanpa = $this->input->post("txt_rm_comoayudanpa");
		// 	$observacionesdirector = $this->input->post("txt_rm_observacionesdirector");
		// 	$queapoyorequerimos = $this->input->post("txt_rm_queapoyorequerimos");
		//
		// 	// $result = $this->Rutamejora_model->guardaruta($mision, $prioridad, $objetivo1, $objetivo2, $problematicaxp, $evidenciasdp, $programaseducativos, $comoayudanpa, $observacionesdirector, $queapoyorequerimos);
		//
		// }

		// public function editarRuta(){
		// 	if(Utilerias::haySesionAbiertacct()){
		// 		$idruta = $this->input->post('idrutaeditar');
		// 		// $data = $this->Rutamejora_model->recupera_ruta($idruta);

		// 		Utilerias::enviaDataJson(200, $data, $this);
		// 		exit;
		// 	}
		// }

		// public function eliminaRuta(){
		// 	if(Utilerias::haySesionAbiertacct()){
		// 		$idruta = $this->input->post('idrutaeditar');
		// 	}
		// }

		public function insert_tema_prioritario(){
			if(Utilerias::haySesionAbiertacct($this)){
				$this->cct = Utilerias::get_cct_sesion($this);
				$id_cct = $this->cct[0]['id_cct'];
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

				$nombre_archivo = str_replace(" ", "_", $_FILES['archivo']['name']);
				$estatus = $this->Rutamejora_model->insert_tema_prioritario($id_cct,$id_prioridad,$objetivo1,$meta1,$objetivo2,$meta2,$problematica,$evidencia,$ids_progapoy,$otro_pa,$como_prog_ayuda,$obs_direct,$ids_apoyreq,$otroapoyreq,$especifiqueapyreq);
				if ($estatus != false) {
					if ($nombre_archivo!='') {
						$ruta_archivos = "evidencias_rm/{$id_cct}/{$estatus}/";
						$ruta_archivos_save = "evidencias_rm/{$id_cct}/{$estatus}/$nombre_archivo";
						$estatusinst_urlarch = $this->Rutamejora_model->insert_evidencia($id_cct,$estatus,$ruta_archivos_save);
						if(!is_dir($ruta_archivos)){
							mkdir($ruta_archivos, 0777, true);}
																		$_FILES['userFile']['name']     = $_FILES['archivo']['name'];
																		$_FILES['userFile']['type']     = $_FILES['archivo']['type'];
																		$_FILES['userFile']['tmp_name'] = $_FILES['archivo']['tmp_name'];
																		$_FILES['userFile']['error']    = $_FILES['archivo']['error'];
																		$_FILES['userFile']['size']     = $_FILES['archivo']['size'];

																		$uploadPath              = $ruta_archivos;
																		$config['upload_path']   = $uploadPath;
																		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

																		$this->load->library('upload', $config);
																		$this->upload->initialize($config);
																		if ($this->upload->do_upload('userFile')) {
																				$fileData = $this->upload->data();
																				$str_view = true;
																		}
					}
					$estatus = true;
				}
				$response = array('estatus' => $estatus);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			}
		}

		public function insert_update_misioncct(){
			if(Utilerias::haySesionAbiertacct($this)){
				$this->cct = Utilerias::get_cct_sesion($this);
				$id_cct = $this->cct[0]['id_cct'];
				$misioncct = $this->input->post("misioncct");
				if ($this->Rutamejora_model->existe_misionxidcct($id_cct,'4')) {
					$estatus = $this->Rutamejora_model->update_misionxidcct($id_cct,$misioncct,'4');
				}
				else {
					$estatus = $this->Rutamejora_model->insert_misionxidcct($id_cct,$misioncct,'4');
				}

				$response = array('estatus' => $estatus);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			}
		}

		public function bajarutamejora(){
			if(Utilerias::haySesionAbiertacct($this)){
				$this->cct = Utilerias::get_cct_sesion($this);
				$id_cct = $this->cct[0]['id_cct'];
				$rutas = $this->Rutamejora_model->getrutasxcct($id_cct);

				$tabla = "<div class='table-responsive'>
				           <table id='id_tabla_rutas' class='table table-condensed table-hover  table-bordered'>
				            <thead>
				              <tr class=info>
		                          <th id='idrutamtema' hidden><center>id</center></th>
		                          <th id='orden' style='width:4%'><center>Orden</center></th>
		                          <th id='tema' style='width:20%'><center>Prioridad</center></th>
		                          <th id='problemas' style='width:31%'><center>Problemáticas</center></th>
		                          <th id='evidencias' style='width:31%'><center>Evidencias</center></th><th id='n_actividades' style='width:8%'><center>Acciones</center></th><th id='objetivo' style='width:6%'><center>Objetivo</center></th></tr></thead>
		                          <tbody id='id_tbody_demo'>";


				foreach ($rutas as $ruta) {
					$tabla .= "<tr>
							<td id='id_tprioritario' hidden><center>{$ruta['id_tprioritario']}</center></td>
	                          <td id='orden' data='1'>{$ruta['orden']}</td>
	                          <td id='tema' data='Normalidad mínima'>{$ruta['prioridad']}</td><td id='problemas' data='Asistencia de profesores' >{$ruta['otro_problematica']}</td>
	                          <td id='evidencias' data='SISAT'>{$ruta['otro_evidencia']}</td>
	                          <td id='n_actividades' data='0'>{$ruta['otro_evidencia']}</td>
	                          <td id=''><center><i class='fas fa-check-circle'></i></center></td>
		                              </tr>";
				}

				$tabla .= "</tbody>
		                        </table>
		                      </div>  ";

				$response = array('tabla' => $tabla);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			}
		}

	public function update_order(){
		if(Utilerias::haySesionAbiertacct($this)){
			$this->cct = Utilerias::get_cct_sesion($this);
			$id_cct = $this->cct[0]['id_cct'];
			$datos = $this->input->post('orden');
			// echo "<pre>";
			// print_r($datos);
			// die();
			for($i = 0; $i < count($datos); $i++){
				$arr_datos = $this->Rutamejora_model->update_order($datos[$i][1], $datos[$i][0]);
			}
			$id_cct = $this->cct[0]['id_cct'];
			$rutas = $this->Rutamejora_model->getrutasxcct($id_cct);

			$tabla = "<div class='table-responsive'>
			           <table id='id_tabla_rutas' class='table table-condensed table-hover  table-bordered'>
			            <thead>
			              <tr class=info>
	                          <th id='idrutamtema' hidden><center>id</center></th>
	                          <th id='orden' style='width:4%'><center>Orden</center></th>
	                          <th id='tema' style='width:20%'><center>Prioridad</center></th>
	                          <th id='problemas' style='width:31%'><center>Problemáticas</center></th>
	                          <th id='evidencias' style='width:31%'><center>Evidencias</center></th><th id='n_actividades' style='width:8%'><center>Acciones</center></th><th id='objetivo' style='width:6%'><center>Objetivo</center></th></tr></thead>
	                          <tbody id='id_tbody_demo'>";


			foreach ($rutas as $ruta) {
				$tabla .= "<tr>
						<td id='id_tprioritario' hidden><center>{$ruta['id_tprioritario']}</center></td>
                          <td id='orden' data='1'>{$ruta['orden']}</td>
                          <td id='tema' data='Normalidad mínima'>{$ruta['prioridad']}</td><td id='problemas' data='Asistencia de profesores' >{$ruta['otro_problematica']}</td>
                          <td id='evidencias' data='SISAT'>{$ruta['otro_evidencia']}</td>
                          <td id='n_actividades' data='0'>{$ruta['otro_evidencia']}</td>
                          <td id=''><center><i class='fas fa-check-circle'></i></center></td>
	                              </tr>";
			}

			$tabla .= "</tbody>
	                        </table>
	                      </div>  ";
			$response = array('tabla' => $tabla);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
			}
		}
		public function get_datos_edith_tp(){
			if(Utilerias::haySesionAbiertacct($this)){
				$id_tprioritario = $this->input->post('id_tprioritario');
				$arr_datos = $this->Rutamejora_model->get_datos_edith_tp($id_tprioritario);
				// echo "<pre>";print_r($arr_datos);die();
				$response = array('datos' => $arr_datos);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			}
		}

		public function update_tema_prioritario(){
			$this->cct = Utilerias::get_cct_sesion($this);
			$id_cct = $this->cct[0]['id_cct'];
			$id_tprioritario = $this->input->post("id_id_tprioritario");
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
			$edit_img = $this->input->post("edit_img");

			$nombre_archivo = str_replace(" ", "_", $_FILES['archivo']['name']);
			// echo "<pre>";print_r($edit_img);die();

			if ($nombre_archivo=='') {
			// echo "<pre>";print_r($edit_img);die();
			if ($edit_img=='true') {
			$estatus = $this->Rutamejora_model->update_tema_prioritario($id_cct,$id_tprioritario,$id_prioridad,$objetivo1,$meta1,$objetivo2,$meta2,$problematica,$evidencia,$ids_progapoy,$otro_pa,$como_prog_ayuda,$obs_direct,$ids_apoyreq,$otroapoyreq,$especifiqueapyreq);
			}
			else {
			$url = $this->Rutamejora_model->get_url_evidencia($id_cct,$id_tprioritario);
			if ($url!='') {
			unlink($url);
			}
			$estatusinst_urlarch = $this->Rutamejora_model->insert_evidencia($id_cct,$id_tprioritario,'');
			$estatus = $this->Rutamejora_model->update_tema_prioritario($id_cct,$id_tprioritario,$id_prioridad,$objetivo1,$meta1,$objetivo2,$meta2,$problematica,$evidencia,$ids_progapoy,$otro_pa,$como_prog_ayuda,$obs_direct,$ids_apoyreq,$otroapoyreq,$especifiqueapyreq);
			}
			}
			else {
			$url = $this->Rutamejora_model->get_url_evidencia($id_cct,$id_tprioritario);
			if ($url!='') {
			unlink($url);
			}

			$estatus = $this->Rutamejora_model->update_tema_prioritario($id_cct,$id_tprioritario,$id_prioridad,$objetivo1,$meta1,$objetivo2,$meta2,$problematica,$evidencia,$ids_progapoy,$otro_pa,$como_prog_ayuda,$obs_direct,$ids_apoyreq,$otroapoyreq,$especifiqueapyreq);
			if ($estatus != false) {
			$ruta_archivos = "evidencias_rm/{$id_cct}/{$id_tprioritario}/";
			$ruta_archivos_save = "evidencias_rm/{$id_cct}/{$id_tprioritario}/$nombre_archivo";
			// echo "<pre>";print_r($ruta_archivos_save);die();
			$estatusinst_urlarch = $this->Rutamejora_model->insert_evidencia($id_cct,$id_tprioritario,$ruta_archivos_save);
			if(!is_dir($ruta_archivos)){
			mkdir($ruta_archivos, 0777, true);}
			$_FILES['userFile']['name']     = $_FILES['archivo']['name'];
			$_FILES['userFile']['type']     = $_FILES['archivo']['type'];
			$_FILES['userFile']['tmp_name'] = $_FILES['archivo']['tmp_name'];
			$_FILES['userFile']['error']    = $_FILES['archivo']['error'];
			$_FILES['userFile']['size']     = $_FILES['archivo']['size'];

			$uploadPath              = $ruta_archivos;
			$config['upload_path']   = $uploadPath;
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('userFile')) {
			$fileData = $this->upload->data();
			$str_view = true;
			}
			$estatus = true;
			}
			else {
			$estatus = false;
			}
			}
			$response = array('estatus' => $estatus);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}

		public function delete_tp(){
			if(Utilerias::haySesionAbiertacct($this)){
				$this->cct = Utilerias::get_cct_sesion($this);
				$id_cct = $this->cct[0]['id_cct'];
				$id_tprioritario = $this->input->post("id_tprioritario");
				$url = $this->Rutamejora_model->get_url_evidencia($id_cct,$id_tprioritario);
				// unlink("{$url}");
				// echo "<pre>";print_r($url);die();
				$estatus = $this->Rutamejora_model->delete_tema_prioritario($id_cct,$id_tprioritario);
				if ($estatus) {
					if ($url!='') {
						unlink($url);
					}

				}
				$response = array('estatus' => $estatus);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			}
		}

	public function get_view_acciones(){
		if(Utilerias::haySesionAbiertacct($this)){
			$id_tprioritario = $this->input->post('id_tprioritario');
			$data = array();
			$str_view = $this->load->view("ruta/acciones", $data, TRUE);
			$response = array('str_view' => $str_view);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}
	}

	public function save_accion(){
		if(Utilerias::haySesionAbiertacct($this)){
			$id_tprioritario = $this->input->post('id_tprioritario');
			$id_ambito = $this->input->post('id_ambito');
	  		$accion = $this->input->post('accion');
	  		$materiales = $this->input->post('materiales');
	        $ids_responsables = $this->input->post('ids_responsables');
	        $otroresponsable = $this->input->post('otroresp');
	  		$finicio = $this->input->post('finicio');
	  		$ffin = $this->input->post('ffin');
	  		$medicion = $this->input->post('medicion');
			$finicio = str_replace("/", "-", $finicio);
			$porciones = explode("-", $finicio);
			$finicio = $porciones[2]."-".$porciones[0]."-".$porciones[1];
			$ffin = str_replace("/", "-", $ffin);
			$porciones = explode("-", $ffin);
			$ffin = $porciones[2]."-".$porciones[0]."-".$porciones[1];
			$existotroresp = false;
			$strids_resp = "";

			foreach ($ids_responsables as $responsable) {
				if($responsable == 0){
					$existotroresp = true;
				}
				$strids_resp .= $responsable.",";
			}
			$strids_resp = substr($strids_resp, 0, -1);

			if(isset($_POST['id_accion'])){
				$update = $this->Rutamejora_model->update_accion($_POST['id_accion'], $id_tprioritario, $id_ambito, $accion, $materiales, $strids_resp, $finicio, $ffin, $medicion, $otroresponsable, $existotroresp);
				if($update){
	  			$acciones = $this->Rutamejora_model->getacciones($id_tprioritario);
	  			$tabla = "<div class='table-responsive'>
	                            <table id='idtabla_accionestp' class='table table-condensed table-hover  table-bordered'>
	                              <thead>
	                            <tr class=info>
	                              <th id='orden' style='width:4%' hidden><center>Id accion</center></th>
	                              <th id='orden' style='width:4%'><center>Ámbito</center></th>
	                              <th id='tema' style='width:20%'><center>Fecha de inicio</center></th>
	                              <th id='problemas' style='width:31%'><center>Fecha de término</center></th>
	                              <th id='evidencias' style='width:39%'><center>Responsables</center></th>
	                            </tr>
	                          </thead>
	                          <tbody>";
	            if(count($acciones) > 0){
	            	foreach ($acciones as $accion) {
						$tabla .= "<tr>
									  <td hidden>{$accion['id_accion']}</td>
		                              <td>{$accion['id_ambito']}</td>
		                              <td>{$accion['accion_f_inicio']}</td>
		                              <td>{$accion['accion_f_termino']}</td>
		                              <td>{$accion['ids_responsables']}</td>
		                            </tr>";
					}
	            }else{
	            	$tabla .= "<tr>
	                              <td colspan='5'>No hay datos por mostrar</td>
	                            </tr>";
	            }

				$tabla .= "</tbody>
		                        </table>
		                      </div>  ";
		        $response = array('tabla' => $tabla);
	  		}else{
	  			$response = array('tabla' => '');
	  		}
			}else{
				$insert = $this->Rutamejora_model->insert_accion($id_tprioritario, $id_ambito, $accion, $materiales, $strids_resp, $finicio, $ffin, $medicion, $otroresponsable, $existotroresp);
	  		if($insert){
	  			$acciones = $this->Rutamejora_model->getacciones($id_tprioritario);
	  			$tabla = "<div class='table-responsive'>
	                            <table id='idtabla_accionestp' class='table table-condensed table-hover  table-bordered'>
	                              <thead>
	                            <tr class=info>
	                            <th id='orden' style='width:4%' hidden><center>Id accion</center></th>
	                              <th id='orden' style='width:4%'><center>Ámbito</center></th>
	                              <th id='tema' style='width:20%'><center>Fecha de inicio</center></th>
	                              <th id='problemas' style='width:31%'><center>Fecha de término</center></th>
	                              <th id='evidencias' style='width:39%'><center>Responsables</center></th>
	                            </tr>
	                          </thead>
	                          <tbody>";
	            if(count($acciones) > 0){
	            	foreach ($acciones as $accion) {
						$tabla .= "<tr>
									  <td hidden>{$accion['id_accion']}</td>
		                              <td>{$accion['id_ambito']}</td>
		                              <td>{$accion['accion_f_inicio']}</td>
		                              <td>{$accion['accion_f_termino']}</td>
		                              <td>{$accion['ids_responsables']}</td>
		                            </tr>";
					}
	            }else{
	            	$tabla .= "<tr>
	                              <td colspan='5'>No hay datos por mostrar</td>
	                            </tr>";
	            }

				$tabla .= "</tbody>
		                        </table>
		                      </div>  ";
		        $response = array('tabla' => $tabla);
	  		}else{
	  			$response = array('tabla' => '');
	  		}
			}



	  		Utilerias::enviaDataJson(200, $response, $this);
				exit;
		}
	}

	public function get_table_acciones(){
		if(Utilerias::haySesionAbiertacct($this)){
			$this->cct = Utilerias::get_cct_sesion($this);
			$id_tprioritario = $this->input->post('id_tprioritario');
			$acciones = $this->Rutamejora_model->getacciones($id_tprioritario);
			$tabla = "<div class='table-responsive'>
	                            <table id='idtabla_accionestp' class='table table-condensed table-hover  table-bordered'>
	                              <thead>
	                            <tr class=info>
	                            <th id='orden' style='width:4%' hidden><center>Id accion</center></th>
	                              <th id='orden' style='width:4%'><center>Ámbito</center></th>
	                              <th id='tema' style='width:20%'><center>Fecha de inicio</center></th>
	                              <th id='problemas' style='width:31%'><center>Fecha de término</center></th>
	                              <th id='evidencias' style='width:39%'><center>Responsables</center></th>
	                            </tr>
	                          </thead>
	                          <tbody>";
	            if(count($acciones) > 0){
	            	foreach ($acciones as $accion) {
						$tabla .= "<tr>
									<td hidden>{$accion['id_accion']}</td>
		                              <td>{$accion['id_ambito']}</td>
		                              <td>{$accion['accion_f_inicio']}</td>
		                              <td>{$accion['accion_f_termino']}</td>
		                              <td>{$accion['ids_responsables']}</td>
		                            </tr>";
					}
	            }else{
	            	$tabla .= "<tr>
	                              <td colspan='5'>No hay datos por mostrar</td>
	                            </tr>";
	            }

				$tabla .= "</tbody>
		                        </table>
		                      </div>  ";
		        $get_datos = $this->Rutamejora_model->get_datos_modal($id_tprioritario);

		        $datos =array('escuela' => $this->cct[0]['nombre_centro'],'prioridad'=> $get_datos[0]['prioridad'],'problematicas'=> $get_datos[0]['otro_problematica'],'evidencias'=> $get_datos[0]['otro_evidencia']);
	        $response = array('tabla' => $tabla, 'datos' => $datos);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}
	}

	public function delete_accion(){
		if(Utilerias::haySesionAbiertacct($this)){
			$id_tprioritario = $this->input->post('id_tprioritario');
			$idaccion = $this->input->post('idaccion');
			$delete = $this->Rutamejora_model->deleteaccion($idaccion, $id_tprioritario);
			if($delete){
				$tabla = $this->arma_tabla_acciones($id_tprioritario);
				$response = array("mensaje" => "ok", "tabla" => $tabla);
			}else{
				$response = array("mensaje" => "error", "tabla" => '');
			}
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}
	}

	private function arma_tabla_acciones($id_tprioritario){
		if(Utilerias::haySesionAbiertacct($this)){
			$acciones = $this->Rutamejora_model->getacciones($id_tprioritario);
			$tabla = "<div class='table-responsive'>
	                            <table id='idtabla_accionestp' class='table table-condensed table-hover  table-bordered'>
	                              <thead>
	                            <tr class=info>
	                              <th id='orden' style='width:4%' hidden><center>Id accion</center></th>
	                              <th id='orden' style='width:4%'><center>Ámbito</center></th>
	                              <th id='tema' style='width:20%'><center>Fecha de inicio</center></th>
	                              <th id='problemas' style='width:31%'><center>Fecha de término</center></th>
	                              <th id='evidencias' style='width:39%'><center>Responsables</center></th>
	                            </tr>
	                          </thead>
	                          <tbody>";
	            if(count($acciones) > 0){
	            	foreach ($acciones as $accion) {
						$tabla .= "<tr>
									<td hidden>{$accion['id_accion']}</td>
		                              <td>{$accion['id_ambito']}</td>
		                              <td>{$accion['accion_f_inicio']}</td>
		                              <td>{$accion['accion_f_termino']}</td>
		                              <td>{$accion['ids_responsables']}</td>
		                            </tr>";
					}
	            }else{
	            	$tabla .= "<tr>
	                              <td colspan='5'>No hay datos por mostrar</td>
	                            </tr>";
	            }

				$tabla .= "</tbody>
		                        </table>
		                      </div>  ";
		    return $tabla;
		}
	}

		public function set_avance(){
			if(Utilerias::haySesionAbiertacct($this)){
				$val_slc = $this->input->post('val_slc');
				$var_id_cte = $this->input->post('var_id_cte');
				$var_id_cct = $this->input->post('var_id_cct');
				$var_id_idtp = $this->input->post('var_id_idtp');
				$var_id_idacc = $this->input->post('var_id_idacc');

				$exite_enavance = $this->Rutamejora_model->existe_avance($var_id_cct,$var_id_idtp,$var_id_idacc);
				if (!$exite_enavance) {
					$estatusinsert = $this->Rutamejora_model->insert_avance($var_id_cct,$var_id_idtp,$var_id_idacc);
				}
				$estatus = $this->Rutamejora_model->update_avance_xcte($val_slc,$var_id_cte,$var_id_cct,$var_id_idtp,$var_id_idacc);

				$response = array('estatus' => $estatus);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			}
		}

	public function edit_accion(){
		if(Utilerias::haySesionAbiertacct($this)){
			$id_tprioritario = $this->input->post('id_tprioritario');
			$idaccion = $this->input->post('idaccion');
			$editada = $this->Rutamejora_model->edit_accion($idaccion, $id_tprioritario);
			$response = array("editado" => $editada[0]);
			Utilerias::enviaDataJson(200, $response, $this);
				exit;
		}
	}
		public function get_avance(){
			if(Utilerias::haySesionAbiertacct($this)){
				$this->cct = Utilerias::get_cct_sesion($this);
				$data2 = array();
				$arr_avances = $this->Rutamejora_model->get_avances_tp_accionxcct($this->cct[0]['id_cct']);
				$data2['arr_avances'] = $arr_avances;
				// echo "<pre>";print_r($arr_avances);die();
				$string_view_avance = $this->load->view('ruta/avances', $data2, TRUE);
				$response = array('srt_html' => $string_view_avance);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			}
		}

		public function set_file(){
			if(Utilerias::haySesionAbiertacct($this)){
				$ruta_archivos = "prueba/id_cct/12/";
				$nombre_archivo = str_replace(" ", "_", $_FILES['archivo']['name']);
				$ruta_archivos_save = "prueba/id_cct/12/$nombre_archivo";

				// echo "<pre>";print_r($nombre_archivo);die();

				// $insert = $this->Recursos_model->inserta_url($id_reactivo, $ruta_archivos_save, $idusuario, $idtipo, $titulo, $fuente);

				if(!is_dir($ruta_archivos)){
					mkdir($ruta_archivos, 0777, true);}
																$_FILES['userFile']['name']     = $_FILES['archivo']['name'];
																$_FILES['userFile']['type']     = $_FILES['archivo']['type'];
																$_FILES['userFile']['tmp_name'] = $_FILES['archivo']['tmp_name'];
																$_FILES['userFile']['error']    = $_FILES['archivo']['error'];
																$_FILES['userFile']['size']     = $_FILES['archivo']['size'];

																$uploadPath              = $ruta_archivos;
																$config['upload_path']   = $uploadPath;
																$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

																$this->load->library('upload', $config);
																$this->upload->initialize($config);
																if ($this->upload->do_upload('userFile')) {
																		$fileData = $this->upload->data();
																		$str_view = true;
																}

				$response = array('str_view' => $str_view);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			}
		}


}// Rutamedejora
