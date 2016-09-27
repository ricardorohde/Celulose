<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {
	
	public function index(){
		$this->auth->verify('noticias');
		redirect('noticias/lista');
	}

	public function lista($page = 0){
		$this->auth->verify('noticias');
		$this->load->model('noticias_model','model');
		
		$pagination = $this->main_model->pages(array(
			'uri_segment' => 3,
			'base_url' => site_url('noticias/lista'),
			'total_rows' => $this->model->getNoticiasNum(),
			'per_page' => 20,
		));
		$this->load->view('noticias/lista',array(
			'pages' => $pagination,
			'noticias' => $this->model->getNoticias($page)
		));
	}

	public function search($search = '',$page = 0){
		$this->auth->verify('noticias');
		$this->load->model('noticias_model','model');

		if($this->input->post('q')){
			$search = strtourl($this->input->post('q'));
			redirect('noticias/search/'.$search);
		} elseif(!empty($search)){
			$search = str_replace('-',' ',$search);
			$pagination = $this->main_model->pages(array(
				'uri_segment' => 5,
				'base_url' => site_url('noticias/search/'.$search),
				'total_rows' => $this->model->getNoticiasSearchNum($search),
				'per_page' => 20,
			));
			$this->load->view('noticias/lista',array(
				'pages' => $pagination,
				'noticias' => $this->model->getNoticiasSearch($page,$search),
				'search' => $search
			));
		} else {
			redirect('noticias/lista');
		}
	}

	public function cadastrar(){
		$this->auth->verify('noticias');
		$this->load->model('noticias_model','model');
		if($this->input->post()){
			$post = array(
				'titulo' => $this->input->post('form_titulo'),
				'data' => site_sql($this->input->post('form_data')),
				'visible' => $this->input->post('form_visible'),
				'lang' => $this->input->post('form_lang')
			);

			$post['url'] = $this->gerateURL($post);
			$id = $this->model->insertNoticia($post);
			alert('Notícia cadastrada com sucesso','success');
			redirect('noticias/editar/'.$id);
		}
		$this->load->view('noticias/cadastrar',array(
			'lang' => $this->model->getLangs()
		));
	}

	public function editar($id = false){
		$this->auth->verify('noticias');
		$this->load->model('noticias_model','model');
		if($id){
			
			$noticia = $this->model->getNoticia($id);

			if($this->input->post()){
				$post = array(
					'titulo' => $this->input->post('form_titulo'),
					'data' => site_sql($this->input->post('form_data')),
					'visible' => $this->input->post('form_visible'),
					'lang' => $this->input->post('form_lang'),
					'html' => $this->input->post('form_html')
				);
				if($noticia->url != strtourl($post['titulo'])){
					$post['url'] = $this->gerateURL($post);
				}

				$id = $this->model->updateNoticia($noticia->id,$post);
				alert('Notícia editada com sucesso','success');
				redirect('noticias/lista');
			}
			
			$this->load->view('noticias/editar',array(
				'noticia' => $noticia,
				'lang' => $this->model->getLangs()
			));
		} else { show_404(); }
	}
	
	public function remover($id = false){
		$this->auth->verify('noticias');
		$this->load->model('noticias_model','model');
		if($id){
			$noticia = $this->model->getNoticia($id);
			if($this->input->post('id')){
				$this->model->deleteNoticia($noticia->id);
				alert('Notícia removida com sucesso','success');
				redirect('noticias/lista');
			}
			$this->load->view('noticias/remover',array(
				'noticia' => $noticia
			));
		} else { show_404(); }
	}

	private function gerateURL($data){
		$this->load->helper('string');
		$url = strtourl($data['titulo']);

		do {
			if($this->model->hasURL($url,$data['lang'])){
				$url = increment_string($url,'');
			} else {
				break;
			}
		} while(true);

		return $url;
	}
}