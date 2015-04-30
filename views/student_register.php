<!DOCTYPE html>
<html>
<?php require 'shared/head.php'; ?>
<body>
<?php require 'shared/navbar.php'; ?>
<div class="container">
	<div class="bs-docs-section">
	<div class="row">
		<div class="main col-md-12">
			<h1 class="page-header">Student Registration</h1>
			<?php require 'shared/notice.php'; ?>

			<!-- Registration form -->
			<div class="well col-md-8 col-md-offset-2">
				<form action="<?php echo $app->urlFor('student_store'); ?>" method="post" class="form-horizontal" data-toggle="validator">

				<div class="form-group">
					<label class="col-sm-2 control-label">
						Name:
					</label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="fname" placeholder="First name" required>
					</div>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="lname" placeholder="Surname" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Email:
					</label>
					<div class="col-sm-8">
						<input class="form-control" type="email" name="email" placeholder="example@gmail.com" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">
						Password:
					</label>
					<div class="col-sm-8">
						<input class="form-control" type="password" name="password" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">
						Avatar:
					</label>
					<div class="col-sm-8">
						<input id="avatar-url" type="hidden" name="avatar">
						<div id="avatar" class="dropzone"></div>
						<script type="text/javascript">
							Dropzone.options.avatar = {
								url: '<?php echo $app->urlFor('upload') ?>',
								paramName: "file", // The name that will be used to transfer the file
								maxFilesize: 2,
								maxFiles: 1,
								init: function() {
									this.on("success", function(file, response) {
										$('#avatar-url').val(response.url);
									});
								}
							};
						</script>
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
						<input class="form-control" type="text" name="addr1" placeholder="House number and street" required>
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
						<input class="form-control" type="text" name="addr3" placeholder="Town" required>
					</div>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="postcode" placeholder="Postcode" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">
						School:
					</label>
					<div class="col-sm-8">
						<select class="form-control" name="school_id">
							<?php foreach($schools as $school): ?>
							<option value="<?php echo $school->id ?>"><?php echo $school->name; ?></option>
							<?php endforeach?>
						</select>
					</div>
				</div>
				<div class="col-sm-offset-2">
					<button type="reset" class="btn btn-default">Reset</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
	</div>
	</div>
</div>
<?php require 'shared/footer.php';?>
</body>
</html>
