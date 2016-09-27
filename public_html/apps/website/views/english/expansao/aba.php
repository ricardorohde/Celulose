<?php
$url = $this->uri->segment(2);
?>
<section class="container page-tab big">
	<nav>
		<a href="<?=site_url('guaiba-2'); ?>" class="<?=empty($url) ? 'active' : ''; ?>"><span>Project Guaiba 2</span></a>
		<a href="<?=site_url('guaiba-2/andamento'); ?>" class="<?=$url == "andamento" ? 'active' : ''; ?>"><span>Progress of the Work</span></a>
	</nav>
	<div class="white-bar"></div>
</section>