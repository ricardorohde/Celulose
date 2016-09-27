<?php
$this->load->view('sistema/tpl/header');
?>
<div class="content-header">
	<div class="content-header-title">Slider</div>
	<div class="content-header-search">
		<form action="<?=site_url('slider/search'); ?>" target="_self" method="post" class="form-horizontal">
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
			<a class="btn" href="<?=site_url('slider/cadastrar'); ?>">
				<i class="icon-plus"></i> 
				Cadastrar Slider
			</a>
		</div>
	</div>
</div>
<div class="content-table">
	<table class="table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Título</th>
				<th width="100">Imagens</th>
				<th width="100">Status</th>
				<th width="100">Linguagem</th>
				<th width="120">Criado em</th>
				<th width="100">Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if(sizeof($slider) > 0){
			foreach($slider as $rows){
				echo '
					<tr>
						<td>',$rows->nome,'</td>
						<td align="center">',$rows->nums,'</td>
						<td align="center">',($rows->status == '1') ? 'Visível' : ' -- ','</td>
						<td align="center">',$rows->lang,'</td>
						<td align="center">',($rows->ctime == 0) ? ' -- ' : date("d/m/Y",$rows->ctime),'</td>
						<td align="center">
							<div class="btn-group">
								<a href="',site_url('slider/editar/'.$rows->id),'" class="btn btn-primary"><i class="icon-pencil icon-white"></i></a>
								<a href="',site_url('slider/remover/'.$rows->id),'" class="btn btn-danger"><i class="icon-trash icon-white"></i></a>
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