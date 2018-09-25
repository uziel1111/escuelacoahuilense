<?php
class Reportepdf_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_rutasxcct($idcct){
      $str_query = "SELECT id_cct, id_tprioritario, orden, objetivo1, objetivo2, otro_problematica, otro_evidencia, obs_direc
        FROM rm_tema_prioritarioxcct 
        WHERE id_cct = {$idcct}";

      return $this->db->query($str_query)->result_array();
    }

    function get_acciones($id_tprioritario){
      $str_query = "SELECT acc.id_accion, acc.accion, rmca.ambito, acc.accion_f_inicio, acc.accion_f_termino, acc.mat_insumos, '10%' AS avance FROM rm_accionxtproritario acc
        INNER JOIN rm_c_ambito rmca ON rmca.id_ambito = acc.id_ambito
        WHERE id_tprioritario = {$id_tprioritario}";
        return $this->db->query($str_query)->result_array();
    }
}// Rutamejora_model
