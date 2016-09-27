<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">Folha Riograndense - <?=$folha->titulo; ?></div>
	<div class="content-header-row"></div>
	<div class="content-header-options">
		<div class="btn-group">
			<a class="btn" href="javascript:history.go(-1);">
				<i class="icon-arrow-left"></i> 
				Voltar
			</a>
			<a class="btn" href="<?=site_url('folha/cadastrarConteudo/'.$folha->id); ?>">
				<i class="icon-plus"></i> 
				Cadastrar Conteúdo
			</a>
		</div>
	</div>
</div>


<div class="content-forms">
	<form action="<?=current_url(); ?>" method="post" id="form_main">
		<div class="row">
			<div class="span2">Título:</div>
			<div class="span10">
				<input type="text" name="form_titulo" value="<?=$folha->titulo; ?>" maxlength="120" class="span10 validate[required]">
			</div>
		</div>
		<div class="row">
			<div class="span2">Descrição:</div>
			<div class="span10">
				<input type="text" name="form_descricao" value="<?=$folha->descricao; ?>" maxlength="120" class="span10 validate[required]">
			</div>
		</div>
		<div class="row">
			<div class="span2">Data:</div>
			<div class="span10">
				<input type="text" name="form_data" value="<?=sql_site($folha->data); ?>" id="data" maxlength="10" class="span3 validate[required]">
			</div>
		</div>
		<div class="row">
			<button type="submit" class="btn btn-success span submit" data-loading-text="Processando...">
				<i class="icon-ok icon-white"></i> Salvar
			</button>
		</div>
	</form>
</div>

<br><br>

<div class="content-table">
	<table class="table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Título</th>
				<th>Filtros</th>
				<th width="80">Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if(sizeof($conteudos) > 0){
			foreach($conteudos as $rows){
				echo '
					<tr>
						<td>',$rows->titulo,'</td>
						<td>',parseFiltros($rows->filtro),'</td>
						<td align="center">
							<div class="btn-group">
								<a href="',site_url('folha/editarConteudo/'.$folha->id.'/'.$rows->id),'" class="btn"><i class="icon-pencil"></i></a>
								<a href="',site_url('folha/removerConteudo/'.$folha->id.'/'.$rows->id),'" class="btn"><i class="icon-trash"></i></a>
							</div>
						</td>
					</tr>
				';
			}
		} else {
			echo '
				<tr>
					<td colspan="3" align="center">Nenhum registro encontrado!</td>
				</tr>
			';
		}
		?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(function(){
		$("#form_main").validationEngine('attach', {promptPosition : "topRight"});
		$("#data").mask("99/99/9999");
	});
</script>
<?php
$this->load->view('sistema/tpl/footer');

?>