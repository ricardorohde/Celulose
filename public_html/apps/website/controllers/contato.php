<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato extends CI_Controller {

	private $trabalheEmails = array();

	public function index(){
		$this->lang->load('contato');
		$this->load->model('contato_model','model');

		$areas = $this->model->getAreas();

		if($this->input->post()){

			$nome = trim(ucwords(strtolower(strip_tags($this->input->post('form_nome')))));
			$nome = $this->parseNome($nome);


			$data = array(
				'id' => $this->model->gerateID(),
				'nome' => $nome[0],
				'sobrenome' => $nome[1],
				'email' => strtolower($this->input->post('form_email')),
				'area' => $this->input->post('form_area'),
				'mensagem' => nl2br(trim(strip_tags($this->input->post('form_mensagem')))),
				'ctime' => time(),
				);

			if(preg_match(EMAIL_FORMAT,$data['email'])){
				$emails = $this->model->getEmailsByArea($data['area']);
				$emails = explode(',',$emails->emails);

				$this->model->insertContato($data);

				$data['admin'] = base_url('admin.php/contatos/ver/'.$data['id']);

				$this->load->library('email',array(
					'mailtype' => 'html'
					));

				if(sizeof($emails) > 0){

					$this->email->from('no-reply@celuloseriograndense.com.br', 'Website - Celulose Riograndense');
					$this->email->to($emails); 
					$this->email->subject('Contato via site');

					foreach($areas as $a){
						if($data['area'] == $a->id){
							$area = $a->titulo;
							break;
						}
					}

					$data = array_merge($data,array(
						'assunto' => $area
						));

					$this->email->message($this->load->view('tpl/email-contato',$data,true));	
					
					$this->email->send();
					
				}	
				
				unset($_POST);
				redirect('contato?success=true');

			} else {
				alert(lang('contato_erro_email'));
			}
		}

		$this->load->view('tpl/header',[
			'title' => lang('defualt_menu_com_quem_falar'),
			'description' => '',
			'keywords' => '' 
			]);
		$this->load->view(getLang().'/contato/formulario',[
			'areas' => $areas
			]);
		$this->load->view(getLang().'/contato/telefones');
		$this->load->view(getLang().'/contato/localizacao');


		$this->load->view('tpl/agende');
		$this->load->view('tpl/footer');

	}

	public function trabalhe(){
		$this->lang->load('contato');
		$this->load->model('contato_model','model');

		if($this->input->post()){

			$data = array(
				'lang' => $_SESSION['celulose_lang'] == 'english' ? 2 : 1 ,
				'celulose_nome' => $this->input->post('form_nome'),
				'celulose_email' => strtolower($this->input->post('form_email')),
				'celulose_telefone' => $this->input->post('form_telefone'),
				'celulose_cidade' => $this->input->post('form_cidade'),
				'celulose_data' => $this->input->post('form_data'),
				'celulose_formacao' => $this->input->post('form_formacao'),
				'celulose_formacao_outro' => $this->input->post('form_formacao_outro'),
				'celulose_curso' => $this->input->post('form_curso'),
				'celulose_curso_outro' => $this->input->post('form_curso_outro'),
				'celulose_salario' => $this->input->post('form_salario'),
				'celulose_pretencao' => $this->input->post('form_pretencao'),
				'celulose_area' => $this->input->post('form_area'),
				'celulose_area_outro' => $this->input->post('form_area_outro'),
				'celulose_area_tempo' => $this->input->post('form_area_tempo'),
				'celulose_estagio' => $this->input->post('form_estagio'),
				'celulose_fisica' => $this->input->post('form_fisica'),
				'celulose_arquivo' => '',
				'celulose_ctime' => time()
				);

			$this->load->library('upload',array(
				'upload_path' => './assets/arquivos/trabalhe/',
				'allowed_types' => 'pdf|doc|docx',
				'encrypt_name' => true,
				'max_size' => 2048
				));

			if(!$this->upload->do_upload()){
				alert('Upload erro: '.$this->upload->display_errors('',''));
			} else {
				$upload = $this->upload->data();
				$data['celulose_arquivo'] = $upload['file_name'];
				$id = $this->model->insertTrabalheConosco($data);

				$this->load->library('email',array(
					'mailtype' => 'html'
					));

				if(sizeof($this->trabalheEmails) > 0){
					$this->email->from('no-reply@celuloseriograndense.com.br', 'Website - Celulose Riograndense');
					$this->email->to($this->trabalheEmails); 
					$this->email->subject('Trabalhe Conosco - Celulose Riograndense');
					$this->email->message($this->load->view('tpl/email-trabalhe',$data,true));	
					$this->email->send();
					$this->email->clear();
				}

				$this->email->from('no-reply@celuloseriograndense.com.br', 'Website - Celulose Riograndense');
				$this->email->to($data['celulose_email']); 
				$this->email->subject("Trabalhe Conosco - Celulose Riograndense");
				$this->email->message($this->load->view('tpl/email-trabalhe-ok',$data,true));	
				
				$this->email->send();

				redirect('trabalhe-conosco?success=true');
			}
		}


		$this->load->view('tpl/header',[
			'title' => lang('defualt_menu_trabalhe'),
			'description' => '',
			'keywords' => '' 
			]);

		$this->load->view('trabalhe',[
			'areas' => $this->model->getTrabalheArea(),
			'cursos' => $this->model->getTrabalheCursos(),
			'formacoes' => $this->model->getTrabalheFormacoes()
			]);

		$this->load->view('tpl/agende');
		$this->load->view('tpl/footer');
	}

	private function parseNome($string){
		
		$parts = explode(' ',trim(strtolower(strip_tags($string))));
		$nome = ucfirst($parts[0]);
		$sobrenome = array();
		for($i = 1; $i < sizeof($parts); $i++){
			if(strlen($parts[$i]) <= 2){
				array_push($sobrenome,$parts[$i]);
			} else {
				array_push($sobrenome,ucfirst($parts[$i]));
			}
		}
		return array(
			$nome,
			trim(implode(' ',$sobrenome))
			);
	}
}
