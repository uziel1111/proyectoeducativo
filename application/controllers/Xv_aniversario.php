<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xv_aniversario extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
		}

	public function index()
	{
		$data = array();
		Utilerias::pagina_basica($this, "xv_aniversario/index", $data);

	}
}
