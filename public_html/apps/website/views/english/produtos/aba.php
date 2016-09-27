<?php
$url = $this->uri->segment(2);
?>
<section class="container page-tab extra">
	<nav>
		<a href="<?=site_url('produtos'); ?>" class="<?=empty($url) ? 'active' : ''; ?>"><span><?=lang('defualt_menu_celulose'); ?></span></a>
		<a href="<?=site_url('produtos/papel'); ?>" class="<?=$url == "papel" ? 'active' : ''; ?>"><span><?=lang('defualt_menu_papel'); ?></span></a>
	</nav>
	<div class="white-bar"></div>
</section>