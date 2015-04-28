
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

        <a href="#" class="btn btn-primary">Book this event</a>

      </div>

    </div>
  </body>
</html>
