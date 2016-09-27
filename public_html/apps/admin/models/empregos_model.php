<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empregos_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function getEmpregos($page = 0){
		return $this->db->select('id, municipio, masculino, feminino, pmasculino, pfeminino')
			->from('celulose_empregos')
			->order_by('municipio','asc')
			->limit(20,$page)
			->get()->result();
	}

	function getEmpregosNum(){
		return $this->db->select('id')
			->from('celulose_empregos')
			->get()->num_rows();
	}

	function getEmpregosSearch($page,$search){
		return $this->db->select('id, municipio, masculino, feminino, pmasculino, pfeminino')
			->from('celulose_empregos')
			->or_like(array(
				'municipio' => $search
			))
			->order_by('municipio','asc')
			->limit(20,$page)
			->get()->result();
	}

	function getEmpregosSearchNum($search){
		return $this->db->select('id')
			->from('celulose_empregos')
			->or_like(array(
				'municipio' => $search
			))
			->get()->num_rows();
	}

	function getEmprego($id){
		return $this->db->select('id, municipio, masculino, feminino, pmasculino, pfeminino')
			->from('celulose_empregos')
			->where('id = ',$id)
			->get()->row();
	}

	function insertEmprego($data){
		$this->db->insert('celulose_empregos',$data);
		$id = $this->db->insert_id();
		$this->logs->register();
		return $id;
	}

	function updateEmprego($id,$data){
		$this->db->update('celulose_empregos',$data,'id = '.$id);
		$this->logs->register();
		return $id;
	}

	function deleteEmprego($id){
		$this->db->delete('celulose_empregos','id = '.$id);
		$this->logs->register();
		return $id;
	}

}