<?php

	$this->load->view(getLang().'/expansao/aba');

?>

<div id="box"></div>
<section class="container expansao-andamento vi-fo">
	
	<h1 class="title">Progress of the Work</h1>

	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-expansao-andamento.jpg'); ?>">

	<br><br>

	<h3>A Day in the expansion: Follow here the evolution of the works of Celulose Riograndense.</h3>
	<div class="texto">
		Changes in the construction site of the largest private investment in the history of the RS has started and here you can monitor developments and transformations 
		<br> 
		that occur in the work area.
	</div>

	<div class="bloco">
		<div class="videos">
			<div class="titulo">
				VIDEOS
			</div>
			<div class="thumbs">
				<?php
				foreach($videos as $video){
					echo '
						<a class="box" href="',$video->link,'">
							<h4>',$video->titulo,'S</h4>
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
				PHOTOS
			</div>
			<div class="texto">Click on photos to enlarge</div>
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