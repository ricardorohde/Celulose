<?php
$url = $this->uri->segment(1);

$title = isset($title) ? $title . ' - Celulose Riograndense' : 'Celulose Riograndense - Compromisso com o Rio Grande é a nossa marca.';
$description = isset($description) ? $description : 'Compromisso com o Rio Grande é a nossa marca.';
$keywords = isset($keywords) ? $keywords : 'celulose,riograndense,rs,celrs,rio,grandense,papel,reserva,barba,negra';

if(!isset($css)){ $css = array(); }
if(!isset($js)){ $js = array(); }

?><!DOCTYPE html>
<html lang="<?=getLangTerm(); ?>">
<head>

	<title><?=$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="imagetoolbar" content="no">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="google" content="notranslate">
	<meta name="description" content="<?=$description; ?>">
	<meta name="keywords" content="<?=$keywords; ?>">

	<meta property="og:locale" content="<?=getLangTerm(); ?>">
	<meta property="og:url" content="<?=current_url(); ?>">
	<meta property="og:site_name" content="<?=$title; ?>">
	<meta property="og:description" content="<?=$description; ?>">

	<?php if(isset($facebook)){ ?>
	<meta property="og:title" content="<?=$facebook['title']; ?>">
	<meta property="og:type" content="<?=$facebook['type']; ?>">
	<meta property="og:image" content="<?=$facebook['image']; ?>">
	<?php } ?>

	<link rel="shortcut icon" type="image/x-ico" href="<?=base_url('favicon.ico'); ?>">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/reset.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/slider.css'); ?>">

	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/main.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/custom.css'); ?>">

	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/lang/'.$_SESSION['celulose_lang'].'.css'); ?>">

	
	<?php foreach($js as $rows){
		echo '<script type="text/javascript" src="',base_url('assets/js/'.$rows),'"></script>' . PHP_EOL;
	} ?>

<!--[if lt IE 9]>
	<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-46340729-1', 'celuloseriograndense.com.br');
		ga('send', 'pageview');

	</script>

</head>
<body class="<?=browser_body(); ?>">

	<header id="menu" class="left act">
		
		<div class="container">
			<div class="left logo">
				<a target="_self" href="<?=base_url('home'); ?>">
					
				</a>
			</div>
			<nav>
				
				<ul>
					<li>
						<a target="_self" href="<?=base_url('empresa'); ?>"><?=lang('defualt_menu_empresa'); ?></a>
					</li>
					<li>
						<a target="_self" href="<?=base_url('produtos'); ?>"><?=lang('defualt_menu_produtos'); ?></a>
					</li>
					<li>
						<a target="_self" href="<?=base_url('responsabilidade'); ?>"><?=lang('defualt_menu_responsabilidade'); ?></a>
					</li>
					<?php if(getLang() == 'brazilian'){ ?>
					<li>
						<a target="_self" href="<?=base_url('noticias'); ?>"><?=lang('defualt_menu_noticias'); ?></a>
					</li>
					<?php } ?>
					<li>
						<a target="_self" href="<?=base_url('contato'); ?>"><?=lang('defualt_menu_contato'); ?></a>
					</li>
					<!-- <li>
						<a target="_self" href="<?=base_url('#'); ?>"><?=lang('defualt_menu_visite'); ?></a>
					</li> -->
					<li>
						<a target="_self" href="<?=base_url('trabalhe-conosco'); ?>"><?=lang('defualt_menu_trabalhe'); ?></a>
					</li>
				</ul>


			</nav>

		</div>
	</header>

	<div class="menu-button">
		<img src="assets/img/menu-icon.svg" alt="">
	</div>
