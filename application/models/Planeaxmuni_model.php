<?php
class Planeaxmuni_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }


    function get_planea_xmunciclo($id_municipio, $id_ciclo){
      if($id_municipio>0){
      $this->db->select('nivel, lyc_i, lyc_ii, lyc_iii, lyc_iv, mat_i, mat_ii, mat_iii, mat_iv');
      $this->db->from('planeaxmuni');
      $this->db->where('id_municipio', $id_municipio);
      $this->db->where('periodo', '2016');
      return  $this->db->get()->result_array();
      }
      else {
        return array();
      }

    }// get_planea_xmunciclo()

    function allperiodos(){
      $this->db->select('id_periodo, periodo');
      $this->db->from('periodoplanea');
      // $this->db->order_by("id_periodo", "desc");
      return  $this->db->get()->result_array();
    }// all()

}// Planeaxmuni_model
