<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$CI =& get_instance();
$CI->load->view('tpl/header');
?>
<section class="erro">
	<h1><?=$heading; ?></h1>
	<?=$message; ?>
</section>
<?=$CI->load->view('tpl/footer'); ?>