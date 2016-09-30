</div>
<footer>
	<img class="incendioflorestal" src="<?=base_url('assets/img/incendioflorestal.png'); ?>">
	<div class="copy">
		<div class="container">
			<div class="col-sm-3">


				<div class="lang">
					<?php if($_SESSION['celulose_lang'] == 'english'){ ?>
					<a href="<?=site_url('lang?switch=brazilian&return=' . rawurlencode(current_url())); ?>" rel="brazilian"></a>
					<?php } else { ?>
					<a href="<?=site_url('lang?switch=english&return=' . rawurlencode(current_url())); ?>" rel="english"></a>
					<?php } ?>
				</div>

				<div class="lang">

					<a href="<?=site_url('lang?switch=brazilian&return=' . rawurlencode(current_url())); ?>" rel="brazilian">
						<?php if($_SESSION['celulose_lang'] == 'english'){ ?>
						<div class="select">
							<?php } else { ?>
							<div class=" active">
								<?php } ?>
								<img src="<?=base_url('assets/img/logo-pt.svg'); ?>"> 
							</div>
						</a>
						
						<a href="<?=site_url('lang?switch=english&return=' . rawurlencode(current_url())); ?>" rel="english">
							<?php if($_SESSION['celulose_lang'] != 'english'){ ?>
							<div class="select">
								<?php } else { ?>
								<div class=" active">
									<?php } ?>
									<img src="<?=base_url('assets/img/logo-eng.svg'); ?>"> 
								</div>
							</a>
						</div>


					</div>
					<div class="col-sm-5 mobile-hide redes">
						<a href="https://www.facebook.com/CeluloseRS" target="_blank" >
							<img src="<?=base_url('assets/img/logo-facebook.svg'); ?>">
						</a>
						<a href="" >
							<img src="<?=base_url('assets/img/logo-news.svg'); ?>">
						</a>
					</div>

					<div class="col-sm-4 info">

						Rua São Geraldo, 1680 <br>
						Guaíba, RS - Brasil 92500-000 <br>
						<strong>+55 51</strong> 2139-7211 <br>
						<div class="mobile-hide">
							<img src="<?=base_url('assets/img/logo-sm.svg'); ?>"> 
						</div>
						<a href="http://www.conjunto.com.br/" target="_blank">( conjunto )</a>
					</div>

				</div>

				<div class="border"></div>

			</div>
		</footer>

		<script type="text/javascript" src="<?=base_url('assets/js/jquery.js'); ?>"></script>
		<script type="text/javascript">var URL = {base: '<?=base_url(); ?>',site: '<?=site_url(); ?>',current: '<?=current_url(); ?>'};</script>
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&language=<?=getLangTerm(); ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/lang/'.getLangTerm().'.js'); ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/validate.js'); ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/mask.js'); ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/maps.js'); ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/slider.js'); ?>"></script>

		
		<script type="text/javascript" src="<?=base_url('assets/js/main.js'); ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/onload.js'); ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/plugins/menu.js'); ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/plugins/jquery.bxslider.js'); ?>"></script>

	</body>
	</html>