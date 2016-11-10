<?php

$to = $this->input->get('to');
$to = ($to > 0) ? $to : 0;

?>

<div class="banner">
	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-contato.jpg'); ?>">
</div>

<section id="contato">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">

			<h2 class="title"><?=lang('defualt_menu_com_quem_falar'); ?></h2>

			<div class="formulario">
				<div class="col-sm-12 col-md-offset-1 col-md-10">
					<form action="<?=current_url(); ?>" method="post" id="main_form">
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="row">

									<div class="col-xs-12 form-group">
										<label> <?=lang('contato_form_nome'); ?> </label>
										<input type="text" name="form_nome" value="<?=post('form_nome'); ?>" maxlength="120">

									</div>

									<div class="col-xs-12 form-group">
										<label> <?=lang('contato_form_email'); ?> </label>
										<input type="text" name="form_email" value="<?=post('form_email'); ?>" maxlength="80">
									</div>

									<div class="col-xs-12 form-group">
										<label> <?=lang('contato_form_area'); ?> </label>
										<select name="form_area">
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

									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="col-xs-12 form-group">
									<div class="row">

										<label> <?=lang('contato_form_mensagem'); ?> </label>
										<textarea name="form_mensagem"><?=post('form_mensagem'); ?></textarea>	

									</div>
								</div>
							</div>
						</div>
					</form>

					<div class="submit">
						<button type="submit" value="<?=lang('contato_form_enviar'); ?>">Enviar</button>
					</div>
				</div>					
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

		</div>
	</div>
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