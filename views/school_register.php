<!DOCTYPE html>
<html>
<?php require 'shared/head.php'; ?>
<body>
<?php require 'shared/navbar.php'; ?>
<div class="container">
	<div class="bs-docs-section">
	<div class="row">
		<div class="main col-md-12">
			<h1 class="page-header">Add a school</h1>
			<?php require 'shared/notice.php'; ?>

			<div class="well col-md-8 col-md-offset-2">
				<form action="<?php echo $app->urlFor('school_store'); ?>" method="post" class="form-horizontal">

				<div class="form-group">
					<label class="col-sm-2 control-label">
						School details:
					</label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="name" placeholder="School name"> 
					</div>
					<div class="col-sm-4">
           				 <select class="form-control" name="school_type">
							<option value="Secondary school">Secondary school</option>
							<option value="College">College</option>
            			</select>
          			</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">
						Address:
					</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" name="addr1" placeholder="Street number, street name line 1">
					</div>		
				</div>

				<div class="form-group">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<input class="form-control" type="text" name="addr2" placeholder="Street name line 2 (optional)">
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
						<input class="form-control" type="text" name="phone" placeholder="0151 795 4275">
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
