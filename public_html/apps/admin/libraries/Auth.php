<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth {
	
	private $ci = null;
	
	private $key = false;
	private $url = '';

	function Auth(){
		$this->ci =& get_instance();
		$this->key = SESSION_KEY;
		$this->url = rawurlencode(current_url());

	}
	function hasFlag($key){
		if(isset($_SESSION[$this->key]['usuario']['permissions'][$key]) && $_SESSION[$this->key]['usuario']['permissions'][$key] === true){
			return true;
		} else {
			return false;
		}
	}
	function verify($key = false){
		if(isset($_SESSION[$this->key]) && isset($_SESSION[$this->key]['usuario'])){
				if($key){
					if(isset($_SESSION[$this->key]['usuario']['permissions'][$key]) && $_SESSION[$this->key]['usuario']['permissions'][$key] === true){
						return true;
					} else {
						show_404();
					}
				} else {
					return true;
				}
		} else {
			redirect('auth?return='.$this->url);
		}
	}
	function login($e){
		$_SESSION[$this->key]['usuario'] = $e;
		$this->ci->logs->setID($e['id']);
		$this->ci->logs->register('user');
	}
	function addPermission($key){
		$_SESSION[$this->key]['usuario']['permissions'][$key] = true;
	}
	function removePermission($key){
		unset($_SESSION[$this->key]['usuario']['permissions'][$key]);
	}

	function logoff(){
		unset($_SESSION[$this->key]);
	}
	function get($p = false){
		if($p){
			if(isset($_SESSION[$this->key]['usuario'][$p])){
				return $_SESSION[$this->key]['usuario'][$p];
			}
		} else {
			return $_SESSION[$this->key]['usuario'];
		}
	}
}