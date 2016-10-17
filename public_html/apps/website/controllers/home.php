<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$this->load->model('home_model','model');
		$this->load->helper('text');


		$imgs = array();
		$noticias = array();


		$slider = $this->model->getSliders();
		if($slider){
			foreach($slider as $rows){
				array_push($imgs,(Object) array(
					'legenda' => $rows->legenda,
					'src' => base_url('assets/img/slider/backgrounds/' . $rows->arquivo),
					'target' => substr($rows->link,0,4) == "http" ? '_blank' : '_self',
					'link' => substr($rows->link,0,4) == "http" ? $rows->link : (!empty($rows->link) ? site_url($rows->link) : ''),
				));
			}
		}

		
		$rawNoticias = $this->model->getNoticiasLista();
		
		$displayImg = true;
		$i = 0;
		foreach($rawNoticias as $rows){
			$noticias[$i] = array(
				'data' => sql_site($rows->data),
				'titulo' => $rows->titulo,
				'link' => site_url('noticias/'.$rows->url),
				'texto' => character_limiter(strip_tags($rows->html),120,"..."),
				'img' => true
			);
			
			if($displayImg){
				if($img = $this->parseHTML($rows->html)){
					$noticias[$i]['img'] = ($img);
					$displayImg = true;
				}
			}
			$i++;
		}

		$this->load->view('tpl/header',[
			'title' => lang('defualt_menu_home'),
		 	'description' => '',
		 	'keywords' => '' 
			]);
		
		$this->load->view(getLang().'/home',[
			'slider' => $imgs,
			'noticias' 	=> $noticias
			]);


		$this->load->view('tpl/agende');
		$this->load->view('tpl/footer');


	}

	public function lang(){

		$l = array('brazilian','english');

		$lang = $this->input->get('switch');
		$url = $this->input->get('return');

		if(in_array($lang,$l)){
			$_SESSION['celulose_lang'] = $lang;
		} else {
			$_SESSION['celulose_lang'] = 'brazilian';
		}

		if(!empty($url)){
			redirect($url);
		} else {
			redirect(site_url());
		}
	}

	public function notfound(){
		$this->load->model('home_model','model');
		$url = $this->uri->segment(1);
		
		$redirect = $this->model->getRedirect($url);
		if(isset($redirect->id)){
			redirect($redirect->url);
		} else {
			show_404();
		}
	}

	public function registerNewsleter(){
		$this->load->model('home_model','model');
		$json = array('code' => 500, 'msg' => '');

		$data = array(
			'nome' => $this->input->post('nome'),
			'email' => strtolower($this->input->post('email')),
			'ctime' => time()
		);

		if(!empty($data['nome'])){
			if(!empty($data['email']) && preg_match(EMAIL_FORMAT,$data['email'])){

				$newsletter = $this->model->getNewsletterByEmail($data['email']);
				if(!$newsletter){

					$this->model->insertNewsletter($data);
					$json['code'] = 200;
					$json['msg'] = 'E-mail cadastrado!';

				} else {
					$json['msg'] = 'E-mail já cadastrado!';
				}
			} else {
				$json['msg'] = 'E-mail inválido!';
			}
		} else {
			$json['msg'] = 'Nome inválido!';
		}

		echo json_encode($json);
	}

	private function parseHTML($html){
		$dom = new domDocument;
		$dom->loadHTML($html);
		$dom->preserveWhiteSpace = false;
		$images = $dom->getElementsByTagName('img');
		foreach ($images as $image) {
			return $image->getAttribute('src');
		}
		return false;
	}
}