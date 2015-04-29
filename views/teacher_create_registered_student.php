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
				<li class="active"><a aria-expanded="true" href="#Students" data-toggle="tab">Students  &nbsp<span class="badge"><?php echo User::countStudentsFromSchool($schoolID); ?></span></a></a></li>
				
			</ul>

			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade active in" id="Students">
					<table class="table table-striped table-hover " id="student-list">
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
			</div>
			
			<form id ="form" action="<?php echo $app->urlFor('teacher_store_registered_student'); ?>" method="post" class="form-horizontal">
				 
				<input class="col-sm-offset-2 btn btn-primary" type="submit">
			</form>
			
			<script type="text/javascript">
			
		$("#student-list tbody tr").click(function() {
			//$(this).removeClass('danger');
			
			
			
			
			if($(this).hasClass('danger')){
				$(this).removeClass('danger');
				$('#form #student-number-' + $(this).children().first().html()).remove();
			} else {
				$('#form').append('<input id = "student-number-' + $(this).children().first().html()+'" type="hidden" name="list[]" value="'+ $(this).children().first().html() +'">')
				$(this).addClass('danger');
			}
			
		});
	</script>

		</div>
		</div>	
		</div>
	</div>
	<?php require('shared/footer.php'); ?>
</body>
</html>

