<?php
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') OR exit('No direct script access allowed');

// define("JSON_PRETTY_PRINT", 128);
// define("JSON_UNESCAPED_UNICODE", 256);
// define("JSON_UNESCAPED_SLASHES", 64);
define('MESSAGEREQUEST', 'message_request');
define('SUCCESMESSAGE', '1');
define('ERRORMESSAGE', '2');

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
    public static function pagina_basica_ae($contexto, $vista = '', $data) {
	    	$contexto->load->view('templates_ae/header');
	    	$contexto->load->view($vista, $data);
	    	$contexto->load->view('templates_ae/footer');
	    }

			/*
	    Funcion para retornar datos a peticiones ajax
	     */
	    public static function enviaDataJson($data, $contexto){
				// header("Access-Control-Allow-Origin: *");
	    	return $contexto->output
	    	->set_status_header(http_response_code())
	    	->set_content_type( 'application/json', 'utf-8' )
	    	->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	    	->_display();
	    }

	    public static function set_usuario_sesion($contexto, $datosusuario){
	    	$contexto->session->set_userdata(DATOSUSUARIO, $datosusuario);
	    } // set_data_session()

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


	    public static function get_notification_alert($mensaje, $tipo, $cerrar = true)
	    {
	    	$type = "alert-info";

	    	switch ($tipo) {
	    		case SUCCESMESSAGE:
	    		$type = "alert-success ";
	    		break;
	    		case ERRORMESSAGE:
	    		$type = "alert-danger ";
	    		break;
	    	}

	    	return "
	    	<div class='alert " . $type . " alert-dismissable'>
	    	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	    	<center>" . $mensaje . "</center>
	    	</div>
	    	";
	    } // get_notification_alert()


	    public static function set_cct_sesion($contexto, $datoscct){
	    	$contexto->session->set_userdata(DATOCCT, $datoscct);
	    } // set_cct_sesion()

	    public static function get_cct_sesion($contexto) {
	    	if (Utilerias::haySesionAbiertacct($contexto)) {
	    		return $contexto->session->userdata(DATOCCT);
	    	} else {
	    		return null;
	    	}
	    }//get_cct_sesion()

	    public static function destroy_all_session_cct($contexto){
	        // Vacio los datos
	    	$contexto->session->unset_userdata(DATOCCT);
	    	$contexto->session->sess_destroy();
	    	return true;
	    } // destroy_all_session_cct()

	    public static function haySesionAbiertacct($contexto) {
	    	if($contexto->session->has_userdata(DATOCCT)){
	    		return true;
	    	}else{
	    		return false;
	    	}
	    }

	    public static function verifica_sesion_redirige($contexto) {
	    	if (!Utilerias::haySesionAbiertacct($contexto)) {
	    		return false;
	    	}
	    	return true;
	    }


  public static function isRequestAjax($contexto) {
    if ($contexto->input->is_ajax_request()) {
      return true;
    } else {
      return false;
    }
  }// isRequestAjax()


	}
	?>
