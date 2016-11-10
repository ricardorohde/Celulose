<?php

$count = 0;
?>

<div class="banner">
	<img alt="" src="<?=base_url('assets/img/banners/banner-responsabilidade-sociais.jpg'); ?>">
</div>

<section class="responsabilidade-sociais">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">

			


			<p>A responsabilidade social da empresa se reflete, entre outros aspectos, num significativo programa de ações que estimulem o potencial das comunidades onde a empresa está presente, maximizando o ganho social proporcionado pela sua atividade econômica. Os principais são:</p>

			<div class="content">
				<div class="col-xs-12 col-md-8">
					<div class="row">

						<h3><?=lang('defualt_menu_projetos'); ?></h3>

						<ul class="lista">
							<?php
							foreach($lista as $rows){
								echo '<div class="col-xs-12 col-sm-6">
								<div class="row">

									<li class="',(!(++$count % 4) ? 'last' : ''),'">


										<img src="',base_url('assets/img/projetos-sociais/'.$rows->arquivo),'">

										<h3>',$rows->titulo,'</h3>
										<p>',$rows->descricao,'</p>';

										if(!empty($rows->link)){
											echo '<a href="',$rows->link,'">Conheça mais</a>';
										}

										echo '</li></div></div>';
									}
									?>
								</ul>	
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="apoios">
								<h3>Projetos de<br> Incentivo, Apoios-item<br> e Patrocinios</h3>


								<div class="col-xs-12">
									<div class="apoios-item">
										<h5>Projeto 1</h5>
										<p>Plantar, desenvolver e colher resultados positivos através de projetos sociais é um dos melhores produtos que a Celulose Riograndense oferece à sociedade.</p>
										<a href="#">Conheça mais</a>
									</div>
								</div>		


								<div class="col-xs-12">
									<div class="apoios-item">
										<h5>Projeto 2</h5>
										<p>Plantar, desenvolver e colher resultados positivos através de projetos sociais é um dos melhores produtos que a Celulose Riograndense oferece à sociedade.</p>
										<a href="#">Conheça mais</a>
									</div>		
								</div>		


								<div class="col-xs-12">
									<div class="apoios-item">
										<h5>Projeto 3</h5>
										<p>Plantar, desenvolver e colher resultados positivos através de projetos sociais é um dos melhores produtos que a Celulose Riograndense oferece à sociedade.</p>
										<a href="#">Conheça mais</a>
									</div>		
								</div>					
								<div class="clear"></div>
							</div>

							<div class="apoios-form">
								<h3>Envie-nos o seu Projeto</h3>
								<p>Queremos conhecer o seu projeto twitch i world’s leading social video platform and community for gamers. The company was founded.</p>

								<form action="<?=current_url(); ?>" method="post" id="main_form">
									<div class="row">


										<div class="col-xs-12 form-group">
											<label> Nome</label>
											<input type="text" name="form_nome" value="<?=post('form_nome'); ?>" maxlength="120">

										</div>

										<div class="col-xs-12 form-group">
											<label> E-mail </label>
											<input type="text" name="form_email" value="<?=post('form_email'); ?>" maxlength="80">
										</div>

										<div class="col-xs-12 form-group">
											<label> Telefone</label>
											<input type="text" name="form_telefone" value="<?=post('form_telefone'); ?>">
										</div>



										<div class="col-xs-12 form-group">

											<label> Comentário </label>
											<textarea name="form_mensagem"><?=post('form_mensagem'); ?></textarea>	

										</div>	
										<div class="col-xs-12 form-group center">
											<span>(Formato: pdf, doc ou docx | Tamanho Máximo 2mb)</span>
											<label for="inputfile">

												<input type="file" name="image[]" id="image1" class="inputfile" accept="image/*"/>
												<label for="image1">
													<span>Escolher Arquivo</span> 
												</label>
											</label>						
										</div>
									</div>

								</form>

								<div class="center">
									<button type="submit" value="<?=lang('contato_form_enviar'); ?>">Enviar</button>
								</div>
								<div class="clear"></div>
							</div>
						</div>

					</div>
					<div class="clear"></div>
				</div>
			</div>
		</section>