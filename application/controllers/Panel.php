<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->data = array( );
			$this->logged_in = FALSE;
			$this->load->library('Utilerias');
			$this->load->model('Usuario_model');
			$this->load->model('Planeaxmuni_model');
			$this->load->model('Recursos_model');
		}

		public function index(){
			if(Utilerias::haySesionAbierta($this)){
				$usuario = Utilerias::get_usuario_sesion($this);
				$nivel = "";
				if($usuario[0]['id_nivel'] == 4){
					$nivel = "PRIMARIA";
				}else if($usuario[0]['id_nivel'] == 5){
					$nivel = "SECUNDARIA";
				}else if($usuario[0]['id_nivel'] == 6){
					$nivel = "MEDIA SUPERIOR";
				}
				$data = $this->data;
			    $data['error'] = '';
			    $periodos = $this->Planeaxmuni_model->allperiodos();
				$arr_periodos = array();
				foreach ($periodos as $periodo){
					if($usuario[0]['id_nivel'] == 4){
						if($periodo['id_periodo'] == 1){
							$arr_periodos[$periodo['id_periodo']] = $periodo['periodo'];
						}
					}else{
						if($periodo['id_periodo'] != 1){
							$arr_periodos[$periodo['id_periodo']] = $periodo['periodo'];
						}
					}
				}

				$contenidos = $this->Recursos_model->get_tipo_contenidos();
				$arr_contenidos = array();
				$arr_contenidos[0] = "SELECCIONE";
				foreach ($contenidos as $contenido){
					 $arr_contenidos[$contenido['idtipo']] = $contenido['tipo'];
				}
				//CAMPOS DICIPLINARIOS
				$arr_campod['0'] = 'SELECCIONE';
				$arr_campod['1'] = 'LENGUAJE Y COMUNICACIÓN';
				$arr_campod['2'] = 'MATEMÁTICAS';

				$data['camposd'] = $arr_campod;
				$data['periodos'] = $arr_periodos;
				$data['contenidos'] = $arr_contenidos;
				$data['nombreuser'] = $usuario[0]['nombre']. " ".$usuario[0]['paterno']." ".$usuario[0]['materno'];
				$data['nivel'] = $nivel;


			    Utilerias::pagina_basica_panel($this, "panel/index", $data);
			}
		}// index()

		public function get_reactivos_recursos(){
			if(Utilerias::haySesionAbierta($this)){
				$periodo = $this->input->post("periodo");
				$campo_dis = $this->input->post("campo_dis");
				$usuario = Utilerias::get_usuario_sesion($this);
				$nivel = $usuario[0]['id_nivel'];

				$reactivos = $this->Recursos_model->get_reactivo_recurso($periodo, $campo_dis, $nivel);

				$table = '<table class="table table-style-1">
							  <thead class="bgcolor-2">
							    <tr>

							      <th scope="col">Número de reactivo</th>
							      <th scope="col"><i class="far fa-file-pdf" data-toggle="tooltip" data-placement="top" title="Archivos PDF"></i></th>
							      <th scope="col"><i class="far fa-file-image" data-toggle="tooltip" data-placement="top" title="Imagenes"></i></th>
							      <th scope="col"><i class="fas fa-link" data-toggle="tooltip" data-placement="top" title="URL´s de contenido web"></i></th>
							      <th scope="col"><i class="far fa-file-video" data-toggle="tooltip" data-placement="top" title="Videos"></i></th>
							      <th scope="col">Reactivo</th>
							      <th scope="col"><i class="far fa-eye"></i></th>
							    </tr>
							  </thead>
							  <tbody>';

				foreach ($reactivos as $reactivo) {
					$table .=  '<tr>
							      <th hidden scope="row" width="10%">'.$reactivo["id_reactivo"].'</th>
							      <td width="5%">'.$reactivo["n_reactivo"].'</td>
							      <td width="5%">'.$reactivo["total_pdf"].'</td>
							      <td width="5%">'.$reactivo["total_img"].'</td>
							      <td width="5%">'.$reactivo["total_link"].'</td>
							      <td width="5%">'.$reactivo["total_video"].'</td>
							      <td width="60%"><img class="img-fluid" style="cursor: zoom-in;" onclick=obj_panel.modal_reactivo("'.$reactivo["path_react"].'") src="'."http://proyectoeducativo.org/sarape/assets/docs/planea_reactivos/".$reactivo["path_react"].'" face" ></td>
							      <td width="5%"><center><button type="button" class="btn btn-info" id="btn_mostrar_datos_rec" onClick="obj_panel.get_tabla('.$reactivo["id_reactivo"].')">Ver</button></center></td>
							    </tr>';
				}
				$table .=  '</tbody>
							</table>';
				Utilerias::enviaDataJson(200, $table, $this);
				exit;
			}
		}

		public function get_vista_recursos(){
			$id_reactivo = $this->input->post("id_reactivo");
			$recursos = $this->Recursos_model->get_recursos($id_reactivo);

			$data = array();

			$table = '<table class="table table-bordered">
							  <thead>
							    <tr>
							      <th scope="col">ID RECURSO</th>
							      <th scope="col">TIPO</th>
							      <th scope="col">RUTA</th>
							      <th scope="col">FECHA DE CREACION</th>
							      <th scope="col">TITULO</th>
							      <th scope="col"></th>
							    </tr>
							  </thead>
							  <tbody>';

			if(count($recursos) > 0){
				foreach ($recursos as $recurso) {
					$table .=  '<tr>
							      <th scope="row">'.$recurso["idrecurso"].'</th>
							      <td>'.$recurso["tipo"].'</td>
							      <td>'.$recurso["ruta"].'</td>
							      <td>'.$recurso["fcreacion"].'</td>
							      <td>'.$recurso["titulo"].'</td>
							      <td><button type="button" class="btn btn-danger" id="btn_eliminar_recurso" onClick="obj_recursos.elimina_recurso('.$recurso["idrecurso"].')">X</button></td>
							    </tr>';
				}
			}

			$table .=  '</tbody>
							</table>';
			$data['tabla'] = $table;

			$str_view = $this->load->view("panel/recursos", $data, TRUE);
			$response = array('str_view' => $str_view);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}

		public function envia_url(){
			$id_reactivo = $this->input->post('id_reactivo');
			$url = $this->input->post('url');
			$idtipo = $this->input->post('tipo');
			$titulo = $this->input->post('titulo');
			$fuente = $this->input->post('fuenteurlvideo');
			$usuario = Utilerias::get_usuario_sesion($this);
			$idusuario = $usuario[0]['idusuario'];

			$insert = $this->Recursos_model->inserta_url($id_reactivo, $url, $idusuario, $idtipo, $titulo, $fuente);
			if($insert){
				$response = array('response' => "Se guardo correctamente");
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			}
		}

		public function get_tabla_recursosJS(){
			$id_reactivo = $this->input->post("id_reactivo");
			$recursos = $this->Recursos_model->get_recursos($id_reactivo);

			$data = array();

			$table = '<table class="table table-bordered">
							  <thead>
							    <tr>
							      <th scope="col">ID RECURSO</th>
							      <th scope="col">TIPO</th>
							      <th scope="col">RUTA</th>
							      <th scope="col">FECHA DE CREACION</th>
							      <th scope="col">TITULO</th>
							      <th scope="col"></th>
							    </tr>
							  </thead>
							  <tbody>';

			if(count($recursos) > 0){
				foreach ($recursos as $recurso) {
					$table .=  '<tr>
							      <th scope="row">'.$recurso["idrecurso"].'</th>
							      <td>'.$recurso["tipo"].'</td>
							      <td>'.$recurso["ruta"].'</td>
							      <td>'.$recurso["fcreacion"].'</td>
							      <td>'.$recurso["titulo"].'</td>
							      <td><button type="button" class="btn btn-danger" id="btn_eliminar_recurso" onClick="obj_recursos.elimina_recurso('.$recurso["idrecurso"].')">X</button></td>
							    </tr>';
				}
			}

			$table .=  '</tbody>
							</table>';
			$response = array('tabla' => $table);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}


		public function set_file(){
			$id_reactivo = $this->input->post('idreactivo');
			$idtipo = $this->input->post('tipo');
			$titulo = $this->input->post('titulo');
			$fuente = $this->input->post('fuentefile');
			$usuario = Utilerias::get_usuario_sesion($this);
			$idusuario = $usuario[0]['idusuario'];
			$carpeta = ($idtipo == "1")?"pdf":"img";
			$ruta_archivos = "recursos/{$id_reactivo}/{$carpeta}/";
			$nombre_archivo = str_replace(" ", "_", $_FILES['archivo']['name']);
			$ruta_archivos_save = "recursos/{$id_reactivo}/{$carpeta}/$nombre_archivo";

			$insert = $this->Recursos_model->inserta_url($id_reactivo, $ruta_archivos_save, $idusuario, $idtipo, $titulo, $fuente);

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

		public function delet_recurso(){
			$id_recurso = $this->input->post('id_recurso');
			$url = $this->Recursos_model->get_url_recurso($id_recurso);

			if($url[0]['idtipo'] == 1 || $url[0]['idtipo'] == 2){
				unlink($url[0]['ruta']);
			}
			$delete = $this->Recursos_model->delete_recurso($id_recurso);

			Utilerias::enviaDataJson(200, $delete, $this);
			exit;
		}

		public function validaExisteArchivo(){
			$id_reactivo = $this->input->post('id_reactivo');
			$nombre_archivo = $this->input->post('nombrefile');
			$idtipo = $this->input->post('tipo');
			$respuesta = false;
			$carpeta = ($idtipo == "1")?"pdf":"img";
			$nombre_archivo = str_replace(" ", "_", $nombre_archivo);
			$ruta_archivo = "recursos/{$id_reactivo}/{$carpeta}/$nombre_archivo";
			$existe = $this->Recursos_model->busca_archivo($ruta_archivo);
			if(count($existe) > 0){
				$respuesta = true;
			}
			$response = array('respuesta' => $respuesta);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}
}// Panel