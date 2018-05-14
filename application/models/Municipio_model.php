<?php
class Municipio_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function all(){
            $this->db->select('cve_municipio,municipio');
            $this->db->from('municipio');
            return  $this->db->get()->result_array();
    }// all()

}// Municipio_model
