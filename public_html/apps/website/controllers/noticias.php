<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {

	public function index(){
		//$this->lang->load('imprensa');

		$param = $this->uri->segment(2);
		$this->load->model('noticias_model','model');
		$this->load->helper('text');

		$noticia = $this->model->getNoticia($param);
		if($noticia){
			$content = array(
				'header' => array(
					'title' => $noticia->titulo,
					'description' => character_limiter(strip_tags($noticia->html),120,"..."),
					'keywords' => character_limiter(strip_tags($noticia->titulo . ', ' . $noticia->html),120,"") 
				)
			);


			$img = $this->parseHTML($noticia->html);
			if($img){
				$content['header']['facebook'] = array(
					'title' => $noticia->titulo,
					'type' => 'photo',
					'image' => $img
				);
			}
			$content['noticia'] = $noticia;
			$content['lista'] = $this->model->getNoticiasLista(0);
			$content['listaNum'] = $this->model->getNoticiasListaNum();



			views($this,'noticias',$content);
		} else { show_404(); }
	}

	public function getNoticias($int = 0){
		if(preg_match("/^([0-9])+$/",$int)){
			$json = array('data' => array());

			$this->load->model('noticias_model','model');
			
			foreach($this->model->getNoticiasLista($int) as $rows){
				array_push($json['data'],array(
					'data' => sql_site($rows->data),
					'titulo' => $rows->titulo,
					'link' => site_url('noticias/'.$rows->url)
				));
			}

			$json['total'] = $this->model->getNoticiasListaNum();
			$json['next'] = $int + 5;
			$json['prev'] = $int - 5;

			echo json_encode($json);
		} else { show_404(); }
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