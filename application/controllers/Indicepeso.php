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


}// Catalogos
