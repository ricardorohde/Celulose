<section class="container contato">
	<br><br>
	<h1 class="title">Sugestão</h1>

	<div class="texto">
		Se você tem alguma sugestão de assunto para publicarmos nas redes sociais ou no site da Celulose Riograndense, envie através deste formulário. 
		<br>
		Agradecemos a sua participação.
	</div>

	<div class="formulario">
		<form action="<?=current_url(); ?>" method="post" id="main_form">
			<table>
				<tr>
					<td>
						<label>
							Nome: *<br />
							<input type="text" name="form_nome" placeholder="Digite seu nome completo" value="<?=post('form_nome'); ?>" maxlength="120" class="span1">
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							E-mail: *<br />
							<input type="text" name="form_email" placeholder="Digite seu e-mail" value="<?=post('form_email'); ?>" maxlength="80" class="span1">
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							Sugestão: *<br />
							<textarea class="span1" name="form_mensagem"><?=post('form_mensagem'); ?></textarea>	
						</label>
					</td>
				</tr>
			</table>
			<div class="row">
				<input type="submit" value="Enviar" />
			</div>
		</form>				
	</div>
	<script type="text/javascript">
		$(function(){
			if($("#main_form").length > 0){
				$("#main_form").validate({
					errorClass: "error",
					errorElement: "span",
					messages:{
						form_nome:{required: "*Campo requerido.",minlength: "*Campo requerido."},
						form_email:{required: "*Campo requerido.",email: "*Informe corretamente o campo de E-mail."},
						form_mensagem:{required: "*Campo requerido."}
					},
					rules:{
						form_nome:{required: true,minlength: 3},
						form_email:{required: true,email: true},
						form_mensagem:{required: true}
					}
				});
			}
		});
	</script>
	<div class="clear"></div>
</section>
<?php

if($this->input->get('success')){

echo '
<div id="box-form">
	<div class="container" style="font-size: 14px;">
		Formulário enviado com sucesso.<br>
		Obrigado por enviar sua sugestão.
		<a href="javascript:void(0);" onclick="javascript:Celulose.closeBox();">Ok!</a>
	</div>
</div>
';
}
?>