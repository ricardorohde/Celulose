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


			<p>A responsabilidade social da empresa se reflete, entre outros aspectos, num significativo programa de ações que estimulem o potencial das comunidades onde a empresa está presente, maximizando o ganho social proporcionado pela sua atividade econômica. Os principais são:</p>

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