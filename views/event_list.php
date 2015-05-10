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

				<div id="search-bar">
					<h3>Search</h3>
					<form id="search" class="search">
						<div class="form-group">
							<div class="input-group">
							<input type="text" class="query form-control" name="query">
							<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="fa fa-search fa-fw fa-lg"></i></button>
							</span>
							</div>
						</div>
					</form>
				</div>

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
					<?php foreach($events as $event) :?>
						<div id="event-<?php echo $event->id; ?>" class="event panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>"><?php echo $event->title ?></a></h3>
							</div>
							<div class="panel-body">
							<?php if(isset($user) && ($user->isAdmin() || $user->isStaff())): ?>
								<span class="label label-danger"><?php echo ucwords($event->status) . ' ' . date('j M Y', strtotime($event->approved_at)); ?></span>
							<?php endif; ?>
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

										<?php if(!(isset($user)) || $user->isStudent()) : ?>
											<a href="<?php echo $app->urlFor('book_event', array('id' => $event->id)); ?>" class="book-btn btn btn-danger"><i class="fa fa-thumb-tack fa-lg fa-fw"></i> Book Event</a>
											<a href="#" class="booked-btn btn btn-success" style="display:none;"><i class="fa fa-check fa-lg fa-fw"></i> Event Booked</a>
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

										<?php if(isset($user) && ($user->isStaff() || $user->isAdmin())) : ?>
											<a href="<?php echo $app->urlFor('cancel_event', array('id' => $event->id)); ?>" class="btn btn-danger"><i class="fa fa-close fa-lg fa-fw"></i> Cancel Event</a>
											<a href="<?php echo $app->urlFor('move_event', array('id' => $event->id)); ?>" class="btn btn-danger"><i class="fa fa-location-arrow fa-lg fa-fw"></i> Move Event</a>
											
											<a href="<?php echo $app->urlFor('view_feedback', array('id' => $event->id)); ?>" class="btn btn-success"><i class="fa fa-comments fa-lg fa-fw"></i> View Feedback</a>
										<?php endif; ?>
										<?php endif; ?>
								</div>
							</div>
							<?php if(isset($user) && ($user->isStaff() || $user->isAdmin())) :
											$capacity = ($event->applicants / $event->getRoomSize())*100; ?>
								<div class="panel-footer">
									<small><i class="fa fa-line-chart fa-fw"></i> Capacity: <?php echo $event->applicants . '/' . $event->getRoomSize(); ?></small>
										<a style="float:right;" href="<?php echo $app->urlFor('event_attendants', array('id' => $event->id)); ?>">Applicant list</a>
									<div class="content col-sm-6"><div class="progress">
										<div class="progress-bar progress-bar-<?php if($capacity<60) : echo "success"; else : if($capacity<80) : echo "warning"; else: echo "danger"; endif; endif;?>" style="width: <?php echo $capacity; ?>%"></div>
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

		<?php if (isset($user) && $user->isStudent()): ?>
		$("a.book-btn").on('click', function(e) {
			e.preventDefault();
			var url = $(this).attr('href');
			$(this).children('i').attr('class', 'fa fa-spinner fa-spin fa-lg fa-fw');
			var btn = $(this);
			$.getJSON(url, function(data) {
				btn.hide();
				btn.parents('.event').find('.booked-btn').show();
			})
				.fail(function( jqxhr, textStatus, error ) {

				})
				.always(function() {
					btn.children('i').attr('class', 'fa fa-thumb-tack fa-lg fa-fw');
				});
		});
		<?php endif; ?>

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

		$("#search-bar #search").submit(function(e) {
			e.preventDefault();
			var url = '<?php echo $app->urlFor('search_event') ?>';
			var data = {
				query: $(this).find('.query').val()
			};
			$("#events").children().hide();
			$.getJSON(url, data, function(data) {
				for (var i in data['id']) {
					$("#events").children('#event-' + data['id'][i]).show();
				}
			});
		});

		$(document).ready(function() {
			var url = '<?php echo $app->urlFor('student_event'); ?>';
			$.getJSON(url, function(data) {
				for (var i in data['id']) {
					$('#event-' + data['id'][i]).find('a.book-btn').hide();
					$('#event-' + data['id'][i]).find('a.booked-btn').show();
				}
			});
		});

	</script>
  </body>
</html>
