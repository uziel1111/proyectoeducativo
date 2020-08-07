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
								WHERE nc.idnivel= ?";
			// echo "<pre>"; print_r($query); die();
			return $this->apr_db->query($query,[$idnivel])->result_array();
	}//obtener_arr_componente_xidnivel

	function obtener_arr_campo_xidnivel_idcomponente($idnivel,$idcomponente){
			$query = "SELECT
								c.idcampo, c.idcampo
								FROM r_nivel_componente_ae nc
								INNER JOIN r_componente_campo_ae cc ON  nc.id = cc.idr_nivel_componente
								INNER JOIN c_campo_ae c ON cc.idcampo = c.idcampo
								WHERE nc.idnivel = ? AND nc.idcomponente= ?";
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

}//class
