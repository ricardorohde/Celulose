<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Responsabilidade_model extends CI_Model {	
	
	function __construct(){
		parent::__construct();
	}

	function getSocialLista(){
		return $this->db->select('sociais.titulo, sociais.arquivo, sociais.descricao, sociais.link')
			->from('celulose_projetos_sociais as sociais')
			->join('celulose_lang as lang','sociais.lang = lang.id','inner join')
			->where('lang.param = ',$_SESSION['celulose_lang'])
			->order_by('sociais.ordem','asc')
			->get()->result();
	}

	function getRelatiorioByMes($y,$m){
		return $this->db->select('ano, mes, arquivo')
			->from('celulose_relatorios')
			->where(array(
				'ano = ' => $y,
				'mes = ' => $m
			))
			->get()->row();
	}

	function getEmpregosLista(){
		return $this->db->select('municipio, masculino, feminino, pmasculino, pfeminino, ltime')
			->from('celulose_empregos')
			->order_by('municipio','asc')
			->get()->result();
	}

	function getFolhaEdicaoLista($filtro){
		return $this->db->select('folhas.id, folhas.titulo, folhas.descricao, folhas.url, folhas.data')
			->from('celulose_folha as folhas')
			->join('celulose_folha_conteudos as conteudos','folhas.id = conteudos.folha','inner join')
			->like('conteudos.filtro',$filtro)
			->group_by('folhas.id')
			->order_by('folhas.data','desc')
			->get()->result();
	}

	function getFolhaEdicaoByURL($url){
		return $this->db->select('id, titulo, descricao, url')
			->from('celulose_folha')
			->where('url = ',$url)
			->get()->row();
	}

	function getFolhaEdicaoLast(){
		return $this->db->select('id, titulo, descricao, url')
			->from('celulose_folha')
			->order_by('data','desc')
			->get()->row();
	}

	function getFolhaEdicaoConteudos($filtro,$id){
		return $this->db->select('id, categoria, titulo, html')
			->from('celulose_folha_conteudos')
			->where(array(
				'folha =' => $id
			))
			->like('filtro', $filtro)
			->order_by('ordem','asc')
			->get()->result();
	}
	
}
