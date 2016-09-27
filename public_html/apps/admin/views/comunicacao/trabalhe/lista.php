<?php
$this->load->view('sistema/tpl/header');
?>
<div class="content-header">
	<div class="content-header-title">Comunicação - Trabalhe Conosco</div>
	<div class="content-header-row"></div>
	<div class="content-header-options">
		<div class="btn-group">
			<a class="btn" href="<?=site_url('comunicacao/trabalhe/buscar'); ?>">
				<i class="icon-search"></i> 
				Busca Avançada
			</a>
			<a class="btn" href="<?=site_url('comunicacao/trabalhe'); ?>">
				Resetar
			</a>
		</div>
		<div class="pull-right">
			Registros Listados: <?=number_format($registros, 0, ',', '.'); ?>
		</div>
	</div>
</div>
<div class="content-table">
	<table class="table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th width="40">Estagio</th>
				<th width="120">Data / Hora</th>
				<th width="40">Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if(sizeof($trabalhe) > 0){
			foreach($trabalhe as $rows){
				echo '
					<tr>
						<td>',$rows->nome,'</td>
						<td>',$rows->email,'</td>
						<td align="center">',$rows->estagio == '1' ? 'Sim' : 'Não','</td>
						<td align="center">',date('d/m/Y h:i',$rows->ctime),'</td>
						<td align="center">
							<div class="btn-group">
								<a href="',site_url('comunicacao/trabalhe/visualizar/'.$rows->id),'?return=',$return,'" class="btn"><i class="icon-eye-open"></i></a>
								<a href="',site_url('comunicacao/trabalhe/remover/'.$rows->id),'?return=',$return,'" class="btn"><i class="icon-trash"></i></a>
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