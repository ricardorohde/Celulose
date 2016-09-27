
<?php if($this->auth->hasFlag('slider')){ ?>

<li><a <?=menu_url('slider'); ?> >Slider</a></li>

<?php } if($this->auth->hasFlag('contato') || $this->auth->hasFlag('trabalhe')){ ?>

<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown">Comunicação <b class="caret"></b></a>
	<ul class="dropdown-menu">
		<?php if($this->auth->hasFlag('contato')){ ?>

		<li><a <?=menu_url('comunicacao/contato'); ?> >Contatos</a></li>

		<?php } if($this->auth->hasFlag('contato') && $this->auth->hasFlag('trabalhe')){ ?>
		
		<li class="divider"></li>
		
		<?php } if($this->auth->hasFlag('trabalhe')){ ?>

		<li><a <?=menu_url('comunicacao/trabalhe'); ?> >Trabalhe Conosco</a></li>

		<?php } ?>

	</ul>
</li>

<?php } if($this->auth->hasFlag('noticias') || $this->auth->hasFlag('folha') || $this->auth->hasFlag('empregos')){ ?>

<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown">Conteúdos <b class="caret"></b></a>
	<ul class="dropdown-menu">
		<?php if($this->auth->hasFlag('noticias')){ ?>

		<li><a <?=menu_url('noticias'); ?> >Notícias</a></li>

		<?php } if($this->auth->hasFlag('folha')){ ?>

		<li><a <?=menu_url('folha'); ?> >Folha Riograndense</a></li>

		<?php } if($this->auth->hasFlag('empregos')){ ?>

		<li><a <?=menu_url('empregos'); ?> >Empregos</a></li>

		<?php } ?>
	</ul>
</li>

<?php } if($this->auth->hasFlag('ambientais')){ ?>

<li><a <?=menu_url('ambientais'); ?> >Dados Ambientais</a></li>


<?php } if($this->auth->hasFlag('ambientais')){ ?>

<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown">Obras <b class="caret"></b></a>
	<ul class="dropdown-menu">
		<li><a <?=menu_url('obras/fotos'); ?> >Fotos</a></li>
		<li><a <?=menu_url('obras/videos'); ?> >Videos</a></li>
	</ul>
</li>

<?php } if($this->auth->hasFlag('urls')){ ?>

<li><a <?=menu_url('urls'); ?> >URLs</a></li>

<?php } ?>