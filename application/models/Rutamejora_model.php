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

    function guardaactividad($idtemaprioritario, $actividad, $recursos, $idambito, $idresponsables, $otroresponsable, $f_inicio, $f_termino){
    	$data2 = array(
			'id_tprioritario' => $idtemaprioritario,
			'actividad' => $actividad,
			'recurso' => $recursos,
			'id_ambito' => $idambito,
			'id_responsables' => $idresponsables,// el formato debe ser una cadena separa por comas ejem(1, 2, 3) =modificar el combo de responsable para multiselect=
			'otro_responsable' => $otroresponsable, // validar si el valor seleccionado en el combo es otro y modificar el formulario
			'f_creacion' => date(),
			'f_mod' => date(),
			'f_inicio' => $f_inicio,
			'f_termino' => $f_termino,
		);
		$this->db->insert('rm_tema_prioritarioxcct', $data);
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

}// Rutamejora_model
