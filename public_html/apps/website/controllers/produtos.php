<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function index(){
		views($this,getLang().'/produtos/celulose',array(
			'header' => array(
				'title' => lang('defualt_menu_celulose'),
				'description' => '',
				'keywords' => '' 
			)
		));
	}

	public function papel(){
		views($this,getLang().'/produtos/papel',array(
			'header' => array(
				'title' => lang('defualt_menu_papel'),
				'description' => '',
				'keywords' => '' 
			)
		));
	}

}