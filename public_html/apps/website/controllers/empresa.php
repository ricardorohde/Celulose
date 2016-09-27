<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa extends CI_Controller {

	public function index(){
		views($this,getLang().'/empresa/sobre',array(
			'header' => array(
				'title' => lang('defualt_menu_sobre'),
				'description' => '',
				'keywords' => '' 
			)
		));
	}

	public function valores(){
		views($this,getLang().'/empresa/valores',array(
			'header' => array(
				'title' => lang('defualt_menu_valores'),
				'description' => '',
				'keywords' => '' 
			)
		));
	}

	public function certificacoes(){
		views($this,getLang().'/empresa/certificacoes',array(
			'header' => array(
				'title' => lang('defualt_menu_certificacoes'),
				'description' => '',
				'keywords' => '' 
			)
		));
	}

	public function certificacoes2(){
		views($this,getLang().'/empresa/certificacoes2',array(
			'header' => array(
				'title' => lang('defualt_menu_certificacoes'),
				'description' => '',
				'keywords' => '' 
			)
		));
	}

	public function cmpc(){
		views($this,getLang().'/empresa/cmpc',array(
			'header' => array(
				'title' => lang('defualt_menu_cmpc'),
				'description' => '',
				'keywords' => '' 
			)
		));
	}

	public function historia(){
		views($this,getLang().'/empresa/historia',array(
			'header' => array(
				'title' => lang('defualt_menu_historia'),
				'description' => '',
				'keywords' => '' 
			)
		));
	}

}