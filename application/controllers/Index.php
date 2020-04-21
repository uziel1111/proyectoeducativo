<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
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
		$c_area = $this->Informacion_apoyo_model->obtener_c_area();
		$data['c_area'] = $c_area;
		$data['area'] = '';
		Utilerias::pagina_basica($this, "index", $data);

	}

}
