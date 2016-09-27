<?php

$this->load->view(getLang().'/empresa/aba');

$historia = array(
	'1968' => 'Borregaard sets its first eucalyptus planting, performed by the technical commission of the company Noreno do Brasil.',
	'1970' => 'Borregaard purchases Barba Negra farm, at Barra do Ribeiro municipality, with more than 10 thousand hectares for forming forests.',
	'1972' => 'On March 16, a Borregaard officially inaugurates Guaíba industrial plant.',
	'1974' => 'Production interruption for a 100-day period, for installing advanced technological equipment aiming to reduce the environmental impact from the manufacturing process.',
	'1975' => 'Stock control goes to Sulbrasileiro/Montepio da Família Militar. On December 23, the corporate name becomes Rio Grande Companhia de Celulose do Sul - Riocell.',
	'1978' => 'In November, two new stockholders assume: BNDES and Banco do Brasil.',
	'1982' => 'On March 10, change in corporate name and stock control: Riocell S.A. begins to be controlled by the holding KIV Participações, formed by private groups Klabin, Iochpe, and Votorantim. In this year, the so called “new factory” is started, formed by an energy boiler (coal), a pulp blenching unit, a cellulose drying machine, and a unit for producing chlorine dioxide.',
	'1985' => 'In December, approval is granted for purchasing the paper production unit from Grupo De Zorzi.',
	'1990' => 'Assemblage of delignification unit.',
	'1992' => 'Assemblage of a unit for producing chlorine and soda.',
	'1993' => 'Conquest of ISO 9002 certification.',
	'1995' => 'Iochpe disposes of all its stocks in favor of the private pension funds PREVI (Banco do Brasil) and PETROS (Petrobras).',
	'1996' => 'Conquest of ISO 14001 certification.',
	'2000' => 'Klabin pays up 100% of the company stock control and the corporate name changes for Klabin Riocell S.A.',
	'2002' => 'Due to the classification by business area, the company is now part of Celulose da Klabin S.A segment. Enforcement of Project: Riocell 2000, with installation of a new recovery and evaporation boiler, improvement in the environmental area, and productive expansion from 300 thousand to 400 thousand metric tons of cellulose annually.',
	'2003' => 'In May, Grupo Klabin announces the selling of Riocell for Aracruz Celulose.',
	'2004' => 'The company name becomes Aracruz Celulose S.A.',
	'2008' => 'Launching of the cornerstone of the Expansion Project up to 1.8 million metric tons annually.',
	'2009' => 'In October, signing of the commitment for selling Guaíba Unit from Aracruz Celulose to CMPC. On December 1st, operations as CMPC Celulose Riograndense begin.',
	'2015' => 'Start of Operations of the Second Pulp Production Line'
);



?>
<section class="container empresa historia">
	<h1 class="title"><?=lang('defualt_menu_historia'); ?></h1>

	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-empresa-historia.jpg'); ?>">

	<h2>História da CMPC</h2>

	<div class="descricao">
		A CMPC, pioneira na fabricação de celulose e papel no Chile, inciou suas atividades em 1920, quando entrou em atividade na cidade de Puente Alto. Hoje, é uma das principais empresas na área florestal na América Latina e está presente em mais de 50 países nos 5 continentes.
		<br><br>
		Com mais de 25 fábricas, conta com aproximadamente 8 mil colaboradores operando em 5 áreas de negócios, através das seguintes empresas: CMPC Florestal, CMPC Celulose, CMPC Papéis, CMPC Tissue e CMPC Produtos de Papel.
		<br><br>
		A Companhia possui fortes laços com seus mercados ao redor do mundo e tem uma rede de comercialização de exportação diversificada, que atinge mais de 200 clientes em 30 países.
		<br><br>
		A CMPC tem como premissa desenvolver um trabalho de maneira comprometida e responsável, através da geração de empregos, proporcionando rentabilidade aos seus acionistas, fabricando produtos de qualidade, educando e capacitando seus colaboradores e parceiros, sem nunca descuidar do meio ambiente.
		<br><br>
		No Brasil, iniciou suas operações em 2009, quando  a Unidade Guaíba da Aracruz Celulose assinou o compromisso de venda para a CMPC, originando assim, a CMPC Celulose Riograndense. Todos estes aspectos fazem da CMPC uma empresa desejada e muito respeitada em todos os países onde atua.
	</div>

	<h2>História da Celulose Riograndense</h2>

	<div class="time-line">
		<?php
		foreach($historia as $ano => $texto){
			echo '<h3>',$ano,'</h3><div class="descricao">',$texto,'</div><br>' . PHP_EOL;
		}
		?>
	</div>

	
	<div class="clear"></div>
</section>