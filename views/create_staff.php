<!DOCTYPE html>
<html>
<?php require 'shared/head.php'; ?>
<body>
<?php require 'shared/navbar.php'; ?>
<div class="container">
	<div class="bs-docs-section">
	<div class="row">
		<div class="main col-md-12">

			<!-- page start -->
			<h1 class="page-header">Add a new staff member</h1>

			<?php require 'shared/notice.php'; ?>

			<!-- Registration form -->
			<div class="well col-md-8 col-md-offset-2">
			<form action="<?php echo $app->urlFor('staff_store'); ?>" method="post" class="form-horizontal">

			<!--title, drop down-->
	  	<div class="form-group">
	    	<label class="col-sm-2 control-label">
	      	Title:
	      </label>
	      <div class="col-sm-10">
	      	<select class="form-control" name="title">
	       		<option value="Mr">Mr</option>
	        	<option value="Mrs">Mrs</option>
	        	<option value="Ms">Ms</option>
	         	<option value="Miss">Miss</option>
	         	<option value="Dr">Dr</option>
	      	</select>
	     	</div>
			</div>

				<!--first name-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						First name:
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="fname">
					</div>
				</div>

				<!--last name-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Surname:
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="lname">
					</div>
				</div>


				<!--email-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Email:
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="email">
					</div>
				</div>

				<!--password-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Password:
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="password" name="password">
					</div>
				</div>

				<!--phone number-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Phone:
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name = "phone">
					</div>
				</div>

				<!--gender, drop down-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Gender:
					</label>
					<div class="col-sm-10">
						<select class="form-control" name="gender">
							<option value="M">Male</option>
							<option value="F">Female</option>
						</select>
					</div>
				</div>

				<!--date of birth-->
        <div class="form-group">
					<label class="col-sm-2 control-label">
          	DOB:
        	</label>
        	<div class="col-sm-10">
            <input type="text" class="datepicker form-control" name="dob" placeholder="DD/MM/YYYY">
            <script>
              $('.datepicker').datepicker({
				autoclose: true,
                format: "d M yyyy",
                startView: 2,
                defaultViewDate: {
                  year: 1996,
                  month: 1,
                  day: 1
                }
              });
            </script>
					</div>
				</div>

				<!--department-->
				<div class="form-group">
	      	<label class="col-sm-2 control-label">
	        	Department:
	        </label>
	        <div class="col-sm-10">
	        	<select class="form-control" name="department_id">
	          	<option value="01">Department of Art</option>
	            <option value="64">Department of Computer Science</option>
	            <option value="66">Department of Music</option>
	            <option value="80">Department of Philosophy</option>
	            <option value="99">Department of Physics</option>
	          </select>
	        </div>
	      </div>
				<!--submit form-->
				<input class="col-sm-offset-2 btn btn-primary" type="submit">
			</form>
		<!-- end of registration form -->
		</div>
	<!-- page end -->

</div>
</div>
</div>
</div>
</body>
</html>
