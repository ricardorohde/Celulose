<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_model extends CI_Model {	

    function __construct(){
		parent::__construct();
    }
    
    function getFaq(){
    	return $this->db->select('id, numero, titulo, conteudo')
	    	->from('faqs')
	    	->order_by('numero', 'asc')
	    	->get()->result();
    }
    
    function getFaqById($id){
    	return $this->db->select('id, numero, titulo, conteudo')
    		->from('faqs')
    		->where('id', $id)
    		->get()->row();
    }
}