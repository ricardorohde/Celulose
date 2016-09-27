<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function pages($array){
		$this->pagination->initialize(array_merge(array(
			'uri_segment' => 3,
			'full_tag_open' => false,
			'full_tag_close' => false,
			'first_link' => false,
			'first_tag_open' => false,
			'first_tag_close' => false,
			'last_link' => false,
			'last_tag_open' => false,
			'last_tag_close' => false,
			'next_link' => '»',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_link' => '«',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			'cur_tag_open' => '<li class="active"><a href="javascript:void(0);">',
			'cur_tag_close' => '</a></li>',
			'num_tag_open' => '<li>',
			'num_tag_close' => '</li>'
		),$array));
		return $this->pagination->create_links();
	}
	function uniqueURL($string,$table,$coluna){
		$url = strtourl($string);
		$sql = "SELECT {$table}.{$coluna} AS url FROM {$table} WHERE {$table}.{$coluna}  = ";
		if($this->db->query($sql . "'{$url}' LIMIT 1")->num_rows() == 1){
			for($i=1;$i<=999;$i++){
				if($this->db->query($sql . "'{$url}{$i}' LIMIT 1")->num_rows() == 0){
					$url = $url.$i;
					break;
				}
			}
		}
		return $url;
	}

	function code($tabela,$coluna,$options = array()){
		if(!is_array($options)){
			$options = array('count' => $options);
		}
		for($o=0;$o<100;$o++){
			$code=$this->coder($options);
			$v=$this->db->query("SELECT " .$tabela. "." .$coluna. " FROM " .$tabela. " WHERE " .$tabela. "." .$coluna. " = '".$code."' LIMIT 1")->num_rows();
			if($v==0){
				break;	
			} else {
				$o--;
			}
		}
		return $code;
	}
	function coder($o = array()){
		$c = array(
			'count' => 5,
			'chars' => array('a','b','c','d','f','g','h','i','j','l','m','o','p','q','r','s','t','u','v','x','z','A','B','C','D','F','G','H','I','J','L','M','O','O','Q','R','S','T','U','V','X','Z'),
			'numbs' => array('0','1','2','3','4','5','6','7','8','9'),
			'type' => 'r',
			'sep' => "",
			'sepcount' => 1
		);
		$c = array_merge($c,$o);
		$code = array();
		$rchar = array_merge($c['chars'],$c['numbs']);
		for($sep = 0;$sep < $c['sepcount'];$sep++){
			for($i = 0;$i < $c['count'];$i++){
				switch($c['type']){
					case 'c' : @$code[$sep].=$c['chars'][array_rand($c['chars'])]; break;
					case 'n' : @$code[$sep].=$c['numbs'][array_rand($c['numbs'])]; break;
					default : @$code[$sep].=$rchar[array_rand($rchar)]; break;
				}
			}
		}
		return implode($c['sep'],$code);
	}
}