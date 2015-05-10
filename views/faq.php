<!DOCTYPE html>
<html>
	<?php require 'shared/head.php'; ?>
	<body>
	<?php require 'shared/navbar.php'; ?>


	<!--Tom working on this file,
	replicated feedback form but will change -->


	
	<div class="container">
	<div class="bs-docs-section">
	<div class = "row">
	<div class="main col-md-12">
		<h1 class="page-header">F.A.Q - Support & Help</h1>
			<?php require 'shared/notice.php'; ?>
		<div class="well col-md-8 col-md-offset-2">
		 	<form action="<?php echo $app->urlFor('teacher_store'); ?>" method="post" class="form-horizontal">

		 		<!-- Maybe add more, find ideas of the others tomorrow -->

				<!--How can i register for an account ?-->
				<div class="form-group">
					<div class="col-sm-8">
						<h2>How can i register for an account ?</h2>
					</div>
					<div class="col-sm-8">
						<div class="well well-lg">
							1. Begin at homepage and click "Register" (Found at top right of navigational bar)<br>
							2. Click "Student" or "Teacher" from drop down menu <br>
							3. A simple registration form will be displayed <br>
							4. Fill in registration form will your details <br>
							5. Click "Submit" and use these details to Log In
						</div>
					</div>
				</div>

				<!--How can i connect with StudentRecruiter on social media ?-->
				<div class="form-group">
					<div class="col-sm-8">
						<h2>Can i find Student Recruiter on social media ?</h2>
					</div>
					<div class="col-sm-8">
						<div class="well well-lg">
							1. Facebook, LinkedIn and Twitter buttons are displayed in the middle of the homepage<br>
							2. Clicking any of these will direct you to the relevent social media <br>
							3. Follow us on Twitter <br>
							4. Add us on Facebook <br>
						</div>
					</div>
				</div>

				<!--How do i apply to attend an event ?-->
				<div class="form-group">
					<div class="col-sm-8">
						<h2>How do i apply to attend an event ?</h2>
					</div>
					<div class="col-sm-8">
						<div class="well well-lg">
							1. Begin at the homepage and click "Events" (Found at top left of navigational bar)<br>
							2. Event details and information will be displayed <br>
							3. Click red "Book" button found at bottom left of each event details section <br>
						</div>
					</div>
				</div>

				<!--How can i find my building ? -->
				<div class="form-group">
					<div class="col-sm-8">
						<h2>How can i find my building ?</h2>
					</div>
					<div class="col-sm-8">
						<div class="well well-lg">
							1. Begin at the homepage and click "Map" (Found at top left of navigational bar)<br>
							2. A campus map will be displayed <br>
							3. Relevant buildings are labelled <br>
							4. Zoom in and out buttons are found at top left of the map <br>
						</div>
					</div>
				</div>

			</form>
	</div>
	</div>
	</div>
	</div>
	</div>
	<?php require 'shared/footer.php'; ?>
	</body>
</html>
