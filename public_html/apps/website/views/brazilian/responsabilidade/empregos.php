
<section class="container responsabilidade-empregos">
	<h1 class="title"><?=lang('defualt_menu_empregos'); ?></h1>

	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-responsabilidade-empregos.jpg'); ?>">

	<div class="texto">
		A implementação de todas as atividades relativas ao Manejo Florestal se dá através de contratos permanentes com prestadores de serviços gerenciados pela equipe técnica da Celulose Riograndense. O estabelecimento de polos de mão-de-obra se dá com base em uma série de análises técnicas de viabilidade operacional, uma vez que não é viável ter uma equipe de trabalho locada em cada um dos 39 municípios onde há plantios manejados pela empresa.
	</div>

	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<td colspan="4">Prestadores de Serviços</td>
				<td colspan="4">Próprios*</td>
			</tr>
			<tr>
				<th>Município de Lotação</th>
				<th>Masculino</th>
				<th>Feminino</th>
				<th>Total</th>
				<th>&nbsp;</th>
				<th>Masculino</th>
				<th>Feminino</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>

<?php
$totalOne = 0;
$totalTwo = 0;
$masculino = 0;
$feminino = 0;
$pmasculino = 0;
$pfeminino = 0;
$ltime = 0;

foreach($lista as $rows){
	$auxTotalOne = $rows->masculino + $rows->feminino;
	$auxTotalTwo = $rows->pmasculino + $rows->pfeminino;

	$totalOne += $auxTotalOne;
	$totalTwo += $auxTotalTwo;
	$masculino += $rows->masculino;
	$feminino += $rows->feminino;
	$pmasculino += $rows->pmasculino;
	$pfeminino += $rows->pfeminino;

	if($ltime < $rows->ltime) $ltime = $rows->ltime;

	echo '
		<tr>
			<td align="left" class="title">',$rows->municipio,'</td>
			<td>',($rows->masculino == 0 ? ' -- ' : $rows->masculino),'</td>
			<td>',($rows->feminino == 0 ? ' -- ' : $rows->feminino),'</td>
			<td>',$auxTotalOne,'</td>
			<td>&nbsp;</td>
			<td>',($rows->pmasculino == 0 ? ' -- ' : $rows->pmasculino),'</td>
			<td>',($rows->pfeminino == 0 ?' -- ' : $rows->pfeminino),'</td>
			<td class="last">',$auxTotalTwo,'</td>
		</tr>		
	';
}

$total = ($totalOne + $totalTwo);

?>
		</tbody>
		<tfoot>
			<tr>
				<th align="left">Subtotal:</th>
				<th><?=number_format($masculino,0,',','.'); ?></th>
				<th><?=number_format($feminino,0,',','.'); ?></th>
				<th><?=number_format($totalOne,0,',','.'); ?></th>
				<th>&nbsp;</th>
				<th><?=number_format($pmasculino,0,',','.'); ?></th>
				<th><?=number_format($pfeminino,0,',','.'); ?></th>
				<th><?=number_format($totalTwo,0,',','.'); ?></th>
			</tr>
			<tr>
				<td align="left">Total:</td>
				<td align="right" colspan="7"><?=number_format($total,0,',','.'); ?></td>
			</tr>
		</tfoot>
	</table>

	<center>
		<small>Última atualização: <?=date("m/Y", $ltime); ?></small>
	</center>
	<br>

	<div class="clear"></div>
</section>