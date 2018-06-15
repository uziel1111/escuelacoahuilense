<?php
class Planeaxescuela_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }


    function get_planea_xidcct($id_cct,$periodo){

      $this->db->select('lyc_i, lyc_ii, lyc_iii, lyc_iv, mat_i, mat_ii, mat_iii, mat_iv');
      $this->db->from('planeaxescuela');
      $this->db->where('id_cct', $id_cct);
      $this->db->where('periodo', $periodo);
      return  $this->db->get()->result_array();

    }// get_planea_xidcct()

}// Planeaxescuela_model
