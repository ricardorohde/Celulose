<?php
$this->load->view('sistema/tpl/header');
?>
<div class="content-header">
	<div class="content-header-title">Obras - Videos</div>
	<div class="content-header-row"></div>
	<div class="content-header-options">
		<div class="btn-group">
			<a class="btn" href="<?=site_url('obras/videosCadastrar'); ?>">
				<i class="icon-plus"></i> 
				Cadastrar video
			</a>
		</div>
	</div>
</div>
<div class="content-table">
	<table class="table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Video</th>
				<th width="100">Linguagem</th>
				<th width="120">Cadastrado em</th>
				<th width="60">Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if(sizeof($videos) > 0){
			foreach($videos as $rows){
				echo '
					<tr>
						<td align="left">',$rows->titulo,'</td>
						<td align="center">',getLang($rows->lang),'</td>
						<td align="center">',sql_site($rows->data),'</td>
						<td align="center">
							<div class="btn-group">
								<a href="',site_url('obras/videosEditar/'.$rows->id),'" class="btn"><i class="icon-pencil"></i></a>
								<a href="',site_url('obras/videosRemover/'.$rows->id),'" class="btn"><i class="icon-trash"></i></a>
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