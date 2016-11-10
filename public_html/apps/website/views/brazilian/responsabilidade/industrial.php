<div class="banner">
	<img alt="" src="<?=base_url('assets/img/banners/banner-responsabilidade-Industrial.jpg'); ?>">
</div>

<section class="responsabilidade-industrial">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">

			<h3>Dados Ambientais de monitoramento de acordo com a Licença de Operação emitida pela FEPAM.</h3>
			<p>Para baixar os relatórios clique abaixo no mês desejado.</p>
		</div>
		<div class="col-md-12">
			


			<div class="clear"></div>
		</div>
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
	</div>
</section>