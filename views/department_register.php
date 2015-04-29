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
			<h1 class="page-header">Add department</h1>
			<?php require 'shared/notice.php'; ?>

			<!-- Registration form -->
			<div class="well col-md-8 col-md-offset-2">
			<form action="<?php echo $app->urlFor('department_store'); ?>" method="post" class="form-horizontal">

				<!--Department name-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Department name:
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="name"> 
					</div>
				</div>

        <!--Building-->
        <div class="form-group">
          <label class="col-sm-2 control-label">
            Building:
          </label>
          <div class="col-sm-10">
            <select class="form-control" name="building_id">
							<?php foreach($buildings as $building): ?>
							<option value="<?php echo $building->id ?>"><?php echo $building->name; ?></option>
							<?php endforeach?>
            </select>
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

				<!--phone-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Phone:
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="phone"> 
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
