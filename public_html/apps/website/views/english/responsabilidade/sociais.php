<?php
	$this->load->view(getLang().'/responsabilidade/aba');
	$count = 0;
?>
<section class="container responsabilidade-sociais">
	<h1 class="title"><?=lang('defualt_menu_projetos'); ?></h1>

	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-responsabilidade-sociais.jpg'); ?>">
	<p>Planting, develop and harvest positive results through social projects is one of the best products that Celulose Riograndense offers to society. Social Development is always a path to success.</p>


	<ul class="lista">
		<?php
		foreach($lista as $rows){
			echo '
				<li class="',(!(++$count % 4) ? 'last' : ''),'">
					<h2>',$rows->titulo,'</h2>
					<img src="',base_url('assets/img/projetos-sociais/'.$rows->arquivo),'">
					
					',$rows->descricao;

					if(!empty($rows->link)){
						echo '<br><br><a href="',$rows->link,'">Click to learn more!</a>';
					}

			echo '</li>';
		}
		?>
	</ul>

	<div class="clear"></div>
</section>