<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">Slider - <?=$slider->nome; ?> - Upload</div>
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
					<td width="100">Legenda: *</td>
					<td><input class="validate[required] span4" type="text" name="form_legenda" id="form_legenda" value="<?=post('form_legenda'); ?>" maxlength="45"></td>
					<td>&nbsp;</td>
					<td width="100">URL:</td>
					<td><input class="span4" type="text" name="form_url" id="form_url" value="<?=post('form_url'); ?>" maxlength="200"></td>
				</tr>
				<tr>
					<td>Ordem: *</td>
					<td><input class="validate[required] span4" type="text" name="form_ordem" id="form_ordem" value="<?=post('form_ordem'); ?>" maxlength="3"></td>
					<td>&nbsp;</td>
					<td>Arquivo: *</td>
					<td><input class="validate[required]" type="file" name="userfile" id="userfile" value="<?=post('userfile'); ?>"></td>
				</tr>
				<tr>
					<td colspan="4"></td>
					<td>Formato jpg com 1920x450px</td>
				</tr>
				<tr>
					<td colspan="5">
						<br>
						<button type="submit" class="btn btn-success submit" data-loading-text="Processando...">
							<i class="icon-arrow-up icon-white"></i> Efetuar Upload
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
		$("#form_ordem").mask("999")
	});
</script>
<?php
$this->load->view('sistema/tpl/footer');

?>