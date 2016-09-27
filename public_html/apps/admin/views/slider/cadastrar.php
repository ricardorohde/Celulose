<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">Slider - Cadastrar</div>
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
					<td width="150">Nome: *</td>
					<td><input class="validate[required] span4" type="text" name="form_nome" id="form_nome" value="<?=post('form_nome'); ?>" maxlength="45"></td>
				</tr>
				<tr>
					<td>Linguagem: *</td>
					<td>
						<select class="validate[required] span4" name="form_lang" id="form_lang">
							<?php
							foreach($langs as $lang){
								if(post('form_lang') == $lang->id){
									echo '<option selected value="',$lang->id,'">',$lang->nome,'</option>' . PHP_EOL;
								} else {
									echo '<option value="',$lang->id,'">',$lang->nome,'</option>' . PHP_EOL;
								}
							}
							?>
						</select>
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
	});
</script>
<?php
$this->load->view('sistema/tpl/footer');

?>