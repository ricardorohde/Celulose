<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Video {
	
	private $ci = null;
	private $api = array('Youtube','Vimeo');

	public function Video(){
		$this->ci =& get_instance();
	}

	public function parse($url){
		$parse = parse_url($url);
		$api = 'parse'.ucfirst(str_replace(array('www.','.com'),'',$parse['host']));
		if(method_exists($this,$api)){
			return $this->$api($parse);
		} else {
			return false;
		}
	}
	
	private function _get($url,$param=array()){
		if(sizeof($param)<>0){
			$url = $url . '?' . http_build_query($param);
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if(!$return = @curl_exec($ch)){
			return false;
		}
		curl_close($ch);
		return $return;
	}

	private function parseYoutube($parse){
		parse_str($parse['query'],$query);
		if(isset($query['v'])){
			$id = $query['v'];
			$url = "https://gdata.youtube.com/feeds/api/videos/{$id}?v=2&alt=jsonc";
			$json = json_decode($this->_get($url));

			return array(
				'vid' => $id,
				'api' => 'youtube',
				'titulo' => $json->data->title,
				'descricao' => $json->data->description,
				'img' => $json->data->thumbnail->hqDefault
 			);
		}
	}

	private function parseVimeo($parse){
		$path = explode('/',trim($parse['path'],'/'));
		if(preg_match("/^([0-9]+)$/",$path[0])){
			$id = $path[0];
			$url = "http://vimeo.com/api/v2/video/{$id}.json";
			$json = json_decode($this->_get($url));

			return array(
				'vid' => $id,
				'api' => 'vimeo',
				'titulo' => $json[0]->title,
				'descricao' => $json[0]->description,
				'img' => $json[0]->thumbnail_large
			);
		}
	}
}