<?php
	$this->load->view(getLang().'/responsabilidade/aba');
	$count = 0;
?>
<section class="container responsabilidade-sociais">
	<h1 class="title"><?=lang('defualt_menu_projetos'); ?></h1>

	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-responsabilidade-sociais.jpg'); ?>">
	<p>Plantar, desenvolver e colher resultados positivos através de projetos sociais é um dos melhores produtos que a Celulose Riograndense oferece à sociedade. Seja na distribuição de cadernos através do Projeto Educação, na formação de novos músicos com o Fábrica de Gaiteiros ou no cuidado com o meio ambiente através do Projeto Guaíba Limpo, todos os dias a Celulose Riograndense também trabalha para que, assim como o desenvolvimento econômico da região onde atua, o desenvolvimento social esteja sempre no caminho do sucesso.
	Abaixo, conheça um pouco mais sobre cada um dos projetos.</p>

	<ul class="lista">
		<?php
		foreach($lista as $rows){
			echo '
				<li class="',(!(++$count % 4) ? 'last' : ''),'">
					<h2>',$rows->titulo,'</h2>
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
</section>