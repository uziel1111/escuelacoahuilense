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
					$data2 = array();
					$arr_avances = $this->Rutamejora_model->get_avances_tp_accionxcct($this->cct[0]['id_cct']);
					$data2['arr_avances'] = $arr_avances;
					// echo "<pre>";print_r($arr_avances);die();
					$string_view_avance = $this->load->view('ruta/avances', $data2, TRUE);
					$data['tab_avances'] = $string_view_avance;


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

			$estatus = $this->Rutamejora_model->insert_tema_prioritario($id_cct,$id_prioridad,$objetivo1,$meta1,$objetivo2,$meta2,$problematica,$evidencia,$ids_progapoy,$otro_pa,$como_prog_ayuda,$obs_direct,$ids_apoyreq,$otroapoyreq,$especifiqueapyreq);
			$response = array('estatus' => $estatus);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}

		public function insert_update_misioncct(){
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

		public function bajarutamejora(){
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

	public function update_order(){
		// if (UtilsWrapper::verifica_sesion_redirige($this)) {
			// $usuario = UtilsWrapper::get_usuario_sesion($this);
			// $idcentrocfg = $usuario->idcentrocfg;
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
			// }
		}
		public function get_datos_edith_tp(){
			// if (UtilsWrapper::verifica_sesion_redirige($this)) {
				$id_tprioritario = $this->input->post('id_tprioritario');
				$arr_datos = $this->Rutamejora_model->get_datos_edith_tp($id_tprioritario);
				// echo "<pre>";print_r($arr_datos);die();
				$response = array('datos' => $arr_datos);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			// }
		}



		public function update_tema_prioritario(){
			$this->cct = Utilerias::get_cct_sesion($this);
			$id_cct = $this->cct[0]['id_cct'];
			$id_tprioritario = $this->input->post("id_tprioritario");
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

			$estatus = $this->Rutamejora_model->update_tema_prioritario($id_cct,$id_tprioritario,$id_prioridad,$objetivo1,$meta1,$objetivo2,$meta2,$problematica,$evidencia,$ids_progapoy,$otro_pa,$como_prog_ayuda,$obs_direct,$ids_apoyreq,$otroapoyreq,$especifiqueapyreq);
			$response = array('estatus' => $estatus);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}

		public function delete_tp(){
			$this->cct = Utilerias::get_cct_sesion($this);
			$id_cct = $this->cct[0]['id_cct'];
			$id_tprioritario = $this->input->post("id_tprioritario");

			$estatus = $this->Rutamejora_model->delete_tema_prioritario($id_cct,$id_tprioritario);
			$response = array('estatus' => $estatus);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}

	public function get_view_acciones(){
		$id_tprioritario = $this->input->post('id_tprioritario');
		$data = array();
		$str_view = $this->load->view("ruta/acciones", $data, TRUE);
		$response = array('str_view' => $str_view);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

	public function save_accion(){
		$id_tprioritario = $this->input->post('id_tprioritario');
		$id_ambito = $this->input->post('id_ambito');
  		$accion = $this->input->post('accion');
  		$materiales = $this->input->post('materiales');
        $id_responsable = $this->input->post('id_responsable');
  		$finicio = $this->input->post('finicio');
  		$ffin = $this->input->post('ffin');
  		$medicion = $this->input->post('medicion');
		$finicio = str_replace("/", "-", $finicio);
		$porciones = explode("-", $finicio);
		$finicio = $porciones[2]."-".$porciones[0]."-".$porciones[1];
		$ffin = str_replace("/", "-", $ffin);
		$porciones = explode("-", $ffin);
		$ffin = $porciones[2]."-".$porciones[0]."-".$porciones[1];


  		$insert = $this->Rutamejora_model->insert_accion($id_tprioritario, $id_ambito, $accion, $materiales, $id_responsable, $finicio, $ffin, $medicion);
  		if($insert){
  			$acciones = $this->Rutamejora_model->getacciones($id_tprioritario);
  			$tabla = "<div class='table-responsive'>
                            <table id='idtabla_accionestp' class='table table-condensed table-hover  table-bordered'>
                              <thead>
                            <tr class=info>
                              <th id='idrutamtema'><center>Acción</center></th>
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
	                              <td>{$accion['id_accion']}</td>
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
  		Utilerias::enviaDataJson(200, $response, $this);
			exit;
	}

	public function get_table_acciones(){
		$id_tprioritario = $this->input->post('id_tprioritario');
		$acciones = $this->Rutamejora_model->getacciones($id_tprioritario);
		$tabla = "<div class='table-responsive'>
                            <table id='idtabla_accionestp' class='table table-condensed table-hover  table-bordered'>
                              <thead>
                            <tr class=info>
                              <th id='idrutamtema'><center>Acción</center></th>
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
	                              <td>{$accion['id_accion']}</td>
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
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
	}

	public function delete_accion(){
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

	private function arma_tabla_acciones($id_tprioritario){
		$acciones = $this->Rutamejora_model->getacciones($id_tprioritario);
		$tabla = "<div class='table-responsive'>
                            <table id='idtabla_accionestp' class='table table-condensed table-hover  table-bordered'>
                              <thead>
                            <tr class=info>
                              <th id='idrutamtema'><center>Acción</center></th>
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
	                              <td>{$accion['id_accion']}</td>
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

		public function set_avance(){
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


}// Rutamedejora
