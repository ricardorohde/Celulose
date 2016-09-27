<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obras extends CI_Controller {
	
	public function index(){
		show_404();
	}

	/* ----------- Fotos ----------- */
	
	public function fotos($page = 0){
		$this->auth->verify('ambientais');
		$this->load->model('obras_model','model');
	
		$pagination = $this->main_model->pages(array(
				'uri_segment' => 3,
				'base_url' => site_url('obras/fotos'),
				'total_rows' => $this->model->getFotosListaNum(),
				'per_page' => 20,
		));
		$this->load->view('obras/fotosLista',array(
				'pages' => $pagination,
				'fotos' => $this->model->getFotosLista($page)
		));
	}
	
	public function fotosUpload(){
		$this->auth->verify('ambientais');
		$this->load->model('obras_model','model');
		
		if($this->input->post()){
			
			$data = array(
				'desc' => $this->input->post('descricao'),
				'lang' => $this->input->post('lang'),
				'data' => site_sql($this->input->post('data'))
			);
			
			$field = 'arquivo';
			if($this->uploadFoto($data, $field)){
				$file = './assets/img/expansao/fotos/' . $data['arquivo'];
				
				WideImage::load($file)->resize(1024, null)->saveToFile($file, '60');
				WideImage::load($file)->resize(100, 75, 'outside')->crop('center', 'center', 100, 75)->saveToFile('./assets/img/expansao/fotos/small/' . $data['arquivo'], '60');
				
				$this->model->insertFoto($data);
				alert('Foto cadastrada com sucesso', 'success');
				redirect('obras/fotos');
			}
		}
		
		$this->load->view('obras/fotosUpload');
	}
	
	private function uploadFoto(&$data, &$field){
		$this->load->library('upload',array(
			'upload_path' => './assets/img/expansao/fotos',
			'allowed_types' => 'jpg',
			'encrypt_name' => true,
			'max_size' => 3145728
		));
		
		if(!$this->upload->do_upload($field)){
			alert('Upload erro: '.$this->upload->display_errors('',''));
			return false;
		} else {
			
			$upload = $this->upload->data();
			$data['arquivo'] = $upload['file_name'];
			return true;
		}
		
		return false;
	}
	
	public function fotosEditar($id){
		$this->auth->verify('ambientais');
		$this->load->model('obras_model','model');
		
		$foto = $this->model->getFotoById($id);
		if($foto){
			if($this->input->post()){
					
				$data = array(
					'desc' => $this->input->post('descricao'),
					'lang' => $this->input->post('lang'),
					'data' => site_sql($this->input->post('data'))
				);
					
				$this->model->updateFoto($data, $foto->id);
				alert('Foto alterada com sucesso', 'success');
				redirect('obras/fotos');
			}
			
			$this->load->view('obras/fotosEditar', array(
				'foto' => $foto
			));
		} else show_404();
	}
	
	public function fotosRemover($id){
		$this->auth->verify('ambientais');
		$this->load->model('obras_model','model');
		
		$foto = $this->model->getFotoById($id);
		if($foto){
			if($this->input->post()){
				
				$small = './assets/img/expansao/fotos/small/' . $data['arquivo'];
				$arquivo = './assets/img/expansao/fotos/' . $data['arquivo'];
				
				if(file_exists($arquivo))
					unlink($small);
				
				if(file_exists($arquivo))
					unlink($arquivo);
				
				$this->model->deleteFoto($foto->id);
				alert('Foto removida com sucesso', 'success');
				redirect('obras/fotos');
			}
			
			$this->load->view('obras/fotosRemover', array(
					'foto' => $foto
			));
		} else show_404();
	}
	
	/* ----------- Videos ----------- */
	
	public function videos($page = 0){
		$this->auth->verify('ambientais');
		$this->load->model('obras_model','model');
	
		$pagination = $this->main_model->pages(array(
				'uri_segment' => 3,
				'base_url' => site_url('obras/videos'),
				'total_rows' => $this->model->getVideosListaNum(),
				'per_page' => 20,
		));
		$this->load->view('obras/videosLista',array(
				'pages' => $pagination,
				'videos' => $this->model->getVideosLista($page)
		));
	}
	
	public function videosCadastrar(){
		$this->auth->verify('ambientais');
		$this->load->model('obras_model','model');
	
		if($this->input->post()){
				
			$data = array(
				'titulo' => $this->input->post('titulo'),
				'link' => str_replace('https','http',$this->input->post('link')),
				'lang' => $this->input->post('lang'),
				'data' => site_sql($this->input->post('data'))
			);
				
			$field = 'arquivo';
			if($this->uploadVideo($data, $field)){
				$file = './assets/img/expansao/videos/' . $data['arquivo'];
	
				WideImage::load($file)->resize(295, 166, 'outside')->crop('center', 'center', 295, 166)->saveToFile($file, '60');
	
				$this->model->insertVideo($data);
				alert('Video cadastrado com sucesso', 'success');
				redirect('obras/videos');
			}
		}
	
		$this->load->view('obras/videosCadastrar');
	}
	
	private function uploadVideo(&$data, &$field){
		$this->load->library('upload',array(
			'upload_path' => './assets/img/expansao/videos',
			'allowed_types' => 'jpg',
			'encrypt_name' => true,
			'max_size' => 3145728
		));
	
		if(!$this->upload->do_upload($field)){
			alert('Upload erro: '.$this->upload->display_errors('',''));
			return false;
		} else {
				
			$upload = $this->upload->data();
			$data['arquivo'] = $upload['file_name'];
			return true;
		}
	
		return false;
	}
	
	public function videosEditar($id){
		$this->auth->verify('ambientais');
		$this->load->model('obras_model','model');
	
		$video = $this->model->getVideoById($id);
		if($video){
			if($this->input->post()){
					
				$data = array(
					'titulo' => $this->input->post('titulo'),
					'link' => str_replace('https','http',$this->input->post('link')),
					'lang' => $this->input->post('lang'),
					'data' => site_sql($this->input->post('data'))
				);
					
				$this->model->updateVideo($data, $video->id);
				alert('Video alterado com sucesso', 'success');
				redirect('obras/videos');
			}
				
			$this->load->view('obras/videosEditar', array(
				'video' => $video
			));
		} else show_404();
	}
	
	public function videosRemover($id){
		$this->auth->verify('ambientais');
		$this->load->model('obras_model','model');
	
		$video = $this->model->getVideoById($id);
		if($video){
			if($this->input->post()){
	
				$arquivo = './assets/img/expansao/videos/' . $data['arquivo'];
	
				if(file_exists($arquivo))
					unlink($arquivo);
	
				$this->model->deleteVideo($video->id);
				alert('Video removido com sucesso', 'success');
				redirect('obras/videos');
			}
				
			$this->load->view('obras/videosRemover', array(
				'video' => $video
			));
		} else show_404();
	}
	
}