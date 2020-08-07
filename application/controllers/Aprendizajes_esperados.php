<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aprendizajes_esperados extends CI_Controller {

	function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			$this->load->model('Aprendizajesesperados_model');

		}

	public function index(){
	$data = array();
	$data['niveles'] = $this->Aprendizajesesperados_model->obtener_arr_nivel();
		Utilerias::pagina_basica($this, "aprendizajes_esperados/index", $data);
	}

	public function get_componentes(){
		$idnivel = $this->input->post('idnivel');
		$componentes = $this->Aprendizajesesperados_model->obtener_arr_componente_xidnivel($idnivel);
		Utilerias::enviaDataJson($componentes,$this);
        exit();
	}

	public function get_campos(){
		$idnivel = $this->input->post('idnivel');
		$idcomponente = $this->input->post('idcomponente');
		$campos = $this->Aprendizajesesperados_model->obtener_arr_campo_xidnivel_idcomponente($idnivel,$idcomponente);
		Utilerias::enviaDataJson($campos,$this);
        exit();
	}

	public function get_grados(){
		$idnivel = $this->input->post('idnivel');
		$idcomponente = $this->input->post('idcomponente');
		$idcampo = $this->input->post('idcampo');
		$grados = $this->Aprendizajesesperados_model->obtener_arr_grado_xidnivel_idcomponente_idcampo($idnivel,$idcomponente,$idcampo);
		Utilerias::enviaDataJson($grados,$this);
        exit();
	}

	public function get_asignaturas(){
		$idnivel = $this->input->post('idnivel');
		$idcomponente = $this->input->post('idcomponente');
		$idcampo = $this->input->post('idcampo');
		$idgrado = $this->input->post('idgrado');
		$asignaturas = $this->Aprendizajesesperados_model->obtener_arr_asignatura_xidnivel_idcomponente_idcampo_grado($idnivel,$idcomponente,$idcampo,$idgrado);
		Utilerias::enviaDataJson($asignaturas,$this);
        exit();
	}

	public function get_ejes(){
		$idnivel = $this->input->post('idnivel');
		$idcomponente = $this->input->post('idcomponente');
		$idcampo = $this->input->post('idcampo');
		$idgrado = $this->input->post('idgrado');
		$idasignatura = $this->input->post('idasignatura');
		$ejes = $this->Aprendizajesesperados_model->obtener_arr_eje_xidnivel_idcomponente_idcampo_grado_idasignatura($idnivel,$idcomponente,$idcampo,$idgrado,$idasignatura);
		Utilerias::enviaDataJson($ejes,$this);
        exit();
	}

	public function get_temas(){
		$idnivel = $this->input->post('idnivel');
		$idcomponente = $this->input->post('idcomponente');
		$idcampo = $this->input->post('idcampo');
		$idgrado = $this->input->post('idgrado');
		$idasignatura = $this->input->post('idasignatura');
		$ideje = $this->input->post('ideje');
		$temas = $this->Aprendizajesesperados_model->obtener_arr_tema_xidnivel_idcomponente_idcampo_grado_idasignatura_ideje($idnivel,$idcomponente,$idcampo,$idgrado,$idasignatura,$ideje);
		Utilerias::enviaDataJson($temas,$this);
        exit();
	}

	public function get_aprendizajes_esperados(){
		$idnivel = $this->input->post('idnivel');
		$idcomponente = $this->input->post('idcomponente');
		$idcampo = $this->input->post('idcampo');
		$idgrado = $this->input->post('idgrado');
		$idasignatura = $this->input->post('idasignatura');
		$ideje = $this->input->post('ideje');
		$idtema = $this->input->post('idtema');

		$aprendizajes = $this->Aprendizajesesperados_model->obtener_arr_aprendizajesesperados_xidnivel_idcomponente_idcampo_grado_idasignatura_ideje_idtema($idnivel,$idcomponente,$idcampo,$idgrado,$idasignatura,$ideje,$idtema);
		$data['aprendizajes'] = $aprendizajes;

		$vista = $this->load->view("aprendizajes_esperados/tabla_aprendizajes", $data, TRUE);
		Utilerias::enviaDataJson($vista,$this);
        exit();
	}

}//class
