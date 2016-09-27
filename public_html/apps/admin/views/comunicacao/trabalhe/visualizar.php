<?php
$this->load->view('sistema/tpl/header');

$ext = $trabalhe->nome . '.' . pathinfo($trabalhe->arquivo, PATHINFO_EXTENSION);
?>
<div class="content-header">
	<div class="content-header-title">Comunicação - Trabalhe Conosco - <?=character_limiter($trabalhe->nome,28,'...');?></div>
	<div class="content-header-row"></div>
	<div class="content-header-options">
		<div class="btn-group">
			<a class="btn" href="<?=$return; ?>">
				<i class="icon-arrow-left"></i> 
				Voltar
			</a>
			<a class="btn" href="<?=site_url("comunicacao/trabalhe/download/".$trabalhe->id.'/'.$ext); ?>">
				<i class="icon-arrow-down"></i> 
				Baixar Currículo
			</a>
		</div>
	</div>
</div>
<div class="content-forms">
	<fieldset>
		<table style="width:100%;">
			<tr class="control-group">
				<td width="150">Nome:</td>
				<td><?=$trabalhe->nome; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">E-mail:</td>
				<td><?=$trabalhe->email; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">Cidade que Reside:</td>
				<td><?=$trabalhe->cidade; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">Telefone:</td>
				<td><?=$trabalhe->telefone; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">Data de Nascimento:</td>
				<td><?=$trabalhe->data; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">Formação:</td>
				<td><?=$trabalhe->formacao; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">Outra Formação:</td>
				<td><?=$trabalhe->formacao_outro; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">Curso:</td>
				<td><?=$trabalhe->curso; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">Outro Curso:</td>
				<td><?=$trabalhe->curso_outro; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">Último Salário:</td>
				<td><?=$trabalhe->salario; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">Pretensão Salário:</td>
				<td><?=$trabalhe->pretensao; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">Área de Interesse:</td>
				<td><?=$trabalhe->area; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">Outra Área de Interesse:</td>
				<td><?=$trabalhe->area_outro; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">Tempo de Experiência na Área:</td>
				<td><?=$trabalhe->area_tempo; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">Interesse em Estágio:</td>
				<td><?=$trabalhe->estagio == '1' ? 'Sim' : 'Não'; ?></td>
			</tr>
			<tr class="control-group">
				<td width="150">Deficiênte Fisico:</td>
				<td><?=$trabalhe->fisica == '1' ? 'Sim' : 'Não'; ?></td>
			</tr>
		<table>
	</fieldset>
</div>
<?php
$this->load->view('sistema/tpl/footer');
?>