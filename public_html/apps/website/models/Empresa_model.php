<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa_model extends CI_Model {	
	
	function __construct(){
		parent::__construct();
	}

	function getCertificacoes(){

		return $this->db->select('id, nome, texto, link, img')
		->from('celulose_certificacoes')
		->order_by('ordem','asc')
		->get()->result();

	}
}


