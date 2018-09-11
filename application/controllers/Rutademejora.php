<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rutademejora extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->data = array( );
			$this->logged_in = FALSE;
			$this->load->library('Utilerias');
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
				$data['nivel'] = $nivel;
				$data['nombreuser'] = $usuario[0]['nombre']. " ".$usuario[0]['paterno']." ".$usuario[0]['materno'];
				// $data = array();
			    Utilerias::pagina_basica_panel($this, "ruta/index", $data);
			}
		}// index()



}// Rutamedejora
