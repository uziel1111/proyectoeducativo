<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hacemos extends CI_Controller {

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
		Utilerias::pagina_basica($this, "hacemos/index", $data);

	}

	public function modelo_apa()
	{
		$data = array();
		Utilerias::pagina_basica($this, "hacemos/modelo_apa", $data);

	}	

	public function Asistencia_Permanencia()
	{
		$data = array();
		Utilerias::pagina_basica($this, "hacemos/asistencia_permanencia", $data);

	}

	public function Formacion_Docente()
	{
		$data = array();
		Utilerias::pagina_basica($this, "hacemos/formacion_docente", $data);

	}

	public function Gestion_Escolar()
	{
		$data = array();
		Utilerias::pagina_basica($this, "hacemos/gestion_escolar", $data);

	}	

	public function Sistemas_Informacion()
	{
		$data = array();
		Utilerias::pagina_basica($this, "hacemos/sistemas_informacion", $data);

	}	

	public function Descarga_Administrativa()
	{
		$data = array();
		Utilerias::pagina_basica($this, "hacemos/descarga_administrativa", $data);

	}

	public function Evaluacion_Aprendizaje()
	{
		$data = array();
		Utilerias::pagina_basica($this, "hacemos/evaluacion_aprendizaje", $data);

	}	
}