<?php
$this->load->view('sistema/tpl/header');

$limiter = 60;

?>
<div class="content-header">
	<div class="content-header-title">Slider - <?=$slider->nome; ?></div>
	<div class="content-header-row"></div>
	<div class="content-header-options">
		<div class="btn-group">
			<a class="btn" href="<?=site_url('slider/lista'); ?>">
				<i class="icon-arrow-left"></i> 
				Voltar
			</a>
			<a class="btn" href="<?=site_url("slider/upload/".$slider->id); ?>">
				<i class="icon-arrow-up"></i> 
				Upload Imagem
			</a>
		</div>
	</div>
</div>


<div class="content-forms">
	<form action="<?=current_url(); ?>" method="post" id="form_main">
		<fieldset>
			<table>
				<tr>
					<td width="80">Nome: *</td>
					<td><input class="validate[required] span4" type="text" name="form_nome" id="form_nome" value="<?=post('form_nome',$slider->nome); ?>" maxlength="45"></td>
					<td width="80">&nbsp;&nbsp;Criado em:</td>
					<td><?=($slider->ctime == 0) ? ' -- ' : date("d/m/Y",$slider->ctime); ?></td>
				</tr>
				<tr>
					<td>Linguagem: *</td>
					<td>
						<select class="validate[required] span4" name="form_lang" id="form_lang">
							<?php
							foreach($langs as $lang){
								if(post('form_lang',$slider->lang) == $lang->id){
									echo '<option selected value="',$lang->id,'">',$lang->nome,'</option>' . PHP_EOL;
								} else {
									echo '<option value="',$lang->id,'">',$lang->nome,'</option>' . PHP_EOL;
								}
							}
							?>
						</select>
					</td>
					<td>&nbsp;&nbsp;Status:</td>
					<td>
						<select class="validate[required] span4" name="form_status" id="form_status">
							<option <?=post('form_status',$slider->status) == '1' ? 'selected' : '' ; ?> value="1">Visível</option>
							<option <?=post('form_status',$slider->status) == '0' ? 'selected' : '' ; ?> value="0">Não visível</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<br>
						<button type="submit" class="btn btn-success submit" data-loading-text="Processando...">
							<i class="icon-ok icon-white"></i> Salvar
						</button>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</div>

<!-- imagens -->

<?php if($imgs){ ?>

<div class="content-header">
	<div class="content-header-title">Imagens</div>
	<div class="content-header-row"></div>
</div>

<div class="content-slider">
	<form action="<?=site_url('slider/editarOrdem/'.$slider->id); ?>" method="post" id="form_ordem">
		<ul>
			<?php
			foreach($imgs as $rows){
				if(!empty($rows->link)){
					if(substr($rows->link,0,4) == "http"){
						$link = $rows->link;
					} else {
						$link = base_url($rows->link);
					}

					if(strlen($link) > $limiter){
						$link = '<a href="'.$link.'" target="_blank">'.substr($link,0,$limiter).'...</a>';
					} else {
						$link = '<a href="'.$link.'" target="_blank">'.$link.'</a>';
					}
				
				} else {
					$link = '-- Sem link --';
				}

				echo '
					<li class="slider-row">
						<img src="',base_url('assets/img/slider/backgrounds/'.$rows->arquivo),'" width="300">
						<div class="slider-row-text">
							<b>Legenda:</b>
								&nbsp;&nbsp;',$rows->legenda,'
							<b>URL:</b>
								&nbsp;&nbsp;',$link,'
						</div>
						<input type="text" class="validate[required] ordem" value="',$rows->ordem,'" name="form_ordem[',$rows->id,']">
						<div class="btn-group">
							<a class="btn" href="',site_url('slider/editarImagem/'.$slider->id.'/'.$rows->id),'">
								<i class="icon-pencil"></i> 
								Editar
							</a>
							<a class="btn" href="',site_url('slider/removerImagem/'.$slider->id.'/'.$rows->id),'">
								<i class="icon-trash"></i> 
								Remover
							</a>
						</div>
					</li>
				';
			}
			?>
		</ul>
		<button type="submit" class="btn btn-success submit" data-loading-text="Processando...">
			<i class="icon-ok icon-white"></i> Salvar Ordem
		</button>
	</form>
</div>

<?php } ?>

<script type="text/javascript">
	$(function(){
		$("#form_main").validationEngine('attach', {promptPosition : "topRight"});
		$("#form_ordem").validationEngine('attach', {promptPosition : "topRight"});
		$(".ordem").mask("999");
	});
</script>
<?php
$this->load->view('sistema/tpl/footer');

?>