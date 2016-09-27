<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expansao_model extends CI_Model {	

	function __construct(){
		parent::__construct();
	}

	function getFotos($page = 0){
		return $this->db->select('fotos.id, fotos.desc, fotos.arquivo, fotos.data')
			->from('celulose_expansao_fotos as fotos')
			->join('celulose_lang as lang','fotos.lang = lang.id','inner')
			->where('lang.param = ',$_SESSION['celulose_lang'])
			->order_by('data','desc')
			->get()->result();
	}

	function getVideos($page = 0){
		return $this->db->select('videos.id, videos.titulo, videos.arquivo, videos.link, videos.data')
			->from('celulose_expansao_videos as videos')
			->join('celulose_lang as lang','videos.lang = lang.id','inner')
			->where('lang.param = ',$_SESSION['celulose_lang'])
			->order_by('data','desc')
			->get()->result();
	}
}


// Guaíba 2