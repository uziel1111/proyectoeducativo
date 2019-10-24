<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trayectoria extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
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
		$data = array();
		Utilerias::pagina_basica($this, "trayectoria/index", $data);

	}

	public function modelo_apa()
	{
		$data = array();
		Utilerias::pagina_basica($this, "trayectoria/modelo_apa", $data);

	}	

	public function Asistencia_Permanencia()
	{
		$data = array();
		Utilerias::pagina_basica($this, "trayectoria/asistencia_permanencia", $data);

	}		

}