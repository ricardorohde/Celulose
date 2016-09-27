<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Custom extends CI_Controller {

	public function index(){
		//$this->load->view('feirao');

		views($this,'/feirao',array(
			'header' => array(
				'title' => 'Celulose Riograndense - Compromisso com o Rio Grande &eacute; a nossa marca.',
				'description' => '',
				'keywords' => '' 
			),
		));
	}
}