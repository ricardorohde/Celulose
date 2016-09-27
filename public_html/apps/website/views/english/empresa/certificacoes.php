<?php
	$this->load->view(getLang().'/empresa/aba');
?>
<section class="container empresa certificacoes">
	<h1 class="title"><?=lang('defualt_menu_certificacoes'); ?></h1>

	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-empresa-certificacoes.jpg'); ?>">

	<ul>
		<li>
			<img src="<?=base_url('assets/img/thumbs/img-iso-9001-2008.jpg'); ?>">
			<div class="titulo">ISO 9001:2008</div>
			<div class="texto">This standard provides a set of requirements directed at controlling the company’s manufacturing processes, in order to ensure the predictability of results and customer satisfaction. The most famous of certifications is a control that considers the technical standards of a company to certify its quality.</div>
			<div class="links">
				<a href="<?=site_url('docs/dl/iso-9001-2008_en.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
			</div>
		</li>
		<li>
			<img src="<?=base_url('assets/img/thumbs/14790-2014.jpg'); ?>">
			<div class="titulo">NBR 14790:2014</div>
			<div class="texto">NBR 14.790 standardis a series that brings some traceability requirements to ensure that the raw materials that constitute the final product (pulp and paper) are derived from a certified forest planting in accordance with the requirements of NBR 14.789.</div>
			<div class="links">
				<a href="<?=site_url('docs/dl/14790-2014.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
			</div>
		</li>
		<li class="last">
			<img src="<?=base_url('assets/img/thumbs/img-nbr-14789-2012.jpg'); ?>">
			<div class="titulo">NBR 14789:2012</div>
			<div class="texto">NBR 14.789 gathers five Principles for conduct of Forest Management focused in the pursuit of sustainability.These principles are broken down into criteria and indicators for management of forest plantations and cover compliance with all environmental and labor laws; the rational use of natural resources, diligence for biological diversity, control of environmental impacts and effort to promote social and economic development in regions where the activity is developed.</div>
			<div class="links">
				<a href="<?=site_url('docs/dl/nbr-14789-2012-us.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
			</div>
		</li>
		<li>
			<img src="<?=base_url('assets/img/thumbs/img-iso-14001-2004.jpg'); ?>">
			<div class="titulo">ISO 14001:2004</div>
			<div class="texto">ISO 14.001 focuses on the identification of environmental aspects and impacts of production processes, determining that the company set an Environmental Management Policy and mechanisms for prevention and mitigation of impacts.</div>
			<div class="links">
				<a href="<?=site_url('docs/dl/iso-14001-2004_en.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
			</div>
		</li>
		<li>
			<img src="<?=base_url('assets/img/thumbs/img-poli-compra-madeira.jpg'); ?>">
			<div class="titulo">Wood Purchasing Policy</div>
			<div class="texto">CMPC Pulp Riograndense, concerned in ensuring, in all forms, the origin of the raw material used in its production processes, has established a WoodPurchase Policy.</div>
			<div class="links">
				<a href="<?=site_url('docs/dl/poli-compra-madeira.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
			</div>
		</li>
		<li class="last">
			<img src="<?=base_url('assets/img/thumbs/compromisso-com-a-cadeia-de-custodia'); ?>">
			<div class="titulo">Cadeia de Custódia</div>
			<div class="texto">A CMPC Celulose Riograndense utiliza somente madeira oriunda de plantios próprios e/ou de produtores independentes, obedecendo aos requisitos da Norma ABNT NBR 14789 - Manejo Florestal e ABNT NBR 14790 - Cadeia de Custódia.</div>
			<div class="links">
				<a href="<?=site_url('docs/dl/compromisso-com-a-cadeia-de-custodia.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
			</div>
		</li>
	</ul>
	
	<div class="clear"></div>
</section>