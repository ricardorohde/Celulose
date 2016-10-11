<?php


function getMax( $array, $param ){
	$max = 0;
	foreach( $array as $k => $v ){
		$max = max( array( $max, $v[$param] ) );
	}
	return $max;
}

function post($key,$def = false){
	if(isset($_POST[$key])){
		return $_POST[$key];
	} else {
		return $def ? $def : '' ;
	}
}
function get($key,$def = false){
	if(isset($_GET[$key])){
		return $_GET[$key];
	} else {
		return $def ? $def : '' ;
	}
}
function sql_site($data){
	return $data = implode("/",array_reverse(explode("-",$data)));
}
function getLangTerm(){
	if(isset($_SESSION['celulose_lang'])){
		if($_SESSION['celulose_lang'] == 'english'){
			return 'en';
		}
	}
	return 'pt_BR';
}
function getLang(){
	return $_SESSION['celulose_lang'];
}

function views(&$object,$key,$vars = array()){

	if(get('method') == "api"){
		$object->load->view($key,$vars);
	} else {
		// if(!isset($vars['header'])){
		// 	$vars['header'] = array('title' => '', 'description' => '', 'keywords' => '');
		// } if(!isset($vars['footer'])){
		// 	$vars['footer'] = array();
		// } 

		//$object->load->view('tpl/header',$vars['header']);
		$object->load->view($key,$vars);

		if(isset($vars['agende'])){
			
			
			if($vars['agende'] == '1'){
				$object->load->view('tpl/agende');
			}
		}

		
		//$object->load->view('tpl/footer',$vars['footer']);
	}
}

function alert($texto,$cor = 'error'){
	switch ($cor) {
		case 'success':	$cor = 'alert-success'; break;
		case 'error':	$cor = 'alert-error'; break;
		case 'alert':	$cor = ''; break;
		case 'info':	$cor = 'alert-info'; break;
		default: $cor = 'error'; break;
	}
	$_SESSION['error_site'] = array(
		'color' => $cor,
		'texto' => $texto
		);
}
function get_display_error(){
	if(isset($_SESSION['error_site'])){
		$temp = $_SESSION['error_site']['texto'];
		unset($_SESSION['error_site']);
		return $temp;
	}
	return false;
}
function display_error(){
	if(isset($_SESSION['error_site'])){
		echo $_SESSION['error_site']['texto'];
		unset($_SESSION['error_site']);
	}
}

function browser_body(){
	
	$ci =& get_instance();

	$ci->load->library('user_agent');

	$browser = $ci->agent->browser();
	$version = $ci->agent->version();

	if(strtolower($browser) == "internet explorer"){
		if($i = strpos($version,'.')){
			$version = substr($version,0,$i);
		}
		return 'ie ie' . $version;
	} else {
		return strtolower($browser);
	}
}
?>