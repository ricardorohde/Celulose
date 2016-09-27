<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {	
	
	function __construct(){
		parent::__construct();
	}

	function getSliders(){

		$grupo =  $this->db->select('slider.id')
			->from('celulose_sliders AS slider')
			->join('celulose_lang as lang','slider.lang = lang.id','inner join')
			->where(array(
				'lang.param = ' => $_SESSION['celulose_lang'],
				'slider.status = ' => '1'
			))
			->order_by('slider.id','random')
			->get()->row();

		if($grupo){
			return $this->db->select('img.legenda, img.arquivo, img.link')
			->from('celulose_sliders_img AS img')
			->where('img.slider = ',$grupo->id)
			->order_by('img.ordem','asc')
			->get()->result();
		} else {
			return false;
		}
	}

	function getNoticiasLista(){

		return $this->db->select('noticias.id, noticias.url, noticias.titulo, noticias.data, noticias.html')
		->from('celulose_noticias as noticias')
		->join('celulose_lang as lang','noticias.lang = lang.id','inner join')
		->where(array(
				// 'lang.param = ' => $_SESSION['celulose_lang'],
				'noticias.visible = ' => '1'
		))
		->order_by('noticias.data','desc')
		->limit(3,0)
		->get()->result();

	}

	function getNewsletterByEmail($email){
		return $this->db->select('id, nome, email, ctime')
			->from('celulose_newsletter')
			->where('email = ',$email)
			->get()->row();
	}

	function insertNewsletter($data){
		$this->db->insert('celulose_newsletter',$data);
		return $this->db->insert_id();
	}
	
	function getRedirect($url){
		return $this->db->select('id, url')
			->from('celulose_redirect')
			->where('param = ',$url)
			->get()->row();
	}
}


