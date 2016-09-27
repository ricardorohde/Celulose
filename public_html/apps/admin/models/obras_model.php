<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obras_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


	function getFotosLista($page = 0){
		return $this->db->select('id, lang, arquivo, data')
			->from('celulose_expansao_fotos')
			->order_by('data','desc')
			->limit(20,$page)
			->get()->result();
	}
	
	function getFotosListaNum(){
		return $this->db->select('id')
			->from('celulose_expansao_fotos')
			->get()->num_rows();
	}
	
	function insertFoto($data){
		$this->db->insert('celulose_expansao_fotos', $data);
	}
	
	function getFotoById($id){
		return $this->db->select('id, lang, desc, arquivo, data')
		->from('celulose_expansao_fotos')
		->where('id =', $id)
		->get()->row();
	}
	
	function updateFoto($data, $id){
		$this->db->where('id =', $id);
		$this->db->update('celulose_expansao_fotos', $data);
	}
	
	function deleteFoto($id){
		$this->db->where('id =', $id);
		$this->db->delete('celulose_expansao_fotos');
	}
	
	/* Videos */
	
	function getVideosListaNum(){
		return $this->db->select('id')
			->from('celulose_expansao_videos')
			->get()->num_rows();
	}
	
	function getVideosLista($page = 0){
		return $this->db->select('id, lang, titulo, data')
			->from('celulose_expansao_videos')
			->order_by('data','desc')
			->limit(20,$page)
			->get()->result();
	}
	
	function getVideoById($id){
		return $this->db->select('id, lang, titulo, arquivo, data, link')
			->from('celulose_expansao_videos')
			->where('id =', $id)
			->get()->row();
	}
	
	function insertVideo($data){
		$this->db->insert('celulose_expansao_videos', $data);
	}
	
	function updateVideo($data, $id){
		$this->db->where('id =', $id);
		$this->db->update('celulose_expansao_videos', $data);
	}
	
	function deleteVideo($id){
		$this->db->where('id =', $id);
		$this->db->delete('celulose_expansao_videos');
	}
	
}