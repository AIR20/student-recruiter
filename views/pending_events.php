<!DOCTYPE html>
<html>
	<?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
	<div class="container">
		<h1 class="page-header">Pending events</h1>
		<?php require 'shared/notice.php'; ?>
		<div class="row">
			<div class="main col-sm-12">
				<div class="sidebar col-sm-3">

				<div id="event-type">
					<h3>Event Type</h3>
					<ul class="nav nav-pills nav-stacked">
						<li role="presentation" class="active"><a href="#">All</a></li>
						<?php foreach($types as $type): ?>
						<li role="presentation"><a href="#"><?php echo $type; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div id="tags-filter">
					<h3>Tags Filter</h3>
					<ul class="nav nav-pills nav-stacked">
						<?php foreach($tags as $tag): ?>
						<li role="presentation"><a href="#" class="tag-<?php echo preg_replace("/[\s_]/", "-", strtolower($tag)); ?>"><i class="fa fa-circle-o fa-lg fa-fw"></i> <?php echo ucwords($tag); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>

				</div>
				<div id="events" class="content col-sm-9">
					<?php foreach($pending_events as $event) : ?>
						<div id="event-<?php echo $event->id; ?>" class="event panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>"><?php echo $event->title ?></a></h3>
							</div>
							<div class="panel-body">
							<span class="label label-success type-<?php echo preg_replace("/[\s_]/", "-", strtolower($event->type)); ?>"><?php echo $event->type; ?></span>
							<?php foreach(explode(',', $event->tags) as $tag): ?>
							<span class="label label-primary tag-<?php echo preg_replace("/[\s_]/", "-", strtolower($tag)); ?>"><?php echo ucwords($tag); ?></span>
							<?php endforeach; ?>
							<h5><i class="fa fa-building-o fa-fw"></i> <?php echo $event->getBuildingName() . '—'; ?><i><?php echo $event->getRoomName(); ?></i></h5>
							<h5><i class="fa fa-calendar-o fa-fw"></i> <?php echo date('l jS F, Y', strtotime($event->start_time));?> &nbsp <i class="fa fa-clock-o fa-fw"></i> <?php echo date('g:ia', strtotime($event->start_time)) . ' - ' . date('g:ia', strtotime($event->end_time)); ?></h5>
							<p><?php echo $event->description ?></p>
								</br>
								<div class="pull-right">
										<a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>" class="btn btn-info"><i class="fa fa-info-circle fa-lg fa-fw"></i> See detail</a>
										<a href="<?php echo $app->urlFor('reject_event', array('id' => $event->id)); ?>" class="btn btn-danger"><i class="fa fa-thumbs-o-down fa-lg fa-fw"></i>Reject</a>
										<a href="<?php echo $app->urlFor('approve_event', array('id' => $event->id)); ?>" class="btn btn-success"><i class="fa fa-thumbs-o-up fa-lg fa-fw"></i>Approve</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<?php require('shared/footer.php') ?>
	<script type="text/javascript">
		$("#event-type a").click(function(e) {
			e.preventDefault();
			$('#event-type li').removeClass('active');
			$(this).parent().addClass('active');
			if ($(this).html() == 'All') {
				$("#events").children().show();
			} else {
				$("#events").children().hide();
				$("#events").children().has("span.type-" + $(this).html().replace(/\s+/g, '-').toLowerCase()).show();
			}
		});

		$("#tags-filter a").click(function(e) {
			e.preventDefault();
			if ($(this).parent().hasClass('active')) {
				$(this).parent().removeClass('active');
				$(this).children('i').removeClass('fa-times');
				$(this).children('i').addClass('fa-circle-o');
				$("#events").children().has("span." + $(this).attr('class')).show();
			} else {
				$(this).parent().addClass('active');
				$(this).children('i').removeClass('fa-circle-o');
				$(this).children('i').addClass('fa-times');
				$("#events").children().has("span." + $(this).attr('class')).hide();
			}
		});
	</script>
  </body>
</html>
