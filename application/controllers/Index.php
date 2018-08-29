<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('Utilerias');
		}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array();
		Utilerias::pagina_basica($this, "index", $data);
	}

	public function getReconocimientosEstatales(){

		$strView = $this->load->view("index/reconocimientosEstatales", array(), TRUE);


		$response = array(
											'strView' => $strView
											);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}// getReconocimientosEstatales()

	public function getMaterialesUtiles(){
		$strView = $this->load->view("index/materialesUtiles", array(), TRUE);
		$response = array(
											'strView' => $strView
											);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}// getMaterialesUtiles()

	public function getCalendarioEscolar(){
		$strView = $this->load->view("index/calendarioEscolar", array(), TRUE);
		$response = array(
											'strView' => $strView
											);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}// getCalendarioEscolar()

	public function sarapemsj(){
		$strView = $this->load->view("index/sarapemsj", array(), TRUE);
		$response = array(
											'strView' => $strView
											);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}// sarapemsj()

	public function guiaparapadres(){
		$strView = $this->load->view("index/guiaparapadres", array(), TRUE);
		$response = array(
											'strView' => $strView
											);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}// guiaparapadres()

	public function modeloeducativo(){
		$strView = $this->load->view("index/modeloeducativo", array(), TRUE);
		$response = array(
											'strView' => $strView
											);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}// modeloeducativo()

}
