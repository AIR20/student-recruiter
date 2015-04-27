<!DOCTYPE html>
<html>
	<?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
		<?php $numEvents = count($events) ?>
		<div class="container">
			<ul class="nav nav-tabs">
 				<li class="active"><a href="#Students" data-toggle="tab">Students</a></li>
  				<li><a href="#Teachers" data-toggle="tab">Teachers</a></li>
  				<li><a href="#Staff" data-toggle="tab">Staff</a></li>
  			</ul>
		
			<div id="myTabContent" class="tab-content">
	  			<div class="tab-pane fade active in" id="Students">
	   				<table class="table table-striped table-hover ">
					  <thead>
					    <tr>
					      <th>UserID</th>
					      <th>First name</th>
					      <th>Last name</th>
					      <th>Email</th>
					      <th>TeacherID</th>
					      <th>Address1</th>
					    </tr>
					  </thead>
					  <tbody>
					    
						<?php foreach($students as $student) : 
						$user = User::getUserById($student->user_id);
						?>
						<tr>
					      <td><?php echo $student->user_id; ?></td>
					      <td><?php echo $user->firstname; ?></td>
					      <td><?php echo $user->lastname; ?></td>
					      <td><?php echo $user->email; ?></td>
					      <td><?php echo $student->name; ?></td>
					      <td><?php echo $student->teacher_id; ?></td>
					      <td><?php echo $student->address_line1; ?></td>
					    </tr>
						<?php  endforeach; ?>
					  </tbody>
					 </table>						
					</div>
	  			</div>
	  			
	  			<div class="tab-pane fade" id="Teachers">
	    			
	  			</div>
			
				<div class="tab-pane fade" id="Staff">
	    			
	  			</div>
			
			</div>
		</div>
  </body>
</html>

