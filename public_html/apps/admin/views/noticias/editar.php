<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">Notícias - <?=$noticia->titulo; ?></div>
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


<div class="content-forms" style="height: 460px;">
	<form action="<?=current_url(); ?>" method="post" id="form_main">
		<div class="row">
			<div class="span2">Título:</div>
			<div class="span10">
				<input type="text" name="form_titulo" value="<?=$noticia->titulo; ?>" maxlength="160" class="span10 validate[required]">
			</div>
		</div>
		<div class="row">
			<div class="span2">Data:</div>
			<div class="span3">
				<input type="text" name="form_data" value="<?=sql_site($noticia->data); ?>" id="data" maxlength="10" class="span3 validate[required]">
			</div>
			<div class="span3">
				<label class="radio inline">
					<input type="radio" value="1" <?=$noticia->visible == '1' ? 'checked="checked"' : ''; ?> name="form_visible"> Visível
				</label>
				<label class="radio inline">
					<input type="radio" value="0" <?=$noticia->visible == '0' ? 'checked="checked"' : ''; ?> name="form_visible"> Não Visível
				</label>
			</div>
			<div class="span1">Linguagem:</div>
			<div class="span3">
				<select name="form_lang" class="span3 validate[required]">
					<?php
					foreach($lang as $rows){
						if($noticia->lid == $rows->id){
							echo '<option value="',$rows->id,'" selected="selected">',$rows->nome,'</option>';
						} else {
							echo '<option value="',$rows->id,'">',$rows->nome,'</option>';
						}
					}
					?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<textarea name="form_html" id="html"><?=$noticia->html; ?></textarea>
			</div>
		</div>

		<div class="row">
			<button type="submit" class="btn btn-success span submit" style="margin-top: 20px;" data-loading-text="Processando...">
				<i class="icon-ok icon-white"></i> Salvar
			</button>
		</div>
	</form>
</div>
<script type="text/javascript">
	$(function(){

		var editor = CKEDITOR.replace('form_html',{
			resize_enabled: false,
			toolbar: [
				{ name: 'document',	items : [ 'Source'] },
				{ name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
				{ name: 'editing',	 items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
				{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
				{ name: 'colors',	  items : [ 'TextColor','BGColor' ] },
				'/',
				{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
				{ name: 'links',	   items : [ 'Link','Unlink','Anchor' ] },
				{ name: 'insert',	  items : [ 'Image','Table','HorizontalRule','SpecialChar','PageBreak' ] },
				{ name: 'styles',	  items : [ 'FontSize' ] }
			]
		});

		CKFinder.setupCKEditor(editor,{

			filebrowserBrowseUrl: '<?=base_url('libary/ckeditor/plugins/ckfinder/ckfinder.html'); ?>',
			filebrowserImageBrowseUrl: '<?=base_url('libary/ckeditor/plugins/ckfinder/ckfinder.html?type=Images'); ?>',
			filebrowserFlashBrowseUrl: '<?=base_url('libary/ckeditor/plugins/ckfinder/ckfinder.html?type=Flash'); ?>',
			filebrowserUploadUrl: '<?=base_url('libary/ckeditor/plugins/ckfinder/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'); ?>',
			filebrowserImageUploadUrl: '<?=base_url('libary/ckeditor/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'); ?>',
			filebrowserFlashUploadUrl: '<?=base_url('libary/ckeditor/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'); ?>',
			basePath: '<?=base_url('libary/ckeditor/plugins/ckfinder/'); ?>',

			rememberLastFolder: false,
			disableHelpButton: true
		});
		
		$("#form_main").validationEngine('attach', {promptPosition : "topRight"});
		$("#data").mask("99/99/9999");
	});
</script>
<?php
$this->load->view('sistema/tpl/footer');

?>