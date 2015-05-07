<!DOCTYPE html>
<html>
  <?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
  <div class="container">
		<h1 class="page-header"><?php echo $event->title ?></h1>
    <?php require 'shared/notice.php'; ?>
    <div class="row">
      <div class="main col-sm-12">
        <div class="sidebar col-sm-3">
          <div class="event panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Book it now</h3>
            </div>
            <div class="panel-body">
              <div class="book-panel">
                <?php if (isset($user) && $user->isStudent() && $event->isBooked($user->id, $event->id)): ?>
                <a class="booked-btn btn btn-lg btn-success btn-huge" href="<?php echo $app->urlFor('unbook_event', array('id' => $event->id)); ?>">
                <i class="fa fa-check fa-lg pull-left"></i> Event Booked</a>
                <?php else: ?>
                  <a class="book-btn btn btn-lg btn-success btn-huge" href="<?php echo $app->urlFor('book_event', array('id' => $event->id)); ?>">
                  <i class="fa fa-thumb-tack fa-lg pull-left"></i> Book Event</a>
                  <a class="booked-btn btn btn-lg btn-success btn-huge" href="#" style="display:none;">
                  <i class="fa fa-check fa-lg pull-left"></i> Event Booked</a>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <div class="event panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Tags</h3>
            </div>
            <div class="panel-body">
              <?php foreach(explode(',', $event->tags) as $tag): ?>
                <span class="label label-primary tag-<?php echo preg_replace("/[\s_]/", "-", strtolower($tag)); ?>"><?php echo ucwords($tag); ?></span>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="event panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Info</h3>
            </div>
            <div class="panel-body">

              <div class="row">
                  <h5 class="col-sm-3"><i class="fa fa-building-o fa-2x"></i></h5> <h5 class="col-sm-9"><?php echo $event->getBuildingName() . '—'; ?><i><?php echo $event->getRoomName(); ?></i></h5>
              </div>

              <div class="row">
                  <h5 class="col-sm-3"><i class="fa fa-calendar-o fa-2x"></i></h5>  <h5 class="col-sm-9"><?php echo date('l jS F, Y', strtotime($event->start_time));?></h5>
              </div>

              <div class="row">
                <div class="">
                  <h5 class="col-sm-3"><i class="fa fa-clock-o fa-2x"></i></h5>  <h5 class="col-sm-9"><?php echo date('g:ia', strtotime($event->start_time)) . ' - ' . date('g:ia', strtotime($event->end_time)); ?></h5>
                </div>
              </div>

            </div>
          </div>

          <div class="event panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">You might also like</h3>
            </div>
            <div class="panel-body">  
            </div>
          </div>
        </div>
          <!-- end of sidebar -->
        <div id="events" class="content col-sm-9">

            <div id="event-<?php echo $event->id; ?>" class="event panel panel-default">
              <div class="panel-heading">
								<h3 class="panel-title"><a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>"><?php echo $event->title ?></a></h3>
              </div>

              <div class="panel-body">
							<?php if(isset($user) && ($user->isAdmin() || $user->isStaff())): ?>
								<span class="label label-danger"><?php echo ucwords($event->status) . ' ' . date('j M Y', strtotime($event->approved_at)); ?></span>
							<?php endif; ?>
              <?php foreach(explode(',', $event->tags) as $tag): ?>
                <span class="label label-primary tag-<?php echo preg_replace("/[\s_]/", "-", strtolower($tag)); ?>"><?php echo ucwords($tag); ?></span>
              <?php endforeach; ?>
                <h5><i class="fa fa-building-o fa-fw"></i> <?php echo $event->getBuildingName() . '—'; ?><i><?php echo $event->getRoomName(); ?></i></h5>
                <h5><i class="fa fa-calendar-o fa-fw"></i> <?php echo date('l jS F, Y', strtotime($event->start_time));?> &nbsp <i class="fa fa-clock-o fa-fw"></i> <?php echo date('g:ia', strtotime($event->start_time)) . ' - ' . date('g:ia', strtotime($event->end_time)); ?></h5>

                <div>
                  <?php if ($event->image): ?>
                  <img class="eventdetail" src="<?php echo $event->image; ?>">
                  <?php else: ?>
                  <img class="eventdetail" src="http://i.telegraph.co.uk/multimedia/archive/03288/potd-caiman_3288559k.jpg">
                  <?php endif; ?>
                </div>

                </br>
                <div>

									<a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>" class="btn btn-info"><i class="fa fa-info-circle fa-lg fa-fw"></i> See detail</a>
                    
                  <?php if(!(isset($user)) || ( isset($user) && $user->isStudent())) : ?>

										<a href="<?php echo $app->urlFor('give_feedback', array('id' =>$event->id)); ?>" class="btn btn btn-success"><i class="fa fa-comments fa-lg fa-fw"></i> Give Feedback</a>

									<?php endif; ?>

                  <?php if(isset($user) && ($user->isTeacher())) : ?>
                    <a href="<?php echo $app->urlFor('classbook_event', array('id' => $event->id)); ?>" class="btn btn-danger"><i class="fa fa-thumb-tack fa-lg fa-fw"></i> Class book</a>
                    </a>
                  <?php endif; ?>

                  <?php if(isset($user) && $user->isAdmin()): ?>
                    <?php if(!$event->twitter_link): ?>
                      <a href="<?php echo $app->urlFor('tweet_event', array('id' => $event->id)); ?>" class="tweet-btn btn btn-danger"><i class="fa fa-retweet fa-lg fa-fw"></i> Tweet Event</a>
                      <a href="#" class="tweeted-btn btn btn-success" style="display:none;"><i class="fa fa-check fa-lg fa-fw"></i> Event Tweeted</a>
                    <?php else: ?>
                      <a href="#" class="tweeted-btn btn btn-success"><i class="fa fa-check fa-lg fa-fw"></i> Event Tweeted</a>
                    <?php endif; ?>
                  <?php endif; ?>

                  <?php if(isset($user) && ($user->isStaff || $user->isAdmin())) : ?>
                      <a href="<?php echo $app->urlFor('cancel_event', array('id' => $event->id)); ?>" class="btn btn-danger"><i class="fa fa-close fa-lg fa-fw"></i> Cancel Event</a>
                      <a href="<?php echo $app->urlFor('move_event', array('id' => $event->id)); ?>" class="btn btn-danger"><i class="fa fa-location-arrow fa-lg fa-fw"></i> Move Event</a>
                    <?php endif; ?>
                </div>
              </div>

              <?php if(isset($user) && ($user->isStaff() || $user->isAdmin())) :
              $capacity = ($event->applicants / $event->getRoomSize())*100; ?>
              <div class="panel-footer">
                <small><i class="fa fa-line-chart fa-fw"></i> Capacity: <?php echo $event->applicants . '/' . $event->getRoomSize(); ?></small>
                <div class="content col-sm-6">
                  <div class="progress">
                    <div class="progress-bar progress-bar-<?php if($capacity<60) : echo "success"; else : if($capacity<80) : echo "warning"; else: echo "danger"; endif; endif;?>" style="width: <?php echo $capacity; ?>%">
                    </div>
                  </div>
                </div>
              </div>
              <?php endif; ?>

            </div>

            <div id="event-<?php echo $event->id; ?>" class="event panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Event description</h3>
              </div>
              <div class="panel-body">
                <p><?php echo $event->description ?></p>
              </div>
            </div>

            <div id="event-<?php echo $event->id; ?>" class="event panel panel-default">
      				<div class="panel-heading">
    						<h3 class="panel-title">Event venue</h3>
    					</div>
    					<div class="panel-body">
    						<?php if ($location): ?>
    					
                <div id="small-map">
    						</div>
    						
                <script type="text/javascript">
    							L.mapbox.accessToken = 'pk.eyJ1IjoiYXliY2hhbiIsImEiOiJaNlV1dlBVIn0.PtSa8Vmur7aYb0jxUfANgA';
    							var map = L.mapbox.map('small-map', 'aybchan.lmmiljek');
    							var initView = [<?php echo $location['lat']; ?>, <?php echo $location['lon']; ?>];
    							map.setView(initView, 25);
    							marker = L.marker(initView, {
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
          </div>
          <!-- end of events -->

          

        </div>
      </div>
    </div>
  </div>
  <?php require('shared/footer.php') ?>
  <script type="text/javascript">
    $("a.book-btn").on('click', function(e) {
      e.preventDefault();
      var url = $(this).attr('href');
      $(this).children('i').attr('class', 'fa fa-spinner fa-spin fa-lg pull-left');
      var btn = $(this);
      $.getJSON(url, function(data) {
        btn.hide();
        btn.parents('.book-panel').find('.booked-btn').show();
      })
        .fail(function( jqxhr, textStatus, error ) {

        })
        .always(function() {
          btn.children('i').attr('class', 'fa fa-thumb-tack fa-lg pull-left');
        });
    });

    $("a.tweet-btn").on('click', function(e) {
      e.preventDefault();
      var url = $(this).attr('href');
      $(this).children('i').attr('class', 'fa fa-spinner fa-spin fa-lg fa-fw');
      var btn = $(this);
      $.getJSON(url, function(data) {
        btn.hide();
        btn.parents('.event').find('.tweeted-btn').show();
      })
        .fail(function( jqxhr, textStatus, error ) {

        })
        .always(function() {
          btn.children('i').attr('class', 'fa fa-retweet fa-lg fa-fw');
        });
    });

    $("a.booked-btn").on('click', function(e) {
      e.preventDefault();
    });

    $("a.tweeted-btn").on('click', function(e) {
      e.preventDefault();
    });

  </script>
  </body>
</html>
