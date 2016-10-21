<section class="container trabalhe-conosco">
	<h1 class="title"><?=lang('defualt_menu_trabalhe'); ?></h1>

	<img class="banner" alt="Trabalhe Conosco" src="<?=base_url('assets/img/banners/banner-trabalhe-consoco.jpg'); ?>">

	<div class="descricao">
		A política de gestão de pessoas da CMPC Celulose Riograndense está alicerçada em plano de desenvolvimento de equipes, em práticas reflexivas, em profissionalização individualizada, em qualificação e em aprimoramento técnico e comportamental constantes.
	</div>

	<div class="formulario">
		<form action="<?=current_url(); ?>" method="post" enctype="multipart/form-data" id="main_form">
			<table>
				<tr>
					<td>
						<label>
							Nome: *<br />
							<input type="text" name="form_nome" placeholder="Nome:" value="<?=post('form_nome'); ?>" maxlength="80" class="span2">
						</label>
					</td>
					<td>
						<label>
							E-mail: *<br />
							<input type="text" name="form_email" placeholder="Digite seu e-mail:" value="<?=post('form_email'); ?>" maxlength="80" class="span2">
						</label>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						<label>
							Cidade em que Reside: *<br />
							<input type="text" name="form_cidade" placeholder="Ex: Porto Alegre" value="<?=post('form_cidade'); ?>" maxlength="40" class="span3">
						</label>
					</td>
					<td>
						<label>
							Telefone: *<br />
							<input type="text" name="form_telefone" placeholder="(xx) xxxx-xxxx" id="telefone" value="<?=post('form_telefone'); ?>" maxlength="16" class="span3">
						</label>
					</td>
					<td>
						<label>
							Data de Nascimento: *<br />
							<input type="text" name="form_data" placeholder="dd/mm/aaaa" id="data" value="<?=post('form_data'); ?>" maxlength="10" class="span3">
						</label>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						<label>
							Formação:
							<br>
							<select name="form_formacao" id="formacao" class="span2">
								<option value="<?=post('form_formacao'); ?>" selected="selected">Selecione...</option>
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
						</label>
					</td>
					<td>
						<label id="formacao_outro">
							Outra Formação:<br />
							<input type="text" name="form_formacao_outro" placeholder="Digite aqui sua outra formação:" value="<?=post('form_formacao_outro'); ?>" maxlength="120" class="span2">
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							Curso: *<br />
							<select name="form_curso" id="curso" class="span2">
								<option value="<?=post('form_curso'); ?>" selected="selected">Selecione...</option>
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
						</label>
					</td>
					<td>
						<label id="curso_outro">
							Outro Curso:<br />
							<input type="text" name="form_curso_outro" placeholder="Digite aqui seu outro curso:" value="<?=post('curso_outro'); ?>" maxlength="120" class="span2">
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							Último Salário: *<br />
							<input type="text" name="form_salario" placeholder="Ex: 2.300,00" value="<?=post('form_salario'); ?>" maxlength="20" class="span2">
						</label>
					</td>
					<td>
						<label>
							Pretensão Salarial: *<br />
							<input type="text" name="form_pretencao" placeholder="Ex: 2.300,00" value="<?=post('form_pretencao'); ?>" maxlength="20" class="span2">
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							Área de interesse na qual você deseja trabalhar: *<br />
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
						</label>
					</td>
					<td>
						<label id="area_outro">
							Outra Área de Interesse:<br />
							<input type="text" name="form_area_outro" placeholder="Digite aqui sua outra área de interesse:" value="<?=post('form_area_outro'); ?>" maxlength="120" class="span2">
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							Tempo de Experiência na Área: *<br />
							<input type="text" name="form_area_tempo" placeholder="" value="<?=post('form_area_tempo'); ?>" maxlength="120" class="span2">
						</label>
					</td>
					<td>
						<label>Interesse em Estágio: *<br /></label>
						<label>
							Sim <input type="radio" class="radio" <?=post('form_estagio') == '1' ? 'checked="checked"' : '' ; ?> name="form_estagio" value="1">
						</label>
						<label>
							Não <input type="radio" class="radio" <?=post('form_estagio',0) == '1' ? 'checked="checked"' : '' ; ?> name="form_estagio" checked="checked" value="0">
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Deficiente Físico: *<br /></label>
						<label>
							Sim <input type="radio" class="radio" <?=post('form_fisica') == '1' ? 'checked="checked"' : '' ; ?> name="form_fisica" value="1">
						</label>
						<label>
							Não <input type="radio" class="radio" <?=post('form_fisica',0) == '0' ? 'checked="checked"' : '' ; ?> name="form_fisica" checked="checked" value="0">
						</label>
					</td>
					<td>
						<label>
							Currículo: * <strong>(Formato: pdf, doc ou docx | Tamanho Máximo 2mb)</strong><br />
							<input type="file" name="userfile" /><br />
						</label>
					</td>
				</tr>
			</table>
			<div class="row">
				<span class="error"><? display_error(); ?></span>
				<?php
				if($this->input->get('success')){
					echo '<span class="success">Currículo enviado com sucesso!</span>';
				}
				?>
				<input type="submit" value="Enviar Currículo" />
			</div>
		</form>
	</div>
	<script type="text/javascript">
		$(function(){
			$("#data").mask("99/99/9999");
			$("#telefone").mask("(99) 9999-9999");
			if($("#main_form").length > 0){
				$("#main_form").validate({
					errorClass: "error",
					errorElement: "span",
					messages:{
						form_nome:{required: "*Campo requerido.",minlength: "*Campo requerido."},
						form_email:{required: "*Campo requerido.",email: "*Informe corretamente o campo de E-mail."},
						form_telefone:{required: "*Campo requerido."},
						form_cidade:{required: "*Campo requerido."},
						form_data:{required: "*Campo requerido."},
						form_formacao:{required: "*Campo requerido."},
						form_curso:{required: "*Campo requerido."},
						form_salario:{required: "*Campo requerido."},
						form_pretencao:{required: "*Campo requerido."},
						form_area:{required: "*Campo requerido."},
						form_area_tempo:{required: "*Campo requerido."},
						form_estagio:{required: "*Campo requerido."},
						form_curriculo:{required: "*Campo requerido."},
						form_fisica:{required: "*Campo requerido."}
					},
					rules:{
						form_nome:{required: true,minlength: 3},
						form_email:{required: true,email: true},
						form_telefone:{required: true},
						form_cidade:{required: true},
						form_data:{required: true},
						form_formacao:{required: true},
						form_curso:{required: true},
						form_salario:{required: true},
						form_pretencao:{required: true},
						form_area:{required: true},
						form_area_tempo:{required: true},
						form_estagio:{required: true},
						form_curriculo:{required: true},
						form_fisica:{required: true}
					}
				});
			}
		});
	</script>
</section>

<?php

$msg = get_display_error();

if(!$msg && $this->input->get('success')) {
	$msg = "Currículo enviado com sucesso!";
}

if($msg){

echo '
<div id="box-form">
	<div class="container">
		Currículo enviado com sucesso!
		<a href="javascript:void(0);" onclick="javascript:Celulose.closeBox();">Ok!</a>
	</div>
</div>
';
}
?>