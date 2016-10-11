
<div class="banner">
	<img alt="" src="<?=base_url('assets/img/banners/banner-empresa.jpg'); ?>">
</div>


<section id="sobre">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">


			

			<h2><?=lang('defualt_menu_sobre'); ?></h2>

			<p>A Celulose Riograndense, parte do grupo CMPC, é uma empresa gaúcha presente no mercado internacional de celulose de fibra curta de eucalipto. Ela conta com uma fábrica no município de Guaíba que ocupa hoje uma área de 106 hectares e investe no cultivo de florestas como fonte de suprimento de matéria-prima sustentável, a fim de produzir riquezas para o estado do Rio Grande do Sul e seus cidadãos. </p>

			<p>Para a Celulose Riograndense, crescer com os gaúchos é mais que uma prioridade, é um compromisso. Um compromisso com quem trabalha na empresa, com os cidadãos de Guaíba e com aqueles que fazem do solo riograndense um lugar melhor para viver.</p>


			<h3>Diferenciais</h3>

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

			<div class="col-sm-12">
				<div class="esquema">
					<img alt="" src="<?=base_url('assets/img/'.getLang().'/esquema.png'); ?>"> 
				</div>
			</div>
			
		</div>
	</div>
</section>