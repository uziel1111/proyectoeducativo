<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Monterrey');
setlocale(LC_TIME, 'es_MX.UTF-8');
class Recursos_de_apoyo_para_el_aprendizaje extends CI_Controller {

	function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			 $this->load->model( 'Informacion_apoyo_model' );
		}

	public function recursos($area,$tipo,$nivel,$grado,$pclave)
	{
		
		// $nivel = ($this->input->get('nivel')!== null) ? $this->input->get('nivel') : '';
		// $area = ($this->input->get('area')!== null) ? $this->input->get('area') : '';
		// $grado = ($this->input->get('grado')!== null) ? $this->input->get('grado') : '';
		// $pclave = ($this->input->get('pclave')!== null) ? $this->input->get('pclave') : '';
		$pclave = ($pclave != 'undefined') ? $pclave : '';
		// $tipo = ($this->input->get('tipo')!== null) ? $this->input->get('tipo') : '';

		$c_nivel = $this->Informacion_apoyo_model->obtener_c_nivel();
		$c_area = $this->Informacion_apoyo_model->obtener_c_area();
		$c_grado = $this->Informacion_apoyo_model->obtener_c_grado($nivel);

		$token = ($this->input->get('token')!== null) ? $this->input->get('token') : '';
		$bandera=FALSE;
		if($token==''){
			$mystring = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$cadena_aux = 'https://proyectoeducativo.org/Recursos_de_apoyo_para_el_aprendizaje';
			$cadena2_aux='localhost/proyectoeducativo/Recursos_de_apoyo_para_el_aprendizaje';
			$cadena=stristr($mystring, $cadena2_aux);
			$cadena2=stristr($mystring, $cadena_aux);
			if($cadena2==$mystring || $cadena==$mystring){
				$bandera=TRUE;
			}
		}else{
			$bandera==$this->Valida_token($token);
		}

		if($bandera==TRUE){
			$datos_tabla = $this->Informacion_apoyo_model->obtener_datos_tabla($nivel, $area, $grado, $pclave,$tipo);

			 $data['datos_tabla'] = $datos_tabla;
			 $data['nivel'] = $nivel;
			 $data['area'] = $area;
			 $data['grado'] = $grado;
			 $data['c_nivel'] = $c_nivel;
			 $data['c_area'] = $c_area;
			 $data['c_grado'] = $c_grado;
			 $data['tipo_slctd'] = $area.$tipo;
			 $data['pclave'] = $pclave;
			 $filtros='area:'.$area.'/nivel:'.$nivel.'/grado:'.$grado.'/pclave:'.$pclave;

			 $pagina_anterior = $_SERVER['HTTP_REFERER'];
			 // $pagina_anterior = '';
			 // echo "<pre>";print_r($pagina_anterior);die();
			 $this->Informacion_apoyo_model->insertar_contador($filtros, $pagina_anterior);
			 Utilerias::pagina_basica($this, "informacion_apoyo/informacion_apoyo", $data);
		}else{
			$encabezado="Recursos de apoyo del aprendizaje";
			$mensaje="Ocurrió un error, intente nuevamente";

			if($token!=''){
				$mensaje="Token inválido";
			}
			$data['encabezado']=$encabezado;
			$data['mensaje']=$mensaje;
			Utilerias::pagina_basica($this, "errors/error", $data);
		}
	}//index

	function obtener_nivel()
	{
		$area = $this->input->post('area');
		$tipo = $this->input->post('tipo');
		$area_datos = $this->Informacion_apoyo_model->obtener_nivel($area,$tipo);
		Utilerias::enviaDataJson($area_datos,$this);
        exit();
	}//obtener_nivel

	function obtener_grado()
	{
		$nivel = $this->input->post('nivel');
		$grado_datos = $this->Informacion_apoyo_model->obtener_c_grado($nivel);
		Utilerias::enviaDataJson($grado_datos,$this);
        exit();
	}//obtener_grado

	function obtener_nombres_recursos()
	{
		$slc_nivel = $this->input->post('slc_nivel');
		$slc_area = $this->input->post('slc_area');
		$slc_grado = $this->input->post('slc_grado');

		$arr_info = $this->Informacion_apoyo_model->obtener_nombres_recursos($slc_nivel,$slc_area,$slc_grado);
		$arr_aux= [];
		foreach ($arr_info as $key => $value) {
			array_push($arr_aux, $value['nombre']);
		}

		Utilerias::enviaDataJson($arr_aux,$this);
        exit();
	}//obtener_nombres_recursos

	function Valida_token($token){
		//pagina que esta haciendo la peticion
		$bandera=FALSE;
		$result=$this->Informacion_apoyo_model->obtener_sitios_conocidos();
		foreach($result  AS $value){
			$cadena=$value['url_sitio'].$value['parametro'];
			$token_auxiliar=md5($cadena);
			if($token_auxiliar==$token){
				return TRUE;
			}
		}
		
		return $bandera;
	}

}//class
