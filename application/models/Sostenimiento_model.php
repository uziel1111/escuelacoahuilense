<?php
class Sostenimiento_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function all(){
      $this->db->select('so.cve_sostenimiento, so.sostenimiento');
      $this->db->from('sostenimiento as so');
      $this->db->group_by(" so.cve_sostenimiento");
      return  $this->db->get()->result_array();
    }// all()

    function get_xcvenivel($cve_nivel_educativo){
      $this->db->select('so.cve_sostenimiento, so.sostenimiento');
      $this->db->from('sostenimiento as so');
      $this->db->join('escuela as es', 'es.cve_sostenimiento = so.cve_sostenimiento');
      $this->db->join('nivel_educativo as ne', 'ne.cve_nivel_educativo = es.cve_nivel_educativo');
      $this->db->where('ne.cve_nivel_educativo', $cve_nivel_educativo);
      $this->db->group_by(" so.cve_sostenimiento");
      return  $this->db->get()->result_array();
    }// get_xcvenivel()

}// Sostenimiento_model
