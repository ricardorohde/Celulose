<?php
	$this->load->view(getLang().'/responsabilidade/aba');
?>
<section class="container responsabilidade-empregos">
	<h1 class="title"><?=lang('defualt_menu_empregos'); ?></h1>

	<img class="banner" alt="" src="<?=base_url('assets/img/banners/banner-responsabilidade-empregos.jpg'); ?>">

	<div class="texto">
		The implementation of all activities related to forestal management occurs through permanent contracts with service providers managed by the technical team of Celulose Riograndense. The settlement of work force poles is done based in a series of technical analyses on operational feasibility, once it is not feasible to have a work team located in each one of the 39 municipalities where the company has managed planting in.
	</div>

	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<td colspan="4">Service Providers/td>
				<td colspan="4">Owns*</td>
			</tr>
			<tr>
				<th>City of Manning</th>
				<th>Male</th>
				<th>Female</th>
				<th>Total</th>
				<th>&nbsp;</th>
				<th>Male</th>
				<th>Female</th>
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
		<small>Last update: <?=date("m/Y", $ltime); ?></small>
	</center>
	<br>

	<div class="clear"></div>
</section>