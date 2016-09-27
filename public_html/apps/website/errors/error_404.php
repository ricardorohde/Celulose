<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$CI =& get_instance();
$CI->load->view('tpl/header');
?>
<section class="erro">
	<h1>Desculpe, a página não foi encontrada.</h1>
</section>
<?=$CI->load->view('tpl/footer'); ?>