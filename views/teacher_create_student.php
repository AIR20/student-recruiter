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

				<div class="form-group">
					<label class="col-sm-2 control-label">
						Name:
					</label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="fname" placeholder="First name">
					</div>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="lname" placeholder="Surname">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Email:
					</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" name="email" placeholder="example@gmail.com">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">
						Password:
					</label>
					<div class="col-sm-8">
						<input class="form-control" type="password" name="password">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">
						DOB:
					</label>
					<div class="col-sm-4">
						<input type="text" class="datepicker form-control" name="dob" placeholder="DD/MM/YYYY">
						<script>
							$('.datepicker').datepicker({
								autoclose: true,
								format: "d M yyyy",
								startView: 2,
								defaultViewDate: {
								year: 1985,
								month: 1,
								day: 1
								}
							});
						</script>
					</div>
					<div class="col-sm-4">
						<select class="form-control" name="gender">
							<option value="0">Male</option>
							<option value="1">Female</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">
						Address:
					</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" name="addr1" placeholder="House number and street">
					</div>		
				</div>

				<div class="form-group">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<input class="form-control" type="text" name="addr2" placeholder="House name/Flat number (optional)">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-2"></div>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="addr3" placeholder="Town">
					</div>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="postcode" placeholder="Postcode">
					</div>
				</div>

					<div class="col-sm-offset-2">
						<button type="reset" class="btn btn-default">Reset</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
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
