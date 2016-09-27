<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ambientais_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function getRelatorios($page = 0){
		return $this->db->select('ano, mes, arquivo')
			->from('celulose_relatorios')
			->order_by('ano','desc')
			->order_by('mes','desc')
			->limit(20,$page)
			->get()->result();
	}

	function getRelatoriosNum(){
		return $this->db->select('arquivo')
			->from('celulose_relatorios')
			->get()->num_rows();
	}

	function getRelatoriosSearch($page,$search){
		return $this->db->select('ano, mes, arquivo')
			->from('celulose_relatorios')
			->or_like(array(
				'ano' => $search,
				'mes' => $search
			))
			->order_by('ano','desc')
			->order_by('mes','desc')
			->limit(20,$page)
			->get()->result();
	}

	function getRelatoriosSearchNum($search){
		return $this->db->select('arquivo')
			->from('celulose_relatorios')
			->or_like(array(
				'ano' => $search,
				'mes' => $search
			))
			->get()->num_rows();
	}

	function getRelatorio($ano,$mes){
		return $this->db->select('ano, mes, arquivo')
			->from('celulose_relatorios')
			->where(array(
				'ano = ' => $ano,
				'mes = ' => $mes
			))
			->get()->row();
	}

	function insertRelatorio($data){
		$this->db->insert('celulose_relatorios',$data);
		$id = $this->db->insert_id();
		$this->logs->register();
		return $id;
	}

	function deleteRelatorio($ano,$mes){
		$this->db->delete('celulose_relatorios','ano = '.$ano.' and mes = '.$mes);
		$this->logs->register();
		return $id;
	}
}