<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recursos_de_apoyo_para_el_aprendizaje extends CI_Controller {

	function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			 $this->load->model( 'Informacion_apoyo_model' );
		}

	public function recursos($area = null, $tipo = null, $nivel = null, $grado = null, $pclave = null, $token = null)
	{

		$pclave = ($pclave != 'undefined') ? urldecode($pclave) : '';

		$c_nivel = $this->Informacion_apoyo_model->obtener_c_nivel();
		$c_area = $this->Informacion_apoyo_model->obtener_c_area();
		$c_grado = $this->Informacion_apoyo_model->obtener_c_grado($nivel);
		$pagina_anterior = '';

		$bandera=$this->Valida_token($token);


		if($bandera==TRUE){
			$datos_tabla = $this->Informacion_apoyo_model->obtener_datos_tabla($nivel, $area, $grado, $pclave,$tipo,$token);

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
			 if(isset($_SERVER['HTTP_REFERER'])) {
			  $pagina_anterior = $_SERVER['HTTP_REFERER'];
			 }
			 else {
			 	$pagina_anterior = '';
			 }
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

		$bandera=FALSE;
		// echo $token; die();
		if($token!=""){
			// echo $_SERVER['HTTP_REFERER']; die();
			if(isset($_SERVER['HTTP_REFERER'])) {
				// echo $_SERVER['HTTP_REFERER'];
				// die();
				// $pagina = parse_url($_SERVER['HTTP_REFERER']);
				// print_r($pagina); die();
				$cadena=explode('://',$_SERVER['HTTP_REFERER']);
				// echo "<pre>";
				// print_r($cadena); die();
				if(count($cadena)>1){
					$protocolo=$cadena[0];
					$nombre_auxliar=explode('/',$cadena[1]);
					// echo "<pre>";print_r($nombre_auxliar); die();

					if(count($nombre_auxliar)>0){
						if($nombre_auxliar[1]!=""){
							$sitio=$protocolo."://".$nombre_auxliar[0]."/".$nombre_auxliar[1]."/";
						}else{
							$sitio=$protocolo."://".$nombre_auxliar[0]."/";
						}
						// echo $sitio; die();
						$result=$this->Informacion_apoyo_model->obtener_sitios_conocidos($sitio);
						// print_r($result); die();
						if(count($result)>0){
							$token_auxiliar=md5($result[0]['url_sitio'].$result[0]['parametro']);
							if($token_auxiliar==$token){
								$bandera=TRUE;
							}
						}else{
							//no es un sitio conocido
							redirect('Index');
						}
					}else{
						//cuando la pagina anterior no cumple con la estructura de la url
						redirect('Index');
					}
				}else{
					//cuando la pagina anterior no cumple con la estructura de la url
					redirect('Index');
				}
				
			}else {
				//cuando no hay una pagina anterior lo mando al index
				redirect('Index');
			}
		}

		return $bandera;
	}

}//class
