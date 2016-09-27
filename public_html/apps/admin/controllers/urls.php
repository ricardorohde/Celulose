<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Urls extends CI_Controller {
	
	public function index(){
		$this->auth->verify('urls');
		redirect('urls/lista');
	}

	public function lista($page = 0){
		$this->auth->verify('urls');
		$this->load->model('urls_model','model');
		
		$pagination = $this->main_model->pages(array(
			'uri_segment' => 3,
			'base_url' => site_url('urls/lista'),
			'total_rows' => $this->model->getURLsNum(),
			'per_page' => 20,
		));
		$this->load->view('urls/lista',array(
			'pages' => $pagination,
			'urls' => $this->model->getURLs($page)
		));
	}

	public function search($search = '',$page = 0){
		$this->auth->verify('urls');
		$this->load->model('urls_model','model');

		if($this->input->post('q')){
			$search = strtourl($this->input->post('q'));
			redirect('urls/search/'.$search);
		} elseif(!empty($search)){
			$search = str_replace('-',' ',$search);
			$pagination = $this->main_model->pages(array(
				'uri_segment' => 5,
				'base_url' => site_url('urls/search/'.$search),
				'total_rows' => $this->model->getURLsSearchNum($search),
				'per_page' => 20,
			));
			$this->load->view('urls/lista',array(
				'pages' => $pagination,
				'urls' => $this->model->getURLsSearch($page,$search),
				'search' => $search
			));
		} else {
			redirect('urls/lista');
		}
	}

	public function cadastrar(){
		$this->auth->verify('urls');
		$this->load->model('urls_model','model');
		if($this->input->post()){
			$post = array(
				'param' => $this->input->post('form_param'),
				'url' => $this->input->post('form_url')
			);

			$id = $this->model->insertURL($post);
			alert('URL cadastrada com sucesso','success');
			redirect('urls/lista');
		}
		$this->load->view('urls/cadastrar');
	}

	public function editar($id = false){
		$this->auth->verify('urls');
		$this->load->model('urls_model','model');
		if($id){
			
			$url = $this->model->getURL($id);
			if($this->input->post()){
				$post = array(
					'param' => $this->input->post('form_param'),
					'url' => $this->input->post('form_url')
				);
				$id = $this->model->updateURL($url->id,$post);
				
				alert('URL editada com sucesso','success');
				redirect('urls/lista');
			}
			
			$this->load->view('urls/editar',array(
				'url' => $url
			));
		} else { show_404(); }
	}
	
	public function remover($id = false){
		$this->auth->verify('urls');
		$this->load->model('urls_model','model');
		if($id){
			$url = $this->model->getURL($id);
			if($this->input->post('id')){
				$this->model->deleteURL($url->id);
				alert('URL removida com sucesso','success');
				redirect('urls/lista');
			}
			$this->load->view('urls/remover',array(
				'url' => $url
			));
		} else { show_404(); }
	}

}