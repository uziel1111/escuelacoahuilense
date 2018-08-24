<?php
class Recursos_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_reactivo_recurso($periodo, $campo_dis, $nivel){
    	$str_query = "SELECT *, pr.id_reactivo, pr.n_reactivo, CONCAT(
					    IF(pua.id_nivel=4,'primaria',IF(pua.id_nivel=5,'secundaria',IF(pua.id_nivel=6,'ms','nada'))),
					    IF(pua.id_periodo=1,'2016',IF(pua.id_periodo=2,'2017','nada')),
					    '/reactivo_',
					    IF(pua.id_campodisiplinario=1,'lyc',IF(pua.id_campodisiplinario=2,'mat','nada')),
					    '/r',
					    pr.n_reactivo,
					    '.JPG') AS path_react, 
					  CONCAT(
				      IF(pua.id_nivel=4,'primaria',IF(pua.id_nivel=5,'secundaria',IF(pua.id_nivel=6,'ms','nada'))),
				      IF(pua.id_periodo=1,'2016',IF(pua.id_periodo=2,'2017','nada')),
				      '/apoyo_',
				      IF(pua.id_campodisiplinario=1,'lyc',IF(pua.id_campodisiplinario=2,'mat','nada')),
				      '/apoyo',
				      pr.apoyo,
				      '.JPG') as path_apoyo,
					SUM(IF(ra.idtipo = 1, 1, 0)) AS total_pdf, 
					SUM(IF(ra.idtipo = 2, 1, 0)) AS total_img,
					SUM(IF(ra.idtipo = 3, 1, 0)) AS total_link,
					SUM(IF(ra.idtipo = 4, 1, 0)) AS total_video FROM planea_unidad_analisis pua
					INNER JOIN planea_contenido pc ON pc.id_unidad_analisis = pua.id_unidad_analisis
					INNER JOIN planea_reactivo pr ON pr.id_contenido = pc.id_contenido
					LEFT JOIN recursos_apoyo ra ON ra.id_reactivo = pr.id_reactivo
					WHERE pua.id_periodo = {$periodo} AND pua.id_campodisiplinario = {$campo_dis} AND pua.id_nivel = {$nivel} 
					GROUP BY pr.id_reactivo
					ORDER BY pr.id_reactivo ASC";
					// echo $str_query; die();
      	return $this->db->query($str_query)->result_array();
    }// all()

    function get_recursos($id_reactivo){
    	$str_query = "SELECT * FROM recursos_apoyo ra
						INNER JOIN tipo_recursos_apoyo tra ON tra.idtipo = ra.idtipo
						WHERE id_reactivo = {$id_reactivo}";
		return $this->db->query($str_query)->result_array();
    }

    function get_tipo_contenidos(){
    	$str_query = "SELECT * FROM tipo_recursos_apoyo
						WHERE 1 = 1";
		return $this->db->query($str_query)->result_array();
    }

    function inserta_url($idreactivo, $url, $idusuario, $idtipo, $titulo, $fuente){
    	$fecha= date("Y-m-d H:i:s");
    	$data = array(
		        'id_reactivo' => $idreactivo,
		        'idtipo' => $idtipo,
		        'ruta' => $url,
		        'idusuario' => $idusuario,
		        'fcreacion' => $fecha,
		        'titulo' => $titulo,
		        'fuente' => $fuente

		);

		return $this->db->insert('recursos_apoyo', $data);
    }

    function delete_recurso($idrecurso){
    	$this->db->where('idrecurso', $idrecurso);
		return $this->db->delete('recursos_apoyo');
    }

    function get_url_recurso($idrecurso){
    	$str_query = "SELECT idtipo, ruta FROM recursos_apoyo
						WHERE idrecurso = {$idrecurso}";
		return $this->db->query($str_query)->result_array();
    }

    function busca_archivo($ruta_search){
    	$str_query = "SELECT ruta FROM recursos_apoyo
						WHERE ruta = '{$ruta_search}'";
		return $this->db->query($str_query)->result_array();
    }


}// Sostenimiento_model

