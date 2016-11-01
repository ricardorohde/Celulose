<?php

$count = 0;
?>

<div class="banner">
	<img alt="" src="<?=base_url('assets/img/banners/banner-responsabilidade-sociais.jpg'); ?>">
</div>

<section class="responsabilidade-sociais">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">

			<h2 class="title"><?=lang('defualt_menu_projetos'); ?></h2>


			<p>Plantar, desenvolver e colher resultados positivos através de projetos sociais é um dos melhores produtos que a Celulose Riograndense oferece à sociedade. Seja na distribuição de cadernos através do Projeto Educação, na formação de novos músicos com o Fábrica de Gaiteiros ou no cuidado com o meio ambiente através do Projeto Guaíba Limpo, todos os dias a Celulose Riograndense também trabalha para que, assim como o desenvolvimento econômico da região onde atua, o desenvolvimento social esteja sempre no caminho do sucesso.
				Abaixo, conheça um pouco mais sobre cada um dos projetos.</p>

				<ul class="lista">
					<?php
					foreach($lista as $rows){
						echo '
						<li class="',(!(++$count % 4) ? 'last' : ''),'">
							<h3>',$rows->titulo,'</h3>
							<img src="',base_url('assets/img/projetos-sociais/'.$rows->arquivo),'">

							',$rows->descricao;

							if(!empty($rows->link)){
								echo '<br><br><a href="',$rows->link,'">Clique para saber mais!</a>';
							}

							echo '</li>';
						}
						?>
					</ul>

					<div class="clear"></div>
				</div>
			</div>
		</section>