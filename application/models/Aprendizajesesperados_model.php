<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aprendizajesesperados_model extends CI_Model {
	function __construct(){
    parent::__construct();
    date_default_timezone_set('America/Mexico_City');
    $this->apr_db = $this->load->database('aprendizaje', TRUE);
  }

	function obtener_arr_nivel(){
			$query = "SELECT idnivel, nivel FROM c_nivel_ae";
			// echo "<pre>"; print_r($query); die();
			return $this->apr_db->query($query)->result_array();
	}//obtener_arr_nivel

	function obtener_arr_componente_xidnivel($idnivel){
			$query = "SELECT
								c.idcomponente, c.componente
								FROM r_nivel_componente_ae nc
								INNER JOIN c_componente_ae c ON nc.idcomponente = c.idcomponente
								WHERE nc.idnivel= ?
								ORDER BY FIELD (c.componente,'Formación Académica','Desarrollo Personal y Social') ASC;";
			// echo "<pre>"; print_r($query); die();
			return $this->apr_db->query($query,[$idnivel])->result_array();
	}//obtener_arr_componente_xidnivel

	function obtener_arr_campo_xidnivel_idcomponente($idnivel,$idcomponente){
			$query = "SELECT
								c.idcampo, c.campo
								FROM r_nivel_componente_ae nc
								INNER JOIN r_componente_campo_ae cc ON  nc.id = cc.idr_nivel_componente
								INNER JOIN c_campo_ae c ON cc.idcampo = c.idcampo
								WHERE nc.idnivel = ? AND nc.idcomponente= ?
								ORDER BY FIELD (c.campo,'Lenguaje y Comunicación','Pensamiento Matemático', 'Exploración y Comprensión del Mundo Natural y Social');";
			// echo "<pre>"; print_r($query); die();
			return $this->apr_db->query($query,[$idnivel,$idcomponente])->result_array();
	}//obtener_arr_campo_xidnivel_idcomponente

	function obtener_arr_grado_xidnivel_idcomponente_idcampo($idnivel,$idcomponente,$idcampo){
			$query = "SELECT
								g.idgrado, g.grado
								FROM r_nivel_componente_ae nc
								INNER JOIN r_componente_campo_ae cc ON  nc.id = cc.idr_nivel_componente
								INNER JOIN r_campo_grado_ae cg ON cc.id = cg.idr_componente_campo
								INNER JOIN c_grado_ae g ON cg.idgrado = g.idgrado
								WHERE nc.idnivel = ? AND nc.idcomponente= ? AND cc.idcampo= ?
								ORDER BY g.idgrado";
			// echo "<pre>"; print_r($query); die();
			return $this->apr_db->query($query,[$idnivel,$idcomponente,$idcampo])->result_array();
	}//obtener_arr_grado_xidnivel_idcomponente_idcampo

	function obtener_arr_asignatura_xidnivel_idcomponente_idcampo_grado($idnivel,$idcomponente,$idcampo,$grado){
			$query = "SELECT
								a.idasignatura,a.asignatura
								FROM r_nivel_componente_ae nc
								INNER JOIN r_componente_campo_ae cc ON  nc.id = cc.idr_nivel_componente
								INNER JOIN r_campo_grado_ae cg ON cc.id = cg.idr_componente_campo
								INNER JOIN r_grado_asignatura_ae ga ON cg.id = ga.idr_campo_grado
								INNER JOIN c_asignatura_ae a ON ga.idasignatura = a.idasignatura
								WHERE nc.idnivel = ? AND nc.idcomponente= ? AND cc.idcampo= ? AND cg.idgrado= ?
								ORDER BY a.asignatura";
			// echo "<pre>"; print_r($query); die();
			return $this->apr_db->query($query,[$idnivel,$idcomponente,$idcampo,$grado])->result_array();
	}//obtener_arr_asignatura_xidnivel_idcomponente_idcampo_grado

	function obtener_arr_eje_xidnivel_idcomponente_idcampo_grado_idasignatura($idnivel,$idcomponente,$idcampo,$grado,$idasignatura){
			$query = "SELECT
								e.ideje, e.eje
								FROM r_nivel_componente_ae nc
								INNER JOIN r_componente_campo_ae cc ON  nc.id = cc.idr_nivel_componente
								INNER JOIN r_campo_grado_ae cg ON cc.id = cg.idr_componente_campo
								INNER JOIN r_grado_asignatura_ae ga ON cg.id = ga.idr_campo_grado
								INNER JOIN r_asignatura_eje_ae ae ON ga.id = ae.idr_grado_asignatura
								INNER JOIN c_eje_ae e ON ae.ideje = e.ideje
								WHERE nc.idnivel = ? AND nc.idcomponente= ? AND cc.idcampo= ? AND cg.idgrado= ? AND ga.idasignatura = ?
								ORDER BY e.eje";
			// echo "<pre>"; print_r($query); die();
			return $this->apr_db->query($query,[$idnivel,$idcomponente,$idcampo,$grado,$idasignatura])->result_array();
	}//obtener_arr_eje_xidnivel_idcomponente_idcampo_grado_idasignatura

	function obtener_arr_tema_xidnivel_idcomponente_idcampo_grado_idasignatura_ideje($idnivel,$idcomponente,$idcampo,$grado,$idasignatura,$ideje){
			$query = "SELECT
								t.idtema, t.tema
								FROM r_nivel_componente_ae nc
								INNER JOIN r_componente_campo_ae cc ON  nc.id = cc.idr_nivel_componente
								INNER JOIN r_campo_grado_ae cg ON cc.id = cg.idr_componente_campo
								INNER JOIN r_grado_asignatura_ae ga ON cg.id = ga.idr_campo_grado
								INNER JOIN r_asignatura_eje_ae ae ON ga.id = ae.idr_grado_asignatura
								INNER JOIN r_eje_tema_ae et ON ae.id = et.idr_asignatura_eje
								INNER JOIN c_tema_ae t ON et.idtema = t.idtema
								WHERE nc.idnivel = ? AND nc.idcomponente= ? AND cc.idcampo= ? AND cg.idgrado= ? AND ga.idasignatura = ? AND ae.ideje= ?
								ORDER BY t.tema";
			// echo "<pre>"; print_r($query); die();
			return $this->apr_db->query($query,[$idnivel,$idcomponente,$idcampo,$grado,$idasignatura,$ideje])->result_array();
	}//obtener_arr_tema_xidnivel_idcomponente_idcampo_grado_idasignatura_ideje

	function obtener_arr_aprendizajesesperados_xidnivel_idcomponente_idcampo_grado_idasignatura_ideje_idtema($idnivel,$idcomponente,$idcampo,$grado,$idasignatura,$ideje,$idtema){
		$wheremas = "";
		$datos = [$idnivel,$idcomponente,$idcampo,$grado,$idasignatura];
		if($ideje != 0 ){
			$wheremas .= " AND ae.ideje= ?";
			array_push($datos, $ideje);
		}
		if($idtema != 0 ){
			$wheremas .= " AND et.idtema= ?";
			array_push($datos, $idtema);
		}
			$query = "SELECT
								e.ideje, e.eje, t.idtema, t.tema,
								a.idaprendizaje_esperado, a.aprendizaje_esperado,
								GROUP_CONCAT(DISTINCT al.liga) as ligas,
								nc.idnivel,nc.idcomponente, cc.idcampo, cg.idgrado, ga.idasignatura
								FROM r_nivel_componente_ae nc
								INNER JOIN r_componente_campo_ae cc ON  nc.id = cc.idr_nivel_componente
								INNER JOIN r_campo_grado_ae cg ON cc.id = cg.idr_componente_campo
								INNER JOIN r_grado_asignatura_ae ga ON cg.id = ga.idr_campo_grado
								INNER JOIN r_asignatura_eje_ae ae ON ga.id = ae.idr_grado_asignatura
								INNER JOIN c_eje_ae e ON ae.ideje = e.ideje
								INNER JOIN r_eje_tema_ae et ON ae.id = et.idr_asignatura_eje
								INNER JOIN c_tema_ae t ON et.idtema =t.idtema
								INNER JOIN r_tema_prendizajes_esperados_ae ta ON et.id = ta.idr_eje_tema
								INNER JOIN c_aprendizaje_esperado_ae a ON ta.idaprendizaje_esperado = a.idaprendizaje_esperado
								LEFT JOIN r_aprendizaje_esperado_liga_ae al ON a.idaprendizaje_esperado = al.idaprendizaje_esperado AND nc.idnivel = al.idnivel AND cg.idgrado = al.idgrado AND ga.idasignatura = al.idasignatura
								WHERE nc.idnivel = ? AND nc.idcomponente= ? AND cc.idcampo= ? AND cg.idgrado= ? AND ga.idasignatura = ? {$wheremas}
								GROUP BY a.idaprendizaje_esperado
								ORDER BY ta.orden";
			// echo "<pre>"; print_r($query); die();
			return $this->apr_db->query($query,$datos)->result_array();
	}//obtener_arr_aprendizajesesperados_xidnivel_idcomponente_idcampo_grado_idasignatura_ideje_idtema

	function obtener_arr_ficha_aprendizajesesperados($idnivel,$idcomponente,$idcampo,$grado,$idasignatura,$ideje,$idtema,$idaprendizaje_esperado){
		$datos = [$idnivel,$idcomponente,$idcampo,$grado,$idasignatura,$ideje,$idtema,$idaprendizaje_esperado];
			$query = "SELECT
				n.nivel, co.componente, ca.campo, g.grado, asi.asignatura, e.eje, t.tema,
				a.aprendizaje_esperado, a.plan, GROUP_CONCAT(al.liga) as ligas,
				 GROUP_CONCAT(CONCAT(' Título: ',asil.titulo,'. ',asil.liga)) as libros
				FROM r_nivel_componente_ae nc
				INNER JOIN c_nivel_ae n ON nc.idnivel = n.idnivel
				INNER JOIN c_componente_ae co ON nc.idcomponente = co.idcomponente
				INNER JOIN r_componente_campo_ae cc ON  nc.id = cc.idr_nivel_componente
				INNER JOIN c_campo_ae ca ON cc.idcampo = ca.idcampo
				INNER JOIN r_campo_grado_ae cg ON cc.id = cg.idr_componente_campo
				INNER JOIN c_grado_ae g ON cg.idgrado = g.idgrado
				INNER JOIN r_grado_asignatura_ae ga ON cg.id = ga.idr_campo_grado
				INNER JOIN c_asignatura_ae asi ON ga.idasignatura = asi.idasignatura
				INNER JOIN r_asignatura_eje_ae ae ON ga.id = ae.idr_grado_asignatura
				INNER JOIN c_eje_ae e ON ae.ideje = e.ideje
				INNER JOIN r_eje_tema_ae et ON ae.id = et.idr_asignatura_eje
				INNER JOIN c_tema_ae t ON et.idtema =t.idtema
				INNER JOIN r_tema_prendizajes_esperados_ae ta ON et.id = ta.idr_eje_tema
				INNER JOIN c_aprendizaje_esperado_ae a ON ta.idaprendizaje_esperado = a.idaprendizaje_esperado
				LEFT JOIN r_aprendizaje_esperado_liga_ae al ON a.idaprendizaje_esperado = al.idaprendizaje_esperado AND nc.idnivel = al.idnivel AND cg.idgrado = al.idgrado AND ga.idasignatura = al.idasignatura
				LEFT JOIN r_asignatura_libro_ae asil ON n.idnivel = asil.idnivel AND g.idgrado = asil.idgrado AND asi.idasignatura = asil.idasignatura
				WHERE nc.idnivel = ? AND nc.idcomponente = ? AND cc.idcampo = ? AND cg.idgrado = ? AND ga.idasignatura = ? AND ae.ideje = ? AND et.idtema = ? AND ta.idaprendizaje_esperado = ?
				GROUP BY a.idaprendizaje_esperado
				ORDER BY ta.orden";
			// echo "<pre>"; print_r($query); die();
			$this->apr_db->query("SET SESSION group_concat_max_len = 1000000");
			return $this->apr_db->query($query,$datos)->result_array();
	}//obtener_arr_aprendizajesesperados_xidnivel_idcomponente_idcampo_grado_idasignatura_ideje_idtema

}//class
