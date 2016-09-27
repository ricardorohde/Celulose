<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Folha extends CI_Controller {
	

	private $filtros = array(
		'campanha' => 'Campanha',
		'centro' => 'Centro',
		'metropolitana' => 'Metropolitana'
	);

	public function index(){
		$this->auth->verify('folha');
		redirect('folha/lista');
	}

	public function lista($page = 0){
		$this->auth->verify('folha');
		$this->load->model('folha_model','model');
		
		$pagination = $this->main_model->pages(array(
			'uri_segment' => 3,
			'base_url' => site_url('folha/lista'),
			'total_rows' => $this->model->getFolhasNum(),
			'per_page' => 20,
		));
		$this->load->view('folha/lista',array(
			'pages' => $pagination,
			'folha' => $this->model->getFolhas($page)
		));
	}

	public function search($search = '',$page = 0){
		$this->auth->verify('folha');
		$this->load->model('folha_model','model');

		if($this->input->post('q')){
			$search = strtourl($this->input->post('q'));
			redirect('folha/search/'.$search);
		} elseif(!empty($search)){
			$search = str_replace('-',' ',$search);
			$pagination = $this->main_model->pages(array(
				'uri_segment' => 5,
				'base_url' => site_url('folha/search/'.$search),
				'total_rows' => $this->model->getFolhasSearchNum($search),
				'per_page' => 20,
			));
			$this->load->view('folha/lista',array(
				'pages' => $pagination,
				'folha' => $this->model->getFolhasSearch($page,$search),
				'search' => $search
			));
		} else {
			redirect('folha/lista');
		}
	}

	public function cadastrar(){
		$this->auth->verify('folha');
		$this->load->model('folha_model','model');
		if($this->input->post()){
			$post = array(
				'titulo' => $this->input->post('form_titulo'),
				'data' => site_sql($this->input->post('form_data')),
				'descricao' => $this->input->post('form_descricao')
			);

			$post['url'] = $this->gerateURL($post);
			$id = $this->model->insertFolha($post);
			alert('Edição cadastrada com sucesso','success');
			redirect('folha/editar/'.$id);
		}
		$this->load->view('folha/cadastrar',array(
			
		));
	}

	public function editar($id = false){
		$this->auth->verify('folha');
		$this->load->model('folha_model','model');
		if($id){
			
			$folha = $this->model->getFolha($id);

			if($this->input->post()){
				$post = array(
					'titulo' => $this->input->post('form_titulo'),
					'data' => site_sql($this->input->post('form_data')),
					'descricao' => $this->input->post('form_descricao')
				);
				if($folha->url != strtourl($post['titulo'])){
					$post['url'] = $this->gerateURL($post);
				}

				$id = $this->model->updateFolha($folha->id,$post);
				alert('Edição editada com sucesso','success');
				redirect('folha/lista');
			}
			
			$this->load->view('folha/editar',array(
				'folha' => $folha,
				'conteudos' => $this->model->getFolhaConteudos($folha->id)
			));
		} else { show_404(); }
	}
	
	public function remover($id = false){
		$this->auth->verify('folha');
		$this->load->model('folha_model','model');
		if($id){
			$folha = $this->model->getFolha($id);
			if($this->input->post('id')){
				$this->model->deleteFolha($folha->id);
				alert('Notícia removida com sucesso','success');
				redirect('folha/lista');
			}
			$this->load->view('folha/remover',array(
				'folha' => $folha
			));
		} else { show_404(); }
	}

	/* Conteudos */

	public function cadastrarConteudo($folha){
		$this->auth->verify('folha');
		$this->load->model('folha_model','model');
		if($this->input->post()){
			$post = array(
				'titulo' => $this->input->post('form_titulo'),
				'folha' => $folha,
				'categoria' => site_sql($this->input->post('form_categoria')),
				'filtro' => implode('-',$this->input->post('form_filtros')),
				'html' => $this->input->post('form_html'),
				'ordem' => $this->input->post('form_ordem')
			);

			$id = $this->model->insertFolhaConteudo($post);
			alert('Conteúdo cadastrado com sucesso','success');
			redirect('folha/editar/'.$folha);
		}
		$this->load->view('folha/cadastrarConteudo',array(
			'filtros' => $this->filtros
		));
	}

	public function editarConteudo($folha,$id){
		$this->auth->verify('folha');
		$this->load->model('folha_model','model');
		if($id){
			
			$conteudo = $this->model->getFolhaConteudo($id);

			if($this->input->post()){
				$post = array(
					'titulo' => $this->input->post('form_titulo'),
					'categoria' => site_sql($this->input->post('form_categoria')),
					'filtro' => implode('-',$this->input->post('form_filtros')),
					'html' => $this->input->post('form_html'),
					'ordem' => $this->input->post('form_ordem')
				);

				$id = $this->model->updateFolhaConteudo($id,$post);
				alert('Conteúdo editado com sucesso','success');
				redirect('folha/editar/'.$folha);
			}
			
			$this->load->view('folha/editarConteudo',array(
				'conteudo' => $conteudo,
				'filtros' => $this->filtros
			));
		} else { show_404(); }
	}
	
	public function removerConteudo($folha,$id){
		$this->auth->verify('folha');
		$this->load->model('folha_model','model');
		if($id){
			$conteudo = $this->model->getFolhaConteudo($id);
			if($this->input->post('id')){
				$this->model->deleteFolhaConteudo($conteudo->id);
				alert('Notícia removida com sucesso','success');
				redirect('folha/editar/'.$folha);
			}
			$this->load->view('folha/removerConteudo',array(
				'conteudo' => $conteudo
			));
		} else { show_404(); }
	}

	/* Functions */

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