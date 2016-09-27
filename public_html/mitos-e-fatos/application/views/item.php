<div class="faq" id="faq">
	<ul class="lista">
		<li data-id="<?=$row->id; ?>" class="item">
			<div class="header">
				<div class="numero"><?=$row->numero; ?></div>
				<a class="titulo"><?=$row->titulo; ?></a>
				<div class="clearfix"></div>
			</div>
			<div class="conteudo">
				<p><?=$row->conteudo; ?></p>
				<a href="<?=site_url(); ?>" class="compartilhar">VER MAIS</a>
			</div>
		</li>
	</ul>
	
	<script type="text/javascript">
		$(function(){
			var lista = $('#faq .item');
			$('.conteudo', lista).show();
		});
	</script>
</div>