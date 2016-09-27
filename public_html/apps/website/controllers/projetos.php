<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projetos extends CI_Controller {

	public function educacao(){
		views($this, getLang() . '/projetos/educacao',array(
			'header' => array(
				'title' => 'Projeto Educação' 
			)
		));
	}
}