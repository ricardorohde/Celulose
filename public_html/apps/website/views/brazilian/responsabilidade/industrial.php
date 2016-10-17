
<section class="container responsabilidade-industrial">
	<h1 class="title"><?=lang('defualt_menu_ambiente_industrial'); ?></h1>

	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-responsabilidade-Industrial.jpg'); ?>">

	<h2>Dados Ambientais de monitoramento de acordo com a Licença de Operação emitida pela FEPAM.</h2>

	<div class="texto">Para baixar os relatórios clique abaixo no mês desejado.</div>

	<ul>
<?php
		foreach($lista as $y => $ano){
			echo '<li><span>',$y,'</span>';
			foreach($ano as $m => $mes){
				$class = $m == 12 ? 'last' : '';
				if($mes){
					echo '<a class="',$class,'" href="',$mes->arquivo,'">',$mes->texto,'</a>';
				} else {
					echo '<a class="none">',lang('defualt_mes_'.$m),'</a>';
				}
			}
			echo '</li>' . PHP_EOL;
		}
?>
	</ul>

	
	<div class="clear"></div>
</section>