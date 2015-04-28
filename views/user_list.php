<!DOCTYPE html>
<html>
	<?php require 'shared/head.php';?>
  	<body>
    <?php require 'shared/navbar.php';?>
		<?php $numEvents = count($events) ?>
		<div class="container">
			<div class="bs-doc-section">
			<div class="row">
			<div class="main col-md-12">
			<h1 class="page-header">List of users</h1>
			
			<ul class="nav nav-tabs">
				<li class="active"><a aria-expanded="true" href="#Students" data-toggle="tab">Students</a></li>
				<li class=""><a aria-expanded="false" href="#Teachers" data-toggle="tab">Teachers</a></li>
				<li class=""><a aria-expanded="false" href="#Staff" data-toggle="tab">Staff</a></li>
			</ul>

			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade active in" id="Students">
					<table class="table table-striped table-hover ">
						<thead>
							<tr>
						 		<th>UserID</th>
								<th>First name</th>
								<th>Last name</th>
								<th>Age</th>
					      		<th>Email</th>
					      		<th>School</th>
								<th>Teacher</th>
								<th>Town</th>
								<th>Date registered</th>
						    </tr>
						</thead>
					
						<tbody>
							<?php foreach($students as $student) : ?>
							<tr>
					  			<td><?php echo $student->id; ?></td>
					  			<td><?php echo $student->firstname; ?></td>
					  			<td><?php echo $student->lastname; ?></td>
					  			<td><?php echo $student->getAge(); ?></td>
					  			<td><?php echo $student->email; ?></td>
					  			<td><?php echo $student->getSchoolName(); ?></td>
					  			<td><?php echo $student->getTeacherName(); ?></td>
								<td><?php echo $student->address_line3; ?></td>
								<td><?php echo $student->registered_at; ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
			 		</table>
				</div>
				<div class="tab-pane fade" id="Teachers">
					<table class="table table-striped table-hover ">
						<thead>
					    	<tr>
					    		<th>UserID</th>
						    	<th>First name</th>
								<th>Last name</th>
								<th>Age</th>
						    	<th>Email</th>
							    <th>School</th>
								<th>Date registered</th>
							</tr>
						</thead>
						
						<tbody>
							<?php foreach($teachers as $teacher) : ?>
							<tr>
						  		<td><?php echo $teacher->id; ?></td>
						  		<td><?php echo $teacher->firstname; ?></td>
						  		<td><?php echo $teacher->lastname; ?></td>
						  		<td><?php echo $teacher->getAge(); ?></td>
						  		<td><?php echo $teacher->email; ?></td>
						  		<td><?php echo $teacher->getSchoolName(); ?></td>
								<td><?php echo $teacher->registered_at; ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
			 		</table>
				</div>
				<div class="tab-pane fade" id="Staff">
					<table class="table table-striped table-hover ">
						<thead>
					    	<tr>
					    		<th>UserID</th>
						    	<th>First name</th>
								<th>Last name</th>
								<th>Department</th>
								<th>Age</th>
						    	<th>Email</th>
								<th>Date registered</th>
							</tr>
						</thead>
						
						<tbody>
							<?php foreach($staffs as $staff) : ?>
							<tr>
						  		<td><?php echo $staff->id; ?></td>
						  		<td><?php echo $staff->firstname; ?></td>
						  		<td><?php echo $staff->lastname; ?></td>
						  		<td><?php echo $staff->getAge(); ?></td>
						  		<td><?php echo $staff->getDepartment(); ?></td>
						  		<td><?php echo $staff->email; ?></td>
								<td><?php echo $staff->registered_at; ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
			 		</table>
				</div>
			</div>


	  		<div class="tab-pane fade" id="Staff">
	   								
			</div>

		</div>
		</div>	
		</div>
	</div>
</body>
</html>

