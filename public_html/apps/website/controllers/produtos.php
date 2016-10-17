<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function index(){



		//$this->load->model('Produtos_model', 'produtos');

		$this->load->view('tpl/header',[
			'title' => lang('defualt_menu_celulose'),
		 	'description' => '',
		 	'keywords' => '' 
			]);
		
		$this->load->view(getLang().'/produtos/celulose');
		$this->load->view(getLang().'/produtos/papel');

		$this->load->view('/tpl/agende');
		$this->load->view('tpl/footer');

	}
}