<!DOCTYPE html>
<html>
<?php require 'shared/head.php'; ?>
<body>
<?php require 'shared/navbar.php'; ?>
<div class="container">
	<div class="bs-docs-section">
	<div class="row">
		<div class="main col-md-12">

			<!-- page start -->
			<h1 class="page-header">Add a Building</h1>
			<p>Add a building to the database <span class="error">* required</span></p>

			<!-- Registration form -->
			<div class="well col-md-8 col-md-offset-2">
			<form action="" method="post" class="form-horizontal">	            

				<!--first name-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Building Name:
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="bname" value="<?php echo $_SESSION['bname'];?>">
					</div>
				</div>

				<div class="building-select">
					<div id="small-map"></div>
					<input id="lat" type="hidden" name="latitude">
					<input id="lon" type="hidden" name="longitude">
				</div>
				<script type="text/javascript">
					L.mapbox.accessToken = 'pk.eyJ1IjoiYXliY2hhbiIsImEiOiJaNlV1dlBVIn0.PtSa8Vmur7aYb0jxUfANgA';
					var map = L.mapbox.map('small-map', 'aybchan.lmmiljek');
					map.setView([53.4060706, -2.9661172], 16);
					$.getJSON('<?php echo $assetUrl; ?>geojson/buildings.geojson', function (data) {
						map.featureLayer.setGeoJSON(data);
					});
					var marker;
					map.on('click', function(e) {
						if (marker) map.removeLayer(marker);
						marker = L.marker(e.latlng, {
								icon: L.mapbox.marker.icon({
								'marker-size': 'large',
								'marker-symbol': 'building',
								'marker-color': '#158cba'
							})
						});
						marker.addTo(map);
						$("#lat").val(e.latlng.lat);
						$("#lon").val(e.latlng.lng);
					});
				</script>

				<!--submit form-->
				<input class="col-sm-offset-2 btn btn-primary" type="submit">
			</form>
			<!-- end of registration form -->
			</div>
			<!-- page end -->

		</div>
	</div>
	</div>
</div>
<?php require 'shared/footer.php'; ?>
</body>
</html>