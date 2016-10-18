<div class="banner">
	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-noticias.jpg'); ?>">
</div>

<section id="noticias">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">


			<h2 class="title"><?=lang('defualt_menu_noticias'); ?></h2>



			<div class="col-xs-12">
				<div class="col-xs-12 col-sm-6">

					 <?php 

					 echo $imgNoticia;

					 ?>
					<div class="clear"></div>

				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="data"><?=sql_site($noticia->data); ?></div>
					<div class="titulo"><?=$noticia->titulo; ?></div>
					
					<p><?php echo $noticiatexto; ?></p>				

					<div class="clear"></div>
				</div>
			</div>
			

			<div class="noticias">
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
											<?php echo $rows["img"]; ?>
										</a>
									</div>
								</div>
							</div>
						</div>
						<?php $i++; } ?>

						<span>Veja mais +</span>
					</div>


			<!-- <div class="sidebar" data-total="<?=$listaNum; ?>">
				<ul>
					<?php
					// foreach($lista as $rows){
					// 	echo '
					// 	<li>
					// 		<div class="data">',sql_site($rows->data),'</div>
					// 		<div class="titulo">',$rows->titulo,'</div>
					// 		<a class="link" href="',site_url('noticias/'.$rows->url),'">Leia</a>
					// 	</li>
					// 	';
					//}

					?>
				</ul>
				<div class="control">
					<a href="javascript:void(0);" onclick="javascript:Celulose.noticias.next();" class="next">Próximas &gt;</a>
					<a href="javascript:void(0);" onclick="javascript:Celulose.noticias.prev();" class="prev hide">Anteriores &lt;</a>
				</div>

				<script type="text/javascript">
					$(function(){ Celulose.noticias.init(); });
				</script>
			</div> -->




		</div>
	</div>
	<div class="clear"></div>
</section>