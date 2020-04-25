<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informacion_apoyo_model extends CI_Model {

	function obtener_datos_tabla($nivel, $area, $grado, $pclave,$tipo,$token)
	{
		if (strlen($pclave) < 150) {
			if ($pclave=='undefined') {
				$pclave='';
			}
			$data = array();
			$where = '';
			if ($nivel != 0 || $area != 0 || $grado != 0) {
				$where = 'WHERE ';
				if ($nivel != 0) {
					$where .= ' n.idnivel = ? ';
					array_push($data,$nivel);
					if ($area != 0) {
						if ($tipo == 'P') {
							$where .= ' AND a.idarea = ? ';
							array_push($data,$area);
						}else{
							$where .= ' AND ra.idsubarea = ? ';
							array_push($data,$area);
						}
						if ($grado != 0) {
							$where .= ' AND ra.grado = ?';
							array_push($data,$grado);
						}
					}else {
						if ($grado != 0) {
							$where .= ' AND ra.grado = ? ';
							array_push($data,$grado);
						}
					}
				}else{
					if ($area != 0) {
						if ($tipo == 'P') {
							$where .= ' a.idarea = ? ';
							array_push($data,$area);
						}else{
							$where .= ' ra.idsubarea = ? ';
							array_push($data,$area);
						}
						if ($grado != 0) {
							$where .= ' AND ra.grado = ?';
							array_push($data,$grado);
						}
					}else{
						if ($grado != 0) {
							$where .= ' ra.grado = ?';
							array_push($data,$grado);
						}
					}
				}
			}

			if (strlen($pclave) != 0) {
				//if ($token == 'f33e8d3d9e2d61211c9b044895003d96') {  // Prod
				if ($token == '2622378fc647a91aba535ead84dd90aa') { //Dev 
					$multiple = str_replace(", ","|",$pclave);
				}else {
					$multiple = str_replace(",","|",$pclave);
				}
				$multiple = str_replace("a","[á|a]",$multiple);
				$multiple = str_replace("e","[é|e]",$multiple);
				$multiple = str_replace("i","[í|i]",$multiple);
				$multiple = str_replace("o","[ó|o]",$multiple);
				$multiple = str_replace("u","[ú|u]",$multiple);
				$where .= " AND  rpl.nombre regexp '{$multiple}'";
			}

			$aux_group="";
			if ($nivel == 0 || $grado == 0) {
				$aux_group="GROUP BY rpl.nombre,rpl.link,p.publico_objetivo";
			}
			else {
				$aux_group="GROUP BY ra.idrecurso";
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
			recurso_apoyo ra ON ra.idmaterial = rpl.idmaterial
			INNER JOIN
			c_tipo_recurso t ON t.idtipo_recurso = ra.idtipo_recurso
			INNER JOIN
			c_publico p ON p.idpublico_obj = ra.idpublico_obj
			INNER JOIN
			c_nivel n ON n.idnivel = ra.idnivel
			INNER JOIN
			c_area a ON a.idarea = ra.idarea
			{$where}
			{$aux_group}
			";
			// echo "<pre>"; print_r($query); die();
			return $this->db->query($query, $data)->result_array();
		} else {
			return "error";
		}
	}//obtener_datos_tabla
	public function obtener_c_nivel()
	{
		$query = "SELECT * FROM c_nivel";
		return $this->db->query($query)->result_array();
	}//obtener_c_nivel
	public function obtener_c_area()
	{
		$query = "SELECT * from (
		select idarea,area,'sub_area','idsubarea', concat(idarea,'P') as tipo_a from c_area
		) as A
		union all
		(select idarea,'area',sub_area,idsubarea, concat(idsubarea,'H') as tipo_a from c_sub_area) order by idarea,area desc,sub_area asc";
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

	public function obtener_nivel($area,$tipo)
	{
		$where = '';
		$data = array();
		if ($area != 0) {
			if ($tipo == 'H') {
				$where = " where ra.idsubarea = ? ";
				$data = array($area);
			}else{
				$where = " where ra.idarea = ? ";
				$data = array($area);
			}
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

	public function obtener_nombres_recursos($slc_nivel,$slc_area,$slc_grado){
		$where='';
		if ($slc_area!=0) {
			$where.=" AND ra.idarea={$slc_area}";
		}
		if ($slc_nivel!=0) {
			$where.=" AND ra.idnivel={$slc_nivel}";
		}

		if ($slc_grado!=0) {
			$where.=" AND ra.grado={$slc_grado}";
		}
		$query = "SELECT nombre
		FROM c_material m
		INNER JOIN recurso_apoyo ra ON m.idmaterial= ra.idmaterial
		WHERE 1=1  {$where}
		GROUP BY m.nombre";
		return $this->db->query($query)->result_array();
	}

		public function obtener_sitios_conocidos(){
		$query = "SELECT url_sitio,parametro
		FROM c_sitiosconocidos ";
		return $this->db->query($query)->result_array();
	}

}//class
