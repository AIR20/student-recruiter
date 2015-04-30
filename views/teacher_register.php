<!DOCTYPE html>
<html>
	<?php require 'shared/head.php'; ?>
	<body>
	<?php require 'shared/navbar.php'; ?>
	<div class="container">
	<div class="bs-docs-section">
	<div class = "row">
	<div class="main col-md-12">
		<h1 class="page-header"> Teacher registration</h1>
			<?php require 'shared/notice.php'; ?>
		<div class="well col-md-8 col-md-offset-2">
		 	<form action="<?php echo $app->urlFor('teacher_store'); ?>" method="post" class="form-horizontal">

				<div class="form-group">
					<label class="col-sm-2 control-label">
						Name:
					</label>
					<div class="col-sm-2">
						<select class="form-control" name="title">
						<option value="Mr">Mr</option>
						<option value="Mrs">Mrs</option>
						<option value="Ms">Ms</option>
						<option value="Miss">Miss</option>
						<option value="Dr">Dr</option>
						</select>
					</div>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="fname" placeholder="First name">
					</div>
					<div class="col-sm-3">
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
						Phone:
					</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" name="phone">
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
						School:
					</label>
					<div class="col-sm-8">
						<select class="form-control" name="school_id">
					 		<?php foreach($schools as $school): ?>
							<option value="<?php echo $school->id?>"><?php echo $school->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			<input class="col-sm-offset-2 btn btn-primary" type="submit">
		</form>
	</div>
	</div>
	</div>
	</div>
	</div>
	<?php require 'shared/footer.php'; ?>
	</body>
</html>
