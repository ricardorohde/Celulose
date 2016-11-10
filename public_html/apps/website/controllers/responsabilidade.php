<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Responsabilidade extends CI_Controller {

	const year = 2002;

	public function index(){

		$this->load->view('tpl/header',[
			'title' => lang('defualt_menu_publicacoes'),
		 	'description' => '',
		 	'keywords' => '' 
			]);
		$this->load->view(getLang().'/responsabilidade/home');
		

		$this->load->view('tpl/agende');
		$this->load->view('tpl/footer');
	}

	public function publicacoes(){
		$this->load->view('tpl/header',[
			'title' => lang('defualt_menu_publicacoes'),
		 	'description' => '',
		 	'keywords' => '' 
			]);
		$this->load->view(getLang().'/responsabilidade/publicacoes');
		$this->load->view(getLang().'/responsabilidade/folha');

		$this->load->view('tpl/agende');
		$this->load->view('tpl/footer');
	}

	public function florestal(){
		$this->load->view('tpl/header',[
			'title' => lang('defualt_menu_ambiente_florestal'),
		 	'description' => '',
		 	'keywords' => '' 
			]);
		$this->load->view(getLang().'/responsabilidade/florestal');

		$this->load->view('tpl/agende');
		$this->load->view('tpl/footer');
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
						'arquivo' => base_url('docs/relatorio/'.$y.'/'.$m),
						'titulo' => lang('mes_'.$m)
					); 
				}
			}
		}

		$this->load->view('tpl/header',[
			'title' => lang('defualt_menu_ambiente_industrial'),
		 	'description' => '',
		 	'keywords' => '' 
			]);
		$this->load->view(getLang().'/responsabilidade/industrial',[
			'lista' => $lista
			]);

		$this->load->view('tpl/agende');
		$this->load->view('tpl/footer');
	}

	public function sociais(){

		$this->load->model('responsabilidade_model','model');

		$this->load->view('tpl/header',[
			'title' => lang('defualt_menu_projetos'),
		 	'description' => '',
		 	'keywords' => '' 
			]);
		$this->load->view(getLang().'/responsabilidade/sociais',[
				'lista' => $this->model->getSocialLista()
			]);

		$this->load->view('tpl/agende');
		$this->load->view('tpl/footer');
	}

	public function empregos(){

		$this->load->model('responsabilidade_model','model');
		
		$this->load->view('tpl/header',[
			'title' => lang('defualt_menu_empregos'),
		 	'description' => '',
		 	'keywords' => '' 
			]);
		$this->load->view(getLang().'/responsabilidade/empregos',[
				'lista' => $this->model->getEmpregosLista()
			]);

		$this->load->view('tpl/agende');
		$this->load->view('tpl/footer');
	}

	public function fiscal(){
		$this->load->view('tpl/header',[
			'title' => lang('defualt_menu_fiscal'),
		 	'description' => '',
		 	'keywords' => '' 
			]);
		$this->load->view(getLang().'/responsabilidade/fiscal');

		$this->load->view('tpl/agende');
		$this->load->view('tpl/footer');
	}

	public function barbaNegra(){
		$this->load->view('tpl/header',[
			'title' => lang('defualt_menu_barba'),
		 	'description' => '',
		 	'keywords' => '' 
			]);
		$this->load->view(getLang().'/responsabilidade/barbaNegra');

		$this->load->view('tpl/agende');
		$this->load->view('tpl/footer');
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

			$this->load->view('tpl/header',[
			'title' => lang('defualt_menu_folha'),
		 	'description' => '',
		 	'keywords' => '' 
			]);
		$this->load->view(getLang().'/responsabilidade/folhaLista', [
				'url' => $url,
				'conteudos' => $conteudos,
				'lista' => $this->model->getFolhaEdicaoLista($url)
			]);

		$this->load->view('tpl/agende');
		$this->load->view('tpl/footer');

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