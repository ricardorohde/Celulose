<?php
$this->load->view('sistema/tpl/header');
?>
<div class="content-header">
	<div class="content-header-title">Comunicação - Contato</div>
	<div class="content-header-search">
		<form action="<?=site_url('comunicacao/contato/search'); ?>" target="_self" method="post" class="form-horizontal">
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
</div>
<div class="content-table">
	<table class="table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Área</th>
				<th>Nome</th>
				<th>E-mail</th>
				<th width="100">Linguagem</th>
				<th width="120">Enviado em</th>
				<th width="60">Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if(sizeof($contato) > 0){
			foreach($contato as $rows){
				echo '
					<tr>
						<td align="center">',$rows->area,'</td>
						<td>',$rows->nome,' ',$rows->sobrenome,'</td>
						<td>',$rows->email,'</td>
						<td align="center">',$rows->lang,'</td>
						<td align="center">',($rows->ctime == 0) ? ' -- ' : date("d/m/Y h:i",$rows->ctime),'</td>
						<td align="center">
							<div class="btn-group">
								<a href="',site_url('comunicacao/contato/visualizar/'.$rows->id),'" class="btn"><i class="icon-eye-open"></i></a>
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