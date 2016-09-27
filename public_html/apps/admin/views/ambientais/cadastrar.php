<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">Dados Ambientais - Cadastrar</div>
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
	<form action="<?=current_url(); ?>" method="post" id="form_main" enctype="multipart/form-data">
		<fieldset>
			<table>
				<tr>
					<td width="150">Data: *</td>
					<td><input type="text" name="form_data" value="" maxlength="7" id="data" class="span4 validate[required]"></td>
				</tr>
				<tr>
					<td>PDF: *</td>
					<td>
						<input type="file" name="userfile" class="validate[required]">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<br>
						<button type="submit" class="btn btn-success submit" data-loading-text="Processando...">
							<i class="icon-plus icon-white"></i> Cadastrar
						</button>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</div>
<script type="text/javascript">
	$(function(){
		$("#form_main").validationEngine('attach', {promptPosition : "topRight"});

		$("#data").mask('99/9999');
	});
</script>
<?php
$this->load->view('sistema/tpl/footer');

?>