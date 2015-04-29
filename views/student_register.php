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
			<h1 class="page-header">Student Registration</h1>
			<p>Register for an account. <span class="error">* required</span></p>

			<?php require 'shared/notice.php'; ?>

			<!-- Registration form -->
			<div class="well col-md-8 col-md-offset-2">
			<form action="<?php echo $app->urlFor('student_store'); ?>" method="post" class="form-horizontal">

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
						<select class="form-control" name="gender">
							<option value="0">Male</option>
							<option value="1">Female</option>
						</select>
					</div>
				</div>

				<!--date of birth-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						DOB: <span class="error">*<?php echo $dobErr?></span>
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

				<!--address-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Address line 1: <span class="error">*<?php echo $addr1Err; ?></span>
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="addr1" value="<?php echo $_SESSION['addr1'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Address line 2: <span class="error"><?php echo $addr2Err; ?></span>
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="addr2" value="<?php echo $_SESSION['addr2'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Address line 3: <span class="error">*<?php echo $townErr; ?></span>
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="addr3" value="<?php echo $_SESSION['town'];?>">
					</div>
				</div>

				<!-- postcode -->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Post code: <span class="error">*<?php echo $postcodeErr; ?></span>
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="postcode" value="<?php echo $_SESSION['postcode'];?>">
					</div>
				</div>

        <!--School-->
        <div class="form-group">
          <label class="col-sm-2 control-label">
            School:
          </label>
          <div class="col-sm-10">
            <select class="form-control" name="school_id">
							<?php foreach($schools as $school): ?>
							<option value="<?php echo $school->id ?>"><?php echo $school->name; ?></option>
							<?php endforeach?>
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
<?php require 'shared/footer.php';?>
</body>
</html>
