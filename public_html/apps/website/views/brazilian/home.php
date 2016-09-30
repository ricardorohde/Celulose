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
		<div class="noticias">
			<h2>Noticias</h2>
		</div>
	</div>
</section>

