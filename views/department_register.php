<!DOCTYPE html>
<html>
<?php require 'shared/head.php'; ?>
<body>
<?php require 'shared/navbar.php'; ?>
<div class="container">
	<div class="bs-docs-section">
	<div class="row">
		<div class="main col-md-12">

			<h1 class="page-header">Add department</h1>
			<?php require 'shared/notice.php'; ?>
			<div class="well col-md-8 col-md-offset-2">
				<form action="<?php echo $app->urlFor('department_store'); ?>" method="post" class="form-horizontal">
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<abbr title="Department">Dept.</abbr> name:
						</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="name" placeholder="eg. Department of Computer Science"> 
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">
							Building:
						</label>
						<div class="col-sm-8">
							<select class="form-control" name="building_id">
								<?php foreach($buildings as $building): ?>
								<option value="<?php echo $building->id ?>"><?php echo $building->name; ?></option>
								<?php endforeach?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">
							Address:
						</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="addr1" placeholder="Building number">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="addr2" placeholder="Building name">
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

					<div class="form-group">
						<label class="col-sm-2 control-label">
							Phone:
						</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="phone" placeholder="Phone number"> 
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
