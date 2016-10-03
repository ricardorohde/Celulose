<a id="linkSliderFix">
	<div class="container">
		<ul class="nivo-controlNav"></ul>
	</div>
</a>
<div id="box">

</div>
<section class="slider">
	<div id="slider" class="nivoSlider">
		<?php
		$i = 0;
		foreach($slider as $rows){
			echo '<img rel="',$i++,'" src="',$rows->src,'" data-title="',$rows->legenda,'" data-url="',$rows->link,'" data-target="',$rows->target,'">' . PHP_EOL;
		}
		?>
	</div>
	<script type="text/javascript">
		
		$('#slider').nivoSlider();

	</script>
</section>
<section id="home">
	<div class="container">

		<div class="col-md-offset-1 col-md-10">
			<div class="row">
				<div class="noticias">
					<h2>Noticias</h2>

					<?php
					$i = 1;
					foreach($noticias as $rows){
						echo'<div class="col-xs-6 col-md-3">
							<div class="row">
								<a href="',$rows['link'],'" class="thumbnail">
									<img src="',$rows['img'],'" alt="',$rows['titulo'],'">
								</a>
							</div>
						</div>';

						
					}
					?>

				</div>

				<div class="projetos-sociais">
					<h2>Projetos Sociais</h2>
				</div>

				
			</div>
		</div>
	</div>
</section>

