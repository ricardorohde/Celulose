<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider_model extends CI_Model {	

	function __construct(){
		parent::__construct();
	}

	function getLangs(){
		return $this->db->select('id, nome, param')
			->from('celulose_lang')
			->order_by('nome','desc')
			->get()->result();
	}

	function getSliders($page = 0){
		return $this->db->select('slider.id, slider.nome, slider.status, slider.ctime, lang.nome AS lang, Count(img.id) AS nums')
			->from('celulose_sliders AS slider')
			->join('celulose_lang AS lang','slider.lang = lang.id','inner join')
			->join('celulose_sliders_img AS img','slider.id = img.slider','left outer')
			->group_by(array('slider.id','slider.nome'))
			->order_by('slider.status','asc')
			->order_by('slider.ctime','desc')
			->limit(20,$page)
			->get()->result();
	}

	function getSlidersNum(){
		return $this->db->select('id')
			->from('celulose_sliders')
			->get()->num_rows();
	}

	function getSlidersSearch($page = 0, $search = ''){
		return $this->db->select('slider.id, slider.nome, slider.status, slider.ctime, lang.nome AS lang, Count(img.id) AS nums')
			->from('celulose_sliders AS slider')
			->join('celulose_lang AS lang','slider.lang = lang.id','inner join')
			->join('celulose_sliders_img AS img','slider.id = img.slider','left outer')
			->like('slider.nome',$search)
			->group_by(array('slider.id','slider.nome'))
			->order_by('slider.status','asc')
			->order_by('slider.ctime','desc')
			->limit(20,$page)
			->get()->result();
	}

	function getSlidersSearchNum($search = ''){
		return $this->db->select('id')
			->from('celulose_sliders')
			->like('nome',$search)
			->get()->num_rows();
	}

	function insertSlider($data){
		$this->db->insert('celulose_sliders',$data);
		$id = $this->db->insert_id();
		$this->logs->register();
		return $id;
	}

	function updateSlider($id,$data){
		$this->db->update('celulose_sliders',$data,'id = '.$id);
		$this->logs->register();
	}

	function getSlider($id){
		return $this->db->select('id, nome, status, ctime, lang')
			->from('celulose_sliders')
			->where('id = ',$id)
			->get()->row();
	}

	function deleteSlider($id){
		$this->db->delete('celulose_sliders','id = '.$id);
		$this->logs->register();
	}

	/* ---------- Imagems ---------- */

	function getSliderImagen($id){
		return $this->db->select('id, legenda, arquivo, link, ordem')
			->from('celulose_sliders_img')
			->where('id = ',$id)
			->get()->row();
	}

	function getSliderImagens($id){
		return $this->db->select('id, legenda, arquivo, link, ordem')
			->from('celulose_sliders_img')
			->where('slider = ',$id)
			->order_by('ordem','asc')
			->get()->result();
	}

	function updateSliderImagen($id,$data){
		$this->db->update('celulose_sliders_img',$data,'id = '.$id);
	}

	function deleteImagem($id){
		$this->db->delete('celulose_sliders_img','id = '.$id);
	}

	function insertImagem($data){
		$this->db->insert('celulose_sliders_img',$data);
		$id = $this->db->insert_id();
		$this->logs->register();
		return $id;
	}

}