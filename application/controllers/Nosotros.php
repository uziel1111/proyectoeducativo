<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nosotros extends CI_Controller {

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
	public function nosotros()
	{
		$data = array();
		Utilerias::pagina_basica($this, "nosotros/nosotros", $data);

	}
	public function Equipo()
{
	$data = array();
	Utilerias::pagina_basica($this, "nosotros/equipo", $data);

}


}
