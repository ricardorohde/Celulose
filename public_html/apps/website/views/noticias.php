<section class="container noticias">
	<h1 class="title"><?=lang('defualt_menu_noticias'); ?></h1>

	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-noticias.jpg'); ?>">
	
	<div class="block">
		<div class="data"><?=sql_site($noticia->data); ?></div>
		<div class="titulo"><?=$noticia->titulo; ?></div>
		<div class="body">
			<?=$noticia->html; ?>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>

	<div class="sidebar" data-total="<?=$listaNum; ?>">
		<ul>
			<?php
				foreach($lista as $rows){
					echo '
						<li>
							<div class="data">',sql_site($rows->data),'</div>
							<div class="titulo">',$rows->titulo,'</div>
							<a class="link" href="',site_url('noticias/'.$rows->url),'">Leia</a>
						</li>
					';
				}

			?>
		</ul>
		<div class="control">
			<a href="javascript:void(0);" onclick="javascript:Celulose.noticias.next();" class="next">Próximas &gt;</a>
			<a href="javascript:void(0);" onclick="javascript:Celulose.noticias.prev();" class="prev hide">Anteriores &lt;</a>
		</div>
		<script type="text/javascript">
			$(function(){ Celulose.noticias.init(); });
		</script>
	</div>

</section>