
<!DOCTYPE html>
<html>
<?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
	<div class="container">
		<h1 class="page-header">Campus Map</h1>
		<div id='map'></div>
	</div>
	<script type="text/javascript">
		$('#map').height($(window).height() - $('nav').height() - $('footer').height());
        L.mapbox.accessToken = 'pk.eyJ1IjoiYXliY2hhbiIsImEiOiJaNlV1dlBVIn0.PtSa8Vmur7aYb0jxUfANgA';
        var map = L.mapbox.map('map', 'aybchan.lmmiljek');
        map.layer.openPopup();
            map.addControl(L.mapbox.geocoderControl('mapbox.places'));
            map.setView([53.405, -2.966], 15);
            map.featureLayer.on('click', function(e) {
              map.panTo(e.layer.getLatLng());
        });
	</script>
	<?php require 'shared/footer.php' ?>
  </body>
</html>
