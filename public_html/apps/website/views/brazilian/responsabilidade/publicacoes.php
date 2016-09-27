<?php
	$this->load->view(getLang().'/responsabilidade/aba');
?>
<section class="container responsabilidade-publicacoes">
	<h1 class="title"><?=lang('defualt_menu_publicacoes'); ?></h1>

	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-responsabilidade-publicacoes.jpg'); ?>">
	
	<h2 id="plano-de-manejo">Plano de Manejo</h2>
	<div class="item plano-de-manejo">
		<div class="thumb">
			<img src="<?=base_url('assets/img/thumbs/plano-de-manejo-capa.jpg'); ?>">
		</div>
		<div class="texto">
			Plano de Manejo é a gestão dos recursos florestais com o objetivo de obter benefícios econômicos e sociais, respeitando os mecanismos de apoio do ecossistema. Para ser sustentável, a gestão florestal deve ser economicamente viável, ambientalmente correta e socialmente justa.
		</div>
		<div class="links">
			<a href="<?=site_url('docs/dl/plano_de_manejo_web.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</div>
	</div>
	
	<h2 id="informativos">Informativos</h2>
	<ul class="lista">
		<li>
			<span>Sistema de Gestão</span>
			<img src="<?=base_url('assets/img/thumbs/informativo_1.jpg'); ?>">
			<a href="<?=site_url('docs/dl/Informativo_Celulose_01.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</li>
		<li>
			<span>Resíduos nos Hortos Forestais</span>
			<img src="<?=base_url('assets/img/thumbs/informativo_2.jpg'); ?>">
			<a href="<?=site_url('docs/dl/Informativo_Celulose_02.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</li>
		<li>
			<span>Vegetação Nativa nos Hortos Florestais</span>
			<img src="<?=base_url('assets/img/thumbs/informativo_3.jpg'); ?>">
			<a href="<?=site_url('docs/dl/Informativo_Celulose_03.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</li>
		<li>
			<span>Àgua: Ela precisa ser cuidada</span>
			<img src="<?=base_url('assets/img/thumbs/informativo_4.jpg'); ?>">
			<a href="<?=site_url('docs/dl/Informativo_Celulose_04.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</li>
		<li>
			<span>Atendimento a emergências</span>
			<img src="<?=base_url('assets/img/thumbs/informativo_5.jpg'); ?>">
			<a href="<?=site_url('docs/dl/Informativo_Celulose_05.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</li>
		<li class="last">
			<span>Adequação Ambiental</span>
			<img src="<?=base_url('assets/img/thumbs/informativo_6.jpg'); ?>">
			<a href="<?=site_url('docs/dl/Informativo_Celulose_06.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</li>
	</ul>

	<h2 id="relatorios-de-sustentabilidade">Relatórios de Sustentabilidade</h2>
	<div class="item">
		<div class="thumb">
			<img src="<?=base_url('assets/img/thumbs/relatorio-sustentabilidade-2014.jpg'); ?>">
		</div>
		<div class="texto">
			Relatório de Sustentabilidade, um material que mostra o compromisso que temos com o meio ambiente do Rio Grande do Sul. Clique e Baixe este material que apresenta informações relevantes sobre a atuação da Celulose Riograndense.
		</div>
		<div class="links">
			<a href="<?=site_url('docs/dl/Relatorio_de_sustentabilidade_2014-2015.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</div>
	</div>


	<?php /*
	<div class="item">
		<div class="thumb">
			<img src="<?=base_url('assets/img/thumbs/relatorio-de-analise.jpg'); ?>">
		</div>
		<div class="texto">
			Relatório de Análise das Condições Ambientais nas Áreas de Alto Valor de Conservação da CMPC CELULOSE RIOGRANDENSE
		</div>
		<div class="links">
			<a href="<?=site_url('docs/dl/Relatorio_de_Analise.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
		</div>
	</div>
	*/ ?>

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

	<br><br><br><br>

	<div class="clear"></div>
</section>