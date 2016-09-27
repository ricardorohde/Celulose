<div class="container contato">

	<div class="formulario">
		<form id="contato-formulario" method="post" action="<?=site_url('contato'); ?>">
			<input type="hidden" name="hash" value="<?=base64_encode($sid); ?>">
			<div class="input">
				<span>Nome</span>
				<input type="text" name="nome<?=$sid; ?>" required="required">
			</div>
			<div class="input">
				<span>Email</span>
				<input type="email" name="ema<?=$sid; ?>il" required="required">
			</div>
			<div class="input">
				<span>Fone</span>
				<input type="text" name="telefone<?=$sid; ?>" required="required" id="telefone">
			</div>
			<div class="input">
				<span>Mensagem</span>
				<textarea name="mensagem<?=$sid; ?>" required="required"></textarea>
			</div>
			<div class="extra">
				<button type="submit">Enviar</button>
				<?php if($sucesso){ ?>
					<div class="resposta">Enviado com sucesso</div>
				<?php } ?>
			</div>
		</form>
	</div>

	<div class="endereco">
		Sede da Fábrica de Gaiteiros<br>
		Rua Júlio de Castilhos, 1420<br>
		Barra do Ribeiro / RS
	</div>
	
	<div class="outros">
		<small>51</small> 3335.1824<br>
		<a href="mailto:borghetti@terra.com.br">borghetti@terra.com.br</a>
	</div>

	<div class="pessoa"></div>
</div>

<script type="text/javascript">
$(function(){
	$("#contato-formulario").validate();
	$('#telefone').mask("(99) 9999-9999?9");
});
</script>