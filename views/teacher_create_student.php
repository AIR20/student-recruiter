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
			<h1 class="page-header">Add a new student</h1>
			<?php require 'shared/notice.php'; ?>

			<!-- Registration form -->
			<div class="well col-md-8 col-md-offset-2">
			<form action="<?php echo $app->urlFor('teacher_store_student'); ?>" method="post" class="form-horizontal">

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

				<!--address-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Address line 1:
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="addr1">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Address line 2:
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="addr2">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Town:
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="addr3">
					</div>
				</div>

				<!-- postcode -->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Post code:
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="postcode">
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
