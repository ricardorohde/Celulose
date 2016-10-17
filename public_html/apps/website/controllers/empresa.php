<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa extends CI_Controller {

	public function index(){

		$this->load->model('Empresa_model', 'empresa');

		$this->load->view('tpl/header',[
			'title' => lang('defualt_menu_sobre'),
		 	'description' => '',
		 	'keywords' => '' 
			]);
		
		$this->load->view(getLang().'/empresa/empresa',[
			'certificacoes' => $this->empresa->getCertificacoes()
			]);
		$this->load->view(getLang().'/empresa/valores');
		$this->load->view(getLang().'/empresa/certificacoes');
		$this->load->view(getLang().'/empresa/cmpc');
		$this->load->view(getLang().'/empresa/guaiba2');
		$this->load->view(getLang().'/empresa/historia');


		$this->load->view('tpl/agende');
		$this->load->view('tpl/footer');

	}
}