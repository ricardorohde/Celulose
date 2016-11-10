
<div class="banner">
	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-noticias.jpg'); ?>">
</div>

<section id="noticias">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">


			<div class="news">
				<div class="col-xs-12">
					<div class="col-xs-12 col-sm-6">

						<div class="item">
							<div class="content">

								<?php echo $imgNoticia;?>
							</div>
						</div>
						<div class="clear"></div>

					</div>
					<div class="col-xs-12 col-sm-6">
						<span><?=sql_site($noticia->data); ?></span>
						<h3><?=$noticia->titulo; ?></h3>

						<p><?php echo $noticiatexto; ?></p>

						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			
			

			<div class="veja-mais">
				<h2>Leia outras notícias</h2>

				<?php
				$i = 1;


				foreach ($listaNoticias as $rows) {
					if($i>3){
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
										<?php 
										if ($rows["img"] == 0){
											echo $rows["img"]; 
										}else{
											echo '<img src="' . base_url('assets/img/noticias/noticia.jpg') .'" alt="">';
										}
										?>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php $i++; } ?>
					<div class="col-xs-6 col-sm-3">
						<div class="row">
							<div class="item">
								<div class="content">
									<a href="#">
										<img src="<?= base_url('assets/img/noticias/vejamais.jpg') ?>" alt="Veja mais noticias">
									</a>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		
	</section>
	<div class="clear"></div>