
<section class="contato-localizacao">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">

			<h2 class="title"><?=lang('defualt_menu_localizacao'); ?></h2>

			<div class="descricao">
				CMPC Celulose Riograndense<br>
				Rua São Geraldo, 1680 Bairro Ermo<br>
				92500-000 Guaíba – RS<br>
				+55 51 2139.7211
			</div>

			<div class="google-maps" id="google-maps"></div>

		</div>
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