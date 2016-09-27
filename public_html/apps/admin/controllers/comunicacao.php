<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comunicacao extends CI_Controller {
	
	public function index(){
		show_404();
	}

	/* ----------- Contato ----------- */

	public function contato($page = 0){
		$this->auth->verify('contato');
		$this->load->model('comunicacao_model','model');
		
		$pagination = $this->main_model->pages(array(
			'uri_segment' => 3,
			'base_url' => site_url('comunicacao/contato'),
			'total_rows' => $this->model->getContatosNum(),
			'per_page' => 20,
		));

		$this->load->view('comunicacao/contato/lista',array(
			'pages' => $pagination,
			'contato' => $this->model->getContatos($page)
		));

	}

	public function contatoSearch($search = '',$page = 0){
		$this->auth->verify('contato');
		$this->load->model('comunicacao_model','model');
		
		if($this->input->post('q')){
		
			$search = strtourl($this->input->post('q'));
			redirect('comunicacao/contato/search/'.$search);
		
		} elseif(!empty($search)){
		
			$pagination = $this->main_model->pages(array(
				'uri_segment' => 5,
				'base_url' => site_url('comunicacao/contato/search/'.$search),
				'total_rows' => $this->model->getContatosSearchNum($search),
				'per_page' => 20,
			));
			$this->load->view('comunicacao/contato/lista',array(
				'pages' => $pagination,
				'contato' => $this->model->getContatosSearch($page,$search),
				'search' => str_replace('-',' ',$search)
			));
		
		} else {
			redirect('comunicacao/contato');
		}

	}

	public function contatoVisualizar($id = false){
		$this->auth->verify('contato');
		$this->load->model('comunicacao_model','model');

		if($id){
			$contato = $this->model->getContato($id);
			if($contato){

				$this->load->view('comunicacao/contato/visualizar',array(
					'contato' => $contato
				));

			} else { show_404(); }

		} else { show_404(); }

	}


	/* ----------- Trabalhe Conosco ----------- */

	public function trabalheDownload($id = false,$filename = ""){
		$this->auth->verify('trabalhe');
		$this->load->model('comunicacao_model','model');

		if($id){
			$trabalhe = $this->model->getTrabalhe($id);
			if(isset($trabalhe->id)){
				$this->load->helper('download');
				$file = './assets/arquivos/trabalhe/' . $trabalhe->arquivo;
				if(file_exists($file)){
					force_download($filename,file_get_contents($file));
				} else {
					die('Arquivo n&atilde;o encontrado! - ' . $trabalhe->arquivo);
				}
			} else { show_404(); }
		} else { show_404(); }
	}

	public function buscar(){
		$this->auth->verify('trabalhe');
		$this->load->model('comunicacao_model','model');

		$this->load->view('comunicacao/trabalhe/advanceSearch',array(
			'formacoes' => $this->model->getFormacoes(),
			'cursos' => $this->model->getCursos(),
			'areas' => $this->model->getAreas()
		));
	}

	/* Trabalhe V2 */

	public function trabalheRemover($id = false){
		$this->auth->verify('trabalhe');
		$this->load->model('comunicacao_model','model');

		if($id){
			$trabalhe = $this->model->getTrabalhe($id);
			if($trabalhe){
				if($this->input->post('id')){
					if($id === $this->input->post('id')){
						$this->model->delete($id);
						@unlink("./assets/arquivos/trabalhe/".$trabalhe->arquivo);
						alert('Currículo removido com sucesso','success');
						redirect($this->input->get('return'));
					}
				}

				$this->load->view('comunicacao/trabalhe/remover',array(
					'trabalhe' => $trabalhe,
					'return' => $this->input->get('return')
				));
			} else { show_404(); }
		} else { show_404(); }
	}

	public function trabalheVisualizar($id = false){
		$this->auth->verify('trabalhe');
		$this->load->model('comunicacao_model','model');

		if($id){
			$trabalhe = $this->model->getTrabalhe($id);
			if($trabalhe){
				$this->load->view('comunicacao/trabalhe/visualizar',array(
					'trabalhe' => $trabalhe,
					'return' => $this->input->get('return')
				));
			} else { show_404(); }
		} else { show_404(); }
	}

	public function trabalhe(){
		$this->auth->verify('trabalhe');
		$this->load->model('comunicacao_model','model');

		$per_page = $this->getPage();
		$params = $this->getTrabalheParams();
		$return = rawurlencode(site_url('comunicacao/trabalhe?' . http_build_query($params) . "&per_page=" . $per_page));
		$registros = $this->model->getTrabalhesSearchNum($params);

		$pagination = $this->main_model->pages(array(
			'page_query_string' => true,
			'base_url' => site_url('comunicacao/trabalhe?' . http_build_query($params)),
			'total_rows' => $registros,
			'per_page' => 20,
		));

		$this->load->view('comunicacao/trabalhe/lista',array(
			'trabalhe' => $this->model->getTrabalhesSearch($params,$per_page),
			'pages' => $pagination,
			'return' => $return,
			'registros' => $registros
		));
	}

	private function getTrabalheParams(){
		$keys = array(
			'nome','email','cidade','telefone','formacao','formacao_outro',
			'curso','curso_outro','salario','pretencao','area','area_outro',
			'area_tempo','estagio','fisica');

		$args = array();
		foreach($keys as $key){
			$value = $this->input->get($key);

			if(!empty($value) || preg_match("/^[0-9]+$/",$value))
				$args[$key] = $value;
		}
		return $args;
	}

	private function getPage(){
		$per_page = $this->input->get('per_page');
		if(!preg_match("/^[0-9]+$/",$per_page))
			$per_page = 0;

		return (int) $per_page;
	}


	
}