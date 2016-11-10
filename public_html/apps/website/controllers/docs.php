<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docs extends CI_Controller {

	public function index(){ show_404(); }
	
	public function dl($arquivo = false){
		if(preg_match("/^[a-zA-Z0-9-_\.]+\.(pdf|jpg|doc|csv|png)$/",$arquivo)){
			$arquivo = ('./assets/arquivos/public/'.$arquivo);
			if(file_exists($arquivo)){
				$this->load->helper('download');
				force_download(basename($arquivo),file_get_contents($arquivo));
			} else { show_404(); }
		} else { show_404(); }
	}

	public function relatorio($y,$m){
		$this->load->model('responsabilidade_model','model');
		$relatorio = $this->model->getRelatiorioByMes($y,$m);
		if($relatorio){
			$arquivo = ('./assets/arquivos/relatorios/'.$relatorio->arquivo);
			if(file_exists($arquivo)){
				$this->load->helper('download');
				
				$nome = sprintf(lang('defualt_download_relatorio'),lang('mes_'.$m),$y);
				force_download($nome,file_get_contents($arquivo));
			} else { show_404(); }
		} else { show_404(); }
	}
}