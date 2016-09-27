<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empregos extends CI_Controller {
	
	public function index(){
		$this->auth->verify('empregos');
		redirect('empregos/lista');
	}

	public function lista($page = 0){
		$this->auth->verify('empregos');
		$this->load->model('empregos_model','model');
		
		$pagination = $this->main_model->pages(array(
			'uri_segment' => 3,
			'base_url' => site_url('empregos/lista'),
			'total_rows' => $this->model->getEmpregosNum(),
			'per_page' => 20,
		));
		$this->load->view('empregos/lista',array(
			'pages' => $pagination,
			'empregos' => $this->model->getEmpregos($page)
		));
	}

	public function search($search = '',$page = 0){
		$this->auth->verify('empregos');
		$this->load->model('empregos_model','model');

		if($this->input->post('q')){
			$search = strtourl($this->input->post('q'));
			redirect('empregos/search/'.$search);
		} elseif(!empty($search)){
			$search = str_replace('-',' ',$search);
			$pagination = $this->main_model->pages(array(
				'uri_segment' => 5,
				'base_url' => site_url('empregos/search/'.$search),
				'total_rows' => $this->model->getEmpregosSearchNum($search),
				'per_page' => 20,
			));
			$this->load->view('empregos/lista',array(
				'pages' => $pagination,
				'empregos' => $this->model->getEmpregosSearch($page,$search),
				'search' => $search
			));
		} else {
			redirect('empregos/lista');
		}
	}

	public function cadastrar(){
		$this->auth->verify('empregos');
		$this->load->model('empregos_model','model');
		if($this->input->post()){
			$post = array(
				'municipio' => $this->input->post('form_municipio'),
				'masculino' => $this->input->post('form_masculino'),
				'feminino' => $this->input->post('form_feminino'),
				'pmasculino' => $this->input->post('form_pmasculino'),
				'pfeminino' => $this->input->post('form_pfeminino'),
				'ltime' => time()
			);

			$id = $this->model->insertEmprego($post);
			alert('Registro cadastrada com sucesso','success');
			redirect('empregos/lista');
		}
		$this->load->view('empregos/cadastrar');
	}

	public function editar($id = false){
		$this->auth->verify('empregos');
		$this->load->model('empregos_model','model');
		if($id){
			
			$emprego = $this->model->getEmprego($id);
			if($this->input->post()){
				$post = array(
					'municipio' => $this->input->post('form_municipio'),
					'masculino' => $this->input->post('form_masculino'),
					'feminino' => $this->input->post('form_feminino'),
					'pmasculino' => $this->input->post('form_pmasculino'),
					'pfeminino' => $this->input->post('form_pfeminino'),
					'ltime' => time()
				);
				$id = $this->model->updateEmprego($emprego->id,$post);
				
				alert('Registro editado com sucesso','success');
				redirect('empregos/lista');
			}
			
			$this->load->view('empregos/editar',array(
				'emprego' => $emprego
			));
		} else { show_404(); }
	}
	
	public function remover($id = false){
		$this->auth->verify('empregos');
		$this->load->model('empregos_model','model');
		if($id){
			$emprego = $this->model->getEmprego($id);
			if($this->input->post('id')){
				$this->model->deleteEmprego($emprego->id);
				alert('Registro removido com sucesso','success');
				redirect('empregos/lista');
			}
			$this->load->view('empregos/remover',array(
				'emprego' => $emprego
			));
		} else { show_404(); }
	}

}