<?php
function sql_site($data){
	return $data = implode("/",array_reverse(explode("-",$data)));
}
function site_sql($data){
	return $data = implode("-",array_reverse(explode("/",$data)));
}
function file_size($size){
	$filesizename = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
	return $size ? round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $filesizename[$i] : '0 Bytes';
}
?>