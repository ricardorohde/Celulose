<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="google" content="notranslate">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
<link rel="shortcut icon" type="image/png" href="<?=base_url('favicon.png'); ?>">
<link rel="stylesheet" type="text/css" href="<?=assets_url('css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?=assets_url('css/ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?=assets_url('css/login.css'); ?>">
<script type="text/javascript">var URL = {base: '<?=assets_url(); ?>',site: '<?=site_url(); ?>',current: '<?=current_url(); ?>'};</script>
<script type="text/javascript" src="<?=assets_url('js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?=assets_url('js/bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?=assets_url('js/cms.js'); ?>"></script>
<script type="text/javascript" src="<?=assets_url('js/encode.js'); ?>"></script>
<script type="text/javascript" src="<?=assets_url('js/login.js'); ?>"></script>
<!--[if lt IE 9]><script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<title><?=EMPRESA; ?> - Sistema de gerenciamento de conteúdo</title>
</head>
<body>
<div class="center">
	<div class="response">
		<div class="alert hide"></div>
	</div>
	<div class="box-login">
		<div class="loading">
			<img src="<?=assets_url('img/loading.gif'); ?>">
		</div>
		<div class="login">
			<form>
				<fieldset class="control-group">
					<label for="form_email">E-mail:</label>
					<input type="text" size="35" rel="email" maxlength="60" value="" placeholder="Digite seu e-mail" name="form_email" id="form_email"><br />
					<label for="form_pass">Senha:</label>
					<input type="password" size="35" rel="senha" maxlength="16" value="" placeholder="Digite sua senha" name="form_pass" id="form_pass"><br />
					<div class="submit">
						<input type="button" onclick="javascript:Login.tryAuth('<?=$this->input->get("return"); ?>');" rel="submit" value="Autenticar" class="btn btn-primary" data-loading-text="Processando...">
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	<div class="footer">
		Desenvolvido por <a href="http://<?=BYLINK; ?>/" target="_blank"><?=BY; ?></a>
	</div>
</div>
</body>
</html>