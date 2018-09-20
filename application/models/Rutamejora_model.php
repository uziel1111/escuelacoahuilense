<?php
class Rutamejora_model extends CI_Model
{
    function __construct(){
        parent::__construct();
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
    }// guardaruta()

    function insert_accion($id_tprioritario, $id_ambito, $accion, $materiales, $id_responsable, $finicio, $ffin, $medicion){
    	$data2 = array(
			'id_tprioritario' => $id_tprioritario,
			'id_ambito' => $id_ambito,
			'accion' => $accion,
			'mat_insumos' => $materiales,
			'ids_responsables' => $id_responsable,// el formato debe ser una cadena separa por comas ejem(1, 2, 3) =modificar el combo de responsable para multiselect=
			'otro_responsable' => '', // validar si el valor seleccionado en el combo es otro y modificar el formulario
			'f_creacion' => date("Y-m-d"),
			'f_mod' => date("Y-m-d"),
			'accion_f_inicio' => $finicio,
			'accion_f_termino' => $ffin,
			'indcrs_medicion' => $medicion
		);
		return $this->db->insert('rm_accionxtproritario', $data2);
    }

    function getacciones($id_tprioritario){
    	return $this->db->get_where('rm_accionxtproritario', array('id_tprioritario' => $id_tprioritario))->result_array();
    }

    function guardaAvance($idactividad, $avance){
    	$data2 = array(
			'id_actividad' => $idactividad,
			'avance' => $avance,
			'f_mod_avance' => date(),
		);
		$this->db->insert('rm_avancexactividad', $data);
    }

    function eliminaActividad($idactividad){
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
	$this->db->select('tpxcct.id_tprioritario, tpxcct.orden, tpxcct.id_cct, tpxcct.id_prioridad, tpxcct.otro_problematica, tpxcct.otro_evidencia, rmp.prioridad');
	      $this->db->from('rm_tema_prioritarioxcct tpxcct');
	      $this->db->join('rm_c_prioridad AS rmp ',' rmp.id_prioridad = tpxcct.id_prioridad');
	      $this->db->where("tpxcct.id_cct = 4237");
	      $this->db->order_by("orden", "asc");
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
  ids_apoyo_req_se,
  otro_apoyo_req_se,
  especifique_apoyo_req
  ');
    $this->db->from('rm_tema_prioritarioxcct');
    $this->db->where("id_tprioritario = {$id_tprioritario}");
    return  $this->db->get()->result_array();
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
      $tables = array('rm_tema_prioritarioxcct', 'rm_accionxtproritario', 'rm_avance_xcctxtpxaccion');
      $this->db->where('id_tprioritario', $id_tprioritario);
      $this->db->delete($tables);
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

  function get_avances_tp_accionxcct($id_cct){
    $str_query = "SELECT
    tp.id_cct, tp.id_tprioritario, tpa.id_accion, p.prioridad, tpa.accion,
    IFNULL(av.cte1,0) as cte1,IFNULL(av.cte2,0) as cte2,IFNULL(av.cte3,0) as cte3,
    IFNULL(av.cte4,0) as cte4,IFNULL(av.cte5,0) as cte5,IFNULL(av.cte6,0) as cte6,
    IFNULL(av.cte7,0) as cte7,IFNULL(av.cte8,0) as cte8,IFNULL(av.cte9,0) as cte9,IFNULL(av.cte10,0) as cte10
FROM rm_tema_prioritarioxcct tp
    INNER JOIN rm_c_prioridad p ON tp.id_prioridad=p.id_prioridad
    LEFT JOIN rm_accionxtproritario tpa ON tp.id_tprioritario=tpa.id_tprioritario
    LEFT JOIN rm_avance_xcctxtpxaccion av ON tp.id_cct= av.id_cct AND tp.id_tprioritario = av.id_tprioritario AND tpa.id_accion =av.id_accion
    WHERE tp.id_cct= {$id_cct}
    ORDER BY tpa.id_accion DESC";
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

}// Rutamejora_model
