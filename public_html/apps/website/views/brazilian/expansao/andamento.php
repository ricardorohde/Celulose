<?php

	$this->load->view(getLang().'/expansao/aba');

?>

<div id="box"></div>
<section class="container expansao-andamento vi-fo">
	
	<h1 class="title"><?=lang('defualt_menu_andamento_obra'); ?></h1>

	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-expansao-andamento.jpg'); ?>">

	<br><br>

	<h3>O dia a dia da expansão: acompanhe aqui a evolução das obras da Celulose Riograndense.</h3>
	<div class="texto">
		A movimentação no canteiro de obras do maior investimento privado da história do RS já começou e por aqui você poderá acompanhar a evolução e as transformações
		<br>
		que ocorrerão na área de trabalho.
	</div>

	<div class="bloco">
		<div class="videos">
			<div class="titulo">
				VÍDEOS
			</div>
			<div class="thumbs">
				<?php
				foreach($videos as $video){
					echo '
						<a class="box" href="',$video->link,'">
							<h4>',$video->titulo,'</h4>
							<span>',sql_site($video->data),'</span>
							<img src="',base_url('assets/img/expansao/videos/'.$video->arquivo),'">
							<div class="play"></div>
						</a>
					';
				}
				?>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="fotos">
			<div class="titulo">
				FOTOS
			</div>
			<div class="texto">Clique nas fotos para ampliar</div>
			<?php
			
			$galeria = array('Obra1.jpg','Obra2.jpg','Obra3.jpg','Obra4.jpg');

			if(sizeof($fotos) > 0){
				echo '<div class="thumbs">';
				foreach($fotos as $foto){
					echo '
						<a href="',base_url('assets/img/expansao/fotos/'.$foto->arquivo),'" rel="galeria" title="',$foto->desc,'">
							<img src="',base_url('assets/img/expansao/fotos/small/'.$foto->arquivo),'">
						</a>
					';
				}
				echo '</div>';
			}
			?>
		</div>
	</div>

</section>

<script type="text/javascript">
	$(document).ready(function(){
		$("a[rel=galeria]").fancybox({
			prevEffect	: 'none',
			nextEffect	: 'none',
			openEffect: 'elastic',
			closeEffect: 'elastic',
			helpers	: {
				title	: {
					type: 'outside'
				},
				thumbs	: {
					width	: 100,
					height	: 75
				}
			}
		});
	});
</script>