<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">Folha Riograndense</div>
	<div class="content-header-search">
		<form action="<?=site_url('folha/search'); ?>" target="_self" method="post" class="form-horizontal">
			<div class="control-group">
			<div class="controls">
				<div class="input-append">
					<input class="span3" name="q" size="16" value="<?=isset($search) ? $search : ''; ?>" maxlength="50" type="text" placeholder="Procurar...">
					<button class="btn" type="submit"><i class="icon-search"></i></button>
				</div>
			</div>
			</div>
		</form>
	</div>
	<div class="content-header-row"></div>
	<div class="content-header-options">
		<div class="btn-group">
			<a class="btn" href="<?=site_url('folha/cadastrar'); ?>">
				<i class="icon-plus"></i> 
				Cadastrar uma nova edição
			</a>
		</div>
	</div>
</div>
<div class="content-table">
	<table class="table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Título</th>
				<th>Descrição</th>
				<th width="80">Criado em</th>
				<th width="80">Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if(sizeof($folha) > 0){
			foreach($folha as $rows){
				echo '
					<tr>
						<td>',$rows->titulo,'</td>
						<td>',$rows->descricao,'</td>
						<td align="center">',sql_site($rows->data),'</td>
						<td align="center">
							<div class="btn-group">
								<a href="',site_url('folha/editar/'.$rows->id),'" class="btn"><i class="icon-pencil"></i></a>
								<a href="',site_url('folha/remover/'.$rows->id),'" class="btn"><i class="icon-trash"></i></a>
							</div>
						</td>
					</tr>
				';
			}
		} else {
			echo '
				<tr>
					<td colspan="4" align="center">Nenhum registro encontrado!</td>
				</tr>
			';
		}
		?>
		</tbody>
	</table>
</div>
<div class="content-pages pagination">
	<ul><?=isset($pages) ? $pages : ''; ?></ul>
</div>
<?php
$this->load->view('sistema/tpl/footer');

?>