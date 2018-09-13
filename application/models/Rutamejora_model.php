<?php
class Rutamejora_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function guardaruta($mision, $prioridad, $objetivo1, $objetivo2, $problematicaxp, $evidenciasdp, $programaseducativos, $comoayudanpa, $observacionesdirector, $queapoyorequerimos){

    	$this->db->trans_start();
        $data = array(
		        'id_cct' => 1,//obtenemos el id de la cct cargada en la sesion
		        'meta' => $mision,
		        'id_ciclo' => 2017 //de donde obtenemos el idciclo?
		);
		$this->db->insert('rm_metaxcct', $data);
		$data2 = array(
			'id_cct' => 1, //obtenemos el id de la cct cargada en la sesion
			'id_prioridad' => $prioridad, 
			'objetivo1' => $objetivo1,
			'objetivo2' => $objetivo2
			'id_problematica' => $problematicaxp,
			'otro_problematica' => $otro, // validar si el valor seleccionado en el combo es otro y modificar el formulario
			'ids_evidencias' => $evidenciasdp, // el formato debe ser una cadena separa por comas ejem(1, 2, 3) =modificar el combo de evidencias para multiselect=
			'otro_evidencia' => $otro, // validar si el valor seleccionado en el combo de evidencias es otro y modificar el formulario con un nueva campo de texto
			'ids_programaapoyo' => $programaseducativos, // el formato debe ser una cadena separa por comas ejem(1, 2, 3)
			'otro_apoyo_req_se' => $otro, // validar si el valor seleccionado en el combo de programas es otro y modificar el formulario con un nueva campo de texto
			'especifique_apoyo_req' => $queapoyorequerimos, // el formato debe ser una cadena separa por comas ejem(1, 2, 3)
			'f_cracion' => date(),
			'f_mod' => date(),
			//falta especificar campos en la base de datos para almacenar las observaciones del director, como ayudan los programas de apoyo y cuando en el combo de que apoyo requerimos es otro
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
			'id_ambito' => $idambito
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



}// Rutamejora_model
