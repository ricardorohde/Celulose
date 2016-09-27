<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Responsabilidade extends CI_Controller {

	const year = 2002;

	public function index(){
		views($this,getLang().'/responsabilidade/publicacoes',array(
			'header' => array(
				'title' => lang('defualt_menu_publicacoes'),
				'description' => '',
				'keywords' => '' 
			)
		));
	}

	public function florestal(){
		views($this,getLang().'/responsabilidade/florestal',array(
			'header' => array(
				'title' => lang('defualt_menu_ambiente_florestal'),
				'description' => '',
				'keywords' => '' 
			)
		));
	}

	public function industrial(){
		$this->load->model('responsabilidade_model','model');

		$lista = array();
		for($y = date("Y"); $y >= self::year; $y--){
			$lista[$y] = array();
			for($m = 1; $m <= 12; $m++){
				$lista[$y][$m] = false;

				$relatorio = $this->model->getRelatiorioByMes($y,$m);
				if($relatorio){
					$lista[$y][$m] = (object) array(
						'texto' => lang('defualt_mes_'.$m),
						'arquivo' => base_url('docs/relatorio/'.$y.'/'.$m)
					); 
				}
			}
		}

		views($this,getLang().'/responsabilidade/industrial',array(
			'header' => array(
				'title' => lang('defualt_menu_ambiente_industrial'),
				'description' => '',
				'keywords' => '' 
			),
			'lista' => $lista
		));
	}

	public function sociais(){

		$this->load->model('responsabilidade_model','model');

		views($this,getLang().'/responsabilidade/sociais',array(
			'header' => array(
				'title' => lang('defualt_menu_projetos'),
				'description' => '',
				'keywords' => '' 
			),
			'lista' => $this->model->getSocialLista()
		));
	}

	public function empregos(){

		$this->load->model('responsabilidade_model','model');
		
		views($this,getLang().'/responsabilidade/empregos',array(
			'header' => array(
				'title' => lang('defualt_menu_empregos'),
				'description' => '',
				'keywords' => '' 
			),
			'lista' => $this->model->getEmpregosLista()
		));
	}

	public function fiscal(){
		views($this,getLang().'/responsabilidade/fiscal',array(
			'header' => array(
				'title' => lang('defualt_menu_fiscal'),
				'description' => '',
				'keywords' => '' 
			)
		));
	}

	public function barbaNegra(){
		views($this,getLang().'/responsabilidade/barbaNegra',array(
			'header' => array(
				'title' => lang('defualt_menu_barba'),
				'description' => '',
				'keywords' => '' 
			)
		));
	}

	public function folha(){
		views($this,getLang().'/responsabilidade/folha',array(
			'header' => array(
				'title' => lang('defualt_menu_folha'),
				'description' => '',
				'keywords' => '' 
			)
		));
	}

	public function folhaLista($url,$id = false){

		if(!in_array($url,array('campanha','centro','metropolitana'))) show_404();

		$this->load->model('responsabilidade_model','model');

		$folha = $this->getFolha($url,$id);
		$conteudos = $this->getConteudos($url,$folha->id);

		if($folha){
			views($this,getLang().'/responsabilidade/folhaLista',array(
				'header' => array(
					'title' => lang('defualt_menu_folha'),
					'description' => '',
					'keywords' => '' 
				),
				'url' => $url,
				'conteudos' => $conteudos,
				'lista' => $this->model->getFolhaEdicaoLista($url)
			));
		} else {
			show_404();
		}
	}

	private function getFolha($url,$id){
		if($id){
			$folha = $this->model->getFolhaEdicaoByURL($id);
		} else {
			$folha = $this->model->getFolhaEdicaoLast($url);
		}
		return $folha;
	}

	private function getConteudos($url,$id){
		return $this->model->getFolhaEdicaoConteudos($url,$id);
	}
}