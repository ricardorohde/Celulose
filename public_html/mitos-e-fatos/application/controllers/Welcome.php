<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
		$this->load->model('welcome_model', 'model');
		$this->load->view('tpl/header');
		$this->load->view('welcome', [
			'lista' => $this->model->getFaq()
		]);
		$this->load->view('tpl/footer');
	}
	
	public function item($id = 0){
		$this->load->model('welcome_model', 'model');
		$faq = $this->model->getFaqById($id);
		if(!$faq) show_404();
		
		$this->load->view('tpl/header', [
			'title' => trim($faq->titulo),
			'description' => trim($faq->conteudo)
		]);
		$this->load->view('item', [
			'row' => $faq
		]);
		$this->load->view('tpl/footer');
	}
}
