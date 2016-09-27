<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">Dados Ambientais</div>
	<div class="content-header-search">
		<form action="<?=site_url('ambientais/search'); ?>" target="_self" method="post" class="form-horizontal">
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
			<a class="btn" href="<?=site_url('ambientais/cadastrar'); ?>">
				<i class="icon-plus"></i> 
				Cadastrar um Relatório
			</a>
		</div>
	</div>
</div>
<div class="content-table">
	<table class="table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th width="100">Ano</th>
				<th width="100">Mês</th>
				<th>Arquivo</th>
				<th width="40">Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if(sizeof($ambientais) > 0){
			foreach($ambientais as $rows){
				echo '
					<tr>
						<td align="center">',$rows->ano,'</td>
						<td align="center">',$rows->mes,'</td>
						<td>',$rows->arquivo,'</td>
						<td align="center">
							<div class="btn-group">
								<a href="',site_url('ambientais/remover/'.$rows->ano.'/'.$rows->mes),'" class="btn"><i class="icon-trash"></i></a>
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