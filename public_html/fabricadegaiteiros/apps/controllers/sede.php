<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sede extends CI_Controller {


	public function index(){
		$this->load->view('tpl/header');
		$this->load->view('sede');
		$this->load->view('tpl/footer');
	}
}