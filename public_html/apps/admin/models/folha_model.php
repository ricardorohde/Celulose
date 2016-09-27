<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Folha_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


	function getFolhas($page = 0){
		return $this->db->select('id, titulo, descricao, url, data')
			->from('celulose_folha')
			->order_by('data','desc')
			->limit(20,$page)
			->get()->result();
	}

	function getFolhasNum(){
		return $this->db->select('id')
			->from('celulose_folha')
			->get()->num_rows();
	}

	function getFolhasSearch($page,$search){
		return $this->db->select('id, titulo, descricao, url, data')
			->from('celulose_folha')
			->or_like(array(
				'url' => $search,
				'titulo' => $search
			))
			->order_by('data','desc')
			->limit(20,$page)
			->get()->result();
	}

	function getFolhasSearchNum($search){
		return $this->db->select('id, titulo, descricao, url, data')
			->from('celulose_folha')
			->or_like(array(
				'url' => $search,
				'titulo' => $search
			))
			->get()->num_rows();
	}

	function getFolha($id){
		return $this->db->select('id, titulo, descricao, url, data')
			->from('celulose_folha')
			->where('id = ',$id)
			->get()->row();
	}

	function insertFolha($data){
		$this->db->insert('celulose_folha',$data);
		$id = $this->db->insert_id();
		$this->logs->register();
		return $id;
	}

	function updateFolha($id,$data){
		$this->db->update('celulose_folha',$data,'id = '.$id);
		$this->logs->register();
		return $id;
	}

	function deleteFolha($id){
		$this->db->delete('celulose_folha','id = '.$id);
		$this->logs->register();
		return $id;
	}

	function hasURL($url,$lang){
		return $this->db->select('id')
			->from('celulose_folha')
			->where(array(
				'url = ' => $url
			))
			->get()->num_rows() == 1 ? true : false;
	}

	function getFolhaConteudos($id){
		return $this->db->select('id, categoria, titulo, html, ordem, filtro')
			->from('celulose_folha_conteudos')
			->where('folha = ',$id)
			->get()->result();
	}

	function getFolhaConteudo($id){
		return $this->db->select('id, categoria, titulo, html, ordem, filtro')
			->from('celulose_folha_conteudos')
			->where('id = ',$id)
			->get()->row();
	}

	function insertFolhaConteudo($data){
		$this->db->insert('celulose_folha_conteudos',$data);
		$id = $this->db->insert_id();
		$this->logs->register();
		return $id;
	}

	function updateFolhaConteudo($id,$data){
		$this->db->update('celulose_folha_conteudos',$data,'id = '.$id);
		$this->logs->register();
		return $id;
	}

	function deleteFolhaConteudo($id){
		$this->db->delete('celulose_folha_conteudos','id = '.$id);
		$this->logs->register();
		return $id;
	}
}