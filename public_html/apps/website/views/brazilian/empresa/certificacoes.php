<section id="certificacoes">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">
			<h2><?=lang('defualt_menu_certificacoes'); ?></h2>

			<ul>
				
				<?php foreach($certificacoes as $row){ ?>

				<li>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<div class="row">
							<div class="col-sm-4">
								<div class="row">
									
									<img src="<?=base_url('assets/img/thumbs/'.$row->img); ?>">
									
									
									<a class="pdf" href="<?=site_url('docs/dl/'.$row->link); ?>"><?=lang('defualt_download_pdf'); ?></a>

								</div>
							</div>

							<div class="col-sm-8">
								<div class="row">
									<h5> <?= $row->nome; ?></h5>
									<p> <?= $row->texto; ?></p>

								</div>
							</div>
						</div>
					</div>
				</li>

				<?php } ?>
			</ul>

			<div class="clear"></div>
		</div>
	</div>
</section>
