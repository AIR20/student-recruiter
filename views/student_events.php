<!DOCTYPE html>
<html>
  <?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
  <div class="container">
    <h1 class="page-header">Your events</h1>
    <?php require 'shared/notice.php'; ?>
    <div class="row">
      <div class="main col-sm-12">

				<div class="content col-sm-11 col-sm-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Upcoming events</h3>
            </div>
            <div class="panel-body">
							<table class="table table-striped table-hover ">
							  <thead>
							    <tr>			
										<th>#</th>
										<th>Type</th>
										<th>Title</th>
										<th>Date</th>
										<th>Starts</th>
										<th>Ends</th>
										<th>Venue</th>
										<th>Cancel</a>
									</tr>
								</thead>
								<tbody>
									<?php date_default_timezone_set("Europe/London");  $i=1; foreach ($events as $event): if($event->end_time > date("Y-m-d h:i:s", time())): ?>
									<tr>
										<td><?php echo $i++;?></td>
										<td><?php echo $event->type;?></td>
										<td><a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>"><?php echo $event->title;?></a></td>
										<td><?php echo date('l jS F', strtotime($event->start_time));?></td>
										<td><?php echo date('g:ia', strtotime($event->start_time));?></td>
										<td><?php echo date('g:ia', strtotime($event->end_time));?></td>
										<td><?php echo $event->getRoomName();?></td>
										<td><a href="<?php echo $app->urlFor('unbook_event', array('id' => $event->id)); ?>" class="btn btn-danger btn-xs"><i class="fa fa-close fa-lg fa-fw"></i>Cancel Booking</a> </td>
									</tr>
		              <?php endif; endforeach; ?>
								</tbody>
							</table>
            </div>
          </div>
 			  </div>
		
				<div class="content col-sm-11 col-sm-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Past events</h3>
            </div>
            <div class="panel-body">
							<table class="table table-striped table-hover ">
							  <thead>
							    <tr>			
										<th>#</th>
										<th>Type</th>
										<th>Title</th>
										<th>Date</th>
										<th>Feedback</a>
									</tr>
								</thead>
								<tbody>
									<?php date_default_timezone_set("Europe/London"); $i=1; foreach ($events as $event): if($event->end_time < date("Y-m-d h:i:s", time())): ?>
									<tr>
										<td><?php echo $i++;?></td>
										<td><?php echo $event->type;?></td>
										<td><a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>"><?php echo $event->title;?></a></td>
										<td><?php echo date('l jS F', strtotime($event->start_time));?></td>
										<td><a href="<?php echo $app->urlFor('give_feedback', array('id' => $event->id)); ?>" class="btn btn-success btn-xs"><i class="fa fa-comments fa-lg fa-fw"></i>Give feedback</a> </td>
									</tr>
		              <?php endif; endforeach; ?>
								</tbody>
							</table>
            </div>
          </div>
      </div>
	</div>
</div>
		</div>
		<?php include 'shared/footer.php' ?>
  </body>
</html>
