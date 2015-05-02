
<!DOCTYPE html>
<html>
<?php require 'shared/head.php';?>

  <body>
    <?php require 'shared/navbar.php';?>

    <div class="container">
      <div class="well col-md-9 col-md-offset-1">
        <h1><?php echo $event->title;?></h1>
			<?php echo $event->getBuildingName(). ' - ' . $event->getRoomName();?>
				<h5><?php echo date('l jS F, Y', strtotime($event->start_time)) ;?></h5>
				<h5><?php echo date('g:ia', strtotime($event->start_time)) . ' - ' . date('g:ia', strtotime($event->end_time));?></h5>
        <div class="panel panel-default">
          <div class="panel-body">
            <img src="http://www.awi.de/typo3temp/pics/d2c0282da7.jpg"/>
            <p><small>A Global Positioning System (GPS) deployed in remote West Antarctica for the purpose of measuring the motion of its bedrock. The bedrock is responding to past and present changes in the weight of ice upon it. Credit: Matt Burke</small></p>
          </div>
        </div>

        <div class="panel panel-primary">
					<!--title-->
					<div class="panel-heading">
            <h3 class="panel-title">Event details</h3>
					</div>
					<!--description-->
					<div class="panel-body">
            <?php echo $event->description?>
          </div>
        </div>

        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Attending this event</h3>
          </div>
          <div class="panel-body">
            This event is free to attend and open to all. No tickets are required. Doors open at 6pm and seats will be allocated on a first-come, first-served basis.

            We have a limited number of spaces for wheelchair uses and ten bookable seats for visitors with impaired mobility who are unable to queue. To book one of these spaces, please contact the events team. Further information about accessibility is available.

            If you require British Sign Language (BSL) interpretation please contact the events team no later than 2 weeks prior to the event and we would be happy to arrange an interpreter.

            A live video will be available on this page when the event starts and a recorded video will be available a few days after the event.
          </div>
        </div>

        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Location</h3>
          </div>
          <div class="panel-body">
            <?php if (isset($building->longitude) && isset($building->latitude)): ?>
            <div id="small-map">
            </div>
            <script type="text/javascript">
              L.mapbox.accessToken = 'pk.eyJ1IjoiYXliY2hhbiIsImEiOiJaNlV1dlBVIn0.PtSa8Vmur7aYb0jxUfANgA';
              var map = L.mapbox.map('large-map', 'aybchan.lmmiljek');
              var location = [<?php echo $building->latitude; ?>, <?php echo $building->longitude ?>];
              map.setView(location, 25);
              marker = L.marker(e.latlng, {
                icon: L.mapbox.marker.icon({
                  'marker-size': 'large',
                  'marker-symbol': 'building',
                  'marker-color': '#158cba'
                })
              });
            marker.addTo(map);
            </script>
            <?php else: ?>
              <i class="fa fa-spinner fa-pulse fa-4x"></i> Loading the map. Note this might take forever. Probably you should ask locals for direction (hopefully not an infinite loop). Have fun!
            <?php endif; ?>
          </div>

        </div>
        <?php if (isset($user) && $user->isStudent()): ?>
        <?php if ($event->isBooked($user->id, $event->id)): ?>
          <a href="<?php echo $app->urlFor('unbook_event', array('id' => $event->id)); ?>" class="btn btn-warning"><i class="fa fa-close fa-lg fa-fw"></i> Cancel Booking</a>
          <button class="btn btn-success"><i class="fa fa-check fa-lg fa-fw"></i> Event Booked</button>
        <?php else: ?>
          <a href="<?php echo $app->urlFor('book_event', array('id' => $event->id)); ?>" class="btn btn-danger"><i class="fa fa-thumb-tack fa-lg fa-fw"></i> Book Event</a>
        <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
    <?php require 'shared/footer.php'; ?>
  </body>
</html>
