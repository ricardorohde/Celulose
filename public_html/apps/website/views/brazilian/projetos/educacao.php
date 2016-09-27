<?php

$municipios = array(
	array('nome' => 'Amaral Ferrador', 'cadernos' => 1600, 'folhas' => 22500),
	array('nome' => 'Arroio dos Ratos', 'cadernos' => 3280, 'folhas' => 35000),
	array('nome' => 'Bagé', 'cadernos' => 5920, 'folhas' => 20000),
	array('nome' => 'Barão do Triunfo', 'cadernos' => 1600, 'folhas' => 20000),
	array('nome' => 'Barra do Ribeiro', 'cadernos' => 3280, 'folhas' => 50000),
	array('nome' => 'Butiá', 'cadernos' => 3440, 'folhas' => 50000),
	array('nome' => 'Caçapava do Sul', 'cadernos' => 5280, 'folhas' => 20000),
	array('nome' => 'Cachoeira do Sul', 'cadernos' => 7680, 'folhas' => 30000),
	array('nome' => 'Candelária', 'cadernos' => 4480, 'folhas' => 20000),
	array('nome' => 'Camaquã', 'cadernos' => 9600, 'folhas' => 60000),
	array('nome' => 'Canguçu', 'cadernos' => 5280, 'folhas' => 22500),
	array('nome' => 'Cerro Grande do Sul', 'cadernos' => 1680, 'folhas' => 22500),
	array('nome' => 'Charqueadas', 'cadernos' => 5040, 'folhas' => 30000),
	array('nome' => 'Cristal', 'cadernos' => 1600, 'folhas' => 20000),
	array('nome' => 'Dom Feliciano', 'cadernos' => 3280, 'folhas' => 30000),
	array('nome' => 'Dom Pedrito', 'cadernos' => 6240, 'folhas' => 17500),
	array('nome' => 'Eldorado do Sul', 'cadernos' => 6240, 'folhas' => 60000),
	array('nome' => 'Encruzilhada do Sul', 'cadernos' => 6000, 'folhas' => 40000),
	array('nome' => 'General Câmara', 'cadernos' => 1600, 'folhas' => 37500),
	array('nome' => 'Guaíba', 'cadernos' => 15040, 'folhas' => 125000),
	array('nome' => 'Lavras do Sul', 'cadernos' => 2080, 'folhas' => 20000),
	array('nome' => 'Mariana Pimentel', 'cadernos' => 2080, 'folhas' => 20000),
	array('nome' => 'Minas do Leão', 'cadernos' => 1680, 'folhas' => 20000),
	array('nome' => 'Pantano Grande', 'cadernos' => 3280, 'folhas' => 30000),
	array('nome' => 'Porto Alegre', 'cadernos' => 15040, 'folhas' => 200000),
	array('nome' => 'Rio Grande', 'cadernos' => 20000, 'folhas' => 90000),
	array('nome' => 'Rio Pardo', 'cadernos' => 6000, 'folhas' => 30000),
	array('nome' => 'Rosário do Sul', 'cadernos' => 6000, 'folhas' => 20000),
	array('nome' => 'Santa Margarida do Sul', 'cadernos' => 1600, 'folhas' => 20000),
	array('nome' => 'Santana da Boa Vista', 'cadernos' => 2160, 'folhas' => 20000),
	array('nome' => 'São Gabriel', 'cadernos' => 9600, 'folhas' => 40000),
	array('nome' => 'São Jerônimo', 'cadernos' => 6000, 'folhas' => 30000),
	array('nome' => 'São José do Norte', 'cadernos' => 3520, 'folhas' => 30000),
	array('nome' => 'São Lourenço do Sul', 'cadernos' => 6000, 'folhas' => 30000),
	array('nome' => 'São Sepé', 'cadernos' => 3440, 'folhas' => 20000),
	array('nome' => 'Sentinela do Sul', 'cadernos' => 1600, 'folhas' => 20000),
	array('nome' => 'Sertão Santana', 'cadernos' => 1600, 'folhas' => 20000),
	array('nome' => 'Tapes', 'cadernos' => 3040, 'folhas' => 22500),
	array('nome' => 'Triunfo', 'cadernos' => 4400, 'folhas' => 22500),
	array('nome' => 'Vila Nova do Sul', 'cadernos' => 1600, 'folhas' => 20000)
);

$cadernos = 0;
$folhas = 0;
$tabelas = array_chunk($municipios, ceil(sizeof($municipios) / 2), true);

?>
<div class="projeto-educacao">
	<div class="green">
		<div class="container titulo">
			<h1>Projeto Educação<br>Celulose Riograndense</h1>
			<h2>Compromisso com o futuro do estado</h2>
			<img class="livros" src="<?=base_url('assets/img/projetos/educacao/livros.png'); ?>">
		</div>
	</div>
	<div class="container texto">
		Investir em uma das bases da sociedade é um compromisso sério para a Celulose Riograndense. A empresa doa, a cada ano letivo, em torno de 200 mil cadernos e 1,5 milhão de folhas A4 para a rede pública de ensino dos municípios de atuação florestal, auxiliando milhares de jovens a escrever um futuro ainda melhor.
	</div>
	<div class="green">
		<div class="container tabelas">
			<div class="barra">Veja quais municípios já receberam esse apoio</div>
			<br><br><br>
<?php
foreach($tabelas as $tabela){
	echo '<table class="lista"><tr><th></th><th width="75">Cadernos</th><th  width="75">Folhas</th></tr>';
	foreach($tabela as $i => $municipio){
		$cadernos += $municipio['cadernos'];
		$folhas += $municipio['folhas'];
		
		echo '
			<tr>
				<td class="municipio">',$municipio['nome'],'</td>
				<td>',number_format($municipio['cadernos'], 0, '.', '.'),'</td>
				<td>',number_format($municipio['folhas'], 0, '.', '.'),'</td>
			</tr>
		';
	}
	echo '</table>';
}

?>
			<br><br>
			<table>
				<tr>
					<th></th>
					<th>Cadernos</th>
					<th>Folhas</th>
				</tr>
				<tr>
					<td>Total</td>
					<td><?=number_format($cadernos, 0, '.', '.'); ?></td>
					<td><?=number_format($folhas, 0, '.', '.'); ?></td>
				</tr>
			</table>	
			<br><br><br>
		</div>
	</div>
</div>
