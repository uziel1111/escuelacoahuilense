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
     //  $this->db->get();
     // $str = $this->db->last_query();
     // echo $str; die();
      return  $this->db->get()->result_array();

    }// get_planea_xconttem_reac()

    function get_reactivos_xcctxcont($id_cct,$id_cont,$periodo,$idcampodis){

      $this->db->select('t1.id_reactivo,t2.n_reactivo, t2.reactivo as descripcion');
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
     //  $this->db->get();
     // $str = $this->db->last_query();
     // echo $str; die();
      return  $this->db->get()->result_array();

    }// get_reactivos_xcctxcont()

    function estadisticas_x_estadomunicipio($municipio, $nivel, $periodo, $idcampodis){
      $where = "";
      if($municipio != 0 ){
        $where = " AND m.`id_municipio` = {$municipio}";
      }
      $str_query = "SELECT id_contenido, contenidos, reactivos, total_reac_xua, total, alumnos_evaluados, ROUND((total* 100)/(total_reac_xua * alumnos_evaluados), 1)AS porcen_alum_respok FROM (

                          SELECT *, SUM(n_aciertos) AS total, SUM(n_almn_eval) AS alumnos_evaluados FROM (SELECT t3.id_contenido, t3.`contenido` AS contenidos,
                          GROUP_CONCAT(t2.n_reactivo) AS reactivos, COUNT(t3.id_contenido) AS total_reac_xua, t1.n_aciertos, t1.n_almn_eval
                          FROM municipio m
                          INNER JOIN escuela e ON e.id_municipio = m.id_municipio
                          INNER JOIN nivel n ON n.id_nivel = e.id_nivel
                          INNER JOIN planeaxesc_reactivo t1 ON t1.`id_ct` = e.`id_cct`
                          JOIN `planea_reactivo` `t2` ON `t1`.`id_reactivo`=`t2`.`id_reactivo`
                          JOIN `planea_contenido` `t3` ON `t2`.`id_contenido`= `t3`.`id_contenido`
                          JOIN `planea_unidad_analisis` `t4` ON `t3`.`id_unidad_analisis`=`t4`.`id_unidad_analisis`
                          JOIN `planea_camposdisciplinares` `t5` ON `t4`.`id_campodisiplinario`=`t5`.`id_campodisiplinario`

                          WHERE n.id_nivel = {$nivel}  AND `t1`.`id_periodo` = {$periodo}
                          AND `t5`.`id_campodisiplinario` = {$idcampodis} {$where}
                          GROUP BY t3.`id_contenido`, e.id_cct) AS datos
                          GROUP BY id_contenido
                        ) AS datos2";
        return $this->db->query($str_query)->result_array();
    }

    function estadisticas_x_region($zona, $nivel, $periodo, $idcampodis){
      $where = "";
      if($zona != 0 ){
        $where = " AND s.id_supervision = {$zona}";
      }
      $str_query = "SELECT id_contenido, contenidos, reactivos, total_reac_xua, total, alumnos_evaluados, ROUND((total* 100)/(total_reac_xua * alumnos_evaluados), 1)AS porcen_alum_respok FROM (

                          SELECT *, SUM(n_aciertos) AS total, SUM(n_almn_eval) AS alumnos_evaluados FROM (SELECT t3.id_contenido, t3.`contenido` AS contenidos,
                          GROUP_CONCAT(t2.n_reactivo) AS reactivos, COUNT(t3.id_contenido) AS total_reac_xua, t1.n_aciertos, t1.n_almn_eval
                          FROM supervision s
                          INNER JOIN escuela e ON e.id_supervision = s.id_supervision
                          INNER JOIN nivel n ON n.id_nivel = e.id_nivel
                          INNER JOIN planeaxesc_reactivo t1 ON t1.`id_ct` = e.`id_cct`
                          JOIN `planea_reactivo` `t2` ON `t1`.`id_reactivo`=`t2`.`id_reactivo`
                          JOIN `planea_contenido` `t3` ON `t2`.`id_contenido`= `t3`.`id_contenido`
                          JOIN `planea_unidad_analisis` `t4` ON `t3`.`id_unidad_analisis`=`t4`.`id_unidad_analisis`
                          JOIN `planea_camposdisciplinares` `t5` ON `t4`.`id_campodisiplinario`=`t5`.`id_campodisiplinario`

                          WHERE n.id_nivel = {$nivel}  AND `t1`.`id_periodo` = {$periodo}
                          AND `t5`.`id_campodisiplinario` = {$idcampodis} {$where}
                          GROUP BY t3.`id_contenido`, e.id_cct) AS datos
                          GROUP BY id_contenido
                        ) AS datos2";
        // echo $str_query; die();
        return $this->db->query($str_query)->result_array();
    }


    function get_reactivos_xcctxcont_municipio($id_municipio,$id_cont,$periodo,$idcampodis){
      $where = "";
      if($id_municipio != 0 || $id_municipio != '0'){
        $where = "AND m.id_municipio = {$id_municipio}";
      }
      $str_query = "SELECT *,((SUM(n_aciertos)*100)/SUM(n_almn_eval))AS porcen, IF(((SUM(n_aciertos)*100)/SUM(n_almn_eval)) <50, 'si','no') AS mostrar FROM(SELECT t1.n_almn_eval, t1.n_aciertos, t1.id_reactivo, t2.reactivo AS descripcion
        FROM municipio m
        INNER JOIN escuela e ON e.id_municipio = m.id_municipio
        INNER JOIN nivel n ON n.id_nivel = e.id_nivel
        INNER JOIN planeaxesc_reactivo t1 ON t1.`id_ct` = e.`id_cct`
        JOIN `planea_reactivo` `t2` ON `t1`.`id_reactivo`=`t2`.`id_reactivo`
        JOIN `planea_contenido` `t3` ON `t2`.`id_contenido`= `t3`.`id_contenido`
        JOIN `planea_unidad_analisis` `t4` ON `t3`.`id_unidad_analisis`=`t4`.`id_unidad_analisis`
        JOIN `planea_camposdisciplinares` `t5` ON `t4`.`id_campodisiplinario`=`t5`.`id_campodisiplinario`
        WHERE t3.id_contenido = {$id_cont}  AND t1.id_periodo = {$periodo} {$where}
        AND `t5`.`id_campodisiplinario` = {$idcampodis}) datos ";
      return $this->db->query($str_query)->result_array();

    }// get_reactivos_xcctxcont()


    function get_reactivos_xcctxcont_zona($id_zona,$id_cont,$periodo,$idcampodis){
      $where = "";
      if($id_zona != 0 || $id_zona != '0'){
        $where = "AND s.id_supervision = ${id_zona}";
      }
      $str_query = "SELECT *,((SUM(n_aciertos)*100)/SUM(n_almn_eval))AS porcen, IF(((SUM(n_aciertos)*100)/SUM(n_almn_eval)) <50, 'si','no') AS mostrar FROM(SELECT t1.n_almn_eval, t1.n_aciertos, t1.id_reactivo, t2.reactivo AS descripcion
                  FROM supervision s
                  INNER JOIN escuela e ON e.id_supervision = s.id_supervision
                  INNER JOIN nivel n ON n.id_nivel = e.id_nivel
                  INNER JOIN planeaxesc_reactivo t1 ON t1.`id_ct` = e.`id_cct`
                  JOIN `planea_reactivo` `t2` ON `t1`.`id_reactivo`=`t2`.`id_reactivo`
                  JOIN `planea_contenido` `t3` ON `t2`.`id_contenido`= `t3`.`id_contenido`
                  JOIN `planea_unidad_analisis` `t4` ON `t3`.`id_unidad_analisis`=`t4`.`id_unidad_analisis`
                  JOIN `planea_camposdisciplinares` `t5` ON `t4`.`id_campodisiplinario`=`t5`.`id_campodisiplinario`

                  WHERE t3.id_contenido = {$id_cont}  AND t1.id_periodo = {$periodo} {$where}
                  AND `t5`.`id_campodisiplinario` = {$idcampodis}) datos ";
                  return $this->db->query($str_query)->result_array();

    }// get_reactivos_xcctxcont()

     function zonaxnivel($nivel, $idsubsostenimiento){
      $str_query = "SELECT s.zona_escolar, s.id_supervision FROM escuela e
                    INNER JOIN supervision s ON e.id_supervision = s.id_supervision
                    WHERE e.id_nivel = {$nivel} AND e.id_subsostenimiento = {$idsubsostenimiento}
                    GROUP BY s.id_supervision
                    ORDER BY s.zona_escolar
                    ";
                    // echo $str_query; die();
      return $this->db->query($str_query)->result_array();
     }

     function subsostenimientoxnivel($nivel){
      $str_query = "SELECT s.id_subsostenimiento, s.subsostenimiento FROM escuela e
                  INNER JOIN subsostenimiento s ON e.id_subsostenimiento = s.id_subsostenimiento
                  WHERE e.id_nivel = {$nivel}
                  GROUP BY s.id_subsostenimiento";
      return $this->db->query($str_query)->result_array();
     }

}// Planeaxesc_reactivo_model
