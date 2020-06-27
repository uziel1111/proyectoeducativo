<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compartimos extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			$this->load->library('user_agent');
			$this->load->model( 'Informacion_apoyo_model' );
		}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$origen = $this->agent->referrer();
		$sarape   = 'http://localhost/eclasebas_yuc/';
		$yucatan   = 'http://localhost/eclase/';
		$possarape = strstr($origen, $sarape);
		$poskambal = strstr($origen, $yucatan);
		$imagen = "proyed";
		if(!$possarape){
			$imagen = "logo-sarape.png";
		}

		if(!$poskambal){
			$imagen = "logo-kaambal.png";
		}
		$data = array();
		$c_area = $this->Informacion_apoyo_model->obtener_c_area();
		$c_nivel = $this->Informacion_apoyo_model->obtener_c_nivel();
		$data['c_nivel'] = $c_nivel;
		$data['nivel'] = '';
		$data['c_area'] = $c_area;
		$data['area'] = '';
		$data['logo'] = $imagen;
		// Utilerias::pagina_basica($this, "index", $data);
		Utilerias::pagina_basica($this, "compartimos/index", $data);

	}

}
