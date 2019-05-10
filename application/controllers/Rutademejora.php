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
			if(Utilerias::verifica_sesion_redirige($this)){
				// $this->llenadatos();
				$this->index_new();

			}else{
				$data = $this->data;
			    $data['error'] = '';
			    $this->load->view('ruta/login',$data);
			}
		}// index()

		public function cerrar_sesion(){
			Utilerias::destroy_all_session_cct($this);
	        redirect('Rutademejora/index');
	    }

		public function acceso(){
			if(Utilerias::verifica_sesion_redirige($this)){
				$this->cct = Utilerias::get_cct_sesion($this);
				if(isset($this->cct[0]['id_supervision'])){
					$this->generavistaSupervisor();
				}else{
					// $this->llenadatos();
					$this->index_new();
				}

			}else{
				$usuario = strtoupper($this->input->post('usuario'));
				$pass = strtoupper($this->input->post('password'));
				$turno = $this->input->post('turno_id');

				if($this->verifica_supervisor($usuario) == TRUE){
					$datos_sesion = $this->iniciamos_sesion_supervisor($usuario, $pass, $turno);
					if($datos_sesion->procede == 1 && $datos_sesion->status == 1){
					// if(1 == 1 && 1 == 1){
						$datoscct = $this->Rutamejora_model->getdatossupervicion($usuario, $turno);
						Utilerias::set_cct_sesion($this, $datoscct);


					    // if($response->procede == 1 && $response->status == 1){
							// $datoscct = $this->Rutamejora_model->getdatoscct($usuario, $turno);
							// Utilerias::set_cct_sesion($this, $datoscct);
							$this->generavistaSupervisor();
							///Aqui llenamos los datos
						// }else{
						// 	$mensaje = $response->statusText;
		    //         		$tipo    = ERRORMESSAGE;
		    //         		$this->session->set_flashdata(MESSAGEREQUEST, Utilerias::get_notification_alert($mensaje, $tipo));
						// 	$this->load->view('ruta/login',$data);
						// }
					}else{
						$mensaje = $response->statusText;
		            	$tipo    = ERRORMESSAGE;
		            	$this->session->set_flashdata(MESSAGEREQUEST, Utilerias::get_notification_alert($mensaje, $tipo));
						$this->load->view('ruta/login',$data);
					}
				}else{

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

						// $this->llenadatos();
						$this->index_new();

						///Aqui llenamos los datos
					}else{
						$mensaje = $response->statusText;
	            		$tipo    = ERRORMESSAGE;
	            		$this->session->set_flashdata(MESSAGEREQUEST, Utilerias::get_notification_alert($mensaje, $tipo));
						$this->load->view('ruta/login',$data);
					}
				}
			}
		}// index()

		public function llenadatos(){
			$this->cct = Utilerias::get_cct_sesion($this);
			$usuario = $this->cct[0]['cve_centro'];
			$responsables = $this->getPersonal($usuario);
			// echo "<pre>";print_r($responsables);die();
			if ($responsables->status==0) {
				$personas = array();
			}
			else {
				$personas = $responsables->Personal;
			}

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
			$result_prioridades = $this->Prioridad_model->get_prioridadesxnivel($this->cct[0]['nivel']);
			// echo "<pre>";print_r($this->cct[0]['nivel']);die();
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
				// echo "<pre>";print_r($this->cct[0]['id_cct']);die();
			  $result_progsapoyo = $this->Prog_apoyo_xcct_model->get_prog_apoyo_xcctxciclo($this->cct[0]['id_cct'],4);//id_cct, id_ciclo
			  if(count($result_progsapoyo)==0){
			  $data['arr_progsapoyo'] = '';
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
		}

		public function getPersonal($cct){
			// if(Utilerias::haySesionAbiertacct($this)){
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
			// }else{
			// 	redirect('Rutademejora/index');
			// }
		}


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
			}else{
				redirect('Rutademejora/index');
			}
		}

		public function insert_update_misioncct(){
			if(Utilerias::haySesionAbiertacct($this)){
				$this->cct = Utilerias::get_cct_sesion($this);
				// echo "<pre>";print_r($_POST);die();
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
			}else{
				redirect('Rutademejora/index');
			}
		}

		public function bajarutamejora(){
			if(Utilerias::haySesionAbiertacct($this)){
				$this->cct = Utilerias::get_cct_sesion($this);
				$id_cct = $this->cct[0]['id_cct'];
				$tam = 0;
				$rutas = $this->Rutamejora_model->getrutasxcct($id_cct);
				// echo "<pre>";print_r($rutas);die();
				$tam = count($rutas);

				$tabla = "<div class='table-responsive'>
				           <table id='id_tabla_rutas' class='table table-condensed table-hover  table-bordered'>
				            <thead>
				              <tr class=info>
		                          <th id='idrutamtema' hidden><center>id</center></th>
		                          <th id='orden' style='width:4%'><center>Orden</center></th>
		                          <th id='tema' style='width:20%'><center>Temas prioritarios</center></th>
		                          <th id='problemas' style='width:31%'><center>Problemáticas</center></th>
		                          <th id='evidencias' style='width:31%'><center>Evidencias</center></th>
		                          <th id='n_actividades' style='width:4%'><center>Actividades</center></th>
		                          <th id='objetivo' style='width:6%'><center>Objetivo</center></th>
		                          <th id='objetivo' style='width:6%'><center>Obs. supervisor</center></th>
		                          <th id='objetivo' style='width:6%'><center>Archivo evidencia</center></th>
		                          </tr>
		                          </thead>
		                          <tbody id='id_tbody_demo'>";


				foreach ($rutas as $ruta) {
					$tabla .= "<tr>
							<td id='id_tprioritario' hidden><center>{$ruta['id_tprioritario']}</center></td>
	                          <td id='orden' data='1'>{$ruta['orden']}</td>
	                          <td id='tema' data='Normalidad mínima'>{$ruta['prioridad']}</td>
	                          <td id='problemas' data='Asistencia de profesores' >{$ruta['otro_problematica']}</td>
	                          <td id='evidencias' data='SISAT'>{$ruta['otro_evidencia']}</td>
	                          <td id='n_actividades' data='0'>{$ruta['n_acciones']}</td>
	                          <td id=''><center><i class='fas fa-check-circle'></i></center></td>
							  <td id=''><center><i class='{$ruta['obs_supervisor']}'></i></center></td>
							  <td id=''><center><button  style='display:{$ruta['trae_path']};' type='button' class='btn btn-primary btn-style-1 mr-1' onclick=obj_rm_tp.ver_archivo_evidencia('{$ruta['path_evidencia']}')>Ver</button></center></td>
		                    </tr>";
				}

				$tabla .= "</tbody>
		                        </table>
		                      </div>  ";

				$response = array('tabla' => $tabla, 'tamanio' => $tam);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			}else{
				redirect('Rutademejora/index');
			}
		}

	public function update_order(){
		if(Utilerias::haySesionAbiertacct($this)){
			$this->cct = Utilerias::get_cct_sesion($this);
			$id_cct = $this->cct[0]['id_cct'];
			$datos = $this->input->post('orden');
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
		                          <th id='tema' style='width:20%'><center>Temas prioritarios</center></th>
		                          <th id='problemas' style='width:31%'><center>Problemáticas</center></th>
		                          <th id='evidencias' style='width:31%'><center>Evidencias</center></th>
		                          <th id='n_actividades' style='width:4%'><center>Actividades</center></th>
		                          <th id='objetivo' style='width:6%'><center>Objetivo</center></th>
		                          <th id='objetivo' style='width:6%'><center>Obs. supervisor</center></th>
		                          <th id='objetivo' style='width:6%'><center>Archivo evidencia</center></th>
		                          </tr>
		                          </thead>
		                          <tbody id='id_tbody_demo'>";


				foreach ($rutas as $ruta) {
					$tabla .= "<tr>
							<td id='id_tprioritario' hidden><center>{$ruta['id_tprioritario']}</center></td>
	                          <td id='orden' data='1'>{$ruta['orden']}</td>
	                          <td id='tema' data='Normalidad mínima'>{$ruta['prioridad']}</td>
	                          <td id='problemas' data='Asistencia de profesores' >{$ruta['otro_problematica']}</td>
	                          <td id='evidencias' data='SISAT'>{$ruta['otro_evidencia']}</td>
	                          <td id='n_actividades' data='0'>{$ruta['n_acciones']}</td>
	                          <td id=''><center><i class='fas fa-check-circle'></i></center></td>
							  <td id=''><center><i class='{$ruta['obs_supervisor']}'></i></center></td>
							  <td id=''><center><button  style='display:{$ruta['trae_path']};' type='button' class='btn btn-primary btn-style-1 mr-1' onclick=obj_rm_tp.ver_archivo_evidencia('{$ruta['path_evidencia']}')>Ver</button></center></td>
		                    </tr>";
				}

			$tabla .= "</tbody>
	                        </table>
	                      </div>  ";
			$response = array('tabla' => $tabla);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
			}else{
				redirect('Rutademejora/index');
			}
		}


		public function get_obs_super(){
			if(Utilerias::haySesionAbiertacct($this)){
				$id_tprioritario = $this->input->post('id_tprioritario');
				$str_obs_super = $this->Rutamejora_model->get_obs_super_tp($id_tprioritario);
				$response = array('str_obs_super' => $str_obs_super);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			}else{
				redirect('Rutademejora/index');
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

		public function eliminarTP(){
			if(Utilerias::haySesionAbiertacct($this)){
				$this->cct = Utilerias::get_cct_sesion($this);
				$id_cct = $this->cct[0]['id_cct'];
				// echo $id_cct; die();
				$id_tprioritario = $this->input->post("id_tprioritario");
				$url = $this->Rutamejora_model->get_url_evidencia($id_cct,$id_tprioritario);
				

				$estatus = $this->Rutamejora_model->delete_tema_prioritario($id_cct,$id_tprioritario);
				$temasp = $this->Rutamejora_model->getTemasxcct($id_cct);
				$this->actualizaOrden($temasp);
				if ($estatus) {
					if ($url!='') {
						unlink($url);
					}
					
				}
				$response = array('estatus' => $estatus);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			}else{
				redirect('Rutademejora/index');
			}
		}

		public function actualizaOrden($temasp){
			$orden = 1;
			foreach ($temasp as $tema) {
				$actualiza = $this->Rutamejora_model->update_order($orden, $tema['id_tprioritario']);
				$orden = $orden +1;
			}
			$orden = 1;
		}

	public function get_view_acciones(){
		if(Utilerias::haySesionAbiertacct($this)){
			$id_tprioritario = $this->input->post('id_tprioritario');
			$data = array();
			$str_view = $this->load->view("ruta/acciones", $data, TRUE);
			$response = array('str_view' => $str_view);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}else{
			redirect('Rutademejora/index');
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
	                              <th id='orden' style='width:20%'><center>Ámbito</center></th>
	                              <th id='tema' style='width:20%'><center>Fecha de inicio</center></th>
	                              <th id='problemas' style='width:31%'><center>Fecha de término</center></th>
	                              <th id='evidencias' style='width:39%'><center>Acción</center></th>
	                            </tr>
	                          </thead>
	                          <tbody>";
	            if(count($acciones) > 0){
	            	foreach ($acciones as $accion) {
						$tabla .= "<tr>
									  <td hidden>{$accion['id_accion']}</td>
		                              <td>{$accion['ambito']}</td>
		                              <td>{$accion['accion_f_inicio']}</td>
		                              <td>{$accion['accion_f_termino']}</td>
		                              <td>{$accion['accion']}</td>
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
	                              <th id='orden' style='width:20%'><center>Ámbito</center></th>
	                              <th id='tema' style='width:20%'><center>Fecha de inicio</center></th>
	                              <th id='problemas' style='width:31%'><center>Fecha de término</center></th>
	                              <th id='evidencias' style='width:39%'><center>Acción</center></th>
	                            </tr>
	                          </thead>
	                          <tbody>";
	            if(count($acciones) > 0){
	            	foreach ($acciones as $accion) {
						$tabla .= "<tr>
									  <td hidden>{$accion['id_accion']}</td>
		                              <td>{$accion['ambito']}</td>
		                              <td>{$accion['accion_f_inicio']}</td>
		                              <td>{$accion['accion_f_termino']}</td>
		                              <td>{$accion['accion']}</td>
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
		}else{
			redirect('Rutademejora/index');
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
	                              <th id='orden' style='width:20%'><center>Ámbito</center></th>
	                              <th id='tema' style='width:20%'><center>Fecha de inicio</center></th>
	                              <th id='problemas' style='width:31%'><center>Fecha de término</center></th>
	                              <th id='evidencias' style='width:39%'><center>Acción</center></th>
	                            </tr>
	                          </thead>
	                          <tbody>";
	            if(count($acciones) > 0){
	            	foreach ($acciones as $accion) {
						$tabla .= "<tr>
									<td hidden>{$accion['id_accion']}</td>
		                              <td>{$accion['ambito']}</td>
		                              <td>{$accion['accion_f_inicio']}</td>
		                              <td>{$accion['accion_f_termino']}</td>
		                              <td>{$accion['accion']}</td>
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
			// $strView = $this->load->view("ruta/modals_new/modal_actividades", $datos, TRUE);
			// $response = array('tabla' => $tabla, 'datos' => $datos, 'strView' => $strView);


			$response = array('tabla' => $tabla, 'datos' => $datos);

			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}else{
			redirect('Rutademejora/index');
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
		}else{
			redirect('Rutademejora/index');
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
	                              <th id='orden' style='width:20%'><center>Ámbito</center></th>
	                              <th id='tema' style='width:20%'><center>Fecha de inicio</center></th>
	                              <th id='problemas' style='width:31%'><center>Fecha de término</center></th>
	                              <th id='evidencias' style='width:39%'><center>Acción</center></th>
	                            </tr>
	                          </thead>
	                          <tbody>";
	            if(count($acciones) > 0){
	            	foreach ($acciones as $accion) {
						$tabla .= "<tr>
									<td hidden>{$accion['id_accion']}</td>
		                              <td>{$accion['ambito']}</td>
		                              <td>{$accion['accion_f_inicio']}</td>
		                              <td>{$accion['accion_f_termino']}</td>
		                              <td>{$accion['accion']}</td>
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
		}else{
			redirect('Rutademejora/index');
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
			}else{
				redirect('Rutademejora/index');
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
		}else{
			redirect('Rutademejora/index');
		}
	}
		public function get_avance(){
			if(Utilerias::haySesionAbiertacct($this)){
				$this->cct = Utilerias::get_cct_sesion($this);
				$data2 = array();
				$arr_avances = $this->Rutamejora_model->get_avances_tp_accionxcct($this->cct[0]['id_cct']);
				// $data2['arr_avances'] = $arr_avances;
				$arr_avances_fechas = $this->Rutamejora_model->get_avances_tp_accionxcct_fechas(4);
				$data2['arr_avances_fechas'] = $arr_avances_fechas;
				// echo "<pre>";print_r($data2);die();
				// explode(" ", $pizza);
				$clave = explode("_", array_search('TRUE', $arr_avances_fechas[0]))[0];
				// echo $clave; die();
				$arr_avances_n = $this->asigna_icono($arr_avances, $clave);
				$data2['arr_avances'] = $arr_avances_n;
				// echo "<pre>";print_r($arr_avances_n);die();
				$string_view_avance = $this->load->view('ruta/avances', $data2, TRUE);
				$response = array('srt_html' => $string_view_avance);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			}else{
				redirect('Rutademejora/index');
			}
		}

		public function asigna_icono($arr_avances, $habilitado){
			$anterior = explode("cte", $habilitado)[1];
			$anterior = ((int)$anterior-1);
			$cadAnterior = "cte".$anterior;
			$arr_avancesCompleto = array();
			foreach ($arr_avances as $avance) {
				if($avance[$habilitado] != 0){
					$icono = $this->retorna_icono($avance[$habilitado]);
				}else{
					$icono = $this->retorna_icono($avance[$cadAnterior]);
				}
				$avance['icono'] = $icono;
				array_push($arr_avancesCompleto, $avance);
			}
			return $arr_avancesCompleto;
		}

		public function retorna_icono($porcentaje){
			if($porcentaje == 0){
				return "0.png";
			}else if($porcentaje == 10 || $porcentaje == 20 || $porcentaje == 30){
				return "1.png";
			}else if($porcentaje == 40 || $porcentaje == 50 || $porcentaje == 60 || $porcentaje == 70){
				return "2.png";
			}else if($porcentaje == 80 || $porcentaje == 90){
				return "3.png";
			}else if($porcentaje == 100){
				return "4.png";
			}
		}

		public function set_file(){
			if(Utilerias::haySesionAbiertacct($this)){
				$ruta_archivos = "prueba/id_cct/12/";
				$nombre_archivo = str_replace(" ", "_", $_FILES['archivo']['name']);
				$ruta_archivos_save = "prueba/id_cct/12/$nombre_archivo";

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
			}else{
				redirect('Rutademejora/index');
			}
		}

//FUNCIONAMIENTO Y VALIDACION PARA SUPERVISOR BY LUIS SANCHEZ... all reserved rights
//
public function verifica_supervisor($cct){
	$issuper = $this->Rutamejora_model->valida_supervisor($cct);
	if(count($issuper) > 0){
		return TRUE;
	}else{
		return FALSE;
	}
}

public function generavistaSupervisor(){
	$this->cct = Utilerias::get_cct_sesion($this);
	$curl = curl_init();
	$method = "POST";
	$url = "http://servicios.seducoahuila.gob.mx/wservice/w_service_escuelas_por_supervision.php";
	$data = array("cct" => $this->cct[0]['cve_centro']);

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
    $escuelas = json_decode($result);

	$data = array();
	$data['nombreuser'] = $this->cct[0]['nombre_supervision'];
	$data['nivel'] = $this->cct[0]['zona_escolar'];
	$data['turno'] = "";
	$data['cct'] = $this->cct[0]['cve_centro'];
	$data['escuelas'] = $escuelas->Escuelas;
	// echo "<pre>";print_r($escuelas->Escuelas[0]->b_cct);die();
	Utilerias::pagina_basica_rm($this, "ruta/supervisor/index", $data);
}

public function get_rutas_xcctsuper(){
	$cct = $this->input->post("cct");
	$turno = $this->input->post("turno");
	$idturno = 0;
	if($turno == "MATUTINO"){
		$idturno = 1;
	}else if($turno == "VESPERTINO"){
		$idturno = 2;
	}else if($turno == "NOCTURNO"){
		$idturno = 3;
	}else if($turno == "DISCONTINUO"){
		$idturno = 4;
	}else if($turno == "CONTINUO"){
		$idturno = 5;
	}else if($turno == "COMPLEMENTARIO"){
		$idturno = 6;
	}else if($turno == "CONTINUO (JORNADA AMPLIA)"){
		$idturno = 7;
	}else if($turno == "CONTINUO (DE 7:00 A 22:00 HRS)"){
		$idturno = 8;
	}
	$datos_cct = $this->Rutamejora_model->getdatoscct($cct, $idturno);
	// echo "<pre>";
	// print_r($datos_cct[0]['id_cct']);
	// die();
	$tabla_rutas = $this->get_table_rutas($datos_cct[0]['id_cct']);

	$response = array('tabla' => $tabla_rutas, 'cct_escuela' => $cct);
	Utilerias::enviaDataJson(200, $response, $this);
	exit;
}

public function get_table_rutas($idcct){
	$rutas = $this->Rutamejora_model->getrutasxcct($idcct);

			$tabla = "<div class='table-responsive'>
			           <table id='id_tabla_rutas_super' class='table table-condensed table-hover  table-bordered'>
			            <thead>
			              <tr class=info>
	                          <th id='idrutamtema' hidden><center>id</center></th>
	                          <th id='orden' style='width:4%'><center>Orden</center></th>
	                          <th id='tema' style='width:20%'><center>Prioridad</center></th>
	                          <th id='problemas' style='width:31%'><center>Problemáticas</center></th>
	                          <th id='evidencias' style='width:31%'><center>Evidencias</center></th>
	                          <th id='n_actividades' style='width:8%'><center>Acciones</center></th>
	                          <th id='objetivo' style='width:6%'><center>Objetivo</center></th>
	                          <th id='objetivo' style='width:6%'><center>Observación</center></th>
	                          <th id='objetivo' style='width:6%'><center>Archivo evidencia</center></th>
	                       </tr>
	                    </thead>
	                          <tbody id='id_tbody_demo'>";


			foreach ($rutas as $ruta) {
				$tabla .= "<tr>
						<td id='id_tprioritario' hidden><center>{$ruta['id_tprioritario']}</center></td>
                          <td id='orden' data='1'>{$ruta['orden']}</td>
                          <td id='tema' data='Normalidad mínima'>{$ruta['prioridad']}</td><td id='problemas' data='Asistencia de profesores' >{$ruta['otro_problematica']}</td>
                          <td id='evidencias' data='SISAT'>{$ruta['otro_evidencia']}</td>
                          <td id='n_actividades' data='0'>{$ruta['n_acciones']}</td>
                          <td id=''><center><i class='fas fa-check-circle'></i></center></td>
                          <td id=''><center><i class='{$ruta['obs_supervisor']}'></i></center></td>
                          <td id=''><center><button  style='display:{$ruta['trae_path']};' type='button' class='btn btn-primary btn-style-1 mr-1' onclick=obj_supervisor.ver_archivo_evidencia('{$ruta['path_evidencia']}')>Ver</button></center></td>
	                        </tr>";
			}

			$tabla .= "</tbody>
	                        </table>
	                      </div>  ";
	return $tabla;
}

public function get_mensaje_super(){
	$idtema = $this->input->post("idruta");
	$mensajesuper = $this->input->post("mensaje");
	$mensajeguardado = $this->Rutamejora_model->inserta_mensaje_super($idtema, $mensajesuper);
	// echo $mensajeguardado; die();
	if($mensajeguardado){
		$estatus = "El mensaje se guardo correctamente";
	}else{
		$estatus = "El mensaje no pudo guardarse, intente nuevamente";
	}
	$response = array('mensaje' => $estatus);
	Utilerias::enviaDataJson(200, $response, $this);
	exit;
}

public function get_vista_acciones(){
	if(Utilerias::haySesionAbiertacct($this)){
	// 		$this->cct = Utilerias::get_cct_sesion($this);
			$id_tprioritario = $this->input->post('idruta');
			$nombreescuela = $this->input->post('nombreescuela');
			$acciones = $this->Rutamejora_model->getacciones($id_tprioritario);
			$tabla = "<div class='table-responsive'>
	                            <table id='idtabla_accionestp_super' class='table table-condensed table-hover  table-bordered'>
	                              <thead>
	                            <tr class=info>
	                            <th id='orden' style='width:4%' hidden><center>Id accion</center></th>
	                              <th id='orden' style='width:20%'><center>Ámbito</center></th>
	                              <th id='tema' style='width:20%'><center>Fecha de inicio</center></th>
	                              <th id='problemas' style='width:31%'><center>Fecha de término</center></th>
	                              <th id='evidencias' style='width:39%'><center>Acción</center></th>
	                            </tr>
	                          </thead>
	                          <tbody>";
	            if(count($acciones) > 0){
	            	foreach ($acciones as $accion) {
						$tabla .= "<tr>
									<td hidden>{$accion['id_accion']}</td>
		                              <td>{$accion['ambito']}</td>
		                              <td>{$accion['accion_f_inicio']}</td>
		                              <td>{$accion['accion_f_termino']}</td>
		                              <td>{$accion['accion']}</td>
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

		        $data['escuela'] = $nombreescuela;
		        $data['prioridad'] = $get_datos[0]['prioridad'];
		        $data['problematicas'] = $get_datos[0]['otro_problematica'];
		        $data['evidencias'] = $get_datos[0]['otro_evidencia'];
		        $data['tacciones'] = $tabla;
		        $data['arr_ambitos'] = $this->Ambito_model->get_ambitos();

	        $dom = $this->load->view("ruta/supervisor/visor_actividades",$data,TRUE);
			$response = array('vista' => $dom);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}else{
			redirect('Rutademejora/index');
		}
}

public function edit_accion_super(){
		if(Utilerias::haySesionAbiertacct($this)){
			$id_tprioritario = $this->input->post('id_tprioritario');
			$idaccion = $this->input->post('idaccion');
			$cct_log = $this->input->post('cct');
			$editada = $this->Rutamejora_model->edit_accion($idaccion, $id_tprioritario);
			$ids_responsables = $editada[0]['ids_responsables'];
			$ids_responsables = explode(",", $ids_responsables);
			// echo "<pre>";
			// print_r($editada);
			// die();
			$responsables = $this->getPersonal($cct_log);
			if (count($responsables)==0) {
				$responsables = array();
			}
	// 		echo "<pre>";
	// print_r($responsables->Personal);
	// die();
			$listap = "";
		    foreach ($responsables->Personal as $persona) {

			    for($i = 0; $i < count($ids_responsables); $i++){
			    	if($persona->rfc == $ids_responsables[$i]){
			    		$listap .= trim($persona->nombre_completo).", ";
			    	}
			    }
		    }
		    // echo $listap; die();
			$response = array("editado" => $editada[0], "personal" => $listap);
			Utilerias::enviaDataJson(200, $response, $this);
				exit;
		}else{
			redirect('Rutademejora/index');
		}
	}

	function iniciamos_sesion_supervisor($usuario, $pass, $turno){
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
	    return $response = json_decode($result);
	}

	public function get_comentario_super(){

		$idtemap = $this->input->post("idtemarp");
		$mensaje = $this->Rutamejora_model->get_coment_super($idtemap);
		// echo "<pre>";
		// print_r($mensaje);
		// die();
		$response = array('mensaje' => $mensaje[0]['obs_supervisor']);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

	// Nuevo codigo ruta mejora Ismael
	public function index_new(){


		$this->cct = Utilerias::get_cct_sesion($this);
		$usuario = $this->cct[0]['cve_centro'];
		$responsables = $this->getPersonal($usuario);
		// echo "<pre>";print_r($responsables);die();
		if ($responsables->status==0) {
			$personas = array();
		}
		else {
			$personas = $responsables->Personal;
		}

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
		$result_prioridades = $this->Prioridad_model->get_prioridadesxnivel($this->cct[0]['nivel']);
		// echo "<pre>";print_r($this->cct[0]['nivel']);die();
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
			// echo "<pre>";print_r($this->cct[0]['id_cct']);die();
			$result_progsapoyo = $this->Prog_apoyo_xcct_model->get_prog_apoyo_xcctxciclo($this->cct[0]['id_cct'],4);//id_cct, id_ciclo
			if(count($result_progsapoyo)==0){
			$data['arr_progsapoyo'] = '';
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

		$data['vista_avance'] = $this->load->view("ruta/rutademejora/avances", $data, TRUE);
		$data['vista_indicadores'] = $this->load->view("ruta/rutademejora/indicadores", $data, TRUE);
		$data['vista_ayuda'] = $this->load->view("ruta/rutademejora/ayuda", $data, TRUE);

		Utilerias::pagina_basica_rm($this, "ruta/rutademejora/index", $data);
	}

	public function modal_recomendacion(){
		$data = array();
		$this->cct = Utilerias::get_cct_sesion($this);
		$id_cct = $this->cct[0]['id_cct'];
		$mision = $this->Rutamejora_model->get_misionxcct($this->cct[0]['id_cct'],'4');
		$data['mision'] = $mision;

		$strView = $this->load->view("ruta/modals_new/modal_ruta", $data, TRUE);

		$response = array('strView' => $strView, 'titulo' => '<i class="far fa-lightbulb"></i> Recomendación');

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

	public function modal_mision(){
		$data = array();
		$this->cct = Utilerias::get_cct_sesion($this);

		$mision = $this->Rutamejora_model->get_misionxcct($this->cct[0]['id_cct'],'4');
		$data['mision'] = $mision;

		$strView = $this->load->view("ruta/modals_new/modal_mision", $data, TRUE);

		$response = array('strView' => $strView, 'titulo' => '<i class="fas fa-flag"></i> Misión');

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

	public function tabla_rm(){
		if(Utilerias::haySesionAbiertacct($this)){
				$data = array();
				$this->cct = Utilerias::get_cct_sesion($this);
				$id_cct = $this->cct[0]['id_cct'];
				$tam = 0;
				$rutas = $this->Rutamejora_model->getrutasxcct($id_cct);

				$data['rutas'] = $rutas;
				$data['tam'] = $tam;


				$strView = $this->load->view("ruta/rutademejora/tabla_rm", $data, TRUE);

				$response = array('strView' => $strView);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
		}else{
			redirect('Rutademejora/index');
		}
	}

	public function tabla_up(){
		if(Utilerias::haySesionAbiertacct($this)){
			$this->cct = Utilerias::get_cct_sesion($this);
			$id_cct = $this->cct[0]['id_cct'];
			$datos = $this->input->post('orden');
			for($i = 0; $i < count($datos); $i++){
				$arr_datos = $this->Rutamejora_model->update_order($datos[$i][1], $datos[$i][0]);
			}


			$id_cct = $this->cct[0]['id_cct'];
			$rutas = $this->Rutamejora_model->getrutasxcct($id_cct);
		}else{
			redirect('Rutademejora/index');
		}
	}

	public function modal_prioridad(){
		$data = array();
		$this->cct = Utilerias::get_cct_sesion($this);
		$id_nivel = $this->cct[0]['nivel'];
		// $idtemaprioritario = $this->input->post('idtemaprioritario');
		$result_prioridades = $this->Prioridad_model->get_prioridadesxnivel($this->cct[0]['nivel']);
		$data['prioridades'] = $result_prioridades;
		// $data['idtemaprioritario'] = $idtemaprioritario;

		$strView = $this->load->view("ruta/modals_new/modal_prioridad", $data, TRUE);

		$response = array('strView' => $strView, 'titulo' => 'Agrega prioridad');

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

	public function agregarObjetivo(){
		$this->cct = Utilerias::get_cct_sesion($this);
		// echo "<pre>";
		// print_r($_POST);
		// die();
		$id_tprioritario = $this->input->post("id_temaprioritario");
		$id_cct = $this->cct[0]['id_cct'];
		$id_prioridad = $this->input->post('id_prioridad');
		$id_subprioridad = $this->input->post('id_subprioridad');
		$objetivo = $this->input->post('objetivo');

		if($id_tprioritario == 0){
				$estatus = $this->Rutamejora_model->insertaCreaObjetivo($id_cct, $id_prioridad, $objetivo, $id_subprioridad);
		}else{
			$estatus = $this->Rutamejora_model->insertaObjetivo($id_cct, $id_prioridad, $objetivo, $id_tprioritario);
		}



		$response = array('estatus' => $estatus['status'], 'idtemaprioritario' =>$estatus['idtemaprioritario']);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

	public function actualizarObjetivo(){

		$id_objetivo = $this->input->post('id_objetivo');
		$objetivo = $this->input->post('objetivo');
		// echo $objetivo;die();
		$estatus = $this->Rutamejora_model->actualizaObjetivo($id_objetivo, $objetivo);

		$response = array('estatus' => $estatus);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

// get
	public function getObjetivos(){
		$this->cct = Utilerias::get_cct_sesion($this);
		// echo "<pre>";
		// print_r($_POST);
		// die();

		$idtpriotario = $this->input->post('idtpriotario');
		$idprioridad = $this->input->post('idprioridad');
		$idsubprioridad = $this->input->post('idsubprioridad');

		$id_cct = $this->cct[0]['id_cct'];
		$orden = 0;
		$datos = $this->Rutamejora_model->getObjetivos($id_cct, $idtpriotario, $idprioridad, $idsubprioridad);
		$idobjetivo = 0;
		if(count($datos) == 0){
				$tabla = "<table id='metas_objetivos' class='table table-condensed table-hover table-light table-bordered'>
			<thead>
				<tr class='info'>
					<th id='idrutamtema' hidden>
						<center>id</center>
					</th>
					<th id='num_rutamtema' style='width:5%'>
						<center>#</center>
					</th>
					<th id='des_rutamtema' style='width:75%'>
						<center>Objetivos y metas</center>
					</th>
					<th id='op_rutamtema' style='width:20%'>
						<center>Opciones</center>
					</th>
				</tr>
			</thead>
			<tbody>";

				$tabla .= "<tr>
					<td colspan='4'>Sin datos que mostrar</td>
				</tr>";

			$tabla .= "</tbody></table>";
		}else{
				$tabla = "<table id='metas_objetivos' class='table table-condensed table-hover table-light table-bordered'>
			<thead>
				<tr class='info'>
					<th id='idrutamtema' hidden>
						<center>id</center>
					</th>
					<th id='num_rutamtema' style='width:5%'>
						<center>#</center>
					</th>
					<th id='des_rutamtema' style='width:75%'>
						<center>Objetivos y metas</center>
					</th>
					<th id='op_rutamtema' style='width:20%'>
						<center>Opciones</center>
					</th>
				</tr>
			</thead>
			<tbody>";

			foreach ($datos as $dato) {
				$orden = $orden +1;
				$idobjetivo = $dato['id_objetivo'];
				$tabla .= "<tr>
					<td id='' hidden><center>{$dato['id_objetivo']}</center></td>
					<td id='' hidden><center>{$dato['id_tprioritario']}</center></td>
					<td id='num_rutamtema' data='1' class='text-center'>{$orden}</td>
					<td id='objetivo' data='Normalidad mínima'>{$dato['objetivo']}</td>
					<td id='op_rutamtema' class='text-center'>
						<button id='btn_editar' type='button' data-toggle='tooltip' class='btn btn-success' data-original-title='Editar' onclick='btnEditar({$dato['id_objetivo']}, {$dato['id_tprioritario']})'><i class='far fa-edit'></i></button>
						<button id='btn_eliminar' type='button' data-toggle='tooltip' class='btn btn-danger' data-original-title='Eliminar' onclick='btnEliminar({$dato['id_objetivo']})'><i class='far fa-trash-alt'></i></button>
					</td>
				</tr>";
			}

			$tabla .= "</tbody></table>";
		}


		$response = array('table' => $tabla, 'id_objetivo' => $idobjetivo);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}



	public function modal_actividades(){
		$strView = $this->load->view("ruta/modals_new/modal_actividades", array(), TRUE);

		$response = array('strView' => $strView, 'titulo' => 'Edición de prioridad del Sistema Básico de Mejora');

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

	public function getsubEspecial(){
		$id_prioridad = $this->input->post('idprioridad');
		$datos = $this->Rutamejora_model->getSubprioridad($id_prioridad);
		$option = "<option value='0'>SELECCIONE</option>";
		foreach ($datos as $dato) {
			$option .="<option value='{$dato['id_subprioridad']}'>{$dato['subprioridad']}</option>";
		}

		$response = array('stroption' => $option);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;

	}

	public function llenaIndicador(){
		$this->cct = Utilerias::get_cct_sesion($this);
		$id_nivel = $this->cct[0]['nivel'];
		$id_prioridad = $this->input->post('id_prioridad');
		$id_subprioridad = $this->input->post('id_subprioridad');

		if ($id_nivel == 'PRIMARIA') {
			$id_nivel = 4;
		}

		if ( isset( $_POST['id_subprioridad'] ) ) {
			$datos = $this->Rutamejora_model->getIndicadorEspecial($id_prioridad, $id_nivel, $id_subprioridad);
		}else {
			$datos = $this->Rutamejora_model->getIndicadorEspecial($id_prioridad, $id_nivel, 0);
		}

		$option = "<option value='0'>SELECCIONAR</option>";
		foreach ($datos as $dato) {
			$option .="<option value='{$dato['id_indicador']}'>{$dato['indicador']}</option>";
		}

		$response = array('stroption' => $option);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

	public function getMetrica(){
		$id_indicador = $this->input->post('id_indicador');

		$datos = $this->Rutamejora_model->getMetricas($id_indicador);
		$option = "<option value='0'>SELECCIONE</option>";
		foreach ($datos as $dato) {
			// $option .="<option value='{$dato['id_indicador']}'>{$dato['formula']}</option>";
			$option .="<option value=''>{$dato['formula']}</option>";
		}

		$response = array('stroption' => $option);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;

	}

	public function grabarTema(){
		$this->cct = Utilerias::get_cct_sesion($this);
		// echo "<pre>";print_r($_POST);print_r($_FILES);die();
		$id_cct = $this->cct[0]['id_cct'];

		$id_tprioritario = $this->input->post('id_tema_prioritario'); // este dato no viene
		$problematica = $this->input->post('problematica');
		$evidencia = $this->input->post('evidencia');
		$comentario_dir = $this->input->post('comentario_dir');

		$nombre_archivo = str_replace(" ", "_", $_FILES['archivo']['name']);
		// echo "<pre>";print_r($nombre_archivo);die();
		$estatus = $this->Rutamejora_model->grabarTema($id_cct, $id_tprioritario, $problematica, $evidencia, $comentario_dir);
		// echo "<pre>";print_r($estatus);die();
		if ($nombre_archivo!='') {
			$ruta_archivos = "evidencias_rm/{$id_cct}/{$id_tprioritario}/";
			// echo "<pre>";print_r($ruta_archivos);die();
			$ruta_archivos_save = "evidencias_rm/{$id_cct}/{$id_tprioritario}/$nombre_archivo";

			$estatusinst_urlarch = $this->Rutamejora_model->insert_evidencia($id_cct,$id_tprioritario,$ruta_archivos_save);
			// echo "<pre>";print_r($estatusinst_urlarch);die();

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

		$response = array('estatus' => $estatus);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;

	}

	public function btnEditar(){
		$id_objetivo = $this->input->post('id_objetivo');
		$id_tprioritario = $this->input->post('id_tprioritario'); // este dato no viene

		$datos = $this->Rutamejora_model->getObjetivo($id_objetivo, $id_tprioritario)[0];
// echo "<pre>";print_r($datos); die();

		$response = array('datos' => $datos);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

	public function btnEliminar(){
		$id_objetivo = $this->input->post('id_objetivo');

		// echo $id_objetivo;die();
		$datos = $this->Rutamejora_model->borrarObjetivo($id_objetivo);

		$response = array('datos' => $datos);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

	public function get_datos_edith_tp(){
		if(Utilerias::haySesionAbiertacct($this)){
			$this->cct = Utilerias::get_cct_sesion($this);
			$id_tprioritario = $this->input->post('id_tprioritario');
			// echo "<pre>";
			// print_r($this->cct);
			// die();
			$result_prioridades = $this->Prioridad_model->get_prioridadesxnivel($this->cct[0]['nivel']);
			$datos = $this->Rutamejora_model->edith_tp($id_tprioritario);

			// echo "<pre>";print_r($datos);die();

			$data['prioridad'] = $datos[0]['id_prioridad'];
			$data['subprioridad'] = $datos[0]['id_subprioridad'];
			$data['problematica'] = $datos[0]['otro_problematica'];
			$data['evidencia'] = $datos[0]['otro_evidencia'];
			$data['director'] = $datos[0]['obs_direc'];
			$data['supervisor'] = $datos[0]['obs_supervisor'];
			$data['path'] = $datos[0]['path_evidencia'];
			$data['t_objetivos'] = "tabla";
			$data['prioridades'] = $result_prioridades;
			$data['idtemaprioritario'] = $id_tprioritario;

			$datos = $this->Rutamejora_model->getSubprioridad($datos[0]['id_prioridad']);
			$data['subprioridades'] = $datos;
			// echo "<pre>";
			// print_r($data);
			// die();

			$strView = $this->load->view("ruta/modals_new/modal_prioridad", $data, TRUE);

			$response = array('strView' => $strView, 'titulo' => 'Edita prioridad');
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}else{
			redirect('Rutademejora/index');
		}
	}


}// Rutamedejora
