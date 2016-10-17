
<section class="container responsabilidade-folha">
	<h1 class="title"><?=lang('defualt_menu_folha'); ?></h1>

	<div class="folha-menu">
		<a rel="campanha" class="<?=$url == 'campanha' ? 'active' : ''; ?>" href="<?=site_url('responsabilidade/folha-riograndense/campanha'); ?>">
			Região<br>
			<span>CAMPANHA</span>
		</a>
		<a rel="centro" class="<?=$url == 'centro' ? 'active' : ''; ?>" href="<?=site_url('responsabilidade/folha-riograndense/centro'); ?>">
			Região<br>
			<span>CENTRO</span>
		</a>
		<a rel="metropolitana" class="<?=$url == 'metropolitana' ? 'active' : ''; ?>" href="<?=site_url('responsabilidade/folha-riograndense/metropolitana'); ?>">
			Região<br>
			<span>METROPOLITANA</span>
		</a>
	</div>

	<div class="folha-container">
		<div class="folha-body">
			<?php
			foreach($conteudos as $rows){
				echo '<div class="row">';
				if(!empty($rows->categoria)){
					echo '<div class="area">',$rows->categoria,'</div>';
				}
				echo '
						<div class="titulo">',$rows->titulo,'</div>
						<div class="corpo">',$rows->html,'</div>
					</div>
				';
			}
			?>
		</div>
		<div class="folha-bar" id="sitebar">
			<ul>
				<?php
				foreach($lista as $rows){
					echo '
						<li>
							<a href="',site_url('responsabilidade/folha-riograndense/'.$url.'/'.$rows->url),'">
								<span class="data">',$rows->descricao,'</span>
								<span class="titulo">',$rows->titulo,'</span>
							</a>
						</li>

					';
				}
				?>
			</ul>
		</div>
	</div>
	<script type="text/javascript">
		$(function(){
			$(window).scroll(function(){
				if($(window).scrollTop() >= 515){
					$('#sitebar').css({
						'position': 'fixed',
						'margin-left': '680px'
					});
				} else {
					$('#sitebar').css({
						'position': 'relative',
						'margin-left': '0px'
					});
				}
			});
		});
	</script>
	<div class="clear"></div>
</section>