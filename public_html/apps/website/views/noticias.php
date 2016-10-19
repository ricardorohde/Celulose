<div class="banner">
	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-noticias.jpg'); ?>">
</div>

<section id="noticias">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">


			<h2><?=lang('defualt_menu_noticias'); ?></h2>


			<div class="news">
				<div class="col-xs-12">
					<div class="col-xs-12 col-sm-6">

						<div class="item">
							<div class="content">

								<?php 

								echo $imgNoticia;

								?>
							</div>
						</div>
						<div class="clear"></div>

					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="data"><?=sql_site($noticia->data); ?></div>
						<h3 class="titulo"><?=$noticia->titulo; ?></h3>

						<p><?php echo $noticiatexto; ?></p>

						<div class="clear"></div>
					</div>
				</div>
			</div>
			
			

			<div class="veja-mais">
				<h2>Notícias</h2>

				<?php
				$i = 1;


				foreach ($listaNoticias as $rows) {
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
										<?php 
										if (isset($rows["img"])){
											echo $rows["img"]; 
										}
										?>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php $i++; } ?>

					<span>Veja mais +</span>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</section>