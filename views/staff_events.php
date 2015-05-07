<!DOCTYPE html>
<html>
  <?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
  <div class="container">
    <h1 class="page-header">Manage your events</h1>
    <?php require 'shared/notice.php'; ?>
    <div class="row">
      <div class="main col-sm-12">
				<div class="content col-sm-12">
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
										<th>Status</th>
										<th>Applicants</th>
										<th>Cancel event</a>
									</tr>
								</thead>
								<tbody>
									<?php date_default_timezone_set("Europe/London"); $i=1; foreach ($events as $event): if($event->status!="cancelled" && $event->status!="rejected" && $event->end_time > date("Y-m-d h:i:s", time()) && $event->proposed_by==$user->id) : ?>
									<tr>	
										<td><?php echo $i++;?></td>
										<td><?php echo $event->type;?></td>
										<td><a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>"><?php echo $event->title;?></a></td>
										<td><?php echo date('l jS F', strtotime($event->start_time));?></td>
										<td><?php echo date('g:ia', strtotime($event->start_time));?></td>
										<td><?php echo date('g:ia', strtotime($event->end_time));?></td>
										<td><?php echo $event->getRoomName();?></td>
										<td><?php echo $event->status;?></td>
										<td><a href="<?php echo $app->urlFor('event_attendants',array('id' => $event->id)); ?>"><?php echo $event->applicants;?></a></td>
										<td><?php if(!($event->status=="cancelled")) : ?><a href="<?php echo $app->urlFor('cancel_event', array('id' => $event->id)); ?>" class="btn btn-danger btn-xs"><i class="fa fa-close fa-lg fa-fw"></i>Cancel Event</a><?php endif; ?> </td>
									</tr>
		              <?php endif; endforeach; ?>
								</tbody>
							</table>
            </div>
          </div>
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
										<th>Starts</th>
										<th>Ends</th>
										<th>Venue</th>
										<th>Applicants</a>
										<th>Attendees</a>
										<th>Attendance</a>
										<th>Feedback</a>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($events as $event): if($event->end_time < date("Y-m-d h:i:s", time()) && $event->proposed_by==$user->id && $event->status=="approved") : ?>
									<tr> 
										<td><?php echo $i++;?></td>
										<td><?php echo $event->type;?></td>
										<td><a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>"><?php echo $event->title;?></a></td>
										<td><?php echo date('l jS F', strtotime($event->start_time));?></td>
										<td><?php echo date('g:ia', strtotime($event->start_time));?></td>
										<td><?php echo date('g:ia', strtotime($event->end_time));?></td>
										<td><?php echo $event->getRoomName();?></td>
										<td><a href="<?php echo $app->urlFor('event_attendants', array('id' =>$event->id)); ?>"><?php echo $event->applicants; ?></a></td>
										<td><?php echo $event->attendees; ?></td>
										<td><?php if($event->applicants != 0): echo number_format(100*$event->attendees/$event->applicants) . '%'; endif; ?></td>
										<td><a href="<?php echo $app->urlFor('view_feedback', array('id' => $event->id)); ?>" class="btn btn-success btn-xs"><i class="fa fa-comments fa-lg fa-fw"></i>View feedback</a> </td>
									</tr>
		              <?php endif; endforeach; ?>
								</tbody>
							</table>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Cancelled or rejected events</h3>
            </div>
            <div class="panel-body">
							<table class="table table-striped table-hover ">
							  <thead>
							    <tr>			
										<th>#</th>
										<th>Type</th>
										<th>Title</th>
										<th>Date</th>
										<th>Status</th>
										<th>Comment</th>
										<th>Decided on</th>
										<th>...by</th>
									</tr>
								</thead>
								<tbody>
									<?php date_default_timezone_set("Europe/London"); $i=1; foreach ($events as $event): if($event->status=="cancelled" || $event->status=="rejected" && $event->proposed_by==$user->id) : ?>
									<tr>	
										<td><?php echo $i++;?></td>
										<td><?php echo $event->type;?></td>
										<td><?php echo $event->title;?></td>
										<td><?php echo date('l jS F', strtotime($event->start_time));?></td>
										<td><?php echo $event->status;?></td>
										<td><?php echo $event->comment;?></td>
										<td><?php echo date('l jS F', strtotime($event->approved_at));?></td>
										<td><?php $adminId = $event->approved_by; $admin = User::getUserById($adminId); echo $user->firstname . ' ' . $admin->lastname; ?></td>
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
