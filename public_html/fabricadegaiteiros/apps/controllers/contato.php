<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato extends CI_Controller {


	public function index(){
		
		$this->load->view('tpl/header');
		if($this->doPostContato()){
			$this->load->view('contato',array(
				'sucesso' => true,
				'sid' => $this->getSidHash()
			));
		} else {
			$this->load->view('contato',array(
				'sucesso' => false,
				'sid' => $this->getSidHash()
			));
		}
		$this->load->view('tpl/footer');
	}
	
	private function doPostContato(){
		$sid = $this->getSidHash();
	
		if($this->input->post()){
	
			$hash = @base64_decode($this->input->post('hash'));
			if($hash !== $sid)
				return false;
	
			if(!(isset($_SERVER['HTTP_REFERER']) && site_url('contato') === $_SERVER['HTTP_REFERER']))
				return false;
	
			$data = array(
				'nome' => $this->input->post('nome' . $sid),
				'email' => strtolower($this->input->post('ema'. $sid . 'il')),
				'telefone' => $this->input->post('telefone' . $sid),
				'mensagem' => strip_tags($this->input->post('mensagem' . $sid)),
				'ctime' => time()
			);
	
			$html = "
				Nome: ".$data['nome']."<br />
				E-mail: ".$data['email']."<br />
				Telefone: ".$data['telefone']."<br />
				Mensagem: ".nl2br($data['mensagem'])."
			";
	
			$this->load->library('email',array('mailtype' => 'html'));
	
			$this->email->to(array(
				// 'henrique@conjunto.com.br'
				'borghetti@terra.com.br'
			));
			$this->email->subject('Fábrica de Gaiteiros - Contato');
			$this->email->from($data['email'], $data['nome']);
			$this->email->message($html);
			$this->email->send();
			
			return true;
		}
		return false;
	}
	
	private function getSidHash(){
		return sha1(session_id());
	}
}