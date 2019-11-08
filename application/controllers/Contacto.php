<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

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
		Utilerias::pagina_basica($this, "contacto/index", $data);

	}

	public function enviar_correo(){
		$url_website = base_url();
		$this->load->library("email"); // //cargamos la libreria email de ci

		define('EMAIL_FROM', 'qualedu.developers@gmail.com');
		define('EMAIL_TO', 'contacto@proyectoeducativo.org');
		// define('EMAIL_TO', 'qualedu.developers@gmail.com');
		define('EMAIL_CC', 'bnaranjo@proyectoeducativo.org');
		// define('EMAIL_CC', 'qualedu.developers@gmail.com');
		define('EMAIL_CCO', 'uzielcap123@gmail.com, miguellhdez@gmail.com');

		$correo_electronico = $this->input->post('correo_electronico');
		$nombre_completo = $this->input->post('nombre_completo');
		$no_celular = $this->input->post('no_celular');
		$titulo = $this->input->post('titulo');
		$texto_mensaje = $this->input->post('texto_mensaje');

		$configuracion = array(
					'protocol'    => 'mail',
					'smtp_host'   => 'smtp.gmail.com',
					'smtp_port'   => 587,
					'smtp_user'   => 'qualedu.developers@gmail.com',
					'smtp_pass'   => '123456aA?',
					'mailtype'    => 'html',
					'charset'     => 'utf-8',
					'smtp_crypto' => 'ssl',
					'newline'     => "\r\n",
		);

			// echo "<pre>"; print_r($arr_datos); die();

			$encabezado_ytitulo = 'Asistentente de sitio Proyecto Educativo';
			$message = "
							<html>
							<body>
									<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width: 650px; background-color: #FC7F3F;  border-radius: 5px; border: 3px solid #FC7F3F; -webkit-box-shadow: 0px 2px 4px #a1a1a1; color:#FFFFFF;'>
												<thead>
															<tr height='80'>
																<th colspan='2' style='font-size: 22px;'> {$encabezado_ytitulo} </th>
															</tr>
												</thead>
												<tbody align='justify' style='background-color: #FFFFFF; color: #000000; font-weight:bold;'>";
																			$message .= "
																			<tr height='35'>
																				 <td colspan='2' style='padding: 7px; width: 100%; text-align: center;'>
																						Correo electrónico enviado desde {$url_website}, estos son los datos capturados:
																				 </td>
																			</tr>
																			<tr height='15'>
																				 <td colspan='2'></td>
																			</tr>
																			<tr height='35'>
																				 <td style='padding: 0px 10px; width: 30%; text-align: right;'> Nombre completo: </td>
																				 <td style='padding: 0px 10px; width: 70%; text-align: left;'> {$nombre_completo} </td>
																			</tr>
																			<tr height='35'>
																				 <td style='padding: 0px 10px; width: 30%; text-align: right;'> Correo electrónico: </td>
																				 <td style='padding: 0px 10px; width: 70%; text-align: left;'> {$correo_electronico} </td>
																			</tr>
																			<tr height='35'>
																				 <td style='padding: 0px 10px; width: 30%; text-align: right;'> Número de celular: </td>
																				 <td style='padding: 0px 10px; width: 70%; text-align: left;'> {$no_celular} </td>
																			</tr>
																			<tr height='35'>
																				 <td style='padding: 0px 10px; width: 30%; text-align: right;'> Mensaje: </td>
																				 <td style='padding: 0px 10px; width: 70%; text-align: left;'> {$texto_mensaje} </td>
																			</tr>
																			<tr height='35'>
																				<td colspan='2' style='padding: 30px 10px; text-align: center;'>
																				<a href=".$url_website." target='_blank' style='text-decoration: none; color: #FC7F3F; padding: 5px 10px; border-radius: 5px; border: 1px solid #FC7F3F; cursor: pointer; background: #; -webkit-box-shadow: 0px 2px 4px #a1a1a1;'>Ir al sitio web</a>
																				</td>
																			</tr>
														</tbody>
												</table>
										</body>
								</html>
								";

			// echo $message; die();


			//cargamos la configuración para enviar con gmail
			$this->email->initialize($configuracion);

			$this->email->from(EMAIL_FROM, $encabezado_ytitulo);
			$this->email->to(EMAIL_TO); // destinatario
			$this->email->cc(EMAIL_CC); // con copia
			$this->email->bcc(EMAIL_CCO); // con copia oculta
			$this->email->subject($titulo);
			$this->email->message($message);

			$result_send = $this->email->send();
			// $result_send = TRUE;
			$respueta = ($result_send)?'Gracias por escribirnos, nos pondremos en contacto con usted a la brevedad posible.':'Estamos experimentando problemas, contactenos por whatsapp y le responderemos de inmediato.';
			// $this->session->set_flashdata('respuesta_envio', $respueta);
			// redirect(base_url('contacto', 'refresh'));
			// redirect(base_url('index.php/Contacto'), 'refresh');
			$data['respuesta_envio'] = $respueta;
			Utilerias::pagina_basica($this, "contacto/index", $data);
	}// enviar_correo()



}
