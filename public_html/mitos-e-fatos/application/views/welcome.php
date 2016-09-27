<div class="faq" id="faq">
	<ul class="lista">
		<?php foreach($lista as $row){ ?>
			<li data-id="<?=$row->id; ?>" class="item">
				<div class="header">
					<div class="numero"><?=$row->numero; ?></div>
					<a class="titulo"><?=$row->titulo; ?></a>
					<div class="clearfix"></div>
				</div>
				<div class="conteudo">
					<p><?=$row->conteudo; ?></p>
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?=rawurlencode(site_url($row->id)); ?>" target="_blank" class="compartilhar">COMPARTILHE NO FACEBOOK</a>
				</div>
			</li>
		<?php } ?>
	</ul>
	
	<script type="text/javascript">
		$(function(){
			var lista = $('#faq .item');

			if(lista.size() == 1){
				$('.conteudo', lista).show();
			} else {
				$('.titulo', lista).click(function(ev){
					ev.preventDefault();
					$('.conteudo', lista).hide();
					$(this).parents('.item').find('.conteudo').show();
				})
			}
		});
	</script>
</div>