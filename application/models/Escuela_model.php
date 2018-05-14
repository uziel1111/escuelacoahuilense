<?php
class Escuela_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_xparams($cve_municipio,$cve_nivel,$cve_sostenimiento,$nombre_escuela){
      $this->db->select('es.id_cct, es.cve_centro, tu.turno_registro as turno, es.nombre_centro,ne.nivel_educativo,mu.municipio,lo.localidad,es.domicilio');
      $this->db->from('escuela as es');
      $this->db->join('nivel_educativo as ne', 'ne.cve_nivel_educativo = es.cve_nivel_educativo AND es.cve_tipo_educacion = ne.cve_tipo_educacion');
      $this->db->join('localidad as lo', 'lo.cve_localidad = es.cve_localidad AND es.cve_region = lo.cve_region AND es.cve_subregion = lo.cve_subregion');
      $this->db->join('municipio as mu', 'mu.cve_municipio = lo.cve_municipio');
      $this->db->join('turno_registro as tu', 'tu.cve_turno = es.cve_turno');
      $this->db->join('sostenimiento as so', 'so.cve_sostenimiento = es.cve_sostenimiento');

      if($cve_municipio>=0){
        $this->db->where('mu.cve_municipio', $cve_municipio);
      }
      if($cve_nivel>=0){
        $this->db->where('es.cve_nivel_educativo', $cve_nivel);
      }
      if($cve_sostenimiento>=0){
        $this->db->where('es.cve_sostenimiento', $cve_sostenimiento);
      }
      if($nombre_escuela!=''){
        $this->db->like('es.nombre_centro', $nombre_escuela);
      }
      $this->db->group_by("es.cve_centro");
      // $this->db->get();
      // $str = $this->db->last_query();
      // echo $str; die();
      return  $this->db->get()->result_array();
    }// get_xparams()

    function get_xcvecentro($cve_centro){
      $this->db->select('es.id_cct,es.cve_centro,es.nombre_centro,tu.turno_registro as turno');
      $this->db->from('escuela as es');
      $this->db->join('turno_registro as tu', 'tu.cve_turno = es.cve_turno');
      $this->db->where('es.cve_centro', $cve_centro);
      $this->db->group_by("tu.cve_turno_registro");
      return  $this->db->get()->result_array();
    }// get_xcentro()

}// Municipio_model
