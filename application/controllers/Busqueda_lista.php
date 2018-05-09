<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busqueda_lista extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			$this->load->helper('form');
			// $this->load->model('Estadistica_model');
		}

		public function index(){
			$data = array();
			Utilerias::pagina_basica($this, "busqueda_lista/index", $data);
		}


}// Busqueda_lista
