<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sugestao extends CI_Controller {

	private $emails = array('falecom@conjunto.com.br');

	public function index(){

		if($this->input->post()){

			$data = array(
				'nome' => $this->input->post('form_nome'),
				'email' => strtolower($this->input->post('form_email')),
				'mensagem' => nl2br(trim(strip_tags($this->input->post('form_mensagem'))))
			);

			if(preg_match(EMAIL_FORMAT,$data['email'])){

				$this->load->library('email',array(
					'mailtype' => 'html'
				));

				if(sizeof($this->emails) > 0){

					$this->email->from('no-reply@celuloseriograndense.com.br', 'Website - Celulose Riograndense');
					$this->email->to($this->emails); 
					$this->email->subject('Sugestão');

					$this->email->message("
						Nome: ".$data['nome']."<br>
						E-mail: ".$data['email']."<br>
						".$data['mensagem']."
					");	
					
					$this->email->send();
					
				}	
				
				unset($_POST);
				redirect(strtolower(__CLASS__) . '?success=true');

			} else {
				alert("E-mail inválido");
			}
		}

		views($this,'sugestao',array(
			'header' => array(
				'title' => 'Sugestão',
				'description' => '',
				'keywords' => '' 
			)
		));
	}


}
