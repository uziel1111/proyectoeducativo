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
		rpl.tipo_recurso,
		rpl.publico_objetivo,
		rpl.link
		FROM
		recursos_online_py_propueta_layout rpl
		INNER JOIN
		recurso_apoyo ra ON ra.idrecurso = rpl.id
		INNER JOIN
		c_nivel n ON n.idnivel = ra.idnivel
		INNER JOIN
		c_area a ON a.idarea = ra.idarea
		{$where}
		GROUP BY rpl.id
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
			$where = " AND n.idnivel = ?";
			$data = array($nivel);
		}
		$query = "SELECT DISTINCT
		rpl.grado
		FROM
		recursos_online_py_propueta_layout rpl
		inner join c_nivel n on n.nivel = rpl.nivel_educativo
		WHERE rpl.grado != '' {$where} order by rpl.grado";
		return $this->db->query($query,$data)->result_array();
	}//obtener_c_grado

	public function obtener_nivel($area)
	{	
		$where = '';
		if ($area != 0) {
			$where = " where ra.idarea = ? ";
			$data = array($area);
		}
		$query = "SELECT n.nivel, n.idnivel from recurso_apoyo ra
		inner join c_nivel n on n.idnivel = ra.idnivel
		{$where} group by n.idnivel;";

		return $this->db->query($query,$data)->result_array();
	}
	
}//class