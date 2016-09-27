<?php
$url = $this->uri->segment(2);
?>
<section class="container page-tab big">
	<nav>
		<a href="<?=site_url('empresa'); ?>" class="<?=empty($url) ? 'active' : ''; ?>"><span><?=lang('defualt_menu_sobre'); ?></span></a>
		<a href="<?=site_url('empresa/valores'); ?>" class="<?=$url == "valores" ? 'active' : ''; ?>"><span><?=lang('defualt_menu_valores'); ?></span></a>
		<a href="<?=site_url('empresa/certificacoes'); ?>" class="<?=$url == "certificacoes" ? 'active' : ''; ?>"><span><?=lang('defualt_menu_certificacoes'); ?></span></a>
		<a href="<?=site_url('empresa/cmpc'); ?>" class="<?=$url == "cmpc" ? 'active' : ''; ?>"><span><?=lang('defualt_menu_cmpc'); ?></span></a>
		<a href="<?=site_url('empresa/historia'); ?>" class="<?=$url == "historia" ? 'active' : ''; ?>"><span><?=lang('defualt_menu_historia'); ?></span></a>
		<a href="<?=site_url('exposicao40anos'); ?>" target="_blank"><span><?=lang('defualt_menu_exposicao'); ?></span></a>
	</nav>
	<div class="white-bar"></div>
</section>