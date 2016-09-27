<?php
	$this->load->view(getLang().'/contato/aba');

$to = $this->input->get('to');
$to = ($to > 0) ? $to : 0;

?>
<section class="container contato">
	<h1 class="title"><?=lang('defualt_menu_com_quem_falar'); ?></h1>

	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-contato.jpg'); ?>">

	<div class="formulario">
		<form action="<?=current_url(); ?>" method="post" id="main_form">
			<table>
				<tr>
					<td>
						<label>
							<?=lang('contato_form_nome'); ?> *<br />
							<input type="text" name="form_nome" placeholder="<?=lang('contato_form_nome_placeholder'); ?>" value="<?=post('form_nome'); ?>" maxlength="120" class="span1">
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<?=lang('contato_form_email'); ?> *<br />
							<input type="text" name="form_email" placeholder="<?=lang('contato_form_email_placeholder'); ?>" value="<?=post('form_email'); ?>" maxlength="80" class="span1">
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<?=lang('contato_form_area'); ?> *<br />
							<select name="form_area" class="span1">
								<option value=""><?=lang('contato_form_selecione'); ?></option>
								<?php
									if(sizeof($areas) > 0){
										foreach($areas as $rows){
											if(post('form_area',$to) == $rows->id){
												echo '<option value="',$rows->id,'" selected="selected">',$rows->titulo,'</option>';
											} else {
												echo '<option value="',$rows->id,'">',$rows->titulo,'</option>';
											}
										}
									}
								?>
							</select>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<?=lang('contato_form_mensagem'); ?> *<br />
							<textarea class="span1" name="form_mensagem"><?=post('form_mensagem'); ?></textarea>	
						</label>
					</td>
				</tr>
			</table>
			<div class="legenda">
				** Não use este formulário para envio de currículos ou solicitações de emprego. Clique no link <a href="<?=site_url('trabalhe-conosco'); ?>">Trabalhe Conosco</a>.
			</div>
			<div class="row">
				<input type="submit" value="<?=lang('contato_form_enviar'); ?>" />
			</div>
		</form>				
	</div>

	<script type="text/javascript">
		$(function(){
			if($("#main_form").length > 0){
				$("#main_form").validate({
					errorClass: "error",
					errorElement: "span",
					messages:{
						form_nome:{required: "<?=lang('contato_erro_empty'); ?>",minlength: "<?=lang('contato_erro_empty'); ?>"},
						form_email:{required: "<?=lang('contato_erro_empty'); ?>",email: "<?=lang('contato_erro_email'); ?>"},
						form_area:{required: "<?=lang('contato_erro_empty'); ?>"},
						form_mensagem:{required: "<?=lang('contato_erro_empty'); ?>"}
					},
					rules:{
						form_nome:{required: true,minlength: 3},
						form_email:{required: true,email: true},
						form_area:{required: true},
						form_mensagem:{required: true}
					}
				});
			}
		});
	</script>
	<div class="clear"></div>
</section>
<?php

$msg = get_display_error();

if(!$msg && $this->input->get('success')) {
	$msg = "Contato enviado com sucesso!";
}

if($msg){

echo '
<div id="box-form">
	<div class="container">
		Contato enviado com sucesso!
		<a href="javascript:void(0);" onclick="javascript:Celulose.closeBox();">Ok!</a>
	</div>
</div>
';
}
?>