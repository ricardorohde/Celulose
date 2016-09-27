<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">Folha Riograndense - Cadastrar Conteúdo</div>
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


<div class="content-forms" style="height: 420px;">
	<form action="<?=current_url(); ?>" method="post" id="form_main">
		<div class="row">
			<div class="span2">Título:</div>
			<div class="span10">
				<input type="text" name="form_titulo" value="" maxlength="120" class="span10 validate[required]">
			</div>
		</div>
		<div class="row">
			<div class="span2">Categoria:</div>
			<div class="span2">
				<input type="text" name="form_categoria" value="" maxlength="60" class="span2">
			</div>
			<div class="span1">Filtro:</div>
			<div class="span5">
				<?php
					foreach($filtros as $key => $rows){
						echo '
							<label class="checkbox inline">
								<input type="checkbox" value="',$key,'" name="form_filtros[]"> ',$rows,'
							</label>
						';
					}
				?>
			</div>
			<div class="span1">Ordem:</div>
			<div class="span1">
				<input type="text" name="form_ordem" value="" maxlength="3" id="ordem" class="span1 text-center validate[required]">
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<textarea name="form_html" id="html"></textarea>
			</div>
		</div>
		
		<div class="row">
			<br><br>
			<button type="submit" class="btn btn-success span submit" data-loading-text="Processando..." style="margin-top: 16px;">
				<i class="icon-plus icon-white"></i> Cadastrar
			</button>
		</div>

	</form>
<br></div>
<script type="text/javascript">
	$(function(){
		$("#form_main").validationEngine('attach', {promptPosition : "topRight"});
		$("#ordem").mask("999");

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
		
	});
</script>
<?php
$this->load->view('sistema/tpl/footer');

?>