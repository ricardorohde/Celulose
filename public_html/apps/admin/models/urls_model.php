<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Urls_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function getURLs($page = 0){
		return $this->db->select('id, param, url')
			->from('celulose_redirect')
			->order_by('param','asc')
			->limit(20,$page)
			->get()->result();
	}

	function getURLsNum(){
		return $this->db->select('id')
			->from('celulose_redirect')
			->get()->num_rows();
	}

	function getURLsSearch($page,$search){
		return $this->db->select('id, param, url')
			->from('celulose_redirect')
			->or_like(array(
				'param' => $search,
				'url' => $search
			))
			->order_by('param','asc')
			->limit(20,$page)
			->get()->result();
	}

	function getURLsSearchNum($search){
		return $this->db->select('id')
			->from('celulose_redirect')
			->or_like(array(
				'param' => $search,
				'url' => $search
			))
			->get()->num_rows();
	}

	function getURL($id){
		return $this->db->select('id, param, url')
			->from('celulose_redirect')
			->where('id = ',$id)
			->get()->row();
	}

	function insertURL($data){
		$this->db->insert('celulose_redirect',$data);
		$id = $this->db->insert_id();
		$this->logs->register();
		return $id;
	}

	function updateURL($id,$data){
		$this->db->update('celulose_redirect',$data,'id = '.$id);
		$this->logs->register();
		return $id;
	}

	function deleteURL($id){
		$this->db->delete('celulose_redirect','id = '.$id);
		$this->logs->register();
		return $id;
	}

}