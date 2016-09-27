<?php
function get($url,$param=array()){
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
?>