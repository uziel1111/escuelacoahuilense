<?php
class Nivel_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function all(){
      return  $this->db->get('nivel')->result_array();
    }// all()


    function get_xidmunicipio($id_municipio){
      $this->db->select('ni.id_nivel, ni.nivel');
      $this->db->from('nivel as ni');
      $this->db->join('escuela as es', 'ni.id_nivel = es.id_nivel');
      $this->db->join('municipio as mu', 'es.id_municipio = mu.id_municipio');
      $this->db->where('mu.id_municipio', $id_municipio);
      $this->db->group_by('ni.id_nivel');
      return  $this->db->get()->result_array();
    }// get_xcvemunicipio()

}// Nivel_model
