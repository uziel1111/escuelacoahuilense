<?php
class Reportepdf_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_rutasxcct($idcct){
      $str_query = "SELECT rtp.id_cct, rtp.id_tprioritario, rtp.orden, rtp.objetivo1, rtp.objetivo2, rtp.otro_problematica, rtp.otro_evidencia, rtp.obs_direc, rtp.obs_supervisor, p.prioridad AS tema
      FROM rm_tema_prioritarioxcct rtp
      INNER JOIN rm_c_prioridad p ON p.id_prioridad = rtp.id_prioridad
      WHERE rtp.id_cct = {$idcct} ORDER BY orden ASC";
// echo $str_query; die();
      return $this->db->query($str_query)->result_array();
    }

    function get_acciones($id_tprioritario){
      $str_query = "SELECT acc.id_accion, acc.accion, rmca.ambito, acc.accion_f_inicio, acc.accion_f_termino, acc.mat_insumos, CONCAT(IFNULL(av.cte1, '0'), '%') AS avance1,
CONCAT((IF(ISNULL(av.cte1),0,av.cte1))+(IF(ISNULL(av.cte2),0,av.cte2))+(IF(ISNULL(av.cte3),0,av.cte3))+(IF(ISNULL(av.cte4),0,av.cte4))+(IF(ISNULL(av.cte5),0,av.cte5))+
(IF(ISNULL(av.cte6),0,av.cte6))+(IF(ISNULL(av.cte7),0,av.cte7))+(IF(ISNULL(av.cte8),0,av.cte8))+(IF(ISNULL(av.cte9),0,av.cte9))+(IF(ISNULL(av.cte10),0,av.cte10)), '%') AS avance, acc.ids_responsables, acc.otro_responsable
        FROM rm_accionxtproritario acc
        INNER JOIN rm_c_ambito rmca ON rmca.id_ambito = acc.id_ambito
        LEFT JOIN rm_avance_xcctxtpxaccion av ON av.id_accion = acc.id_accion AND acc.id_tprioritario = av.id_tprioritario
        WHERE acc.id_tprioritario = {$id_tprioritario}";
        // echo $str_query; die();
        return $this->db->query($str_query)->result_array();
    }

    function get_ciclo($id_cct){
      $str_query = "SELECT c.ciclo FROM rm_misionxcct mxcct
                    INNER JOIN ciclo c ON c.id_ciclo = mxcct.id_ciclo
                    WHERE id_cct = {$id_cct}";
      return $this->db->query($str_query)->result();
    }
}// Rutamejora_model
