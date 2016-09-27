<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">URLs - Editar - <?=$url->param; ?></div>
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
		<fieldset>
			<table>
				<tr>
					<td width="150">Regra: *</td>
					<td><input type="text" name="form_param" value="<?=$url->param; ?>" maxlength="60" class="span10 validate[required]"></td>
				</tr>
				<tr>
					<td>URL: *</td>
					<td>
						<input type="text" name="form_url" value="<?=$url->url; ?>" maxlength="200" class="span10 validate[required]">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<br>
						<button type="submit" class="btn btn-success submit" data-loading-text="Processando...">
							<i class="icon-ok icon-white"></i> Salvar
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
	});
</script>
<?php
$this->load->view('sistema/tpl/footer');

?>