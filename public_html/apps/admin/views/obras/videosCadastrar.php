<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">Obras - Videos Cadastrar</div>
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
		<div class="row">
			<div class="span2">Foto: .jpg</div>
			<div class="span10">
				<input type="file" name="arquivo" class="span6 validate[required]">
			</div>
		</div>
		<div class="row">
			<div class="span2">Título:</div>
			<div class="span10">
				<input type="text" name="titulo" value="" maxlength="160" class="span10 validate[required]">
			</div>
		</div>
		
		<div class="row">
			<div class="span2">Link Vimeo (HTTP):</div>
			<div class="span10">
				<input type="text" name="link" value="" maxlength="60" class="span10 validate[required]">
			</div>
		</div>
		
		<div class="row">
			<div class="span2">Data:</div>
			<div class="span3">
				<input type="text" name="data" value="<?=date("d/m/Y"); ?>" id="data" maxlength="10" class="span3 validate[required]">
			</div>
			<div class="span3"></div>
			<div class="span1">Linguagem:</div>
			<div class="span3">
				<select name="lang" class="span3 validate[required]">
					<?php
					foreach(getLang() as $id => $lang){
						echo '<option value="',$id,'">',$lang,'</option>';
					}
					?>
				</select>
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