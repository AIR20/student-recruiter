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
			<h1 class="page-header">Make staff account</h1>
			<p>Make an account for university staff users. <span class="error">* required</span></p>

			<!-- Registration form -->
			<div class="well col-md-8 col-md-offset-2">
			<form action="" method="post" class="form-horizontal">
				
	            <!--title, drop down-->
	            <div class="form-group">
	              <label class="col-sm-2 control-label">
	                Title: 
	              </label>
	              <div class="col-sm-10">
	                <select class="form-control" name="password">
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
						First name: <span class="error">*<?php echo $fnameErr; ?></span>
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="fname" value="<?php echo $_SESSION['fname'];?>">
					</div>
				</div>
				
				<!--last name-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Surname: <span class="error">*<?php echo $lnameErr; ?></span>
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="lname" value="<?php echo $_SESSION['lname'];?>">
					</div>
				</div>
				
				
				<!--email-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Email: <span class="error">*<?php echo $emailErr; ?></span>
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="email" value="<?php echo $_SESSION['email'];?>">
					</div>
				</div>
				
				<!--password-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Password: <span class="error">*<?php echo $passwErr; ?></span>
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="password" name="password" value="<?php echo $_SESSION['password'];?>">
					</div>
				</div>

				<!--gender, drop down-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Gender: <span class="error">*</span>
					</label>
					<div class="col-sm-10">
						<select class="form-control" name="password">
							<option value="M">Male</option>
							<option value="F">Female</option>
						</select>
					</div>
				</div>

				<!--department-->
	            <div class="form-group">
	              <label class="col-sm-2 control-label">
	               		Department: 
	              </label>
	              <div class="col-sm-10">
	                <select class="form-control" name="department_id">
	                  <option value="1">Art</option>
	                  <option value="2">Computer Science</option>
	                  <option value="3">Music</option>
	                  <option value="4">Philosophy</option>
	                  <option value="5">Physics</option>
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
