
<section class="contato-localizacao">
	<div class="container">
		<div class="col-md-offset-1 col-md-10">

			<h2><?=lang('defualt_menu_localizacao'); ?></h2>

			<p>
				CMPC Celulose Riograndense<br>
				Rua São Geraldo, 1680 Bairro Ermo<br>
				92500-000 Guaíba – RS<br>
				+55 51 2139.7211
			</p>

			<div class="google-maps" id="map"></div>

		</div>
	</div>
	<script type="text/javascript">
		

		function initMap() {
        // Create a map object and specify the DOM element for display.
        var ponto = gm.position('-30.13402','-51.3193055');
        var map = new google.maps.Map(document.getElementById('map'), {
        	center: {lat: -30.13402, lng: -51.3193055},
        	scrollwheel: false,
        	zoom: 14
        });
        var marker = new google.maps.Marker({
      position: ponto,//seta posição
      map: map,//Objeto mapa
      title:'CMPC Celulose Riograndense',//string que será exibida quando passar o mouse no marker
      icon: 'assets/img/pin.png'
  });
        
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgqgwPglGmVFBkLEdiLBfn_WhDo26DAzA&callback=initMap"
async defer></script>
</section>