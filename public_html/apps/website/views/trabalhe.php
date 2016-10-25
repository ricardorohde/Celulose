<div class="banner">
	<img class="banner" alt="Trabalhe Conosco" src="<?=base_url('assets/img/banners/banner-trabalhe-consoco.jpg'); ?>">
</div>
<section id="trabalhe-conosco">

	<div class="container">
		<div class="col-md-offset-1 col-md-10">

			<h2 class="title"><?=lang('defualt_menu_trabalhe'); ?></h2>



			<div class="descricao">
				A política de gestão de pessoas da CMPC Celulose Riograndense está alicerçada em plano de desenvolvimento de equipes, em práticas reflexivas, em profissionalização individualizada, em qualificação e em aprimoramento técnico e comportamental constantes.
			</div>

			<div class="formulario">
				<div class="col-xs-12 col-md-offset-1 col-md-10">
					<div class="row">
						<form action="<?=current_url(); ?>" method="post" enctype="multipart/form-data" id="main_form">

							<div class="col-sm-12 col-md-6">
								<div class="row">
									<div class="col-xs-12">
										<label> Nome: </label>
										<input type="text" name="form_nome" placeholder="Nome" value="<?=post('form_nome'); ?>" maxlength="80">
									</div>
									<div class="col-xs-12">
										<label> Cidade em que Reside: </label>
										<input type="text" name="form_cidade" placeholder="Ex: Porto Alegre" value="<?=post('form_cidade'); ?>" maxlength="40">
									</div>
									<div class="col-xs-12">
										<label> Data de Nascimento: </label>
										<input type="text" name="form_data" placeholder="dd/mm/aaaa" id="data" value="<?=post('form_data'); ?>" maxlength="10" >
									</div>
									<div class="col-xs-12">
										<label> Formação: </label>
										<select name="form_formacao" id="formacao">
											<option value="<?=post('form_formacao'); ?>" disabled selected>Selecione </option>
											<?php
											foreach($formacoes as $rows){
												if(post('form_formacao') == $rows->nome){
													echo '<option selected="selected" value="',$rows->nome,'">',$rows->nome,'</option>';
												} else {
													echo '<option value="',$rows->nome,'">',$rows->nome,'</option>';
												}
											}
											?>
											<option value="Outro">Outro</option>
										</select>
									</div>
									<div class="col-xs-12">
										<label> Curso: </label>
										<select name="form_curso" id="curso" >
											<option value="<?=post('form_curso'); ?>" disabled selected>Selecione </option>
											<?php
											foreach($cursos as $rows){
												if(post('form_curso') == $rows->nome){
													echo '<option selected="selected" value="',$rows->nome,'">',$rows->nome,'</option>';
												} else {
													echo '<option value="',$rows->nome,'">',$rows->nome,'</option>';
												}
											}
											?>
											<option value="Outro">Outro</option>
										</select>
									</div>
									<div class="col-xs-12">
										<label>Último Salário: </label>
										<input type="text" name="form_salario" placeholder="Ex: 2.300,00" value="<?=post('form_salario'); ?>" maxlength="20">
									</div>
									<div class="col-xs-12">
										<label>Área de interesse na qual você deseja trabalhar: </label>
										<select name="form_area" id="area" class="span2">
											<option value="">Selecione...</option>
											<?php
											foreach($areas as $rows){
												if(post('form_area') == $rows->nome){
													echo '<option selected="selected" value="',$rows->nome,'">',$rows->nome,'</option>';
												} else {
													echo '<option value="',$rows->nome,'">',$rows->nome,'</option>';
												}
											}
											?>
											<option value="Outro">Outro</option>
										</select>
									</div>
									<div class="col-xs-12">
										<label> Tempo de Experiência na Área: </label>
										<input type="text" name="form_area_tempo" placeholder="" value="<?=post('form_area_tempo'); ?>" maxlength="120" >
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6">
								<div class="row">
									<div class="col-xs-12">
										<label> E-mail: </label>
										<input type="text" name="form_email" placeholder="Digite seu e-mail:" value="<?=post('form_email'); ?>" maxlength="80">
									</div>

									<div class="col-xs-12">
										<label> Telefone: </label>
										<input type="text" name="form_telefone" placeholder="(xx) xxxxx-xxxx" id="telefone" value="<?=post('form_telefone'); ?>" maxlength="16">
									</div>
									<div class="col-xs-12 mobile-hide"></div>
									<div class="col-xs-12">
										<label id="formacao_outro"> Outra Formação: </label>
										<input type="text" name="form_formacao_outro" placeholder="Digite aqui sua outra formação:" value="<?=post('form_formacao_outro'); ?>" maxlength="120">
									</div>
									<div class="col-xs-12">
										<label id="curso_outro"> Outro Curso: </label>
										<input type="text" name="form_curso_outro" placeholder="Digite aqui seu outro curso:" value="<?=post('curso_outro'); ?>" maxlength="120">
									</div>
									<div class="col-xs-12">
										<label>	Pretensão Salarial: </label>
										<input type="text" name="form_pretencao" placeholder="Ex: 2.300,00" value="<?=post('form_pretencao'); ?>" maxlength="20">
									</div>
									<div class="col-xs-12">
										<label id="area_outro"> Outra Área de Interesse:</label>
										<input type="text" name="form_area_outro" placeholder="Digite aqui sua outra área de interesse:" value="<?=post('form_area_outro'); ?>" maxlength="120">
									</div>
									<div class="col-xs-12">
										<div class="col-xs-12 col-md-6">

											<label for="radio">
												Deficiente Físico:
												<div class="radio">
													<input id="pcd_nao" type="radio" name="pcd" value="0">
													<label for="pcd_nao">Não</label>
													<input id="pcd_sim" type="radio" name="pcd" value="1">
													<label for="pcd_sim">Sim</label>
												</div>
											</label>

										</div>
										<div class="col-xs-12 col-md-6">

											<label for="radio">
												Interesse em Estágio:
												<div class="radio">
													<input id="estagio_nao" type="radio" name="estagio" value="0">
													<label for="estagio_nao">Não</label>
													<input id="estagio_sim" type="radio" name="estagio" value="1">
													<label for="estagio_sim">Sim</label>
												</div>
											</label>

										</div>
									</div>
								</div>
							</div>

							<div class="col-xs-12 botao">
								<div class="row">
									<span class="error"><? display_error(); ?></span>



									<?php
									if($this->input->get('success')){
										echo '<span class="success">Currículo enviado com sucesso!</span>';
									}
									?>

									<button type="submit"> Enviar Currículo </button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
