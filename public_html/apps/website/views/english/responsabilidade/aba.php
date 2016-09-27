<?php
$url = $this->uri->segment(2);
?>
<section class="container page-tab">
	<nav>
		<a href="<?=site_url('responsabilidade'); ?>" class="<?=empty($url) ? 'active' : ''; ?>"><span><?=lang('defualt_menu_publicacoes'); ?></span></a>
		<a href="<?=site_url('responsabilidade/meio-ambiente-florestal'); ?>" class="<?=$url == "meio-ambiente-florestal" ? 'active' : ''; ?>"><span><?=lang('defualt_menu_ambiente_florestal'); ?></span></a>
		<a href="<?=site_url('responsabilidade/meio-ambiente-industrial'); ?>" class="<?=$url == "meio-ambiente-industrial" ? 'active' : ''; ?>"><span><?=lang('defualt_menu_ambiente_industrial'); ?></span></a>
		<a href="<?=site_url('responsabilidade/projetos-sociais'); ?>" class="<?=$url == "projetos-sociais" ? 'active' : ''; ?>"><span><?=lang('defualt_menu_projetos'); ?></span></a>
		<a href="<?=site_url('responsabilidade/geracao-de-empregos'); ?>" class="<?=$url == "geracao-de-empregos" ? 'active' : ''; ?>"><span><?=lang('defualt_menu_empregos'); ?></span></a>
		<a href="<?=site_url('responsabilidade/contribuicao-fiscal'); ?>" class="<?=$url == "contribuicao-fiscal" ? 'active' : ''; ?>"><span><?=lang('defualt_menu_fiscal'); ?></span></a>
		<a href="<?=site_url('responsabilidade/reserva-barba-negra'); ?>" class="<?=$url == "reserva-barba-negra" ? 'active' : ''; ?>"><span><?=lang('defualt_menu_barba'); ?></span></a>
	</nav>
	<div class="white-bar"></div>
</section>