<?php
$url = $this->uri->segment(2);
?>
<section class="container page-tab big">
	<nav>
		<a href="<?=site_url('guaiba-2'); ?>" class="<?=empty($url) ? 'active' : ''; ?>"><span><?=lang('defualt_menu_projeto_guaiba2'); ?></span></a>
		<a href="<?=site_url('guaiba-2/andamento'); ?>" class="<?=$url == "andamento" ? 'active' : ''; ?>"><span><?=lang('defualt_menu_andamento_obra'); ?></span></a>
	</nav>
	<div class="white-bar"></div>
</section>