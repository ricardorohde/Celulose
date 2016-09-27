<?php
$this->load->view('sistema/tpl/header');
?>
<div class="content-header">
	<div class="content-header-title">Comunicação - Trabalhe Conosco - Busca Avançada</div>
	<div class="content-header-row"></div>
	<div class="content-header-options">
		<div class="btn-group">
			<a class="btn" href="<?=site_url('comunicacao/trabalhe'); ?>">
				<i class="icon-arrow-left"></i> 
				Voltar
			</a>
		</div>
	</div>
</div>

<div class="content-forms clear">
	<form action="<?=site_url('comunicacao/trabalhe'); ?>" method="get" id="main_form">
		<table width="100%">
			<tr>
				<td width="25%">
					<label>
						Nome: <br />
						<input type="text" name="nome" id="form_nome" value="" maxlength="80" />
					</label>
				</td>
				<td width="25%">
					<label>
						E-mail:<br />
						<input type="text" name="email" id="form_email" value="" maxlength="80" />
					</label>
				</td>
				<td width="25%">
					<label>
						Cidade que Reside:<br />
						<input type="text" name="cidade" id="form_cidade" value="" style="width: 190px;" maxlength="40" />
					</label>
				</td>
				<td width="25%">
					<label>
						Telefone:<br />
						<input type="text" name="telefone" placeholder="(xx) xxxx-xxxx" id="form_telefone" value="" style="width: 190px;" maxlength="16" />
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						Formação:<br />
						<select name="formacao" id="form_formacao">
							<option value="" selected="selected">Todas</option>
							<?php
							if(sizeof($formacoes) > 0){
								foreach($formacoes as $rows){
									echo '<option value="',$rows->formacao,'">',$rows->formacao,'</option>';
								}
							}
							?>
						</select>
					</label>
				</td>
				<td>
					<label>
						Outra Formação:<br />
						<input type="text" name="formacao_outro" id="form_formacao_outro" value="" maxlength="120" />
					</label>
				</td>
				<td>
					<label>
						Curso:<br />
						<select name="curso" id="form_curso">
							<option value="" selected="selected">Todas</option>
							<?php
							if(sizeof($cursos) > 0){
								foreach($cursos as $rows){
									echo '<option value="',$rows->curso,'">',$rows->curso,'</option>';
								}
							}
							?>
						</select>
					</label>
				</td>
				<td>
					<label>
						Outro Curso:<br />
						<input type="text" name="curso_outro" id="form_curso_outro" value="" maxlength="120" />
					</label>
				</td>
			</tr>
			<tr>
				<td>
				<label>
						Último Salário:<br />
						<input type="text" name="salario" id="form_salario" value="" maxlength="20" />
					</label>
				</td>
				<td>
					<label>
						Pretensâo Salário:<br />
						<input type="text" name="pretencao" id="form_pretencao" value="" maxlength="20" />
					</label>
				</td>
				<td>
					<label>
						Área de Interesse:<br />
						<select name="area" id="form_area">
							<option value="" selected="selected">Todas</option>
							<?php
							if(sizeof($areas) > 0){
								foreach($areas as $rows){
									echo '<option value="',$rows->area,'">',$rows->area,'</option>';
								}
							}
							?>
						</select>
					</label>
				</td>
				<td>
					<label>
						Outra Área de Interesse:<br />
						<input type="text" name="area_outro" id="form_area_outro" value="" maxlength="120" />
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						Tempo de Experiência na Área:<br />
						<input type="text" name="area_tempo" id="form_area_tempo" value="" maxlength="120" />
					</label>
				</td>
				<td>
					<label>Interesse em Estágio:<br /></label>
					<label class="radio">
						Ambos <input type="radio" name="estagio" class="form_estagio" checked="checked" value="" />
					</label>
					<label class="radio">
						Sim <input type="radio" name="estagio" class="form_estagio" value="1" />
					</label>
					<label class="radio">
						Nâo <input type="radio" name="estagio" class="form_estagio" value="0" />
					</label>
				</td>
				<td colspan="2">
					<label>Deficiênte Fisico:<br /></label>
					<label class="radio">
						Ambos <input type="radio" name="fisica" class="form_fisico" checked="checked" value="" />
					</label>
					<label class="radio">
						Sim <input type="radio" name="fisica" class="form_fisico" value="1" />
					</label>
					<label class="radio">
						Nâo <input type="radio" name="fisica" class="form_fisico" value="0" />
					</label>
				</td>
			</tr>
		</table>
		<input type="hidden" name="per_page" value="0">
		<button class="btn btn-info submit" type="submit">Buscar</button>
	</form>
</div>
<?php
$this->load->view('sistema/tpl/footer');
?>