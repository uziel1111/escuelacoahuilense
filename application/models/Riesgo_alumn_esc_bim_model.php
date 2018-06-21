<?php
class Riesgo_alumn_esc_bim_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_riesgo_pie_xidct($id_cct,$bimestre,$ciclo){
      // return  $this->db->get('nivel')->result_array();

      $query = $this->db->query("
      SELECT
      COUNT(curp) total,
      SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto,
      SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))=2,1,0)) as alto,
      SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))=1,1,0)) as medio,
      SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))=0,1,0)) as bajo
      FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND ciclo='".$ciclo."'
      ");
        return $query->result_array();

    }// get_riesgo_pie_xidct()

    function get_riesgo_bar_grados_xidct($id_cct,$bimestre,$ciclo){
      // return  $this->db->get('nivel')->result_array();

      $query = $this->db->query("
      SELECT id_cct,
      (SELECT SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct.") as muyalto_t,
      (SELECT SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND grado=1) as muyalto_1,
      (SELECT SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND grado=2) as muyalto_2,
      (SELECT SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND grado=3) as muyalto_2,
      (SELECT SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND grado=4) as muyalto_4,
      (SELECT SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND grado=5) as muyalto_5,
      (SELECT SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND grado=6) as muyalto_6
      FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND ciclo='".$ciclo."' GROUP BY id_cct
      ");
        return $query->result_array();

    }// get_riesgo_pie_xidct()



}// Riesgo_alumn_esc_bim_model
