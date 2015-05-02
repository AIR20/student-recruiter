<!DOCTYPE html>
<html>
	<?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
	<div class="container">
		<h1 class="page-header">Upcoming events</h1>
		<?php require 'shared/notice.php'; ?>
		<div class="row">
			<div class="main col-sm-12">
				<div class="sidebar col-sm-3">

				<div id="event-type">
					<h3>Event Type</h3>
					<ul class="nav nav-pills nav-stacked">
						<li role="presentation" class="active"><a href="#">All</a></li>
						<li role="presentation"><a href="#">Openday</a></li>
						<li role="presentation"><a href="#">Day Trip</a></li>
						<li role="presentation"><a href="#">Coming Soon</a></li>
					</ul>
				</div>

				<div id="tags-filter">
					<h3>Tags Filter</h3>
					<ul class="nav nav-pills nav-stacked">
						<li role="presentation" class="active"><a href="#"><i class="fa fa-times fa-lg fa-fw"></i> Music</a></li>
						<li role="presentation"><a href="#"><i class="fa fa-circle-o fa-lg fa-fw"></i> Science</a></li>
						<li role="presentation"><a href="#"><i class="fa fa-circle-o fa-lg fa-fw"></i> Hot tub</a></li>
						<li role="presentation"><a href="#"><i class="fa fa-circle-o fa-lg fa-fw"></i> Sci-Fi</a></li>
						<li role="presentation"><a href="#"><i class="fa fa-circle-o fa-lg fa-fw"></i> Bullshit</a></li>
					</ul>
				</div>

				</div>
				<div class="content col-sm-9">
					<?php foreach($events as $event) : ?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>"><?php echo $event->title ?></a></h3>
							</div>
							<div class="panel-body">
							<h5><i class="fa fa-building-o fa-fw"></i> <?php echo $event->getBuildingName() . '—'; ?><i><?php echo $event->getRoomName(); ?></i></h5>
							<h5><i class="fa fa-calendar-o fa-fw"></i> <?php echo date('l jS F, Y', strtotime($event->start_time));?> &nbsp <i class="fa fa-clock-o fa-fw"></i> <?php echo date('g:ia', strtotime($event->start_time)) . ' - ' . date('g:ia', strtotime($event->end_time)); ?></h5>
							<p><?php echo $event->description ?></p>
							
								</br>
								<div class="pull-right">
										<a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>" class="btn btn-info"><i class="fa fa-info-circle fa-lg fa-fw"></i> See detail</a>
										
										<?php if(!(isset($user)) || !($user->isTeacher())) : ?>
											<?php if(!($event->isBooked($user->id, $event->id))) :  ?>
											<a href="<?php echo $app->urlFor('book_event', array('id' => $event->id)); ?>" class="btn btn-danger"><i class="fa fa-thumb-tack fa-lg fa-fw"></i> Book Event</a>
											<?php else : ?>	
											<a href="<?php echo $app->urlFor('unbook_event', array('id' => $event->id)); ?>" class="btn btn-warning"><i class="fa fa-close fa-lg fa-fw"></i> Cancel Booking</a>
											<a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>" class="btn btn-success"><i class="fa fa-check fa-lg fa-fw"></i> Event Booked</a>
											<?php endif; ?>
										<?php endif; ?>

										<?php if(isset($user) && ($user->isTeacher())) : ?>
										<a href="<?php echo $app->urlFor('book_event', array('id' => $event->id)); ?>" class="btn btn-danger"><i class="fa fa-thumb-tack fa-lg fa-fw"></i> Class book</a>
										</a>
										<?php endif; ?>
								</div>
							</div>
							<?php if(isset($user) && ($user->isStaff() || $user->isAdmin())) :
							$capacity = ($event->applicants / $event->getRoomSize())*100; ?>
								<div class="panel-footer">
									<small><i class="fa fa-line-chart fa-fw"></i> Capacity: <?php echo $event->applicants . '/' . $event->getRoomSize(); ?></small>
									<div class="content col-sm-6"><div class="progress">
										<div class="progress-bar progress-bar-<?php if($capacity<60) : echo "success"; else : if($capacity<80) : echo "warning"; else: echo "danger"; endif; endif;?>" style="width: <?php echo $capacity; ?>%">
									</div>
								</div>
								</div>
							</div>
						<?php endif; ?> 					  	
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<?php require('shared/footer.php') ?>
	<script type="text/javascript">
		$("#event-type a").click(function() {
			$('#event-type li').removeClass('active');
			$(this).parent().addClass('active');
		});

		$("#tags-filter a").click(function() {
			if ($(this).parent().hasClass('active')) {
				$(this).parent().removeClass('active');
				$(this).children('i').removeClass('fa-times');
				$(this).children('i').addClass('fa-circle-o');
			} else {
				$(this).parent().addClass('active');
				$(this).children('i').removeClass('fa-circle-o');
				$(this).children('i').addClass('fa-times');
			}
		});
	</script>
  </body>
</html>
