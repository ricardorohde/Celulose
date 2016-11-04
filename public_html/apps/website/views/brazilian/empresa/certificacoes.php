<section id="certificacoes">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">
			<div class="row">
			<h2><?=lang('defualt_menu_certificacoes'); ?></h2>

			<ul>
				
				<?php foreach($certificacoes as $row){ ?>

				<li>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<div class=" item">
							<div class="col-sm-4">
								<div class="row">
									
									<img src="<?=base_url('assets/img/thumbs/'.$row->img); ?>">
									<div class="pdf">
										<a href="<?=site_url('docs/dl/'.$row->link); ?>"><?=lang('defualt_download_pdf'); ?></a>
										
									</div>
								</div>
							</div>

							<div class="col-sm-8">
								
									<h5> <?= $row->nome; ?></h5>
									<p> <?= $row->texto; ?></p>

								
							</div>
						</div>
					</div>
				</li>

				<?php } ?>
			</ul>
</div>
			<div class="clear"></div>
		</div>
	</div>
</section>
