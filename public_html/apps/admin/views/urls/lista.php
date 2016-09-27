<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">URLs</div>
	<div class="content-header-search">
		<form action="<?=site_url('urls/search'); ?>" target="_self" method="post" class="form-horizontal">
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
			<a class="btn" href="<?=site_url('urls/cadastrar'); ?>">
				<i class="icon-plus"></i> 
				Cadastrar uma URL
			</a>
		</div>
	</div>
</div>
<div class="content-table">
	<table class="table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Regra</th>
				<th>URL</th>
				<th width="140">Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if(sizeof($urls) > 0){
			foreach($urls as $rows){
				echo '
					<tr>
						<td>',$rows->param,'</td>
						<td>',$rows->url,'</td>
						<td align="center">
							<div class="btn-group">
								<a href="',site_url('urls/editar/'.$rows->id),'" class="btn"><i class="icon-pencil"></i></a>
								<a href="',site_url('urls/remover/'.$rows->id),'" class="btn"><i class="icon-trash"></i></a>
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