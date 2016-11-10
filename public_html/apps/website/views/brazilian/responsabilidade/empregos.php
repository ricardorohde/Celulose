
<div class="banner">
	<img alt="" src="<?=base_url('assets/img/banners/banner-responsabilidade-empregos.jpg'); ?>">
</div>

<section class="responsabilidade-empregos">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">
			<h2><?=lang('defualt_menu_empregos'); ?></h2>



			<p>
				A implementação de todas as atividades relativas ao Manejo Florestal se dá através de contratos permanentes com prestadores de serviços gerenciados pela equipe técnica da Celulose Riograndense. O estabelecimento de polos de mão-de-obra se dá com base em uma série de análises técnicas de viabilidade operacional, uma vez que não é viável ter uma equipe de trabalho locada em cada um dos 39 municípios onde há plantios manejados pela empresa.
			</p>
			
			
			<table class="table table-responsive" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<td class="col-md-8" colspan="4">Prestadores de Serviços</td>
						<td class="col-md-4" colspan="4">Próprios*</td>
					</tr>
					<tr>
						<th class="col-xs-3">Município de Lotação</th>
						<th class="col-xs-1">Masculino</th>
						<th class="col-xs-1">Feminino</th>
						<th class="col-xs-2">Total</th>
						<th class="col-xs-1">&nbsp;</th>
						<th class="col-xs-1">Masculino</th>
						<th class="col-xs-1">Feminino</th>
						<th class="col-xs-2">Total</th>
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
							<td align="left">',$rows->municipio,'</td>
							<td>',($rows->masculino == 0 ? ' -- ' : $rows->masculino),'</td>
							<td class="col-xs-1">',($rows->feminino == 0 ? ' -- ' : $rows->feminino),'</td>
							<td class="col-xs-2">',$auxTotalOne,'</td>
							<td class="col-xs-1">&nbsp;</td>
							<td class="col-xs-1">',($rows->pmasculino == 0 ? ' -- ' : $rows->pmasculino),'</td>
							<td class="col-xs-1">',($rows->pfeminino == 0 ?' -- ' : $rows->pfeminino),'</td>
							<td class="col-xs-2">',$auxTotalTwo,'</td>
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

		</div>
	</div>
	<div class="clear"></div>
</section>