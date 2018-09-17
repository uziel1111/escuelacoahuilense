<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('DATOSUSUARIO', "datos_usuario");
// define("JSON_PRETTY_PRINT", 128);
// define("JSON_UNESCAPED_UNICODE", 256);
// define("JSON_UNESCAPED_SLASHES", 64);

	class Utilerias{
		public function __construct() {
	        //  require_once APPPATH.'third_party/Utils.php';
	    }

	    /**
     * Carga la vista básica de una página: header, vista y footer.
     *
     * @param CONTROLLER $contexto   Desde dónde se llamará a la vista
     * @param VISTA $vista      El nombre de la vista que se cargará después del header
     * @param DATA  $data       Arreglo con los campos que usará templates/header y $vista
     */
	    public static function pagina_basica($contexto, $vista = '', $data) {
	        $contexto->load->view('templates/header');
	        $contexto->load->view($vista, $data);
	        $contexto->load->view('templates/footer');
	    }

	    /**
     * Carga la vista básica del panel: header, vista y footer.
     *
     * @param CONTROLLER $contexto   Desde dónde se llamará a la vista
     * @param VISTA $vista      El nombre de la vista que se cargará después del header
     * @param DATA  $data       Arreglo con los campos que usará templates/header y $vista
     */
	   	public static function pagina_basica_panel($contexto, $vista = '', $data) {
	        $contexto->load->view('templatepanel/header', $data);
	        $contexto->load->view($vista, $data);
	        $contexto->load->view('templatepanel/footer');
	    }

			public static function pagina_basica_rm($contexto, $vista = '', $data) {
				$contexto->load->view('templaterm/header', $data);
				$contexto->load->view($vista, $data);
				$contexto->load->view('templaterm/footer');
		}

			/*
	    Funcion para retornar datos a peticiones ajax
	     */
	    public static function enviaDataJson($status, $data, $contexto){
	    	return $contexto->output
	                    ->set_status_header($status)
	                    ->set_content_type('application/json', 'utf-8')
	                    ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	                    ->_display();
	    }

	    public static function set_usuario_sesion($contexto, $datosusuario){
	        $contexto->session->set_userdata(DATOSUSUARIO, $datosusuario);
	    } // set_data_session()

	    public static function haySesionAbierta($contexto) {
	    	if($contexto->session->has_userdata(DATOSUSUARIO)){
	    		return true;
	    	}else{
	    		redirect('login/index');
	    	}
	    }

	    public static function get_usuario_sesion($contexto) {
	        if (Utilerias::haySesionAbierta($contexto)) {
	            return $contexto->session->userdata(DATOSUSUARIO);
	        } else {
	            return null;
	        }
	    }

	    public static function destroy_all_session($contexto){
	        // Vacio los datos
	        $contexto->session->unset_userdata(DATOSUSUARIO);
	        $contexto->session->sess_destroy();
	        return true;
	    } // destroy_all_session()


	}
?>
