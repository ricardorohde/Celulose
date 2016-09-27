<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato_model extends CI_Model {	
	function __construct(){
		parent::__construct();
	}

	function gerateID(){
		return $this->db->select('UUID() as id')->get()->row()->id;
	}

	function getAreas(){
		return $this->db->select('areas.titulo, areas.id')
			->from('celulose_contato_areas as areas')
			->join('celulose_lang as lang','areas.lang = lang.id','inner join')
			->where('lang.param = ',$_SESSION['celulose_lang'])
			->where('areas.status = ',1)
			->order_by('areas.titulo','asc')
			->get()->result();
	}
	
	function getEmailsByArea($aid){
		return $this->db->select('GROUP_CONCAT(celulose_contato_areas_emails.email) as emails')
			->from('celulose_contato_areas_emails')
			->where('area = ',$aid)
			->get()->row();
	}

	function insertContato($data){
		$this->db->insert('celulose_contato',$data);
	}

	/* Trabalhe Conosco */

	function getTrabalheArea(){
		return $this->db->select('id, nome')
			->from('celulose_trabalho_areas')
			->order_by('nome','asc')
			->get()->result();
	}

	function getTrabalheCursos(){
		return $this->db->select('id, nome')
			->from('celulose_trabalho_cursos')
			->order_by('nome','asc')
			->get()->result();
	}

	function getTrabalheFormacoes(){
		return $this->db->select('id, nome')
			->from('celulose_trabalho_formacoes')
			->order_by('nome','asc')
			->get()->result();
	}

	function insertTrabalheConosco($data){
		$this->db->insert('celulose_trabalhe',$data);
		return $this->db->insert_id();
	}


}



