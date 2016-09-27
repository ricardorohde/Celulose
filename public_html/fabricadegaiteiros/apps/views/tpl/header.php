<?php
$url = $this->uri->segment(1);
?><!DOCTYPE html>
<html lang="pt-BR">
<head>

	<title>Fábrica de Gaiteiros</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="imagetoolbar" content="no">
<meta name="google" content="notranslate">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<meta name="content-language" content="pt-br">
<meta name="classification" content="general">
<meta name="viewport" content="width=1100, user-scalable=1">

<link rel="canonical" href="<?=site_url(); ?>">
<link rel="shortcut icon" type="image/png" href="http://www.celuloseriograndense.com.br/favicon.png">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/reset.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/main.css'); ?>">

<script type="text/javascript"> var URL = {base: '<?=base_url(); ?>',site: '<?=site_url(); ?>',current: '<?=current_url(); ?>'}; </script>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/forms.js'); ?>"></script>

<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46340729-1', 'celuloseriograndense.com.br');
  ga('send', 'pageview');

</script>

</head>
<body>
<div class="background">
	<header>
		<div class="container">
			<nav>
				<div class="link <?=empty($url) ? 'active' : ''; ?>">
					<a href="<?=site_url(); ?>">
						<span>O Projeto</span>
					</a>
				</div>
				<div class="link <?=$url == "sede" ? 'active' : ''; ?>">
					<a href="<?=site_url('sede'); ?>">
						<span>A Nova<br>Sede</span>
					</a>
				</div>
				<div class="link <?=$url == "contato" ? 'active' : ''; ?>">
					<a href="<?=site_url('contato'); ?>">
						<span>Contato</span>
					</a>
				</div>
			</nav>
			<div class="menu-back"></div>
			<a href="<?=site_url(); ?>" class="logo"></a>
		</div>
	</header>
