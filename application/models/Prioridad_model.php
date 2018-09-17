<?php
class Prioridad_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_prioridades(){
      $str_query = "SELECT id_prioridad, prioridad FROM rm_c_prioridad";
      return $this->db->query($str_query)->result_array();
    }// get_prioridades()

}// Prioridad_model
