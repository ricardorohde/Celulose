
<div class="banner">
	<img alt="" src="<?=base_url('assets/img/banners/banner-empresa.jpg'); ?>">
</div>

<section class="empresa">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">


			<section id="sobre">

				<h2><?=lang('defualt_menu_sobre'); ?></h2>

				<p>A Celulose Riograndense, parte do grupo CMPC, é uma empresa gaúcha presente no mercado internacional de celulose de fibra curta de eucalipto. Ela conta com uma fábrica no município de Guaíba que ocupa hoje uma área de 106 hectares e investe no cultivo de florestas como fonte de suprimento de matéria-prima sustentável, a fim de produzir riquezas para o estado do Rio Grande do Sul e seus cidadãos. </p>

				<p>Para a Celulose Riograndense, crescer com os gaúchos é mais que uma prioridade, é um compromisso. Um compromisso com quem trabalha na empresa, com os cidadãos de Guaíba e com aqueles que fazem do solo riograndense um lugar melhor para viver.</p>


				<h3>Diferenciais</h3>

<!-- 				<p>	99,7% dos resíduos resultantes do processo de fabricação da celulose são reciclados.</p>


				<h4>Avançado tratamento de efluentes</h4>
				<p>
					O que torna uma das poucas fábricas no mundo com esta estrutura.
				</p>

				<h4>Mínimo impacto</h4>
				<p>
					Na devolução do efluente tratado ao lago Guaíba.
				</p>

				<h4>Cogeração de energia</h4>
				<p>
					80% da energia necessária para produção da celulose é gerada pela própria fábrica.
				</p> -->
				<div class="diferencial">
					<div class="col-md-offset-1 col-md-10">
						<?php for ($i=1; $i <= 4; $i++) { ?>


						<div class="col-xs-6 col-sm-3">
							<div class="item">
								<div class="content">

									<img src="<?=base_url('assets/img/brazilian/diferencial'.$i.'.jpg'); ?>" alt="">

								</div>
							</div>

						</div>

						<?php } ?>
					</div>
					
				</div>

				<h3>Processos de Fabricação</h3>

				<h4>Geração de Energia</h4>
				<p>
					A empresa gera energia para seu uso a partir de resíduos do processo de produção da celulose. Estes resíduos são queimados
					em uma caldeira e o vapor produzido faz as turbinas funcionarem. Assim, temos vapor e energia elétrica para suprir as necessidades
					da fábrica. A produção interna de energia poderia atender uma cidade de 200 mil habitantes.
				</p>

				<h4>Plantas Químicas</h4>
				<p>
					Boa parte dos produtos químicos utilizados pela Celulose Riograndense são produzidos internamente. O excedente é vendido ao mercado para os setores de tratamento de água, produtos de limpeza, plásticos, borrachas e setor alimentício.
				</p>

				<h4>Tratamento de Efluentes</h4>
				<p>
					A água para o processo de produção de celulose vem do Lago Guaíba. Depois de sua utilização, ela passa pelos tratamentos primário, secundário e terciário para ser novamente devolvida ao lago. A Celulose Riograndense foi pioneira na utilização desta tecnologia e, hoje, dentre as mais de mil fábricas de celulose presentes no mundo, menos de dez utilizam esta inovação, o que garante uma excelente qualidade ao efluente. O lodo gerado nesta planta passa por um processo de compostagem para ser, posteriormente, vendido ao mercado como fertilizante orgânico, substituindo o uso da terra preta retirada de banhados e matas.
				</p>

				<h4>Papel</h4>
				<p>
					A Celulose Riograndense dispõe de uma unidade de produção de papéis com capacidade de gerar 60 mil toneladas por ano, que atende um mercado diversificado nos segmentos de impressão e escrita.
				</p>

				<div class="col-md-offset-2 col-md-8">
					<div class="esquema">
						<img alt="" src="<?=base_url('assets/img/'.getLang().'/esquema.png'); ?>"> 
					</div>
				</div>

			</section>




			<section class="valores">
				<h2 class="title"><?=lang('defualt_menu_valores'); ?></h2>

				<h3>Missão</h3>
				<p>
					Ofertar produtos obtidos de forma sustentável a partir de florestas plantadas, gerando benefícios econômicos, sociais e ambientais, contribuindo desta forma para o bem-estar e a qualidade de vida das pessoas.
				</p>

				<h3>Visão</h3>
				<p>
					Ser reconhecida como produtora mundial de celulose e papel, pela excelência na operação de seus processos e pelo respeito às suas partes interessadas.
				</p>

				<h3>Política do Sistema de Gestão</h3>
				<p>
					A CMPC Celulose Riograndense, fornecedora no mercado mundial de celulose branqueada de eucalipto e de papel para impressão e escrita, considera que a qualidade de seus produtos e de seus serviços, providos por meio da operação e gestão sustentável de seu negócio, são fundamentais para assegurar retorno aos acionistas a partir de:
					<ul>
						<li>Fornecimento de produtos e serviços voltados às necessidades dos clientes;</li>
						<li>Gestão orientada pela excelência operacional focada em resultados com melhoria contínua;</li>
						<li>Uso sustentável dos recursos naturais e operações com impactos ambientais minimizados por meio de ações de prevenção e controle;</li>
						<li>Atendimento à legislação, normas e compromissos assumidos formalmente pela empresa;</li>
						<li>Relacionamento ético e comunicação transparente com as partes interessadas;</li>
						<li>Promoção de um ambiente de trabalho motivador, com elevados padrões de saúde e segurança;</li>
						<li>Pessoas capacitadas, motivadas e aptas a atuar eficazmente conforme as estratégias da empresa;</li>
						<li>Desenvolvimento e aplicação de tecnologias que garantam inovação e competitividade.</li>
					</ul>
				</p>
				<div class="clear"></div>
			</section>




			<section class="certificacoes">
				<h2><?=lang('defualt_menu_certificacoes'); ?></h2>


				<ul>
					<li>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<img src="<?=base_url('assets/img/thumbs/img-iso-9001-2008.jpg'); ?>">
							<h5>ISO 9001:2008</h5>
							<div class="texto">Esta norma traz um conjunto de requisitos orientados para o controle dos processos produtivos da empresa, de modo a garantir a previsibilidade de resultados e a satisfação dos clientes. A mais famosa das certificações é um controle que julga as normas técnicas de uma empresa para atestar sua qualidade.</div>
							<div class="links">
								<a href="<?=site_url('docs/dl/iso-9001-2008.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
							</div>
						</div>
					</li>
					<li>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<img src="<?=base_url('assets/img/thumbs/14790-2014.jpg'); ?>">
							<h5>NBR 14790:2014</h5>
							<div class="texto">A norma NBR 14.790 é uma série que traz alguns requisitos de rastreabilidade para assegurar que as matérias-primas que constituem o produto final (celulose e papel) sejam oriundas de uma plantação florestal certificada de acordo com os requisitos da NBR 14.789.</div>
							<div class="links">
								<a href="<?=site_url('docs/dl/14790-2014.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
							</div>
						</div>
					</li>
					<li>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<img src="<?=base_url('assets/img/thumbs/img-nbr-14789-2012.jpg'); ?>">
							<h5>NBR 14789:2012</h5>
							<div class="texto">A NBR 14.789 reúne cinco Princípios para condução do Manejo Florestal focado na busca da sustentabilidade. Estes princípios são desdobrados em critérios e indicadores para gestão das plantações florestais e abrangem o cumprimento de toda a legislação ambiental e trabalhista; o uso racional dos recursos naturais, o zelo pela diversidade biológica, o controle dos impactos ambientais e o esforço em prol do desenvolvimento sócio-econômico das regiões onde a atividade é desenvolvida.</div>
							<div class="links">
								<a href="<?=site_url('docs/dl/nbr-14789-2012-br.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
							</div>
						</div>
					</li>
					<li>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<img src="<?=base_url('assets/img/thumbs/img-iso-14001-2004.jpg'); ?>">
							<h5>ISO 14001:2004</h5>
							<div class="texto">A ISO 14.001 tem seu foco na identificação dos aspectos e impactos ambientais dos processos produtivos, determinando que a empresa defina uma Política de Gestão Ambiental e mecanismos para prevenção e mitigação de impactos.</div>
							<div class="links">
								<a href="<?=site_url('docs/dl/iso-14001-2004.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
							</div>
						</div>
					</li>
					<li>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<img src="<?=base_url('assets/img/thumbs/img-poli-compra-madeira.jpg'); ?>">
							<h5>Política de compra de madeira</h5>
							<div class="texto">A CMPC Celulose Riograndense, preocupada em assegurar, de todas as formas, a origem da matéria-prima utilizada em seus processos produtivos, estabeleceu uma Política para Compra de Madeira.</div>
							<div class="links">
								<a href="<?=site_url('docs/dl/poli-compra-madeira.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
							</div>
						</div>
					</li>

					<li>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<img src="<?=base_url('assets/img/thumbs/compromisso-com-a-cadeia-de-custodia.jpg'); ?>">
							<h5>Cadeia de Custódia</h5>
							<div class="texto">A CMPC Celulose Riograndense utiliza somente madeira oriunda de plantios próprios e/ou de produtores independentes, obedecendo aos requisitos da Norma ABNT NBR 14789 - Manejo Florestal e ABNT NBR 14790 - Cadeia de Custódia.</div>
							<div class="links">
								<a href="<?=site_url('docs/dl/compromisso-com-a-cadeia-de-custodia.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
							</div>
						</div>
					</li>

					<li>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<img src="<?=base_url('assets/img/thumbs/compromisso-com-a-cadeia-de-custodia.jpg'); ?>">
							<h5>Política Florestal da CMPC</h5>
							<div class="texto"></div>
							<div class="links">
								<a href="<?=site_url('docs/dl/politica-florestal-da-cmpc.pdf'); ?>"><?=lang('defualt_download_pdf'); ?></a>
							</div>
						</div>
					</li>

				</ul>

				<div class="clear"></div>
			</section>



			<section class="cmpc">
				<h2><?=lang('defualt_menu_cmpc'); ?></h2>


				<p>
					Fundada no ano de 1920, a CMPC é pioneira no Chile na fabricação de celulose e papel. Trata-se de uma das principais empresas na área florestal na América Latina e está presente em mais de 50 países nos 5 continentes.
				</p>
				<p>
					Com mais de 25 fábricas, conta com aproximadamente 8 mil colaboradores operando em 5 áreas de negócios, através das seguintes empresas: CMPC Florestal, CMPC Celulose, CMPC Papéis, CMPC Tissue e CMPC Produtos de Papel.
				</p>
				<p>
					A Companhia possui fortes laços com seus clientes ao redor do mundo e tem uma rede de comercialização de exportação diversificada que atinge mais de 200 clientes em 30 países.
				</p>
				<p>
					A CMPC tem como premissa desenvolver um trabalho de maneira comprometida e responsável, através da geração de empregos, proporcionando rentabilidade aos seus acionistas, fabricando produtos de qualidade, educando e capacitando seus colaboradores e parceiros, sem nunca descuidar do meio ambiente.
				</p>
				<p>
					Todos estes aspectos fazem da CMPC uma empresa desejada e muito respeitada em todos os países onde atua.
				</p>
				

				<div class="clear"></div>
			</section>
			



			<section class="guaiba2">

				<h2><?=lang('defualt_menu_projeto_guaiba2'); ?></h2>
				
				<div class="col-md-6">
					<h3>A melhor parte de um projeto é quando ele sai do papel e torna-se realidade.</h3>
					<p>
						O Projeto Guaíba2 ampliou significativamente a produção de celulose
						(de 450 mil para 1,75 milhão de toneladas por ano). Gerou mais de 24 mil postos de trabalhos diretos e indiretos, além do compromisso ambiental de funcionar com 100% de energia própria, permitindo ainda a comercialização de seu excedente, estimado em 30.000 kW.
						O investimento foi um recorde no Rio Grande do Sul, e transformou o projeto de vida de milhares de gaúchos em uma realidade mais próspera e cheia de alegrias.
					</p>
				</div>

				<div class="col-md-6">
					<img src="<?=base_url('assets/img/guaiba2.jpg'); ?>">
				</div>

			</section>




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
				<section class="historia">
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
					<div class="clear"></div>
				</section>






			</div>
		</div>
	</section>