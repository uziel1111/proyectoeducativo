<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informacion_apoyo_model extends CI_Model {

	function obtener_datos_tabla($nivel, $area, $grado)
	{
		$data = array();
		$where = '';
		if ($nivel != 0 || $area != 0 || $grado != 0) {
			$where = 'WHERE ';
			if ($nivel != 0) {
				$where .= ' n.idnivel = ? ';
				array_push($data,$nivel);
				if ($area != 0) {
					$where .= ' AND a.idarea = ? ';
					array_push($data,$area);
					if ($grado != 0) {
						$where .= ' AND rpl.grado = ?';
						array_push($data,$grado);
					}
				}else {
					if ($grado != 0) {
						$where .= ' AND rpl.grado = ? ';
						array_push($data,$grado);
					}
				}
			}else{
				if ($area != 0) {
					$where .= ' a.idarea = ? ';
					array_push($data,$area);
					if ($grado != 0) {
						$where .= ' AND rpl.grado = ?';
						array_push($data,$grado);
					}
				}else{
					if ($grado != 0) {
						$where .= ' rpl.grado = ?';
						array_push($data,$grado);
					}
				}
			}
		}

		$query = "SELECT
		rpl.nombre,
		rpl.fuente,
		t.tipo_recurso,
		p.publico_objetivo,
		rpl.link
		FROM
		c_material rpl
		INNER JOIN
		recurso_apoyo ra ON ra.idrecurso = rpl.idmaterial
        INNER JOIN
		c_tipo_recurso t ON t.idtipo_recurso = ra.idtipo_recurso
        INNER JOIN
		c_publico p ON p.idpublico_obj = ra.idpublico_obj
		INNER JOIN
		c_nivel n ON n.idnivel = ra.idnivel
		INNER JOIN
		c_area a ON a.idarea = ra.idarea
		{$where}
		GROUP BY rpl.idmaterial
		";

		return $this->db->query($query, $data)->result_array();
	}//obtener_datos_tabla
	public function obtener_c_nivel()
	{
		$query = "SELECT * FROM c_nivel";
		return $this->db->query($query)->result_array();
	}//obtener_c_nivel
	public function obtener_c_area()
	{
		$query = "SELECT * FROM c_area";
		return $this->db->query($query)->result_array();
	}//obtener_c_area

	public function obtener_c_grado($nivel)
	{
		$where = '';
		$data = array();
		if ($nivel != 0) {
			$where = " AND rpl.idnivel = ?";
			$data = array($nivel);
		}
		$query = "SELECT DISTINCT
		rpl.grado
		FROM
		recurso_apoyo rpl
		WHERE rpl.grado != '' {$where} order by rpl.grado";
		return $this->db->query($query,$data)->result_array();
	}//obtener_c_grado

	public function obtener_nivel($area)
	{
		$where = '';
		$data = array();
		if ($area != 0) {
			$where = " where ra.idarea = ? ";
			$data = array($area);
		}
		$query = "SELECT n.nivel, n.idnivel from recurso_apoyo ra
		inner join c_nivel n on n.idnivel = ra.idnivel
		{$where} group by n.idnivel;";

		return $this->db->query($query,$data)->result_array();
	}

	public function insertar_contador($filtros, $pagina_anterior){
			date_default_timezone_set('America/Mexico_City');
			setlocale(LC_TIME, 'es_MX.UTF-8');
			$fecha = date("Y-m-d H:i:s");
			// echo $doc; die();
			$this->db->trans_start();
			$query = "INSERT INTO contador (busqueda,origen,f_crea) VALUES (?,?,?);";
		$this->db->query($query, [$filtros, $pagina_anterior,$fecha]);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return FALSE;
		} else {
			return TRUE;
		}
	}//insertar_contador

}//class
