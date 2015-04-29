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
				<li class="active"><a aria-expanded="true" href="#Students" data-toggle="tab">Students  &nbsp<span class="badge"><?php echo User::countUsersByRole(3); ?></span></a></a></li>
				<li class=""><a aria-expanded="false" href="#Teachers" data-toggle="tab">Teachers  &nbsp<span class="badge"><?php echo User::countUsersByRole(2); ?></span></a></a></li>
				<li class=""><a aria-expanded="false" href="#Staff" data-toggle="tab">Staff  &nbsp<span class="badge"><?php echo User::countUsersByRole(1); ?></span></a></a></li>
				<li class=""><a aria-expanded="false" href="#Administrators" data-toggle="tab">Administrators &nbsp<span class="badge"><?php echo User::countUsersByRole(0); ?></span></a></a></li>
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
								<th>Age</th>								
								<th>Department</th>
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

	  		<div class="tab-pane fade" id="Administrators">
					<table class="table table-striped table-hover ">
						<thead>
					    	<tr>
					    		<th>UserID</th>
						    	<th>First name</th>
									<th>Last name</th>
									<th>Age</th>								
						    	<th>Email</th>
									<th>Date registered</th>
							</tr>
						</thead>
						
						<tbody>
							<?php foreach($administrators as $administrators) : ?>
							<tr>
						  		<td><?php echo $administrators->id; ?></td>
						  		<td><?php echo $administrators->firstname; ?></td>
						  		<td><?php echo $administrators->lastname; ?></td>
						  		<td><?php echo $administrators->getAge(); ?></td>
						  		<td><?php echo $administrators->email; ?></td>
									<td><?php echo $administrators->registered_at; ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
			 		</table>
				</div>
			</div>
		</div>
		</div>	
		</div>
	</div>
	<?php require('shared/footer.php'); ?>
</body>
</html>

