<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expansao extends CI_Controller {

	public function index(){

		if($this->uri->segment(1) == 'expansao'){
			redirect('guaiba-2');
		}

		views($this,getLang().'/expansao/expansao',array(
			'header' => array(
				'title' => lang('defualt_menu_projeto_guaiba2'),
				'description' => '',
				'keywords' => '' 
			)
		));

	}

	public function andamento(){
		$this->load->model('expansao_model','model');

		if($this->uri->segment(1) == 'expansao'){
			redirect('guaiba-2/andamento');
		}

		views($this,getLang().'/expansao/andamento',array(
			'header' => array(
				'title' => lang('defualt_menu_andamento_obra'),
				'description' => '',
				'keywords' => '',
				'js' => array('fancybox.js'),
				'css' => array('fancybox.css')
			),
			'videos' => $this->model->getVideos(),
			'fotos' => $this->model->getFotos()
		));

	}


}