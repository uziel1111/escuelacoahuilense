<?php
class Municipio_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function all(){
            return  $this->db->get('municipio')->result_array();
    }// all()

}// Municipio_model
