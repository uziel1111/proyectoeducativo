<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fotogaleria extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
		}

	public function index()
	{
		$data = array();
		Utilerias::pagina_basica($this, "fotogaleria/index", $data);

	}	
}