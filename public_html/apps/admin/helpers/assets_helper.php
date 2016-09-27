<?php
function assets_url($param = false){
	if($param){
		return base_url('assets/admin/' . $param);
	} else {
		return base_url('assets/admin/');
	}
}
?>