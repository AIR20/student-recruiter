<!DOCTYPE html>
<html>
	<?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
		<?php $numEvents = count($events) ?>
		<div class="container">
		
			<div class="bs-docs-section">
			<div class="row">
			<div class="main col-md-12">

				<h1 class="page-header">Upcoming events</h1>
				<?php require 'shared/notice.php'; ?>
				<div class="well col-md-8 col-md-offset-2">
					<?php foreach($events as $event) : ?>
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title"><a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>"><?php echo $event->title ?></a></h3>
							</div>		
							<div class="panel-body">
							<h5><?php echo $event->getBuildingName() . ' - ' .  $event->getRoomName(); ?></h5>
								<h5><?php echo date('g:ia', strtotime($event->start_time)) . ' - ' . date('g:ia', strtotime($event->end_time)) . ', ' . date('l jS F, Y', strtotime($event->start_time));?></h5>
								<p><?php echo $event->description ?></p>
								</br>
								<div style="float:right">
									<a href="<?php echo $app->urlFor('book_event', array('id' => $event->id)); ?>" class="btn btn-primary">Book</a> 
								</div>
							</div>
						</div>
					<?php  endforeach; ?>
				</div>
			</div>
			</div>
		</div>
  </body>
</html>

