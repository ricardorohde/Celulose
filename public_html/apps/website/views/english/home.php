<a id="linkSliderFix">
	<div class="container">
		<ul class="nivo-controlNav"></ul>
	</div>
</a>
<div id="box">

</div>
<section class="slider">
	<div id="slider" class="nivoSlider">
		<?php
		$i = 0;
		foreach($slider as $rows){
			echo '<img rel="',$i++,'" src="',$rows->src,'" data-title="',$rows->legenda,'" data-url="',$rows->link,'" data-target="',$rows->target,'">' . PHP_EOL;
		}
		?>
	</div>
	<script type="text/javascript">
		
			$('#slider').nivoSlider();

	</script>
</section>
<section class="column container">
	<div class="left parse">
		<ul>

			<li class="last">
				<a class="box" href="http://vimeo.com/164462250">
					<div class="titulo">Conheça o Projeto Fábrica de Gaiteros</div>
					<img src="<?=base_url('assets/img/grid/fabrica-gaiteros.jpg'); ?>">
					<span class="link">Watch Here</span>
				</a>
			</li>
			<?php /*
			<li class="last">
				<a class="" href="<?=site_url('responsabilidade/folha-riograndense'); ?>">
					<div class="titulo">Folha Riograndense</div>
					<img src="<?=base_url('assets/img/grid/site_celrs-01.jpg'); ?>">
					Acompanhe a Folha Riograndense, e mantenha-se informado sobre o compromisso da Celulose Riograndense com a sociedade. Distribuído a cada três meses, o informativo traz diversas atividades da empresa em prol da comunidade.
					<span class="link">Read</span>
				</a>
			</li>
			*/ ?>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="center parse">
		<ul>

			<li>
				<a class="" href="<?=site_url('empresa'); ?>">
					<div class="titulo">About us</div>
					<img src="<?=base_url('assets/img/grid/sobre.jpg'); ?>">
					Celulose Riograndense, a part of CMPC group, is a Gaúcho company present in the international market of eucalyptus short fiber cellulose.
					<span class="link">Read</span>
				</a>
			</li>

			<li class="last">
				<a class="" target="_blank" href="http://www.celuloseriograndense.com.br/responsabilidade/projetos-sociais">
					<div class="titulo">Social Responsibility</div>
					<img src="<?=base_url('assets/img/grid/projetossociaishome.jpg'); ?>">
					Planting, develop and harvest positive results through social projects is one of the best products that Celulose Riograndense offers to society. Discover all our projects.
					<span class="link">Read</span>
				</a>
			</li>

		</ul>
		<div class="clear"></div>
	</div>
	<div class="right">
		<ul>
			<?php
			$i = 1;
			foreach($noticias as $rows){
				echo '
					<li class="',($i++ == 3) ? 'last' : '','">
						<a class="" href="',$rows['link'],'">
							<div class="data">',$rows['data'],'</div>
							<div class="titulo ',$rows['img'] ? 'bold' : '','">',$rows['titulo'],'</div>
				';
				if($rows['img']){
					echo '
							<div class="img"><img src="',$rows['img'],'"></div>
							<div class="texto">',$rows['texto'],'</div>
					';
				}
				
				echo '
							<span class="link">Read</span>
						</a>
					</li>
				';
			}
			?>
		</ul>
		<a class="banner-bndes" href="http://www.bndes.gov.br/" target="_blank">
			<img src="<?=base_url('assets/img/banners/bndes.gif'); ?>" width="310">
		</a>
		<div class="clear"></div>
	</div>
</section>