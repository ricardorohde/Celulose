<?php
$this->load->view('sistema/tpl/header');
?>
<div class="content-header">
	<div class="content-header-title">Obras - Fotos</div>
	<div class="content-header-row"></div>
	<div class="content-header-options">
		<div class="btn-group">
			<a class="btn" href="<?=site_url('obras/fotosUpload'); ?>">
				<i class="icon-plus"></i> 
				Upload foto
			</a>
		</div>
	</div>
</div>
<div class="content-table">
	<table class="table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Foto</th>
				<th width="100">Linguagem</th>
				<th width="120">Enviado em</th>
				<th width="60">Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if(sizeof($fotos) > 0){
			foreach($fotos as $rows){
				echo '
					<tr>
						<td align="center"><img src="',base_url('assets/img/expansao/fotos/small/' . $rows->arquivo),'"></td>
						<td align="center">',getLang($rows->lang),'</td>
						<td align="center">',sql_site($rows->data),'</td>
						<td align="center">
							<div class="btn-group">
								<a href="',site_url('obras/fotosEditar/'.$rows->id),'" class="btn"><i class="icon-pencil"></i></a>
								<a href="',site_url('obras/fotosRemover/'.$rows->id),'" class="btn"><i class="icon-trash"></i></a>
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