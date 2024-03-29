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
	$data['vista_aprendizajes'] = $this->load->view("aprendizajes_esperados/tabla_aprendizajes", $data, TRUE);
	$data['niveles'] = $this->Aprendizajesesperados_model->obtener_arr_nivel();
		Utilerias::pagina_basica_ae($this, "aprendizajes_esperados/index", $data);
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
// 		echo"<pre>";
// 		var_dump($_GET);
// var_dump($_POST);
// 			die();
		$idnivel = $this->input->get('idnivel');
		$idcomponente = $this->input->get('idcomponente');
		$idcampo = $this->input->get('idcampo');
		$idgrado = $this->input->get('idgrado');
		$idasignatura = $this->input->get('idasignatura');
		$ideje = $this->input->get('ideje');
		$idtema = $this->input->get('idtema');

		$logo = $this->input->post('logo');
		$estilo = $this->input->post('estilo');
		if(isset($logo) && isset($estilo) && $logo != '' && $estilo != ''){
			// echo "else aca"; die();
			$this->get_aprendizajes($idnivel, $idcomponente, $idcampo, $idgrado, $idasignatura, $ideje, $idtema, $logo, $estilo);
		}else{
			if (Utilerias::isRequestAjax($this)) {
				// echo "aca";die();
				$aprendizajes = $this->Aprendizajesesperados_model->obtener_arr_aprendizajesesperados_xidnivel_idcomponente_idcampo_grado_idasignatura_ideje_idtema($idnivel,$idcomponente,$idcampo,$idgrado,$idasignatura,$ideje,$idtema);
				$data['aprendizajes'] = $aprendizajes;
				// echo"<pre>";
				// print_r($aprendizajes);
				// die();

				$vista = $this->load->view("aprendizajes_esperados/tabla_aprendizajes", $data, TRUE);
				// echo"<pre>";
				// print_r($vista);
				// die();
				Utilerias::enviaDataJson($vista,$this);
		        exit();
			}
			else {
				$this->get_aprendizajes($idnivel, $idcomponente, $idcampo, $idgrado, $idasignatura, $ideje, $idtema);
			}

		}


	}

	public function get_aprendizajes($idnivel = null, $idcomponente = null, $idcampo = null, $idgrado = null, $idasignatura = null, $ideje = null, $idtema = null, $logo = null, $estilo = null)
	{
		// echo"aca function"; die();
		$data['aprendizajes'] = $this->Aprendizajesesperados_model->obtener_arr_aprendizajesesperados_xidnivel_idcomponente_idcampo_grado_idasignatura_ideje_idtema($idnivel,$idcomponente,$idcampo,$idgrado,$idasignatura,$ideje,$idtema);
		$data['niveles'] = $this->Aprendizajesesperados_model->obtener_arr_nivel();
		if($idnivel != null && $idnivel != 0){
			$data['idnivelselec'] = $idnivel;
		}
		if($idnivel != null && $idnivel != 0){
			$componentes = $this->Aprendizajesesperados_model->obtener_arr_componente_xidnivel($idnivel);
			$data['componentes'] = $componentes;
			$data['idcomponenteselec'] = $idcomponente;
		}
		if($idcomponente != null && $idcomponente != 0){
			$campos = $this->Aprendizajesesperados_model->obtener_arr_campo_xidnivel_idcomponente($idnivel,$idcomponente);
			$data['campos'] = $campos;
			$data['idcamposelec'] = $idcampo;
		}
		if($idcampo != null && $idcampo != 0){
			$grados = $this->Aprendizajesesperados_model->obtener_arr_grado_xidnivel_idcomponente_idcampo($idnivel,$idcomponente,$idcampo);
			$data['grados'] = $grados;
			$data['idgradoselec'] = $idgrado;
		}
		if($idgrado != null && $idgrado != 0){
			$asignaturas = $this->Aprendizajesesperados_model->obtener_arr_asignatura_xidnivel_idcomponente_idcampo_grado($idnivel,$idcomponente,$idcampo,$idgrado);
			$data['asignaturas'] = $asignaturas;
			$data['idasignaturaselec'] = $idasignatura;
		}
		if($idasignatura != null && $idasignatura != 0){
			$ejes = $this->Aprendizajesesperados_model->obtener_arr_eje_xidnivel_idcomponente_idcampo_grado_idasignatura($idnivel,$idcomponente,$idcampo,$idgrado,$idasignatura);
			$data['ejes'] = $ejes;
			$data['idejeselec'] = $ideje;
		}
		if($ideje != null && $ideje != 0 ){
			$temas = $this->Aprendizajesesperados_model->obtener_arr_tema_xidnivel_idcomponente_idcampo_grado_idasignatura_ideje($idnivel,$idcomponente,$idcampo,$idgrado,$idasignatura,$ideje);
			$data['temas'] = $temas;
			$data['idtemaselec'] = $idtema;
		}
		if($logo != null){
			$data['logo'] = $logo;
		}
		if($estilo != null){
			$data['estilo'] = $estilo;
		}

		$data['vista_aprendizajes'] = $this->load->view("aprendizajes_esperados/tabla_aprendizajes", $data, TRUE);
		Utilerias::pagina_basica_ae($this, "aprendizajes_esperados/index", $data);
	}//index

}//class
