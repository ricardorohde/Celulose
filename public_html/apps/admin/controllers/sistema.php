<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sistema extends CI_Controller {
	
	public function index(){
		$this->auth->verify('root');
		redirect('sistemas/usuarios');
	}

	public function usuarios($pages = 0){
		$this->auth->verify('root');
		$this->load->model('sistema_model','model');
		
		$pagination = $this->main_model->pages(array(
			'uri_segment' => 3,
			'base_url' => site_url('sistema/usuarios'),
			'total_rows' => $this->model->getUsuariosNum(),
			'per_page' => 20,
		));
		$this->load->view('sistema/usuarios/lista',array(
			'pages' => $pagination,
			'usuarios' => $this->model->getUsuarios()
		));
	}

	public function search($search = '',$page = 0){
		$this->auth->verify('root');
		$this->load->model('sistema_model','model');

		if($this->input->post('q')){
			$search = strtourl($this->input->post('q'));
			redirect('sistema/usuarios/search/'.$search);
		} elseif(!empty($search)){
			$pagination = $this->main_model->pages(array(
				'uri_segment' => 5,
				'base_url' => site_url('sistema/usuarios/search/'.$search),
				'total_rows' => $this->model->getUsuariosSearchNum($search),
				'per_page' => 20,
			));
			$this->load->view('sistema/usuarios/lista',array(
				'pages' => $pagination,
				'usuarios' => $this->model->getUsuariosSearch($page,$search),
				'search' => str_replace('-',' ',$search)
			));
		} else {
			redirect('sistema/usuarios');
		}
	}

	public function usuarioscadastrar(){
		$this->auth->verify('root');
		$this->load->model('sistema_model','model');
		if($this->input->post()){
			$post = array(
				'nome' => $this->input->post('form_nome'),
				'email' => strtolower($this->input->post('form_email')),
				'senha' => sha1($this->input->post('form_senha')),
				'ctime' => time()
			);

			if($this->verifyEmailBoolean()){
				
				$id = $this->model->insertUsuario($post);
				$perm = $this->input->post('form_permissao');
				if(sizeof($perm) > 0){
					foreach($perm as $flag){
						$this->model->insertPermission($id,$flag);
					}
				}
				
				alert('Usuário cadastrado com sucesso','success');
				redirect('sistema/usuarios');
			}
		}
		$this->load->view('sistema/usuarios/cadastrar',array(
			'permissoes' => $this->model->getPermission()
		));
	}
	public function usuarioseditar($id = false){
		$this->auth->verify('root');
		$this->load->model('sistema_model','model');
		if($id){
			if($id === 'self'){
				$id = $this->auth->get('id');
			}
			$user = $this->model->getUsuario($id);
			if($this->input->post()){
				$post = array(
					'nome' => $this->input->post('form_nome'),
				);
				$id = $this->model->updateUsuario($user->id,$post);
				$this->model->cleanPermission($user->id);
				$perm = $this->input->post('form_permissao');
				if(sizeof($perm) > 0){
					foreach($perm as $flag){
						$this->model->insertPermission($user->id,$flag);
					}
				}
				alert('Usuário editado com sucesso','success');
				redirect('sistema/usuarios');
			}
			$perm = array();
			foreach($this->model->getUserPermissionByID($user->id) as $p){
				array_push($perm,$p->id);
			}
			$this->load->view('sistema/usuarios/editar',array(
				'user' => $user,
				'perm' => $perm,
				'permissoes' => $this->model->getPermission()
			));
		} else { show_404(); }
	}
	public function usuariosremover($id = false){
		$this->auth->verify('root');
		$this->load->model('sistema_model','model');
		if($id && $id != $this->auth->get('id')){
			$user = $this->model->getUsuario($id);
			if($this->input->post('id')){
				$this->model->deleteUsuario($user->id);
				alert('Usuário removido com sucesso','success');
				redirect('sistema/usuarios');
			}
			$this->load->view('sistema/usuarios/remover',array(
				'user' => $user
			));
		} else { show_404(); }
	}

	public function changePassword($id = false){
		$this->auth->verify('root');
		$this->load->model('sistema_model','model');
		if($id){
			if($id === 'self'){
				$id = $this->auth->get('id');
			}
			$user = $this->model->getUsuario($id);
			if($this->input->post()){
				$post = array(
					'senha' => sha1($this->input->post('form_senha'))
				);
				$this->model->updateUsuario($id,$post);
				alert('Senha alterada com sucesso','success');
				redirect('sistema/usuarios');
			}
			$this->load->view('sistema/usuarios/senha',array(
				'user' => $user
			));
		} else { show_404(); }
	}


	/* Usuários Ajax e Private */

	public function verifyEmail(){
		if($this->input->post()){
			$this->auth->verify('root');
			$email = strtolower(base64_decode($this->input->post('paramOne')));
			
			$json = array('code' => 404,'erro' => '');

			if(!empty($email) && preg_match(EMAIL_FORMAT,$email)){
				$this->load->model('sistema_model','model');
				$user = $this->model->getUsuarioByEmail($email);
				if(isset($user->id)){
					$json = array('code' => 500,'erro' => 'E-mail em uso por outro usuário');
				} else {
					$json['code'] = 200;
				}
			} else {
				$json = array('code' => 500,'erro' => 'E-mail no formato inválido');
			}
			echo json_encode($json);
		} else { show_404(); }
	}
	private function verifyEmailBoolean(){
		if($this->input->post()){
			$this->auth->verify('root');
			$email = strtolower($this->input->post('form_email'));
			if(!empty($email) && preg_match(EMAIL_FORMAT,$email)){
				$this->load->model('sistema_model','model');
				$user = $this->model->getUsuarioByEmail($email);
				if(isset($user->id)){
					return false;
				} else {
					return true;
				}
			} else {
				return false;
			}
		} else { show_404(); }
	}

	/* Logs e Informações */

	public function logs($page = 0){
		$this->auth->verify('root');
		$this->load->model('sistema_model','model');
		$pagination = $this->main_model->pages(array(
			'uri_segment' => 3,
			'base_url' => site_url('sistema/logs'),
			'total_rows' => $this->model->getLogsNum(),
			'per_page' => 20,
		));
		$this->load->view('sistema/logs',array(
			'pages' => $pagination,
			'logs' => $this->model->getLogs($page)
		));
	}
	public function acessos($page = 0){
		$this->auth->verify('root');
		$this->load->model('sistema_model','model');
		$pagination = $this->main_model->pages(array(
			'uri_segment' => 3,
			'base_url' => site_url('sistema/acessos'),
			'total_rows' => $this->model->getAcessosNum(),
			'per_page' => 20,
		));
		$this->load->view('sistema/acessos',array(
			'pages' => $pagination,
			'acessos' => $this->model->getAcessos($page)
		));
	}
	public function informacoes(){
		$this->auth->verify('root');
		$this->load->helper('phpinfo');
		$this->load->view('sistema/informacoes',array(
			'dirs' => array(
				'./assets'

			),
			'info' => phpinfo_array()
		));
	}



	/* Auth */

	public function auth(){
		$this->load->view('sistema/login');
	}
	public function authParse(){
		if($this->input->post()){
			$this->load->model('sistema_model','model');
			$json = array('code' => 404,'erro' => '');

			$post = array(
				'email' => base64_decode($this->input->post('paramOne')),
				'senha' => base64_decode($this->input->post('paramTwo'))
			);

			if(preg_match(EMAIL_FORMAT,$post['email'])){
				$user = $this->model->getUserByAuth($post['email'],$post['senha']);
				if(isset($user->id)){
					$flags = $this->model->getUserPermissionByID($user->id);
					$this->auth->login(array(
						'id' => $user->id,
						'nome' => $user->nome,
						'email' => $user->email
					));
					foreach($flags as $f){
						$this->auth->addPermission($f->flag);
					}
					$json['code'] = 200;
				} else {
					$json['code'] = 500;
					$json['erro'] = "Dados inválidos.";
				}
			} else {
				$json['code'] = 500;
				$json['erro'] = "E-mail inválido.";
			}
			echo json_encode($json);
		} else {
			show_404();
		}
		
	}

	public function authUnset(){
		$this->auth->logoff();
		redirect();
	}

	/* Default */

	public function home(){
		$this->auth->verify();
		$this->load->view('sistema/home');
	}
	public function notfound(){
		show_404();
	}
}