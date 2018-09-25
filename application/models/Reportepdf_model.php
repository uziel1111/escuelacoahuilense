<?php
class Reportepdf_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_rutasxcct($idcct){
      $str_query = "SELECT rtp.id_cct, rtp.id_tprioritario, rtp.orden, rtp.objetivo1, rtp.objetivo2, rtp.otro_problematica, rtp.otro_evidencia, rtp.obs_direc, p.prioridad AS tema 
      FROM rm_tema_prioritarioxcct rtp
      INNER JOIN rm_c_prioridad p ON p.id_prioridad = rtp.id_prioridad
      WHERE id_cct = {$idcct} ORDER BY orden ASC";

      return $this->db->query($str_query)->result_array();
    }

    function get_acciones($id_tprioritario){
      $str_query = "SELECT acc.id_accion, acc.accion, rmca.ambito, acc.accion_f_inicio, acc.accion_f_termino, acc.mat_insumos, '10%' AS avance FROM rm_accionxtproritario acc
        INNER JOIN rm_c_ambito rmca ON rmca.id_ambito = acc.id_ambito
        WHERE id_tprioritario = {$id_tprioritario}";
        return $this->db->query($str_query)->result_array();
    }

    function get_ciclo($id_cct){
      $str_query = "SELECT c.ciclo FROM rm_misionxcct mxcct
                    INNER JOIN ciclo c ON c.id_ciclo = mxcct.id_ciclo
                    WHERE id_cct = {$id_cct}";
      return $this->db->query($str_query)->result();
    }
}// Rutamejora_model
