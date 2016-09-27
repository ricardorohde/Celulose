<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">Notícias</div>
	<div class="content-header-search">
		<form action="<?=site_url('noticias/search'); ?>" target="_self" method="post" class="form-horizontal">
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
			<a class="btn" href="<?=site_url('noticias/cadastrar'); ?>">
				<i class="icon-plus"></i> 
				Cadastrar uma Notícia
			</a>
		</div>
	</div>
</div>
<div class="content-table">
	<table class="table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Título</th>
				<th width="100">Linguagem</th>
				<th width="80">Criado em</th>
				<th width="80">Visibilidade</th>
				<th width="80">Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if(sizeof($noticias) > 0){
			foreach($noticias as $rows){
				echo '
					<tr>
						<td>',$rows->titulo,'</td>
						<td align="center">',$rows->nome,'</td>
						<td align="center">',sql_site($rows->data),'</td>
						<td align="center">',$rows->visible == '1' ? 'Visível' : '--','</td>
						<td align="center">
							<div class="btn-group">
								<a href="',site_url('noticias/editar/'.$rows->id),'" class="btn"><i class="icon-pencil"></i></a>
								<a href="',site_url('noticias/remover/'.$rows->id),'" class="btn"><i class="icon-trash"></i></a>
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
<div class="content-pages pagination">
	<ul><?=isset($pages) ? $pages : ''; ?></ul>
</div>
<?php
$this->load->view('sistema/tpl/footer');

?>