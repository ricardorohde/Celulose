<?php
$this->load->view('sistema/tpl/header');
?>
<div class="content-header">
	<div class="content-header-title">Comunicação - Trabalhe Conosco - Remover</div>
	<div class="content-header-row"></div>
	<div class="content-header-options">
		<div class="btn-group">
			<a class="btn" href="<?=$return; ?>">
				<i class="icon-arrow-left"></i> 
				Voltar
			</a>
		</div>
	</div>
</div>
<form action="<?=current_url(); ?>?return=<?=rawurlencode($return); ?>" method="post">
	<div class="modal content-remove">
		<div class="modal-header">
			<h3>Remover Registro</h3>
		</div>
		<div class="modal-body">
			<p>Você realmente gostaria de remover este registro?</p>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-danger submit" data-loading-text="Processando..." />Remover</button>
			<a href="<?=$return; ?>" class="btn">Cancelar</a>
		</div>
	</div>
	<input type="hidden" name="id" value="<?=$trabalhe->id; ?>">
</form>
<script type="text/javascript">
	$('.submit').click(function(){
		$(this).button('loading');
	});
</script>
<?php
$this->load->view('sistema/tpl/footer');
?>