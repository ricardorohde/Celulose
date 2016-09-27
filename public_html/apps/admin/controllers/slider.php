<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider extends CI_Controller {
	
	public function index(){
		$this->auth->verify('slider');
		redirect('slider/lista');
	}

	public function lista($page = 0){
		$this->auth->verify('slider');
		$this->load->model('slider_model','model');
		
		$pagination = $this->main_model->pages(array(
			'uri_segment' => 3,
			'base_url' => site_url('slider/lista'),
			'total_rows' => $this->model->getSlidersNum(),
			'per_page' => 20,
		));

		$this->load->view('slider/lista',array(
			'pages' => $pagination,
			'slider' => $this->model->getSliders($page)
		));

	}

	public function search($search = '',$page = 0){
		$this->auth->verify('slider');
		$this->load->model('slider_model','model');
		
		if($this->input->post('q')){
		
			$search = strtourl($this->input->post('q'));
			redirect('slider/search/'.$search);
		
		} elseif(!empty($search)){
		
			$pagination = $this->main_model->pages(array(
				'uri_segment' => 5,
				'base_url' => site_url('slider/search/'.$search),
				'total_rows' => $this->model->getSlidersSearchNum($search),
				'per_page' => 20,
			));
			$this->load->view('slider/lista',array(
				'pages' => $pagination,
				'slider' => $this->model->getSlidersSearch($page,$search),
				'search' => str_replace('-',' ',$search)
			));
		
		} else {
			redirect('slider/lista');
		}

	}

	public function cadastrar(){
		$this->auth->verify('slider');
		$this->load->model('slider_model','model');

		if($this->input->post()){
			$data = array(
				'nome' => trim($this->input->post('form_nome')),
				'lang' => $this->input->post('form_lang'),
				'ctime' => time()
			);

			$id = $this->model->insertSlider($data);

			alert('Slider cadastrado com sucesso.','success');
			redirect('slider/editar/'.$id);
		}

		$this->load->view('slider/cadastrar',array(
			'langs' => $this->model->getLangs()
		));
	}

	public function editar($id = 0){
		$this->auth->verify('slider');
		$this->load->model('slider_model','model');

		if($id > 0){

			$slider = $this->model->getSlider($id);
			if($slider){

				if($this->input->post()){

					$data = array(
						'nome' => $this->input->post('form_nome'),
						'lang' => $this->input->post('form_lang'),
						'status' => $this->input->post('form_status')
					);

					$this->model->updateSlider($slider->id,$data);
					alert('Registro alterado com sucesso!','success');
					redirect('slider/editar/'.$slider->id);
					
				}

				$this->load->view('slider/editar',array(
					'slider' => $slider,
					'imgs' => $this->model->getSliderImagens($slider->id),
					'langs' => $this->model->getLangs(),
				));

			} else { show_404(); }

		} else { show_404(); }

	}

	public function remover($id = 0){
		$this->auth->verify('slider');
		$this->load->model('slider_model','model');

		if($id > 0){

			$slider = $this->model->getSlider($id);
			if($slider){

				if($this->input->post('id')){
					
					foreach($this->model->getSliderImagens($slider->id) as $img){
						unlink('./assets/img/slider/backgrounds/'.$img->arquivo);
						$this->model->deleteImagem($img->id);
					}
					
					$this->model->deleteSlider($slider->id);

					alert('Registro removido com sucesso!','success');
					redirect('slider/lista');
				}

				$this->load->view('slider/remover',array(
					'slider' => $slider
				));

			} else { show_404(); }

		} else { show_404(); }
		
	}

	public function editarOrdem($id = 0){
		$this->auth->verify('slider');
		$this->load->model('slider_model','model');

		if($id > 0){
			$slider = $this->model->getSlider($id);
			if($slider && $this->input->post('form_ordem')){
				$ordem = $this->input->post('form_ordem');

				foreach($ordem as $sid => $ordem){
					
					$this->model->updateSliderImagen($sid,array('ordem' => $ordem));

				}

				alert('Ordem alterada com sucesso!','success');
				redirect('slider/editar/'.$slider->id);

			} else { show_404(); }
		} else { show_404(); }
	}

	public function removerImagem($id = 0,$imageId = 0){
		$this->auth->verify('slider');
		$this->load->model('slider_model','model');

		if($id > 0 && $imageId > 0){
			$slider = $this->model->getSlider($id);
			$imagem = $this->model->getSliderImagen($imageId);

			if($slider && $imagem){
				if($this->input->post()){

					unlink('./assets/img/slider/backgrounds/'.$imagem->arquivo);

					$this->model->deleteImagem($imagem->id);

					alert('Imagem removida com sucesso!','success');
					redirect('slider/editar/'.$slider->id);

				}

				$this->load->view('slider/removerImagem',array(
					'slider' => $slider,
					'imagem' => $imagem
				));

			} else { show_404(); }
		} else { show_404(); }

	}

	public function editarImagem($id = 0,$imageId = 0){
		$this->auth->verify('slider');
		$this->load->model('slider_model','model');

		if($id > 0 && $imageId > 0){
			$slider = $this->model->getSlider($id);
			$imagem = $this->model->getSliderImagen($imageId);

			if($slider && $imagem){
				if($this->input->post()){

					$data = array(
						'legenda' => trim($this->input->post('form_legenda')),
						'link' => trim($this->input->post('form_url')),
						'ordem' => $this->input->post('form_ordem')
					);

					$this->model->updateSliderImagen($imagem->id,$data);

					alert('Imagem alterada com sucesso!','success');
					redirect('slider/editar/'.$slider->id);

				}

				$this->load->view('slider/editarImagem',array(
					'slider' => $slider,
					'imagem' => $imagem
				));

			} else { show_404(); }
		} else { show_404(); }
	}

	public function upload($id = 0){
		$this->auth->verify('slider');
		$this->load->model('slider_model','model');

		if($id > 0){
			$slider = $this->model->getSlider($id);
			if($slider){

				if($this->input->post()){

					$data = array(
						'slider' => $slider->id,
						'legenda' => trim($this->input->post('form_legenda')),
						'link' => trim($this->input->post('form_url')),
						'ordem' => $this->input->post('form_ordem'),
						'ctime' => time()
					);

					$this->load->library('upload',array(
						'upload_path' => './assets/img/slider/backgrounds/',
						'allowed_types' => 'jpg|jpeg',
						'max_width' => 1920,
						'max_height' => 450,
						'encrypt_name' => true
					));

					if(!$this->upload->do_upload()){
						alert('Upload erro: '.$this->upload->display_errors('',''));
					} else {

						$upload = $this->upload->data();

						$data['arquivo'] = $upload['file_name'];
						$this->model->insertImagem($data);

						alert('Upload efetuado com sucesso!','success');
						redirect('slider/editar/'.$slider->id);

					}
				}

				$this->load->view('slider/cadastrarImagem',array(
					'slider' => $slider
				));

			} else { show_404(); }
		} else { show_404(); }
	}
}