<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ambientais extends CI_Controller {
	
	public function index(){
		$this->auth->verify('ambientais');
		redirect('ambientais/lista');
	}

	public function lista($page = 0){
		$this->auth->verify('ambientais');
		$this->load->model('ambientais_model','model');
		
		$pagination = $this->main_model->pages(array(
			'uri_segment' => 3,
			'base_url' => site_url('ambientais/lista'),
			'total_rows' => $this->model->getRelatoriosNum(),
			'per_page' => 20,
		));
		$this->load->view('ambientais/lista',array(
			'pages' => $pagination,
			'ambientais' => $this->model->getRelatorios($page)
		));
	}

	public function search($search = '',$page = 0){
		$this->auth->verify('ambientais');
		$this->load->model('ambientais_model','model');

		if($this->input->post('q')){
			$search = strtourl($this->input->post('q'));
			redirect('ambientais/search/'.$search);
		} elseif(!empty($search)){
			$search = str_replace('-',' ',$search);
			$pagination = $this->main_model->pages(array(
				'uri_segment' => 5,
				'base_url' => site_url('ambientais/search/'.$search),
				'total_rows' => $this->model->getRelatoriosSearchNum($search),
				'per_page' => 20,
			));
			$this->load->view('ambientais/lista',array(
				'pages' => $pagination,
				'ambientais' => $this->model->getRelatoriosSearch($page,$search),
				'search' => $search
			));
		} else {
			redirect('ambientais/lista');
		}
	}

	public function cadastrar(){
		$this->auth->verify('ambientais');
		$this->load->model('ambientais_model','model');
		if($this->input->post()){
			$e = explode('/',$this->input->post('form_data'));
			$post = array(
				'ano' => $e[1],
				'mes' => $e[0]
			);

			$this->load->library('upload',array(
				'upload_path' => './assets/arquivos/relatorios/',
				'allowed_types' => 'pdf',
				'encrypt_name' => true
			));

			if(!$this->upload->do_upload()){
				alert('Upload erro: '.$this->upload->display_errors('',''));
			} else {
				$upload = $this->upload->data();

				$post['arquivo'] = $upload['file_name'];
				$id = $this->model->insertRelatorio($post);

				alert('Relatório cadastrado com sucesso','success');
				redirect('ambientais/lista');

			}
		}
		$this->load->view('ambientais/cadastrar');
	}

	public function remover($mes,$ano){
		$this->auth->verify('ambientais');
		$this->load->model('ambientais_model','model');

		$relatorio = $this->model->getRelatorio($mes,$ano);
		if($this->input->post('id')){
			@unlink('./assets/arquivos/relatorios/'.$relatorio->arquivo);
			$this->model->deleteRelatorio($mes,$ano);
			alert('Relatório removido com sucesso','success');
			redirect('ambientais/lista');
		}
		$this->load->view('ambientais/remover',array(
			'relatorio' => $relatorio
		));
	}
}