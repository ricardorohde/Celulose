<?php
$this->load->view('sistema/tpl/header');

$limiter = 60;

?>
<div class="content-header">
	<div class="content-header-title">Contato - ID: <?=$contato->id; ?></div>
	<div class="content-header-row"></div>
	<div class="content-header-options">
		<div class="btn-group">
			<a class="btn" href="javascript:history.go(-1);">
				<i class="icon-arrow-left"></i> 
				Voltar
			</a>
		</div>
	</div>
</div>


<div class="content-forms">
	<fieldset>
		<table>
			<tr>
				<td width="80">Nome:</td>
				<td><?=$contato->nome; ?> <?=$contato->sobrenome; ?></td>
			</tr>
			<tr>
				<td>E-mail:</td>
				<td><?=$contato->email; ?></td>
			</tr>
			<tr>
				<td>Área:</td>
				<td><?=$contato->area; ?></td>
			</tr>
			<tr>
				<td>Linguagem:</td>
				<td><?=$contato->lang; ?></td>
			</tr>
			<tr>
				<td>Data de envio:</td>
				<td><?=date("d/m/Y h:i",$contato->ctime); ?></td>
			</tr>
			<tr>
				<td valign="top">Mensagem:</td>
				<td><?=$contato->mensagem; ?></td>
			</tr>
		</table>
		<br><br>
	</fieldset>
</div>
<?php
$this->load->view('sistema/tpl/footer');

?>