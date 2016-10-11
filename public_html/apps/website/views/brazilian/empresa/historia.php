<?php

$historia = array(
	'15 de Março de 1966' => 'Constituição da Indústria de Celulose Borregaard S.A., que propõe-se a fornecer matéria-prima vegetal renovável para uma fábrica do grupo localizada na Noruega.',
	'1968' => 'A Borregaard tem seu primeiro plantio de eucaliptos, executado pela comissão técnica da Noreno do Brasil.',
	'Década de 70' => 'A Borregaard compra a Fazenda Barba Negra, no município de Barra do Ribeiro, com mais de 10 mil hectares, para formação de florestas',
	'16 de março de 1972' => 'A Borregaard inaugura oficialmente a planta industrial de Guaíba.',
	'1974' => 'Interrupção na produção durante o período de 100 dias, para instalação de avançados equipamentos tecnológicos com a finalidade de reduzir as emissões oriundas do processo fabril.',
	'Julho de 1975' => 'Controle acionário assumido pelo Sulbrasileiro/MFM.',
	'23 de dezembro de 1975' => 'A empresa passa a se chamar Rio Grande Companhia de Celulose do Sul – Riocell.',
	'Novembro de 78' => 'Assumem dois novos acionistas, BNDES e Banco do Brasil.',
	'10 de março de 1982' => 'Nova alteração da razão social. A equipe passa a se chamar Riocell S.A. e é comandada pela holding KIV Participações, formada por Klabin, Iochpe e Votorantim.',
	'Março 1982' => 'Início de Operação “Fábrica Nova” – Uma caldeira nova (carvão), uma unidade de branqueamento, uma máquina de secar celulose, uma unidade de produção de dióxido de cloro.',
	'Dezembro 1985' => 'Concedida aprovação – Compra da Unidade de Produção de Papel do Grupo De Zorzi.',
	'Março de 1990' => 'Montagem de uma unidade de deslignificação.',
	'Abril 1992' => 'Montagem de uma unidade de Produção de Cloro Soda.',
	'Janeiro de 1993' => 'Conquista da certificação ISO 9002.',
	'outubro de 1995' => 'Iochpe aliena a totalidade de suas ações para os fundos de previdência privada PREVI (Banco do Brasil) e PETROS (Petrobrás).',
	'Dezembro de 1996' => 'Recebimento da certificação ISO 14.001.',
	'Maio de 2000' => 'A razão social muda para Klabin Riocell S. A.',
	'Outubro de 2000' => 'Klabin integraliza 100% do controle da empresa.',
	'2002' => 'Em razão da classificação por ramo de negócio, a empresa passa a integrar o segmento Celulose da Klabin S. A.',
	'Maio 2002' => 'Projeto Riocell 2000 – Instalação de uma nova CR, Evaporação e melhorias generalizadas nas áreas Ambiental e Produção de 300 para 400.000t',
	'30 de maio de 2003' => 'Grupo Klabin anuncia venda da Riocell para a Aracruz Celulose',
	'02 de julho de 2003' => 'Aracruz Celulose assume a Riocell S. A.',
	'01 de janeiro de 2004' => 'A denominação da empresa passa a ser Aracruz Celulose S. A.',
	'24 de agosto de 2008' => 'Lançamento da pedra fundamental do projeto de expansão.',
	'08 de outubro de 2009' => 'Assinatura do compromisso de venda da Unidade Guaíba entre Aracruz Celulose e CMPC',
	'01 de dezembro de 2009' => 'Inicio das operações como CMPC Celulose do Brasil Ltda e, mais adiante, mudança da razão social para CMPC Celulose Riograndense Ltda',
	'Julho de 2013' => 'Início das obras do Projeto Guaíba 2, que elevará a produção de 450 mil toneladas por ano para 1,75 milhão de toneladas anuais de celulose de fibra curta de mercado.',
	'Agosto de 2013' => 'Lançamento da Pedra Fundamental do Projeto Guaíba 2',
	'03 de maio de 2015' => 'Inicio das operações da segunda linha de produção de celulose.'
	);



	?>
	<section id="historia">
		<div class="container">
			<div class="col-md-offset-1 col-md-10">
				<h2><?=lang('defualt_menu_historia'); ?></h2>

				<p>
					A CMPC, pioneira na fabricação de celulose e papel no Chile, iniciou suas atividades em 1920, quando entrou em atividade na cidade de Puente Alto. Hoje, é uma das principais empresas na área florestal na América Latina e está presente em mais de 50 países nos 5 continentes.
				</p>
				<p>
					Com mais de 25 fábricas, conta com aproximadamente 8 mil colaboradores operando em 5 áreas de negócios, através das seguintes empresas: CMPC Florestal, CMPC Celulose, CMPC Papéis, CMPC Tissue e CMPC Produtos de Papel.
				</p>
				<p>
					A Companhia possui fortes laços com seus mercados ao redor do mundo e tem uma rede de comercialização de exportação diversificada, que atinge mais de 200 clientes em 30 países.
				</p>
				<p>
					A CMPC tem como premissa desenvolver um trabalho de maneira comprometida e responsável, através da geração de empregos, proporcionando rentabilidade aos seus acionistas, fabricando produtos de qualidade, educando e capacitando seus colaboradores e parceiros, sem nunca descuidar do meio ambiente.
				</p>
				<p>
					No Brasil, iniciou suas operações em 2009, quando  a Unidade Guaíba da Aracruz Celulose assinou o compromisso de venda para a CMPC, originando assim, a CMPC Celulose Riograndense. Todos estes aspectos fazem da CMPC uma empresa desejada e muito respeitada em todos os países onde atua.
				</p>

				<h2>História da Celulose Riograndense</h2>

				<div class="time-line">
					<?php
					foreach($historia as $ano => $texto){
						echo '<h3>',$ano,'</h3><p>',$texto,'</p>' . PHP_EOL;
					}
					?>
				</div>
			</div>
		</div>
		
	</section>