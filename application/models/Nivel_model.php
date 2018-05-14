<?php
class Nivel_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function all(){
      $this->db->select('ne.cve_nivel_educativo, ne.nivel_educativo');
      $this->db->from('nivel_educativo as ne');
      $this->db->group_by(" ne.cve_nivel_educativo");
      return  $this->db->get()->result_array();
    }// all()

    function get_xcvemunicipio($cve_municipio){
      $this->db->select('ne.cve_nivel_educativo, ne.nivel_educativo');
      $this->db->from('nivel_educativo as ne');
      $this->db->join('escuela as es', 'es.cve_nivel_educativo = ne.cve_nivel_educativo');
      $this->db->join('localidad as lo', 'lo.cve_localidad = es.cve_localidad');
      $this->db->join('municipio as mu', 'mu.cve_municipio = lo.cve_municipio');
      $this->db->where('mu.cve_municipio', $cve_municipio);
      $this->db->group_by(" ne.cve_nivel_educativo");
      return  $this->db->get()->result_array();
    }// get_xcvemunicipio()

}// Nivel_model
