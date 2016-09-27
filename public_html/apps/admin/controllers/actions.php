<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actions extends CI_Controller {
	
	public function index(){
		show_404();
	}

	public function convertTitleToUrl(){
		echo json_encode(array(
			'code' => 200,
			'data' => strtourl($this->input->post('title'))
		));
	}

	public function getVideoInfos(){
		$url = $this->input->post('url');
		
		if($url){
			$this->load->library('video');
			$vetor = $this->video->parse($url);

			if($vetor){
				echo json_encode(array(
					'code' => 200,
					'data' => $vetor
				));
			} else {
				echo json_encode(array(
					'code' => 500,
					'data' => null
				));
			}

		} else { show_404(); }
	}

	public function getUploadProgress(){
		if($this->input->get('key')){
			if(function_exists('apc_fetch')){
				$status = apc_fetch('upload_'.$this->input->get('key'));
				var_dump($status);
				die();
				$status = ceil($status['current']/$status['total']*100);
			} else {
				$status = 100;
			}
			echo json_encode(array(
				'data' => array(
					'progress' => $status,
					'key' => $this->input->get('key')
				),
				'code' => 200
			));
		} else { show_404(); }
	}

	public function comunicacaoTrabalheBusca(){
		$this->auth->verify('contato');
		$this->load->model('comunicacao_model','model');

		$json = array('code' => 500);

		$post = $this->input->post();
		$data = array();

		if(!empty($post)){
			$where = array();
			foreach($post as $key => $value){
				if($value !='' && $value !='undefined'){
					if($key == 'fisico' || $key == 'estagio'){
						array_push($where," celulose_trabalhe.{$key} = {$value} ");
					} else {
						$value = mysql_real_escape_string($value);
						array_push($where," celulose_trabalhe.{$key} LIKE '%{$value}%' ");
					}
				}
			}
			array_push($data,$this->load->view('comunicacao/trabalhe/advanceLista',array(
				'trabalhe' => $this->model->getTrabalhesSearchAdvance($where)
			),true));

			$json['code'] = 200;
			$json['data'] = $data;
		}
		echo json_encode($json);
	}
}