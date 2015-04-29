
<!DOCTYPE html>
<html>
<?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
	<div class="container">
		<h1 class="page-header">Campus Map</h1>
		<div id="large-map"></div>
	</div>
	<script type="text/javascript">
		$('#large-map').height($(window).height() - 280);
    L.mapbox.accessToken = 'pk.eyJ1IjoiYXliY2hhbiIsImEiOiJaNlV1dlBVIn0.PtSa8Vmur7aYb0jxUfANgA';
    var map = L.mapbox.map('large-map', 'aybchan.lmmiljek');
    map.setView([53.4060706, -2.9661172], 25);
    map.featureLayer.on('click', function(e) {
      map.panTo(e.layer.getLatLng());
    });
	</script>
	<?php require 'shared/footer.php' ?>
  </body>
</html>
