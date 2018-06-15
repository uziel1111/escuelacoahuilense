<?php
class Planeaxesc_reactivo_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }


    function get_planea_xconttem_reac($id_cct,$periodo, $idcampodis){

      $this->db->select('t3.id_contenido, t3.contenido as contenidos,GROUP_CONCAT(t2.n_reactivo) as reactivos, COUNT(t3.id_contenido) as total_reac_xua, SUM(t1.n_aciertos) as total, t1.n_almn_eval as alumnos_evaluados,
ROUND((((SUM(t1.n_aciertos))*100)/((COUNT(t3.id_contenido))*t1.n_almn_eval)),1)as porcen_alum_respok');
      $this->db->from('planeaxesc_reactivo t1');
      $this->db->join('planea_reactivo t2', 't1.id_reactivo=t2.id_reactivo');
      $this->db->join('planea_contenido t3', 't2.id_contenido= t3.id_contenido');
      $this->db->join('planea_unidad_analisis t4', 't3.id_unidad_analisis=t4.id_unidad_analisis');
      $this->db->join('planea_camposdisciplinares t5', 't4.id_campodisiplinario=t5.id_campodisiplinario');
      $this->db->where('t1.id_ct', $id_cct);
      $this->db->where('t1.id_periodo', $periodo);
      $this->db->where('t5.id_campodisiplinario', $idcampodis);
      $this->db->group_by("t3.id_contenido");
      return  $this->db->get()->result_array();

    }// get_planea_xconttem_reac()

    function get_reactivos_xcctxcont($id_cct,$id_cont,$periodo,$idcampodis){

      $this->db->select('t1.id_reactivo, t2.reactivo as descripcion');
      $this->db->from('planeaxesc_reactivo t1');
      $this->db->join('planea_reactivo t2', 't1.id_reactivo=t2.id_reactivo');
      $this->db->join('planea_contenido t3', 't2.id_contenido= t3.id_contenido');
      $this->db->join('planea_unidad_analisis t4', 't3.id_unidad_analisis=t4.id_unidad_analisis');
      $this->db->join('planea_camposdisciplinares t5', 't4.id_campodisiplinario=t5.id_campodisiplinario');
      $this->db->where('t1.id_ct', $id_cct);
      $this->db->where('t3.id_contenido', $id_cont);
      $this->db->where('t1.id_periodo', $periodo);
      $this->db->where('t5.id_campodisiplinario', $idcampodis);
      $this->db->where('(((t1.n_aciertos*100)/t1.n_almn_eval)<50)');
      return  $this->db->get()->result_array();

    }// get_reactivos_xcctxcont()

}// Planeaxesc_reactivo_model
