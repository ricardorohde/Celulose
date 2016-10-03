

	<div id="auto">

		<?php
		$i = 0;
		foreach($slider as $rows){
			echo '<div>
			<img rel="',$i++,'" src="',$rows->src,'" data-title="',$rows->legenda,'" data-url="',$rows->link,'" data-target="',$rows->target,'" />
			</div>' . PHP_EOL;
		}
		?>

	</div>
	<script type="text/javascript">
$(document).ready(function() {
	$('#auto').bbslider({
		auto: true,
		timer:3000,
		loop:true
	});
});
</script>
<section class="column container">
	<div class="left parse">
		<ul>

			<li>
				<a class="box" href="http://vimeo.com/164462250">
					<div class="titulo">Conheça o Projeto Fábrica de Gaiteiros</div>
					<img src="<?=base_url('assets/img/grid/fabrica-gaiteros.jpg'); ?>">
					<span class="link">Assista Aqui</span>
				</a>
			</li>

			<li class="last">
				<a class="" href="<?=site_url('responsabilidade/folha-riograndense'); ?>">
					<div class="titulo">Folha Riograndense</div>
					<img src="<?=base_url('assets/img/grid/site_celrs-01.jpg'); ?>">
					Acompanhe a Folha Riograndense, e mantenha-se informado sobre o compromisso da Celulose Riograndense com a sociedade. Distribuído a cada três meses, o informativo traz diversas atividades da empresa em prol da comunidade.
					<span class="link">Leia</span>
				</a>
			</li>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="center parse">
		<ul>

			<li>
				<a class="" href="<?=site_url('empresa'); ?>">
					<div class="titulo">Sobre Nós</div>
					<iframe width="310" height="174" src="https://www.youtube.com/embed/8hfz4_MmuSs?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
					<!-- <img src="<?=base_url('assets/img/grid/sobre.jpg'); ?>"> -->
					A Celulose Riograndense, parte do grupo CMPC, é uma empresa gaúcha presente no mercado internacional de celulose de fibra curta de eucalipto.
					<span class="link">Leia</span>
				</a>
			</li>

			<li>
				<a class="" href="<?=base_url('assets/arquivos/public/tca/tca.pdf'); ?>">
					<img src="<?=base_url('assets/img/grid/tac.jpg'); ?>">
				</a>
			</li>

			<li class="last">
				<a class="" target="_blank" href="http://www.celuloseriograndense.com.br/responsabilidade/projetos-sociais">
					<div class="titulo">Responsabilidade Social</div>
					<img src="<?=base_url('assets/img/grid/projetossociaishome.jpg'); ?>">
					Plantar, desenvolver e colher resultados positivos através de projetos sociais é um dos melhores produtos que a Celulose Riograndense oferece à sociedade. Conheça todos nossos projetos.
					<span class="link">Leia</span>
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
							<span class="link">Leia</span>
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