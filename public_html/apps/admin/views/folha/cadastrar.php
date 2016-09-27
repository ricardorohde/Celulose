<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">Folha Riograndense - Cadastrar</div>
	<div class="content-header-row"></div>
	<div class="content-header-options">
		<div class="btn-group">
			<a class="btn" href="javascript:history.go(-1);">
				<i class="icon-arrow-left"></i> 
				Voltar
			</a>
		</div>
	</div>
</div>


<div class="content-forms">
	<form action="<?=current_url(); ?>" method="post" id="form_main">
		<div class="row">
			<div class="span2">Título:</div>
			<div class="span10">
				<input type="text" name="form_titulo" value="" maxlength="120" class="span10 validate[required]">
			</div>
		</div>
		<div class="row">
			<div class="span2">Descrição:</div>
			<div class="span10">
				<input type="text" name="form_descricao" value="" maxlength="120" class="span10 validate[required]">
			</div>
		</div>
		<div class="row">
			<div class="span2">Data:</div>
			<div class="span10">
				<input type="text" name="form_data" value="<?=date("d/m/Y"); ?>" id="data" maxlength="10" class="span3 validate[required]">
			</div>
		</div>
		<div class="row">
			<button type="submit" class="btn btn-success span submit" data-loading-text="Processando...">
				<i class="icon-plus icon-white"></i> Cadastrar
			</button>
		</div>
	</form>
<br></div>
<script type="text/javascript">
	$(function(){
		$("#form_main").validationEngine('attach', {promptPosition : "topRight"});
		$("#data").mask("99/99/9999");
	});
</script>
<?php
$this->load->view('sistema/tpl/footer');

?>