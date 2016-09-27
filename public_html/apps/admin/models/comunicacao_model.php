<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comunicacao_model extends CI_Model {	

	function __construct(){
		parent::__construct();
	}

	function getLangs(){
		return $this->db->select('id, nome, param')
			->from('celulose_lang')
			->order_by('nome','desc')
			->get()->result();
	}

	function getContatos($page = 0){
		return $this->db->select('contato.id, contato.nome, contato.sobrenome, contato.email, contato.ctime, areas.titulo as area, areas.status as areaStatus, langs.nome as lang')
			->from('celulose_contato as contato')
			->join('celulose_contato_areas as areas','contato.area = areas.id','inner join')
			->join('celulose_lang as langs','areas.lang = langs.id','left outer')
			->order_by('contato.ctime','desc')
			->limit(20,$page)
			->get()->result();
	}

	function getContatosNum(){
		return $this->db->select('id')
			->from('celulose_contato')
			->get()->num_rows();
	}

	function getContatosSearch($page = 0, $search = ''){
		return $this->db->select('contato.id, contato.nome, contato.sobrenome, contato.email, contato.ctime, areas.titulo as area, areas.status as areaStatus, langs.nome as lang')
			->from('celulose_contato as contato')
			->join('celulose_contato_areas as areas','contato.area = areas.id','inner join')
			->join('celulose_lang as langs','areas.lang = langs.id','left outer')
			->or_like(array(
				'contato.id' => $search,
				'contato.nome' => $search,
				'contato.sobrenome' => $search,
				'contato.email' => $search,
				'areas.titulo' => $search
			))
			->order_by('contato.ctime','desc')
			->limit(20,$page)
			->get()->result();
	}

	function getContatosSearchNum($search = ''){
	return $this->db->select('contato.id')
			->from('celulose_contato as contato')
			->join('celulose_contato_areas as areas','contato.area = areas.id','inner join')
			->join('celulose_lang as langs','areas.lang = langs.id','left outer')
			->or_like(array(
				'contato.id' => $search,
				'contato.nome' => $search,
				'contato.sobrenome' => $search,
				'contato.email' => $search,
				'areas.titulo' => $search
			))
			->get()->num_rows();
	}

	function getContato($id){
		return $this->db->select('contato.id, contato.nome, contato.sobrenome, contato.email, contato.ctime, contato.mensagem, areas.titulo as area, areas.status as areaStatus, langs.nome as lang')
			->from('celulose_contato as contato')
			->join('celulose_contato_areas as areas','contato.area = areas.id','inner join')
			->join('celulose_lang as langs','areas.lang = langs.id','left outer')
			->where('contato.id',$id)
			->get()->row();
	}


	/* ----------- Trabalhe Conosco ----------- */


	function getTrabalhe($id){
		$sql = "SELECT celulose_trabalhe.celulose_id AS id, celulose_trabalhe.celulose_nome AS nome, celulose_trabalhe.celulose_email AS email, celulose_trabalhe.celulose_telefone AS telefone, celulose_trabalhe.celulose_data AS `data`, celulose_trabalhe.celulose_cidade AS cidade, celulose_trabalhe.celulose_formacao AS formacao, celulose_trabalhe.celulose_formacao_outro AS formacao_outro, celulose_trabalhe.celulose_curso AS curso, celulose_trabalhe.celulose_curso_outro AS curso_outro, celulose_trabalhe.celulose_salario AS salario, celulose_trabalhe.celulose_pretencao AS pretensao, celulose_trabalhe.celulose_area AS area, celulose_trabalhe.celulose_area_outro AS area_outro, celulose_trabalhe.celulose_area_tempo AS area_tempo, celulose_trabalhe.celulose_estagio AS estagio, celulose_trabalhe.celulose_fisica AS fisica, celulose_trabalhe.celulose_arquivo AS arquivo, celulose_trabalhe.celulose_ctime AS ctime FROM celulose_trabalhe WHERE celulose_trabalhe.celulose_id = '{$id}' LIMIT 1";
		return $this->db->query($sql)->row();
	}
	function delete($id){
		$this->db->delete('celulose_trabalhe',"celulose_id = '{$id}'");
	}

	function getFormacoes(){
		$sql = "SELECT DISTINCT celulose_trabalhe.celulose_formacao AS formacao FROM celulose_trabalhe ORDER BY formacao ASC";
		return $this->db->query($sql)->result();
	}
	function getCursos(){
		$sql = "SELECT DISTINCT celulose_trabalhe.celulose_curso AS curso FROM celulose_trabalhe ORDER BY curso ASC";
		return $this->db->query($sql)->result();
	}
	function getAreas(){
		$sql = "SELECT DISTINCT celulose_trabalhe.celulose_area AS area FROM celulose_trabalhe ORDER BY area ASC";
		return $this->db->query($sql)->result();
	}
	function getTrabalhesSearchAdvance($where = array()){
		if(sizeof($where) > 0){
			$where = " WHERE ".implode(" AND ",$where);
		} else {
			$where = '';
		}
		$sql = "SELECT celulose_trabalhe.celulose_id AS id, celulose_trabalhe.celulose_nome AS nome, celulose_trabalhe.celulose_email AS email, celulose_trabalhe.celulose_estagio AS estagio, celulose_trabalhe.celulose_ctime AS ctime FROM celulose_trabalhe {$where} ORDER BY ctime DESC";
		return $this->db->query($sql)->result();
	}


	/* ----------- Trabalhe Conosco v2 ----------- */

	private function setSearchTrabalhe(&$query,&$params){
		$where = array('formacao','curso','area','estagio','fisica');
		$like = array('nome','email','cidade','telefone','curso_outro','salario','pretencao','area_outro','area_tempo');

		foreach($where as $key){
			if(isset($params[$key])){
				$query->where('celulose_' . $key . ' =', $params[$key]);
			}
		}

		foreach($like as $key){
			if(isset($params[$key])){
				$query->like('celulose_' . $key,$params[$key]);
			}
		}
	}

	function getTrabalhesSearchNum($params){
		$query = $this->db->select('celulose_id')->from('celulose_trabalhe');

		$this->setSearchTrabalhe($query,$params);

		return $query->get()->num_rows();
	}

	function getTrabalhesSearch($params,$per_page){
		$query = $this->db->select('celulose_id as id, celulose_nome as nome, celulose_email as email, celulose_estagio as estagio, celulose_ctime as ctime')
			->from('celulose_trabalhe')
			->order_by('ctime','desc')
			->limit(20,$per_page);

		$this->setSearchTrabalhe($query,$params);

		return $query->get()->result();
	}










}