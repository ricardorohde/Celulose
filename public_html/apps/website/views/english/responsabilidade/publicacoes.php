<?php
	$this->load->view(getLang().'/responsabilidade/aba');
?>
<section class="container responsabilidade-publicacoes">
	<h1 class="title"><?=lang('defualt_menu_publicacoes'); ?></h1>

	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-responsabilidade-publicacoes.jpg'); ?>">

	<h2 id="plano-de-manejo">Management Plan</h2>
	<div class="item plano-de-manejo">
		<div class="thumb">
			<img src="<?=base_url('assets/img/thumbs/plano-de-manejo-capa.jpg'); ?>">
		</div>
		<div class="texto">
			Forestal management is the management of forestal resources aiming to obtain economic and social benefits, respecting the ecosystem support mechanisms. In order to be sustainable, forestal management must be economically viable, environmentally correct, and socially fair.
		</div>
		<div class="links">
			<a href="<?=site_url('docs/dl/plano_de_manejo_web.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</div>
	</div>

	<h2 id="informativos">Reports</h2>
	<ul class="lista">
		<li>
			<span>Management System</span>
			<img src="<?=base_url('assets/img/thumbs/informativo_1.jpg'); ?>">
			<a href="<?=site_url('docs/dl/Informativo_Celulose_01.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</li>
		<li>
			<span>Residues at Forestal Gardens</span>
			<img src="<?=base_url('assets/img/thumbs/informativo_2.jpg'); ?>">
			<a href="<?=site_url('docs/dl/Informativo_Celulose_02.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</li>
		<li>
			<span>Native Vegetation in Forestal Gardens</span>
			<img src="<?=base_url('assets/img/thumbs/informativo_3.jpg'); ?>">
			<a href="<?=site_url('docs/dl/Informativo_Celulose_03.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</li>
		<li>
			<span>Water: It Needs to Be Cared</span>
			<img src="<?=base_url('assets/img/thumbs/informativo_4.jpg'); ?>">
			<a href="<?=site_url('docs/dl/Informativo_Celulose_04.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</li>
		<li>
			<span>Attendance to Emergencies at Forestal Area</span>
			<img src="<?=base_url('assets/img/thumbs/informativo_5.jpg'); ?>">
			<a href="<?=site_url('docs/dl/Informativo_Celulose_05.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</li>
		<li class="last">
			<span>Environmental Adequacy</span>
			<img src="<?=base_url('assets/img/thumbs/informativo_6.jpg'); ?>">
			<a href="<?=site_url('docs/dl/Informativo_Celulose_06.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</li>
	</ul>

	<!--

	<h2 id="relatorios-de-sustentabilidade">Sustainability Report</h2>
	<div class="item">
		<div class="thumb">
			<img src="<?=base_url('assets/img/thumbs/relatorio-sustentabilidade-2014.jpg'); ?>">
		</div>
		<div class="texto">
			Know our Sustainability Report, a material that shows why we are proudly a reference in the area in our state. Click and download this material that shows the responsibility of Celulose Riograndense for its land.
		</div>
		<div class="links">
			<a href="<?=site_url('docs/dl/Relatorio_de_sustentabilidade_2014.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</div>
	</div>
	-->

	<?php /*
	<h2>Folha Riograndense</h2>
	<div class="folha-menu">
		<a rel="campanha" class="" href="<?=site_url('responsabilidade/folha-riograndense/campanha'); ?>">
			Região<br>
			<span>CAMPANHA</span>
		</a>
		<a rel="centro" class="" href="<?=site_url('responsabilidade/folha-riograndense/centro'); ?>">
			Região<br>
			<span>CENTRO</span>
		</a>
		<a rel="metropolitana" class="" href="<?=site_url('responsabilidade/folha-riograndense/metropolitana'); ?>">
			Região<br>
			<span>METROPOLITANA</span>
		</a>
	</div>
	*/ ?>

	<br><br><br><br>

	<div class="clear"></div>
</section>