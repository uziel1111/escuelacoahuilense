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
      (SELECT SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND ciclo='".$ciclo."') as muyalto_t,
      (SELECT SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND ciclo='".$ciclo."' AND grado=1) as muyalto_1,
      (SELECT SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND ciclo='".$ciclo."' AND grado=2) as muyalto_2,
      (SELECT SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND ciclo='".$ciclo."' AND grado=3) as muyalto_2,
      (SELECT SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND ciclo='".$ciclo."' AND grado=4) as muyalto_4,
      (SELECT SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND ciclo='".$ciclo."' AND grado=5) as muyalto_5,
      (SELECT SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim".$bimestre.">7, 2,IF(falta_bim".$bimestre.">3, 1,0))) + (IF(cal_esp_bim".$bimestre."<6 AND cal_esp_bim".$bimestre.">0,1,0)) + (IF(cal_mat_bim".$bimestre."<6 and cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND ciclo='".$ciclo."' AND grado=6) as muyalto_6
      FROM riesgo_alumn_esc_bim WHERE id_cct=".$id_cct." AND ciclo='".$ciclo."' GROUP BY id_cct
      ");
        return $query->result_array();

    }// get_riesgo_pie_xidct()

    function get_riesgo_pie_xidmuni($id_municipio,$id_nivel,$bimestre,$ciclo){
      // return  $this->db->get('nivel')->result_array();
      $var_aux="";
      if ($id_municipio>0) {
        $var_aux="esc.id_municipio=".$id_municipio." AND";
      }

      $query = $this->db->query("
      SELECT
      COUNT(rie.curp) total,
      SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto,
      SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))=2,1,0)) as alto,
      SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))=1,1,0)) as medio,
      SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))=0,1,0)) as bajo
      FROM riesgo_alumn_esc_bim rie
      INNER JOIN escuela esc ON rie.id_cct = esc.id_cct
      WHERE ".$var_aux." esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."'
      ");
        return $query->result_array();

    }// get_riesgo_pie_xidmuni()

    function get_riesgo_bar_grados_xidmuni($id_municipio,$id_nivel,$bimestre,$ciclo){
      // return  $this->db->get('nivel')->result_array();

      if ($id_municipio>0) {
        $query = $this->db->query("
        SELECT esc.id_municipio,
        (SELECT SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim rie INNER JOIN escuela esc ON rie.id_cct = esc.id_cct WHERE esc.id_municipio=".$id_municipio." AND esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."') as muyalto_t,
        (SELECT SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim rie INNER JOIN escuela esc ON rie.id_cct = esc.id_cct WHERE esc.id_municipio=".$id_municipio." AND esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."' AND rie.grado=1) as muyalto_1,
        (SELECT SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim rie INNER JOIN escuela esc ON rie.id_cct = esc.id_cct WHERE esc.id_municipio=".$id_municipio." AND esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."' AND rie.grado=2) as muyalto_2,
        (SELECT SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim rie INNER JOIN escuela esc ON rie.id_cct = esc.id_cct WHERE esc.id_municipio=".$id_municipio." AND esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."' AND rie.grado=3) as muyalto_2,
        (SELECT SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim rie INNER JOIN escuela esc ON rie.id_cct = esc.id_cct WHERE esc.id_municipio=".$id_municipio." AND esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."' AND rie.grado=4) as muyalto_4,
        (SELECT SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim rie INNER JOIN escuela esc ON rie.id_cct = esc.id_cct WHERE esc.id_municipio=".$id_municipio." AND esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."' AND rie.grado=5) as muyalto_5,
        (SELECT SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim rie INNER JOIN escuela esc ON rie.id_cct = esc.id_cct WHERE esc.id_municipio=".$id_municipio." AND esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."' AND rie.grado=6) as muyalto_6
        FROM riesgo_alumn_esc_bim rie
        INNER JOIN escuela esc ON rie.id_cct = esc.id_cct
        WHERE esc.id_municipio=".$id_municipio." AND esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."' GROUP BY esc.id_municipio
        ");
      }
      else {
        $query = $this->db->query("
        SELECT esc.id_municipio,
        (SELECT SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim rie INNER JOIN escuela esc ON rie.id_cct = esc.id_cct WHERE esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."') as muyalto_t,
        (SELECT SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim rie INNER JOIN escuela esc ON rie.id_cct = esc.id_cct WHERE esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."' AND rie.grado=1) as muyalto_1,
        (SELECT SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim rie INNER JOIN escuela esc ON rie.id_cct = esc.id_cct WHERE esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."' AND rie.grado=2) as muyalto_2,
        (SELECT SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim rie INNER JOIN escuela esc ON rie.id_cct = esc.id_cct WHERE esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."' AND rie.grado=3) as muyalto_2,
        (SELECT SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim rie INNER JOIN escuela esc ON rie.id_cct = esc.id_cct WHERE esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."' AND rie.grado=4) as muyalto_4,
        (SELECT SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim rie INNER JOIN escuela esc ON rie.id_cct = esc.id_cct WHERE esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."' AND rie.grado=5) as muyalto_5,
        (SELECT SUM(IF(((IF(rie.extraedad>1,1,0)) + (IF(rie.falta_bim".$bimestre.">7, 2,IF(rie.falta_bim".$bimestre.">3, 1,0))) + (IF(rie.cal_esp_bim".$bimestre."<6 AND rie.cal_esp_bim".$bimestre.">0,1,0)) + (IF(rie.cal_mat_bim".$bimestre."<6 and rie.cal_mat_bim".$bimestre.">0,1,0)))>2,1,0)) as muy_alto FROM riesgo_alumn_esc_bim rie INNER JOIN escuela esc ON rie.id_cct = esc.id_cct WHERE esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."' AND rie.grado=6) as muyalto_6
        FROM riesgo_alumn_esc_bim rie
        INNER JOIN escuela esc ON rie.id_cct = esc.id_cct
        WHERE esc.id_nivel=".$id_nivel." AND rie.ciclo='".$ciclo."' limit 1
        ");
      }

        return $query->result_array();

    }// get_riesgo_bar_grados_xidmuni()



}// Riesgo_alumn_esc_bim_model
