<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias_model extends CI_Model {	
	
	function __construct(){
		parent::__construct();
	}

	function getNoticia($url){

		$db = $this->db->select('noticias.id, noticias.url, noticias.titulo, noticias.data, noticias.html')
		->from('celulose_noticias as noticias')
		->join('celulose_lang as lang','noticias.lang = lang.id','inner join')
		->where(array(
				//'lang.param = ' => $_SESSION['celulose_lang'],
				'noticias.visible = ' => '1'
		));
		if(!empty($url)){
			$db->where('noticias.url =',$url);
		} else {
			$db->order_by('noticias.data','desc');
		}
		return $db->get()->row();

	}

	function getNoticiasLista(){

		return $this->db->select('noticias.id, noticias.url, noticias.titulo, noticias.data, noticias.html')
		->from('celulose_noticias as noticias')
		->join('celulose_lang as lang','noticias.lang = lang.id','inner join')
		->where(array(
				//'lang.param = ' => $_SESSION['celulose_lang'],
				'noticias.visible = ' => '1'
		))
		->order_by('noticias.data','desc')
		->limit(7,0)
		->get()->result();

	}

	function getNoticiasListaNum(){

		return $this->db->select('noticias.id')
		->from('celulose_noticias as noticias')
		->join('celulose_lang as lang','noticias.lang = lang.id','inner join')
		->where(array(
				//'lang.param = ' => $_SESSION['celulose_lang'],
				'noticias.visible = ' => '1'
		))
		->get()->num_rows();

	}

}


