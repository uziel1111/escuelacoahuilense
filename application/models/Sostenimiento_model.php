<?php
class Sostenimiento_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function all(){
      return  $this->db->get('sostenimiento')->result_array();
    }// all()

    function get_xidnivel($id_nivel){
      $this->db->select('so.id_sostenimiento, so.sostenimiento');
      $this->db->from('sostenimiento as so');
      $this->db->join('subsostenimiento as sso', 'so.id_sostenimiento = sso.id_sostenimiento');
      $this->db->join('escuela as es', 'sso.id_subsostenimiento = es.id_subsostenimiento');
      $this->db->join('nivel as ni', 'es.id_nivel = ni.id_nivel');
      $this->db->where('ni.id_nivel', $id_nivel);
      $this->db->group_by(" so.id_sostenimiento");
      return  $this->db->get()->result_array();
    }// get_xcvenivel()

}// Sostenimiento_model
