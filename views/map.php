
<!DOCTYPE html>
<html>
<?php require 'shared/head.php';?>
	<head>
		<meta charset=utf-8 />
    <title>A simple map</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox.js/v2.1.8/mapbox.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox.js/v2.1.8/mapbox.css' rel='stylesheet' />
	</head>	

  <style>
      body { margin:0; padding:0; }
      #map { position:absolute; top:7%; bottom:0; width:100%; }
  </style>

  <body>
    <?php require 'shared/navbar.php';?>

    <div id='map'></div>
      <script>
        L.mapbox.accessToken = 'pk.eyJ1IjoiYXliY2hhbiIsImEiOiJaNlV1dlBVIn0.PtSa8Vmur7aYb0jxUfANgA';
        var map = L.mapbox.map('map', 'aybchan.lmmiljek');
        map.layer.openPopup();
            map.addControl(L.mapbox.geocoderControl('mapbox.places'));
            map.setView([53.405, -2.966], 15);
            map.featureLayer.on('click', function(e) {
              map.panTo(e.layer.getLatLng());
        });


      </script>
    </div>
  </body>
</html>
