<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">Empregos - Cadastrar</div>
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
					<td width="150">Município: *</td>
					<td colspan="3"><input type="text" name="form_municipio" value="" maxlength="60" class="span6 validate[required]"></td>
				</tr>
				<tr>
					<td colspan="5">Prestadores de Serviço</td>
				</tr>
				<tr>
					<td>Masculino: *</td>
					<td>
						<input type="text" name="form_masculino" value="0" maxlength="20" class="span4 validate[required]">
					</td>
					<td  width="150">Feminino: *</td>
					<td>
						<input type="text" name="form_feminino" value="0" maxlength="20" class="span4 validate[required]">
					</td>
				</tr>
				<tr>
					<td colspan="5">Próprios</td>
				</tr>
				<tr>
					<td>Masculino: *</td>
					<td>
						<input type="text" name="form_pmasculino" value="0" maxlength="20" class="span4 validate[required]">
					</td>
					<td>Feminino: *</td>
					<td>
						<input type="text" name="form_pfeminino" value="0" maxlength="20" class="span4 validate[required]">
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