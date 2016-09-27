<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function getLangs(){
		return $this->db->select('id, nome, param')
			->from('celulose_lang')
			->order_by('nome','desc')
			->get()->result();
	}

	function getNoticias($page = 0){
		return $this->db->select('imprensa.id, imprensa.url, lang.id as lid, lang.nome, imprensa.titulo, imprensa.data, imprensa.html, imprensa.visible')
			->from('celulose_noticias as imprensa')
			->join('celulose_lang AS lang','imprensa.lang = lang.id','inner join')
			->order_by('imprensa.data','desc')
			->limit(20,$page)
			->get()->result();
	}

	function getNoticiasNum(){
		return $this->db->select('imprensa.id')
			->from('celulose_noticias as imprensa')
			->join('celulose_lang AS lang','imprensa.lang = lang.id','inner join')
			->get()->num_rows();
	}

	function getNoticiasSearch($page,$search){
		return $this->db->select('imprensa.id, imprensa.url, lang.id as lid, lang.nome, imprensa.titulo, imprensa.data, imprensa.html, imprensa.visible')
			->from('celulose_noticias as imprensa')
			->join('celulose_lang AS lang','imprensa.lang = lang.id','inner join')
			->or_like(array(
				'url' => $search,
				'titulo' => $search
			))
			->order_by('imprensa.data','desc')
			->limit(20,$page)
			->get()->result();
	}

	function getNoticiasSearchNum($search){
		return $this->db->select('imprensa.id')
			->from('celulose_noticias as imprensa')
			->join('celulose_lang AS lang','imprensa.lang = lang.id','inner join')
			->or_like(array(
				'imprensa.url' => $search,
				'imprensa.titulo' => $search
			))
			->get()->num_rows();
	}

	function getNoticia($id){
		return $this->db->select('imprensa.id, imprensa.url, lang.id as lid, lang.nome, imprensa.titulo, imprensa.data, imprensa.html, imprensa.visible')
			->from('celulose_noticias as imprensa')
			->join('celulose_lang AS lang','imprensa.lang = lang.id','inner join')
			->where('imprensa.id = ',$id)
			->get()->row();
	}

	function insertNoticia($data){
		$this->db->insert('celulose_noticias',$data);
		$id = $this->db->insert_id();
		$this->logs->register();
		return $id;
	}

	function updateNoticia($id,$data){
		$this->db->update('celulose_noticias',$data,'id = '.$id);
		$this->logs->register();
		return $id;
	}

	function deleteNoticia($id){
		$this->db->delete('celulose_noticias','id = '.$id);
		$this->logs->register();
		return $id;
	}

	function hasURL($url,$lang){
		return $this->db->select('id')
			->from('celulose_noticias')
			->where(array(
				'url = ' => $url,
				'lang = ' => $lang
			))
			->get()->num_rows() == 1 ? true : false;
	}
}