<?php
$this->load->view('sistema/tpl/header');

?>
<div class="content-header">
	<div class="content-header-title">Empregos</div>
	<div class="content-header-search">
		<form action="<?=site_url('empregos/search'); ?>" target="_self" method="post" class="form-horizontal">
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
			<a class="btn" href="<?=site_url('empregos/cadastrar'); ?>">
				<i class="icon-plus"></i> 
				Cadastrar um Município
			</a>
		</div>
	</div>
</div>
<div class="content-table">
	<table class="table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th rowspan="2">Município</th>
				<td colspan="2" align="center">Prestadores de Serviços</td>
				<td colspan="2" align="center">Próprios</td>
				<th rowspan="2" width="140">Ações</th>
			</tr>
			<tr>
				<th>Masculino</th>
				<th>Feminino</th>
				<th>Masculino</th>
				<th>Feminino</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if(sizeof($empregos) > 0){
			foreach($empregos as $rows){
				echo '
					<tr>
						<td>',$rows->municipio,'</td>
						<td>',$rows->masculino,'</td>
						<td>',$rows->feminino,'</td>
						<td>',$rows->pmasculino,'</td>
						<td>',$rows->pfeminino,'</td>
						<td align="center">
							<div class="btn-group">
								<a href="',site_url('empregos/editar/'.$rows->id),'" class="btn"><i class="icon-pencil"></i></a>
								<a href="',site_url('empregos/remover/'.$rows->id),'" class="btn"><i class="icon-trash"></i></a>
							</div>
						</td>
					</tr>
				';
			}
		} else {
			echo '
				<tr>
					<td colspan="6" align="center">Nenhum registro encontrado!</td>
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