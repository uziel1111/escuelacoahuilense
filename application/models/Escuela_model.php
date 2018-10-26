<?php
class Escuela_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_xparams($id_municipio,$id_nivel,$id_sostenimiento,$nombre_escuela){
      $this->db->select('es.id_cct, es.cve_centro, tu.turno_single, es.nombre_centro,ni.nivel,sso.subsostenimiento, mo.modalidad,mu.municipio,loc.localidad,es.domicilio, es.latitud, es.longitud, es.id_nivel, s.zona_escolar, so.sostenimiento');
      $this->db->from('escuela as es');
      $this->db->join('turno_single as tu', 'es.id_turno_single = tu.id_turno_single');
      $this->db->join('nivel as ni', 'es.id_nivel = ni.id_nivel');
      $this->db->join('subsostenimiento as sso', 'es.id_subsostenimiento = sso.id_subsostenimiento');
      $this->db->join('sostenimiento as so', 'sso.id_sostenimiento = so.id_sostenimiento');
      $this->db->join('modalidad as mo', 'es.id_modalidad = mo.id_modalidad');
      $this->db->join('municipio as mu', 'es.id_municipio = mu.id_municipio');
      $this->db->join('supervision as s', 'es.id_supervision = s.id_supervision');
      $this->db->join('localidad as loc', 'mu.id_municipio = loc.id_municipio AND es.id_localidad = loc.cve_localidad');
      $where_au = "(es.id_estatus !=2 AND es.id_estatus !=3)";
      $this->db->where($where_au);
      $this->db->where('es.latitud !=',0);
      $this->db->where('es.latitud !=','');
      $this->db->where('es.latitud !=','#VALUE!');
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
      $this->db->order_by("ni.id_nivel");
      // $this->db->get();
      // $str = $this->db->last_query();
      // echo $str; die();
      return  $this->db->get()->result_array();
    }// get_xparams()

    function get_xcvecentro($cve_centro){
      $this->db->select('es.id_cct,es.cve_centro,es.nombre_centro,ni.nivel, tu.turno_single, es.latitud, es.longitud, es.id_nivel, mu.municipio, loc.localidad, s.zona_escolar, so.sostenimiento');
      $this->db->from('escuela as es');
      $this->db->join('turno_single as tu', 'es.id_turno_single = tu.id_turno_single');
      $this->db->join('nivel as ni', 'es.id_nivel = ni.id_nivel');
      $this->db->join('subsostenimiento as sso', 'es.id_subsostenimiento = sso.id_subsostenimiento');
      $this->db->join('sostenimiento as so', 'sso.id_sostenimiento = so.id_sostenimiento');
      $this->db->join('modalidad as mo', 'es.id_modalidad = mo.id_modalidad');
      $this->db->join('municipio as mu', 'es.id_municipio = mu.id_municipio');
      $this->db->join('supervision as s', 'es.id_supervision = s.id_supervision');
      $this->db->join('localidad as loc', 'mu.id_municipio = loc.id_municipio AND es.id_localidad = loc.cve_localidad');
      $this->db->where('es.cve_centro', $cve_centro);
      $where_au = "(es.id_estatus !=2 AND es.id_estatus !=3)";
      $this->db->where($where_au);
      $this->db->where('es.latitud !=',0);
      $this->db->where('es.latitud !=','');
      $this->db->where('es.latitud !=','#VALUE!');
      $this->db->group_by("tu.id_turno_single");
      // $this->db->get();
      // $str = $this->db->last_query();
      // echo $str; die();
      return  $this->db->get()->result_array();
    }// get_xcentro()

    function get_xcvecentro_turnosingle($cve_centro, $turno_single){
      $this->db->select('es.id_cct, es.cve_centro, es.nombre_centro');
      $this->db->from('escuela as es');
      $this->db->join('turno_single as tu', 'es.id_turno_single = tu.id_turno_single');

      $this->db->where('es.cve_centro =',$cve_centro);
      $this->db->where('tu.turno_single =',$turno_single);
      // $this->db->get();
      // $str = $this->db->last_query();
      // echo $str; die();
      return  $this->db->get()->result_array();
    }// get_xcvecentro_turnosingle()


    function get_marcadores(){
      $this->db->select('latitud, longitud, nombre_centro');
      $query = $this->db->get('escuela')->result_array();
      // echo "";
      // print_r($query);
      // die();
      return $query;
    }


function get_xidcct($idcct){
      // echo $idcct; die();
      $this->db->select('es.id_cct,es.cve_centro,es.nombre_centro, es.latitud, es.longitud, es.id_nivel');
      $this->db->from('escuela as es');
      $this->db->join('turno as tu', 'es.id_turno = tu.id_turno');
      $this->db->where('es.id_cct', $idcct);
      // $this->db->get();
      // $str = $this->db->last_query();
      // echo $str; die();
      return  $this->db->get()->result_array();
    }

    function get_mismo_nivel($latitud, $longitud, $nivel, $siguiente){
      if($siguiente == true && $nivel < 10){
        $nivel = $nivel+1;
      }

       $this->db->select("es.id_cct, es.cve_centro, tu.turno_single, es.nombre_centro,ni.nivel,sso.subsostenimiento, mo.modalidad,mu.municipio,loc.localidad,es.domicilio, es.latitud, es.longitud, es.id_nivel, s.zona_escolar, so.sostenimiento, ( 6371 * ACOS(
                                       COS( RADIANS({$latitud}) )
                                       * COS(RADIANS( latitud ) )
                                       * COS(RADIANS( longitud )
                                       - RADIANS({$longitud}) )
                                       + SIN( RADIANS({$latitud}) )
                                       * SIN(RADIANS( latitud ) )
                                      )
                         ) AS distance");
      $this->db->from('escuela as es');
      $this->db->join('turno_single as tu', 'es.id_turno_single = tu.id_turno_single');
      $this->db->join('nivel as ni', 'es.id_nivel = ni.id_nivel');
      $this->db->join('subsostenimiento as sso', 'es.id_subsostenimiento = sso.id_subsostenimiento');
      $this->db->join('sostenimiento as so', 'sso.id_sostenimiento = so.id_sostenimiento');
      $this->db->join('modalidad as mo', 'es.id_modalidad = mo.id_modalidad');
      $this->db->join('municipio as mu', 'es.id_municipio = mu.id_municipio');
      $this->db->join('supervision as s', 'es.id_supervision = s.id_supervision');
      $this->db->join('localidad as loc', 'mu.id_municipio = loc.id_municipio AND es.id_localidad = loc.cve_localidad');
      $where_au = "(es.id_estatus !=2 AND es.id_estatus !=3)";
      $this->db->where($where_au);
      $this->db->where('es.latitud !=',0);
      $this->db->where('es.latitud !=','');
      $this->db->where('es.latitud !=','#VALUE!');
      $this->db->where('es.id_nivel', $nivel);
      $this->db->having('distance < 1000 ');
      $this->db->order_by('distance');
      $this->db->limit(6);
      //  $this->db->get();
      // $str = $this->db->last_query();
      // echo $str; die();
      return  $this->db->get()->result_array();
    }
    function get_nivel_xidcct($id_cct){
        $this->db->select('id_nivel');
        $this->db->from('escuela');
        $this->db->where('id_cct', $id_cct);
        return  $this->db->get()->row('id_nivel');
    }// get_nivel()
}// Municipio_model
