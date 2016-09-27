<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Logs {
	
	var $CI;
	
	private $uid = false;
	private $uip = false;
	private $sql = false;

	function Logs(){
		$this->CI =& get_instance();
		$this->uip = $this->CI->input->ip_address();
		if(
			isset($_SESSION[SESSION_KEY]) &&
			isset($_SESSION[SESSION_KEY]['usuario']) &&
			isset($_SESSION[SESSION_KEY]['usuario']['id'])
		){
			$this->uid = $_SESSION[SESSION_KEY]['usuario']['id'];
		}
	}
	function setID($id){
		$this->uid = $id;
	}
	function register($type = 'action'){
		$this->sql = $this->CI->db->last_query();
		if($type == 'action'){
			list($sql_type,$t1,$t2) = explode(" ",$this->sql);
			if(strtolower($t1) == "into" or strtolower($t1) == "from"){
				$tabela = $t2;
			} else {
				$tabela = $t1;
			}
			$tabela = str_replace('WHERE','',$tabela);
			$sql_type = strtolower($sql_type);
			if(in_array($sql_type,array('insert','update','delete'))){
				$this->CI->db->insert(TABLE_PREFIX.'_admin_logs_acoes',array(
					'usuario' => $this->uid,
					'ip' => $this->uip,
					'tabela' => str_replace("`","",$tabela),
					'sql' => $this->sql,
					'acao' => $sql_type,
					'ctime' => time()
				));
			}
		} elseif($type === 'user') {
			$this->CI->db->insert(TABLE_PREFIX.'_admin_logs_acessos',array(
				'usuario' => $this->uid,
				'ip' => $this->uip,
				'ctime' => time() 
			));
		} else {
			die('$type não é válido.');
		}
	}
}