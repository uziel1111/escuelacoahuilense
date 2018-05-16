<?php
class Escuela_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_xparams($id_municipio,$id_nivel,$id_sostenimiento,$nombre_escuela){
      $this->db->select('es.id_cct, es.cve_centro, tu.turno, es.nombre_centro,ni.nivel,sso.subsostenimiento, mo.modalidad,mu.municipio,es.domicilio');
      $this->db->from('escuela as es');
      $this->db->join('turno as tu', 'es.id_turno = tu.id_turno');
      $this->db->join('nivel as ni', 'es.id_nivel = ni.id_nivel');
      $this->db->join('subsostenimiento as sso', 'es.id_subsostenimiento = sso.id_subsostenimiento');
      $this->db->join('sostenimiento as so', 'sso.id_sostenimiento = so.id_sostenimiento');
      $this->db->join('modalidad as mo', 'es.id_modalidad = mo.id_modalidad');
      $this->db->join('municipio as mu', 'es.id_municipio = mu.id_municipio');

      if($id_municipio>0){
        $this->db->where('es.id_municipio', $id_municipio);
      }
      if($id_nivel>0){
        $this->db->where('es.id_nivel', $id_nivel);
      }
      if($id_sostenimiento>0){
        $this->db->where('so.id_sostenimiento', $id_sostenimiento);
      }
      if($nombre_escuela!=''){
        $this->db->like('es.nombre_centro', $nombre_escuela);
      }
      $this->db->group_by("es.id_cct");
      // $this->db->get();
      // $str = $this->db->last_query();
      // echo $str; die();
      return  $this->db->get()->result_array();
    }// get_xparams()

    function get_xcvecentro($cve_centro){
      $this->db->select('es.id_cct,es.cve_centro,es.nombre_centro,tu.turno');
      $this->db->from('escuela as es');
      $this->db->join('turno as tu', 'es.id_turno = tu.id_turno');
      $this->db->where('es.cve_centro', $cve_centro);
      $this->db->group_by("tu.id_turno");
      // $this->db->get();
      // $str = $this->db->last_query();
      // echo $str; die();
      return  $this->db->get()->result_array();
    }// get_xcentro()

}// Municipio_model
