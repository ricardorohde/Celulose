
<section class="slider mobile-hide">
	<div class="slider-wrapper theme-default">

		<div id="slider" class="nivoSlider">     
			<?php
			$i = 0;
			foreach($slider as $rows){
				echo '<img rel="',$i++,'" src="',$rows->src,'" data-title="',$rows->legenda,'" data-url="',$rows->link,'" data-target="',$rows->target,'">' . PHP_EOL;
			}
			?>
		</div> 
	</div>
	<script type="text/javascript"> 
		$(window).on('load', function() {
			$('#slider').nivoSlider({
				effect: 'slideInLeft',
				directionNav: false,
				pauseOnHover: true
			}); 
		}); 
	</script>
</section>
<section id="home">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">
			<div class="row">

				<div class="noticias">
					<h2>Notícias</h2>

					<?php
					$i = 1;
					foreach ($noticias as $rows) {
						if($i>4){
							$auxClass = "mobile-hide";
						}else{
							$auxClass = "";
						}

						?>

						<div class="col-xs-6 col-sm-3 <?= $auxClass ?>">
							<div class="row">
								<div class="item">
									<div class="content">
										
										<a href="<?= $rows['link']; ?>">
											<div class="black"><span><?= $rows['titulo']; ?></span></div>
											<img src="<?= $rows['img']; ?>" alt="<?= $rows['titulo']; ?>">
										</a>
									</div>
								</div>
							</div>
						</div>
						<?php $i++; } ?>

						<a target="_self" href="<?=base_url('noticias'); ?>">Veja mais Notícias +</a>
					</div>

					<div class="projetos-sociais">
						<h2>Projetos Sociais</h2>

						<div class="col-xs-12">
							<div class="row">
								<a href="https://www.youtube.com/watch?v=X_dwz5klbSc" target="_blank">
									<img src="<?=base_url('assets/img/projetos/fabrica-de-gaiteiros.jpg'); ?>">
								</a>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="row">
								<a href="https://www.youtube.com/watch?v=wAvWI4rUfz4" target="_blank">
									<img src="<?=base_url('assets/img/projetos/nectar-social.jpg'); ?>">
								</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

