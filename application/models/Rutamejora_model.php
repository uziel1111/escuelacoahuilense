<?php
class Rutamejora_model extends CI_Model
{
    function __construct(){
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
    }

    function insert_tema_prioritario($id_cct,$id_prioridad,$objetivo1,$meta1,$objetivo2,$meta2,$problematica,$evidencia,$ids_progapoy,$otro_pa,$como_prog_ayuda,$obs_direct,$ids_apoyreq,$otroapoyreq,$especifiqueapyreq){
      // echo $ids_progapoy;die();
      $this->db->select('id_cct');
        $this->db->from('rm_tema_prioritarioxcct');
        $this->db->where("id_cct = '{$id_cct}'");
        $orden = $this->db->get()->num_rows()+1;

      $date=date("Y-m-d");
    	$this->db->trans_start();
		$data = array(
			'id_cct' => $id_cct,
			'id_prioridad' => $id_prioridad,
			'objetivo1' => $objetivo1,
			'objetivo2' => $objetivo2,
      'meta1' => $meta1,
      'meta2' => $meta2,
			'otro_problematica' => $problematica,
			'otro_evidencia' => $evidencia,
			'ids_programapoyo' => $ids_progapoy,
			'otro_pa' => $otro_pa,
			'como_ayudan_pa' => $como_prog_ayuda,
			'obs_direc' => $obs_direct,
			'ids_apoyo_req_se' => $ids_apoyreq,
      'otro_apoyo_req_se' => $otroapoyreq,
      'especifique_apoyo_req' => $especifiqueapyreq,
			'f_creacion' => $date,
      'orden' => $orden,
			);
		$this->db->insert('rm_tema_prioritarioxcct', $data);
    $id_insertado_tmp = $this->db->insert_id();
    $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return false;
        }else{
            return $id_insertado_tmp;
        }
    	$str_query = "";
					// echo $str_query; die();
      	return $this->db->query($str_query)->result_array();
    }// guardaruta()

    function insert_accion($id_tprioritario, $id_ambito, $accion, $materiales, $ids_responsables, $finicio, $ffin, $medicion, $otroresponsable, $existotroresp){
    	$data2 = array(
			'id_tprioritario' => $id_tprioritario,
			'id_ambito' => $id_ambito,
			'accion' => $accion,
			'mat_insumos' => $materiales,
			'ids_responsables' => $ids_responsables,// el formato debe ser una cadena separa por comas ejem(1, 2, 3) =modificar el combo de responsable para multiselect=
			'otro_responsable' => ($existotroresp == true)? $otroresponsable : null,
			'f_creacion' => date("Y-m-d"),
			'f_mod' => date("Y-m-d"),
			'accion_f_inicio' => $finicio,
			'accion_f_termino' => $ffin,
			'indcrs_medicion' => $medicion
		);
		return $this->db->insert('rm_accionxtproritario', $data2);
    }

    function getacciones($id_tprioritario){
    	$str_query = "SELECT * FROM rm_accionxtproritario rma
						INNER JOIN rm_c_ambito ambito ON ambito.id_ambito = rma.id_ambito
						WHERE rma.id_tprioritario = {$id_tprioritario}";
		return $this->db->query($str_query)->result_array();
    	// return $this->db->get_where('rm_accionxtproritario', array('id_tprioritario' => $id_tprioritario))->result_array();
    }

    function guardaAvance($idactividad, $avance){
    	$data2 = array(
			'id_actividad' => $idactividad,
			'avance' => $avance,
			'f_mod_avance' => date(),
		);
		$this->db->insert('rm_avancexactividad', $data);
    }

    function deleteaccion($id_accion, $id_tprioritario){
    	$this->db->trans_start();
    	$this->db->where('id_accion', $id_accion);
    	$this->db->where('id_tprioritario', $id_tprioritario);
		$this->db->delete('rm_avance_xcctxtpxaccion');
		$this->db->where('id_accion', $id_accion);
		$this->db->where('id_tprioritario', $id_tprioritario);
		$this->db->delete('rm_accionxtproritario');
      // $str = $this->db->last_query();
      // echo $str; die();
		$this->db->trans_complete();

	    if ($this->db->trans_status() === FALSE)
	    {
	        return false;
	    }else{
	        return true;
	    }
    }

    function eliminaRuta($idruta){
    	$this->db->trans_start();
    	$this->db->where('id_actividad', $idactividad);
		$this->db->delete('rm_avancexactividad');
		$this->db->where('id_actividad', $idactividad);
		$this->db->delete('rm_tema_prioritarioxcct');
		$this->db->trans_complete();

	    if ($this->db->trans_status() === FALSE)
	    {
	        return false;
	    }else{
	        return true;
	    }
    }

    function recupera_ruta($idruta){

    	$str_query = "SELECT * FROM rm_metaxcct mxcct
						INNER JOIN  rm_tema_prioritarioxcct temaxcct ON mxcct.id_cct = temaxcct.id_cct
						WHERE temaxcct.id_cct = 1";

		return $this->db->query($str_query)->result_array();
    }

    function getdatoscct($cct, $turno){
		$this->db->select('e.id_cct, e.cve_centro, e.nombre_centro, e.id_turno_single, ts.turno_single, n.nivel');
      $this->db->from('escuela e');
      $this->db->join('turno_single AS ts ',' e.id_turno_single = ts.id_turno_single');
      $this->db->join('nivel AS n ', 'n.id_nivel = e.id_nivel');
      $this->db->where("e.cve_centro = '{$cct}'");
      $this->db->where("ts.id_turno_single = {$turno}");
      // $this->db->get();
      // echo $this->db->last_query();die();
      return  $this->db->get()->result_array();
    }

    function existe_misionxidcct($id_cct, $id_ciclo){
		$this->db->select('id_cct');
      $this->db->from('rm_misionxcct');
      $this->db->where("id_cct = '{$id_cct}'");
      $this->db->where("id_ciclo = {$id_ciclo}");
      if ($this->db->get()->num_rows()>0) {
        return  true;
      }
      else {
        return false;
      }
    }

  function insert_misionxidcct($id_cct,$misioncct, $id_ciclo){
     $date=date("Y-m-d");
    $this->db->trans_start();
      $data = array(
          'id_cct' => $id_cct,//obtenemos el id de la cct cargada en la sesion
          'mision' => $misioncct,
          'id_ciclo' => $id_ciclo, //de donde obtenemos el idciclo?
          'f_crea' => $date,
  );
  $this->db->insert('rm_misionxcct', $data);
  $this->db->trans_complete();
  if ($this->db->trans_status() === FALSE)
      {
          return false;
      }else{
          return true;
      }
  }

  function update_misionxidcct($id_cct,$misioncct, $id_ciclo){
    $date=date("Y-m-d");
    $this->db->trans_start();
    $data = array(
        'mision' => $misioncct,
        'id_ciclo' => $id_ciclo,
        'f_mod' => $date
    );

    $this->db->where('id_cct', $id_cct);
    $this->db->update('rm_misionxcct', $data);
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE)
    {
         return false;
     }else{
         return true;
    }
  }

  function getTemasxcct($idcct){
    $str_query ="SELECT * FROM rm_tema_prioritarioxcct WHERE id_cct = {$idcct}";
    // echo $str_query;die();
    return $this->db->query($str_query)->result_array();
  }

  // function actualizaTP(){
  //   $str_query ="SELECT * FROM rm_tema_prioritarioxcct WHERE id_cct = {$idcct}";
  //   return $this->db->query($str_query)->result_array();
  // }

  function get_misionxcct($id_cct, $id_ciclo){
  $this->db->select('mision');
    $this->db->from('rm_misionxcct');
    $this->db->where("id_cct = '{$id_cct}'");
    $this->db->where("id_ciclo = {$id_ciclo}");

    return $this->db->get()->row('mision');

  }

  function update_order($orden, $idtema){
    $data = array(
        'orden' => $orden
    );

    $this->db->where('id_tprioritario', $idtema);
    $this->db->update('rm_tema_prioritarioxcct', $data);
  }

  function getrutasxcct($idcct){
	$this->db->select("tpxcct.id_tprioritario, tpxcct.orden, tpxcct.id_cct, tpxcct.id_prioridad, tpxcct.otro_problematica, tpxcct.otro_evidencia, rmp.prioridad,
	SUM(IF(ISNULL(acc.id_accion),0,1)) as n_acciones,IF((ISNULL(tpxcct.obs_supervisor) || tpxcct.obs_supervisor = ''),'','fas fa-check-circle') AS obs_supervisor,tpxcct.path_evidencia,
IF ((ISNULL(tpxcct.path_evidencia) || tpxcct.path_evidencia = ''),'none','') as trae_path");
	      $this->db->from('rm_tema_prioritarioxcct tpxcct');
	      $this->db->join('rm_c_prioridad AS rmp ',' rmp.id_prioridad = tpxcct.id_prioridad');
        $this->db->join('rm_accionxtproritario as acc', 'tpxcct.id_tprioritario = acc.id_tprioritario', 'left');
	      $this->db->where("tpxcct.id_cct = {$idcct}");
        $this->db->group_by("tpxcct.id_tprioritario");
	      $this->db->order_by("tpxcct.orden", "asc");
    //      $this->db->get();
    // $str = $this->db->last_query();
    // echo $str; die();
	      return  $this->db->get()->result_array();
  }

function  get_datos_edith_tp($id_tprioritario){
  $this->db->select('
  id_tprioritario,
  id_prioridad,
  objetivo1,
  objetivo2,
  meta1,
  meta2,
  otro_problematica,
  otro_evidencia,
  ids_programapoyo,
  otro_pa,
  como_ayudan_pa,
  obs_direc,
  obs_supervisor,
  ids_apoyo_req_se,
  otro_apoyo_req_se,
  especifique_apoyo_req,
  path_evidencia
  ');
    $this->db->from('rm_tema_prioritarioxcct');
    $this->db->where("id_tprioritario = {$id_tprioritario}");
    return  $this->db->get()->result_array();
  }

  function  get_obs_super_tp($id_tprioritario){
    $this->db->select('
    obs_supervisor
    ');
      $this->db->from('rm_tema_prioritarioxcct');
      $this->db->where("id_tprioritario = {$id_tprioritario}");
      return  $this->db->get()->row('obs_supervisor');

    }

  function update_tema_prioritario($id_cct,$id_tprioritario,$id_prioridad,$objetivo1,$meta1,$objetivo2,$meta2,$problematica,$evidencia,$ids_progapoy,$otro_pa,$como_prog_ayuda,$obs_direct,$ids_apoyreq,$otroapoyreq,$especifiqueapyreq){
    // echo $ids_progapoy;die();

    $date=date("Y-m-d");
    $this->db->trans_start();
  $data = array(
    'id_prioridad' => $id_prioridad,
    'objetivo1' => $objetivo1,
    'objetivo2' => $objetivo2,
    'meta1' => $meta1,
    'meta2' => $meta2,
    'otro_problematica' => $problematica,
    'otro_evidencia' => $evidencia,
    'ids_programapoyo' => $ids_progapoy,
    'otro_pa' => $otro_pa,
    'como_ayudan_pa' => $como_prog_ayuda,
    'obs_direc' => $obs_direct,
    'ids_apoyo_req_se' => $ids_apoyreq,
    'otro_apoyo_req_se' => $otroapoyreq,
    'especifique_apoyo_req' => $especifiqueapyreq,
    'f_mod' => $date,
    );
    $this->db->where('id_tprioritario', $id_tprioritario);
    $this->db->where('id_cct', $id_cct);
  $this->db->update('rm_tema_prioritarioxcct', $data);
      $this->db->trans_complete();

      if ($this->db->trans_status() === FALSE)
      {
          return false;
      }else{
          return true;
      }
    $str_query = "";
        // echo $str_query; die();
      return $this->db->query($str_query)->result_array();
  }

  function delete_tema_prioritario($id_cct,$id_tprioritario){

      $this->db->trans_start();
      $tables = array('rm_avance_xcctxtpxaccion','rm_accionxtproritario', 'rm_objetivo', 'rm_tema_prioritarioxcct');
      $this->db->where('id_tprioritario', $id_tprioritario);
      $this->db->delete($tables);
      $this->db->trans_complete();
      if ($this->db->trans_status() === FALSE)
      {
          return false;
      }else{
          return true;
      }
    // $str_query = "";
    //     // echo $str_query; die();
    //   return $this->db->query($str_query)->result_array();
  }

  function get_avances_tp_accionxcct($id_cct){
    $str_query = "SELECT
    tp.id_cct, tp.id_tprioritario, tpa.id_accion, p.prioridad, tpa.accion,
    IFNULL(av.cte1,0) as cte1,IFNULL(av.cte2,0) as cte2,IFNULL(av.cte3,0) as cte3,
    IFNULL(av.cte4,0) as cte4,IFNULL(av.cte5,0) as cte5,IFNULL(av.cte6,0) as cte6,
    IFNULL(av.cte7,0) as cte7,IFNULL(av.cte8,0) as cte8,IFNULL(av.cte9,0) as cte9,IFNULL(av.cte10,0) as cte10, '' as icono
    FROM rm_tema_prioritarioxcct tp
    INNER JOIN rm_c_prioridad p ON tp.id_prioridad=p.id_prioridad
    LEFT JOIN rm_accionxtproritario tpa ON tp.id_tprioritario=tpa.id_tprioritario
    LEFT JOIN rm_avance_xcctxtpxaccion av ON tp.id_cct= av.id_cct AND tp.id_tprioritario = av.id_tprioritario AND tpa.id_accion =av.id_accion
    WHERE tp.id_cct= {$id_cct}
    ORDER BY tp.id_tprioritario, tpa.id_accion DESC";
        // echo $str_query; die();
    return $this->db->query($str_query)->result_array();

  }

  function existe_avance($var_id_cct,$var_id_idtp,$var_id_idacc){
    $this->db->select('id_cct');
      $this->db->from('rm_avance_xcctxtpxaccion');
      $this->db->where("id_cct = '{$var_id_cct}'");
      $this->db->where("id_tprioritario = '{$var_id_idtp}'");
      $this->db->where("id_accion = '{$var_id_idacc}'");
   if ($this->db->get()->num_rows() == 0)
       {
           return false;
       }else{
           return true;
       }

  }

  function insert_avance($var_id_cct,$var_id_idtp,$var_id_idacc){
     $this->db->trans_start();
       $data = array(
           'id_cct' => $var_id_cct,//obtenemos el id de la cct cargada en la sesion
           'id_tprioritario' => $var_id_idtp,
           'id_accion' => $var_id_idacc, //de donde obtenemos el idciclo?
   );
   $this->db->insert('rm_avance_xcctxtpxaccion', $data);
   $this->db->trans_complete();
   if ($this->db->trans_status() === FALSE)
       {
           return false;
       }else{
           return true;
       }

  }

  function update_avance_xcte($val_slc,$var_id_cte,$var_id_cct,$var_id_idtp,$var_id_idacc){
    $date=date("Y-m-d");
     $this->db->trans_start();
       $data = array(
           "cte{$var_id_cte}" => $val_slc,//
           "f_mod{$var_id_cte}" => $date,
   );
   $this->db->where("id_cct = '{$var_id_cct}'");
   $this->db->where("id_tprioritario = '{$var_id_idtp}'");
   $this->db->where("id_accion = '{$var_id_idacc}'");
   $this->db->update('rm_avance_xcctxtpxaccion', $data);
   $this->db->trans_complete();
   if ($this->db->trans_status() === FALSE)
       {
           return false;
       }else{
           return true;
       }

  }

  function edit_accion($id_accion, $id_tprioritario){
  	// echo $id_accion; die();
  	return $this->db->get_where('rm_accionxtproritario', array('id_accion' => $id_accion, 'id_tprioritario' => $id_tprioritario))->result_array();
  }

  function update_accion($id_accion, $id_tprioritario, $id_ambito, $accion, $materiales, $ids_responsables, $finicio, $ffin, $medicion, $otroresponsable, $existotroresp){
  	$data2 = array(
			'id_tprioritario' => $id_tprioritario,
			'id_ambito' => $id_ambito,
			'accion' => $accion,
			'mat_insumos' => $materiales,
			'ids_responsables' => $ids_responsables,// el formato debe ser una cadena separa por comas ejem(1, 2, 3) =modificar el combo de responsable para multiselect=
			'otro_responsable' => ($existotroresp == true)? $otroresponsable : null,
			'f_creacion' => date("Y-m-d"),
			'f_mod' => date("Y-m-d"),
			'accion_f_inicio' => $finicio,
			'accion_f_termino' => $ffin,
			'indcrs_medicion' => $medicion
		);
		$this->db->where('id_accion', $id_accion);
  		return $this->db->update('rm_accionxtproritario', $data2);
}
  function get_indicadoresxcct($id_cct,$nombre_nivel,$bimestre,$anio){
    $data = array();
    $str_query1 = "SELECT alumn_t_t as n_alumn911 FROM estadistica_e_indicadores_xcct WHERE id_cct={$id_cct} and id_ciclo=2";
    $str_query2 = "SELECT
      COUNT(curp) as n_alumn_ce,
      IFNULL(SUM(IF(((IF(extraedad>1,1,0)) + (IF(falta_bim1>7, 2,IF(falta_bim1>3, 1,0))) + (IF(espanol_b1<6 AND espanol_b1>0,1,0)) + (IF(matematicas_b1<6 and matematicas_b1>0,1,0)))>2,1,0)), 0) as muy_alto,
			SUM(extraedad) as n_alum_extraedad
      FROM alumnos_riesgo_primaria WHERE id_cct={$id_cct} AND ciclo='2017-2018'";
    $str_query3 = "SELECT lyc_i, mat_i FROM planeaxescuela WHERE id_cct={$id_cct} AND periodo='2016'";


    $data['n_alum911'] = $this->db->query($str_query1)->row('n_alumn911');
    $data['n_alumct'] = $this->db->query($str_query2)->row('n_alumn_ce');
    $data['n_alum_muyaltoriesgo'] = $this->db->query($str_query2)->row('muy_alto');
    $data['n_alum_extraedad'] = $this->db->query($str_query2)->row('n_alum_extraedad');
    $data['lyc1'] = $this->db->query($str_query3)->row('lyc_i');
    $data['mat1'] = $this->db->query($str_query3)->row('mat_i');

    return $data;
  }

  function get_datos_modal($id_tprioritario){
  	$str_query = "SELECT p.prioridad, txcct.otro_problematica, otro_evidencia FROM rm_tema_prioritarioxcct txcct
		INNER JOIN rm_c_prioridad p ON p.id_prioridad = txcct.id_prioridad
		WHERE id_tprioritario = {$id_tprioritario}";
	return $this->db->query($str_query)->result_array();
  }

  function insert_evidencia($id_cct,$estatus,$ruta_archivos_save){
    $this->db->trans_start();
      $data = array(
        "path_evidencia" => $ruta_archivos_save,
      );
      $this->db->where("id_cct = '{$id_cct}'");
      $this->db->where("id_tprioritario = '{$estatus}'");
      $this->db->update('rm_tema_prioritarioxcct', $data);
      $this->db->trans_complete();
      if ($this->db->trans_status() === FALSE) {
        return false;
      }else{
        return true;
      }
  }

    function get_url_evidencia($id_cct,$id_tprioritario){
      $this->db->select('path_evidencia');
        $this->db->from('rm_tema_prioritarioxcct');
        $this->db->where("id_cct = '{$id_cct}'");
        $this->db->where("id_tprioritario = {$id_tprioritario}");

        return $this->db->get()->row('path_evidencia');

    }

    function get_avances_tp_accionxcct_fechas($id_ciclo){
      $date=date("Y-m-d");
      $str_query = "SELECT
      IF(curdate()>cte1_f_ini AND curdate()<cte1_f_fin, 'TRUE', 'FALSE') AS cte1_var,
      IF(curdate()>cte2_f_ini AND curdate()<cte2_f_fin, 'TRUE', 'FALSE') AS cte2_var,
      IF(curdate()>cte3_f_ini AND curdate()<cte3_f_fin, 'TRUE', 'FALSE') AS cte3_var,
      IF(curdate()>cte4_f_ini AND curdate()<cte4_f_fin, 'TRUE', 'FALSE') AS cte4_var,
      IF(curdate()>cte5_f_ini AND curdate()<cte5_f_fin, 'TRUE', 'FALSE') AS cte5_var,
      IF(curdate()>cte6_f_ini AND curdate()<cte6_f_fin, 'TRUE', 'FALSE') AS cte6_var,
      IF(curdate()>cte7_f_ini AND curdate()<cte7_f_fin, 'TRUE', 'FALSE') AS cte7_var,
      IF(curdate()>cte8_f_ini AND curdate()<cte8_f_fin, 'TRUE', 'FALSE') AS cte8_var,
      IF(curdate()>cte9_f_ini AND curdate()<cte9_f_fin, 'TRUE', 'FALSE') AS cte9_var,
      IF(curdate()>cte10_f_ini AND curdate()<cte10_f_fin, 'TRUE', 'FALSE') AS cte10_var
      FROM rm_f_mod_avancexaccionxcte WHERE id_ciclo={$id_ciclo} ";
          // echo $str_query; die();
      return $this->db->query($str_query)->result_array();

    }

    //FUNCIONAMIENTO Y VALIDACION PARA SUPERVISOR BY LUIS SANCHEZ... all reserved rights

    function valida_supervisor($cct){
    	$str_query = "SELECT * FROM supervision WHERE cct_supervision = '{$cct}'";
    	return $this->db->query($str_query)->result_array();
    }

    function inserta_mensaje_super($idtema, $mensaje_super){
    	$data = array(
	        'obs_supervisor' => $mensaje_super
	    );

	    $this->db->where('id_tprioritario', $idtema);
	    return $this->db->update('rm_tema_prioritarioxcct', $data);
    }

    function getdatossupervicion($cct){
      $str_query = "SELECT s.id_supervision, s.zona_escolar, s.nombre_supervision, '{$cct}' AS cve_centro
				      FROM supervision s
				       WHERE s.id_supervision = '{$cct}'";
     return $this->db->query($str_query)->result_array();
    }

    function get_coment_super($idtemap){
    	$str_query = "SELECT obs_supervisor FROM rm_tema_prioritarioxcct WHERE id_tprioritario = {$idtemap}";
    	return $this->db->query($str_query)->result_array();
    }

    //Nuevas funciones para RM Ismael Castillo
    function insertaObjetivo($id_cct, $id_prioridad, $objetivo, $id_tprioritario){
        $objetivos = array(
          'objetivo' => $objetivo,
          'id_tprioritario' => $id_tprioritario,
          'orden' => 1,
          'id_cct'=> $id_cct
        );

        if($this->db->insert('rm_objetivo', $objetivos)){
          $response = array(
            'status' => true,
            'idtemaprioritario' => $id_tprioritario
          );
        }else{
            $response = array(
              'status' => false,
              'idtemaprioritario' => 0
            );
        }
          return $response;
    }

    function insertaCreaObjetivo($id_cct, $id_prioridad, $objetivo, $id_subprioridad){
      $this->db->select('id_cct');
      $this->db->from('rm_tema_prioritarioxcct');
      $this->db->where('id_cct', $id_cct);
      $orden = $this->db->get()->num_rows()+1;

      $this->db->trans_start();
      if($id_prioridad == 1){
        $datos = array(
          'id_cct' => $id_cct,
          'id_prioridad' => $id_prioridad,
          'id_subprioridad' => $id_subprioridad,
          'orden' => $orden
        );
      }else{
        $datos = array(
          'id_cct' => $id_cct,
          'id_prioridad' => $id_prioridad,
          'orden' => $orden
        );
      }

      // echo "<pre>";print_r($datos);die();
      $this->db->insert('rm_tema_prioritarioxcct', $datos);
      $id_tprioritario = $this->db->insert_id(); // Recuperamos el ultimo id generado

      $this->db->trans_complete();
      $response = array();

      if ($this->db->trans_status() === FALSE)
      {
        $response = array(
          'status' => false,
          'idtemaprioritario' => 0
        );
          return $response;
      }else{
        $objetivos = array(
          'objetivo' => $objetivo,
          'id_tprioritario' => $id_tprioritario,
          'orden' => $orden,
          'id_cct'=> $id_cct
        );
        $this->db->insert('rm_objetivo', $objetivos);
          $response = array(
          'status' => true,
          'idtemaprioritario' => $id_tprioritario
        );
          return $response;
      }
    }

    function actualizaObjetivo($id_objetivo, $objetivo){
      $datos = array('objetivo' => $objetivo );

      // echo "<pre>";print_r($datos);die();
      $this->db->where('id_objetivo', $id_objetivo);
      $this->db->update('rm_objetivo', $datos);
    }



    function getSubprioridad($idprioridad){
      $str_query ="select id_subprioridad, subprioridad from rm_c_subprioridad where id_prioridad = {$idprioridad}";
      return $this->db->query($str_query)->result_array();
    }

    function getIndicadorEspecial($id_prioridad, $id_nivel, $id_subprioridad){
      $especial = "";
      $condicion = "";
      if ($id_prioridad == 1) {
        $especial = "inner join rm_c_subprioridad subp on ind.id_subprioridad = subp.id_subprioridad";
        $condicion = " and ind.id_subprioridad = {$id_subprioridad}";
      }

      $str_query = "select ind.id_indicador, ind.indicador from rm_c_indicador ind
                    {$especial}
                    where ind.id_c_prioridad = {$id_prioridad} and ind.nivel = {$id_nivel} {$condicion}";
      // echo "<pre>";print_r($str_query);die();
      return $this->db->query($str_query)->result_array();
    }

    function getMetricas($id_indicador){
      $str_query = "select ind.formula from rm_c_indicador ind where ind.id_indicador = {$id_indicador}";
      return $this->db->query($str_query)->result_array();
    }

    function getObjetivos($id_cct, $idtpriotario, $idprioridad, $idsubprioridad){
      $inner = "";
      $where = "";

      if($idsubprioridad != 0){
        $inner = "INNER JOIN rm_c_subprioridad sub ON sub.id_prioridad = tprio.id_prioridad";
        $where = " AND sub.id_subprioridad = {$idsubprioridad}";
      }

      $str_query = "SELECT * FROM rm_tema_prioritarioxcct tprio
                    INNER JOIN rm_objetivo obj ON obj.id_tprioritario = tprio.id_tprioritario
                    {$inner}
                    WHERE tprio.id_cct = {$id_cct} AND tprio.id_tprioritario ={$idtpriotario} AND tprio.id_prioridad = {$idprioridad} {$where}";
      // echo "<pre>";print_r($str_query);die();
      return $this->db->query($str_query)->result_array();
    }

    function grabarTema($id_cct, $id_tprioritario, $problematica, $evidencia, $comentario_dir){
      $date = date("Y-m-d");

      //Iniciar transaccion
      $datos = array(
        'id_tprioritario' => $id_tprioritario,
        'otro_problematica' => $problematica,
        'otro_evidencia' => $evidencia,
        'obs_direc' => $comentario_dir,
        'f_creacion' => $date
      );

      // echo "<pre>";print_r($datos);die();
      $this->db->where('id_tprioritario', $id_tprioritario);
      $this->db->where('id_cct', $id_cct);
      $this->db->update('rm_tema_prioritarioxcct', $datos);
      $id_insertado_tmp = $this->db->insert_id();

      return true;

    }

    function edith_tp($id_tprioritario){
    $str_query = "
        SELECT obj.id_tprioritario, tprioritario.id_prioridad, tprioritario.id_subprioridad,  tprioritario.otro_problematica,
        tprioritario.otro_evidencia, tprioritario.path_evidencia,
        tprioritario.obs_supervisor, tprioritario.obs_direc, obj.id_objetivo, obj.objetivo
        FROM rm_tema_prioritarioxcct tprioritario
        INNER JOIN rm_objetivo obj ON obj.id_tprioritario = tprioritario.id_tprioritario
        WHERE tprioritario.id_tprioritario = {$id_tprioritario}
    ";
    // echo "<pre>";print_r($str_query); die();
    return $this->db->query($str_query)->result_array();
  }


    function getObjetivo($id_objetivo){
      $str_query = "SELECT objetivo FROM rm_objetivo WHERE id_objetivo = {$id_objetivo}";
      // echo "<pre>";print_r($str_query); die();

      return $this->db->query($str_query)->result_array();
    }

    function borrarObjetivo($id_objetivo){
      $this->db->where('id_objetivo', $id_objetivo);
      $this->db->delete('rm_objetivo');
    }

    function deleteTP($id_tprioritario){
      // echo $id_tprioritario;die();
      $this->db->trans_start();
      $tables = array('rm_avance_xcctxtpxaccion','rm_accionxtproritario', 'rm_objetivo', 'rm_tema_prioritarioxcct');
      $this->db->where('id_tprioritario', $id_tprioritario);
      $this->db->delete($tables);
      $this->db->trans_complete();

      if ($this->db->trans_status() === FALSE){
        return false;
      }else{
        return true;
      }
    }

    function getEvidencia($id_tprioritario){
      $str_query = "SELECT path_evidencia FROM rm_tema_prioritarioxcct WHERE id_tprioritario = {$id_tprioritario}";

      return $this->db->query($str_query)->result_array();
    }

    function deleteEvidencia($id_tprioritario){
      $data = array(
        'path_evidencia' => ''
      );
      $this->db->where('id_tprioritario', $id_tprioritario);
      return $this->db->update('rm_tema_prioritarioxcct', $data);
    }

    function getPrioridades($id_cct){
        $str_query = "SELECT t1.orden, t1.id_tprioritario, t1.id_prioridad, t1.id_subprioridad, t1.prioridad, t1.num_objetivos,   SUM(IF(ISNULL(ap.id_accion),0,1)) as num_acciones
        FROM (SELECT tp.id_prioridad, tp.id_subprioridad, tp.id_tprioritario, tp.orden, p.prioridad, ob.objetivo,
        SUM(IF(ISNULL(ob.id_objetivo),0,1)) as num_objetivos, ob.id_objetivo
        FROM rm_tema_prioritarioxcct tp
        INNER JOIN rm_c_prioridad p ON p.id_prioridad = tp.id_prioridad
        LEFT JOIN rm_objetivo ob ON ob.id_tprioritario = tp.id_tprioritario
        WHERE tp.id_cct = {$id_cct}
        GROUP BY tp.id_tprioritario) AS t1
        LEFT JOIN rm_accionxtproritario ap ON ap.id_objetivos = t1.id_objetivo
        GROUP BY t1.id_tprioritario
        ORDER BY t1.orden";
      // echo "<pre>";print_r($str_query);die();
      return $this->db->query($str_query)->result_array();
    }

    function insertaTprioritarios($id_cct){

      $data = array (
                  array(  'id_cct' => $id_cct,
                          'id_prioridad'=> 1,
                          'id_subprioridad'=> 1,
                       ),

                  array(  'id_cct' => $id_cct,
                          'id_prioridad'=> 1,
                          'id_subprioridad'=> 2,
                       ),

                  array(  'id_cct' => $id_cct,
                          'id_prioridad'=> 2,
                          'id_subprioridad'=> '',
                       ),

                  array(  'id_cct' => $id_cct,
                          'id_prioridad'=> 3,
                          'id_subprioridad'=> '',
                       ),

                  array(  'id_cct' => $id_cct,
                          'id_prioridad'=> 4,
                          'id_subprioridad'=> '',
                        ),

                  array(  'id_cct' => $id_cct,
                          'id_prioridad'=> 5,
                          'id_subprioridad'=> '',
                  ),
              );
      // echo "<pre>";print_r($data);die();
      $this->db->insert_batch('rm_tema_prioritarioxcct',$data);

    }

    function evidenciaObjInicio($id_objetivo, $id_cct, $ruta_archivos_save, $id_tprioritario){
      $this->db->trans_start();
        $data = array(
          "path_ev_inicio" => $ruta_archivos_save,
        );
        $this->db->where("id_objetivo = '{$id_objetivo}'");
        $this->db->where("id_cct = '{$id_cct}'");
        $this->db->where("id_tprioritario = '{$id_tprioritario}'");
        $this->db->update('rm_objetivo', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
          return false;
        }else{
          return true;
        }
    }

    function evidenciaObjFin($id_objetivo, $id_cct, $ruta_archivos_save, $id_tprioritario){
      $this->db->trans_start();
        $data = array(
          "path_ev_fin" => $ruta_archivos_save,
        );
        $this->db->where("id_objetivo = '{$id_objetivo}'");
        $this->db->where("id_cct = '{$id_cct}'");
        $this->db->where("id_tprioritario = '{$id_tprioritario}'");
        $this->db->update('rm_objetivo', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
          return false;
        }else{
          return true;
        }
    }

    function getEvidenciaInicio($id_objetivo){
      $str_query = "SELECT path_ev_inicio, path_ev_fin FROM rm_objetivo WHERE id_objetivo = {$id_objetivo}";
      return $this->db->query($str_query)->result_array();
    }

}// Rutamejora_model
