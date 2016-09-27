<?php
	$this->load->view(getLang().'/contato/aba');
?>
<section class="container contato-localizacao">
	<h1 class="title"><?=lang('defualt_menu_localizacao'); ?></h1>

	<div class="google-maps" id="google-maps"></div>

	<div class="descricao">
		CMPC Celulose Riograndense<br>
		Rua São Geraldo, 1680 Bairro Ermo<br>
		92500-000 Guaíba – RS<br>
		+55 51 2139.7211
	</div>

	<script type="text/javascript">
		var loc = gm.position('-30.131938','-51.318871');
		var mark = {
			titulo: 'CMPC Celulose Riograndense',
			html: '<div class="box-google-maps"><h1>CMPC Celulose Riograndense</h1>Rua São Geraldo, 1680 Bairro Ermo<br>92500-000 Guaíba - RS<br>+55 51 2139.7211</div>'
		};
		$(function(){
			gm.initialize('google-maps',loc,12);
			gm.addicon(mark.titulo,mark.html,'celulose',loc);
		});
	</script>
</section>