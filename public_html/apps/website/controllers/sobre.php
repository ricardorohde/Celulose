<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sobre extends CI_Controller {

	public function index(){

		$this->load->model('Sobre_model', 'sobre');

		views($this,getLang().'/empresa/sobre',array(
			'header' => array(
				'title' => lang('defualt_menu_sobre'),
				'description' => '',
				'keywords' => '' 
				)
			));

		$content['certificacoes'] = $this->model->getCertificacoes();

		views($this,'sobre',$content);

	}
}