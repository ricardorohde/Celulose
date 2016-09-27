<?php
$url = $this->uri->segment(2);
?>
<section class="container page-tab big">
	<nav>
		<a href="<?=site_url('contato'); ?>" class="<?=empty($url) ? 'active' : ''; ?>"><span><?=lang('defualt_menu_com_quem_falar'); ?></span></a>
		<a href="<?=site_url('contato/telefones'); ?>" class="<?=$url == "telefones" ? 'active' : ''; ?>"><span><?=lang('defualt_menu_telefones'); ?></span></a>
		<a href="<?=site_url('contato/localizacao'); ?>" class="<?=$url == "localizacao" ? 'active' : ''; ?>"><span><?=lang('defualt_menu_localizacao'); ?></span></a>
	</nav>
	<div class="white-bar"></div>
</section>