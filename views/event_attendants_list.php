CTYPE html>
<html>
  <?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
  <div class="container">
    <h1 class="page-header">Event attendants</h1>
    <?php require 'shared/notice.php'; ?>
    <div class="row">
      <div class="main col-sm-12">
				<div class="content col-sm-11 col-sm-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Event attendants</h3>
            </div>
            <div class="panel-body">
							<table class="table table-striped table-hover ">
							  <thead>
							    <tr>			
										<th>#</th>
										<th>Name</th>
										<th>School</th>
										<th>Teacher</th>
										<th>Age</th>
										<th>Date booked</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach($students as $student): ?>
									<tr>	
										<td><?php echo $i++;?></td>
										<td><?php echo $student->firstname . ' ' . $student->lastname; ?></td>
										<td><?php echo $student->getSchoolName(); ?></td>
										<td><?php echo $student->getTeacherName(); ?></td>
										<td><?php echo $student->getAge(); ?></td>
										<td><?php echo $student->getAge(); ?></td>
									</tr>
		              <?php endforeach; ?>
								</tbody>
							</table>
            </div>
          </div>
      </div>
		</div>
		<?php include 'shared/footer.php' ?>
  </body>
</html>
