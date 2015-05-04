CTYPE html>
<html>
  <?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
  <div class="container">
    <h1 class="page-header">Your upcoming events</h1>
    <?php require 'shared/notice.php'; ?>
    <div class="row">
      <div class="main col-sm-12">

        <div class="sidebar col-sm-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Personal details</h3>
						</div>
						<div class="panel-body">
							<p><big><i class="fa fa-user"></i> Name:  <?php echo $user->firstname;?> <?php echo $user->lastname;?></big> </p>
							<p><big><i class="fa fa-envelope"></i> Email:  <?php echo $user->email;?> </big> </p>
              <p><big><i class="fa fa-calendar"></i> DOB: <?php echo $user->dob;?> </big> </p>
              <p><big><i class="fa fa-venus-mars"></i> Gender:  <?php if($user->gender == 0) echo "Male"; else echo "Female";?> </big> </p>
              <p><big><i class="fa fa-user-plus"></i> Registered:  <?php echo $user->registered_at?> </big> </p>
						</div>
					</div>
				</div>

				<div class="content col-sm-9">
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
									<?php date_default_timezone_set("Europe/London"); $i=1; foreach ($events as $event): if($event->end_time > date("Y-m-d h:i:s", time()) && $event->proposed_by==$user->id) : ?>
									<tr <?php if($event->status=="pending"): echo 'class="info"'; elseif($event->status=="rejected"): echo 'class="danger"'; endif; ?>>
										<td><?php echo $i++;?></td>
										<td><?php echo $event->type;?></td>
										<td><a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>"><?php echo $event->title;?></a></td>
										<td><?php echo date('l jS F', strtotime($event->start_time));?></td>
										<td><?php echo date('g:ia', strtotime($event->start_time));?></td>
										<td><?php echo date('g:ia', strtotime($event->end_time));?></td>
										<td><?php echo $event->getRoomName();?></td>
										<td><?php echo $event->status;?></td>
										<td><?php echo $event->applicants;?></td>
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
										<th>Feedback</a>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($events as $event): if($event->end_time < date("Y-m-d h:i:s", time()) && $event->proposed_by==$user->id) : ?>
									<tr <?php if($event->status=="pending"): echo 'class="info"'; elseif($event->status=="rejected"): echo 'class="danger"'; endif; ?>>
										<td><?php echo $i++;?></td>
										<td><?php echo $event->type;?></td>
										<td><a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>"><?php echo $event->title;?></a></td>
										<td><?php echo date('l jS F', strtotime($event->start_time));?></td>
										<td><?php echo date('g:ia', strtotime($event->start_time));?></td>
										<td><?php echo date('g:ia', strtotime($event->end_time));?></td>
										<td><?php echo $event->getRoomName();?></td>
										<td><?php echo $event->applicants; ?></td>
										<td><?php echo $event->applicants; ?></td>
										<td><a href="<?php echo $app->urlFor('staff_event', array('id' => $event->id)); ?>" class="btn btn-success btn-xs"><i class="fa fa-reply fa-lg fa-fw"></i>View feedback</a> </td>
									</tr>
		              <?php endif; endforeach; ?>
								</tbody>
							</table>
            </div>
          </div>
      </div>
		</div>
		<?php include 'shared/footer.php' ?>
  </body>
</html>
