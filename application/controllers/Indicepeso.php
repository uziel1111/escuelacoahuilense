<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indicepeso extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			$this->load->model('Nivel_model');
			$this->load->model('Municipio_model');
			$this->load->model('Sostenimiento_model');
			$this->load->model('Ciclo_model');
			$this->load->model('Escuela_model');
		}

		public function index(){
			$data = array();
			$result_municipios = $this->Municipio_model->getall_xest_ind();
			if(count($result_municipios)==0){
				$data['arr_municipios'] = array(	'0' => 'Error recuperando los municipios' );
			}else{
				$arr_municipios['0'] = 'TODOS';
				foreach ($result_municipios as $row){
					 $arr_municipios[$row['id_municipio']] = $row['municipio'];
				}
			}

			$result_niveles = $this->Nivel_model->getall_est_ind();
			if(count($result_niveles)==0){
				$data['arr_niveles'] = array(	'0' => 'Error recuperando los niveles' );
			}else{
				$arr_niveles['0'] = 'TODOS';
				foreach ($result_niveles as $row){
					 $arr_niveles[$row['id_nivel']] = $row['nivel'];
				}
			}

			$result_ciclo = $this->Ciclo_model->ciclo_est_e_ind();
			$arr_ciclo['2'] = '2017-2018';

			$data['arr_niveles'] = $arr_niveles;
			$data['arr_municipios'] = $arr_municipios;
			$data['arr_ciclos'] =$arr_ciclo;
			Utilerias::pagina_basica($this, "indice_peso/estadomunicipio", $data);
		}// getniveles_xcvemunicipio()

		public function get_escuelas(){
			// echo "<pre>";
			// print_r($_POST);
			// die();
			$idmunicipio = $this->input->post("idmunicipio");
			$idnivel = $this->input->post("idnivel");
			$id_sostenimiento = 0;
			$nombre_centro = "";
			// $idmunicipio = $this->input->post('idperiodo');
			$escuelas = $this->Escuela_model->get_xparams($idmunicipio,$idnivel,$id_sostenimiento,$nombre_centro);
			$ptotal = array();
			foreach ($escuelas as $escuela) {
				
				$arr_indi_peso = $this->Escuela_model->get_indicpeso_xidcct($escuela['id_cct'],4);
				
				array_push($ptotal, $arr_indi_peso);
			}
			
			$ndiv = count($ptotal);
			$bajo = 0;
			$normal = 0;
			$sobrepeso = 0;
			$obesidad = 0;
			$predom = 0;
			$t_bajo = 0;
			$t_normal = 0;
			$t_sobrepeso = 0;
			$t_obesidad = 0;
			// echo "<pre>";
			// 	print_r($ptotal);
			// 	die();
			foreach ($ptotal as $unoauno) {
				// echo "<pre>";
				// print_r($unoauno[0]['bajo']);
				// die();
				$bajo = $bajo + $unoauno[0]['bajo'];
				$normal = $normal + $unoauno[0]['Normal'];
				$sobrepeso = $sobrepeso + $unoauno[0]['Sobrepeso'];
				$obesidad = $obesidad + $unoauno[0]['Obesidad'];
				$predom = $predom + $unoauno[0]['predom'];
				$t_bajo = $t_bajo + $unoauno[0]['t_bajo'];
				$t_normal = $t_normal + $unoauno[0]['t_normal'];
				$t_sobrepeso = $t_sobrepeso + $unoauno[0]['t_sobrepeso'];
				$t_obesidad = $t_obesidad + $unoauno[0]['t_obesidad'];
			}

			$bajo = $bajo/$ndiv;
			$normal = $normal/$ndiv;
			$sobrepeso = $sobrepeso/$ndiv;
			$obesidad = $obesidad/$ndiv;
			$predom = $predom/$ndiv;
			$t_bajo = $t_bajo/$ndiv;
			$t_normal = $t_normal/$ndiv;
			$t_sobrepeso = $t_sobrepeso/$ndiv;
			$t_obesidad = $t_obesidad/$ndiv;


			$final[0] = array(
				"bajo" => $bajo,
				"Normal" => $normal,
				"Sobrepeso" => $sobrepeso,
				"Obesidad" => $obesidad,
				"predom" => $predom,
				"t_bajo" => $t_bajo,
				"t_normal" => $t_normal,
				"t_sobrepeso" => $t_sobrepeso,
				"t_obesidad" => $t_obesidad
			);

			$data['arr_indi_peso'] = $final;
    		$dom = $this->load->view("indice_peso/index",$data,TRUE);

    		$response = array(
				'dom_view_indice_peso'=>$dom
			);

			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}

}// Catalogos
