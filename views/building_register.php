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
			<h1 class="page-header">Add a Building</h1>
			<p>Add a building to the database <span class="error">* required</span></p>

			<!-- Registration form -->
			<div class="well col-md-8 col-md-offset-2">
			<form action="" method="post" class="form-horizontal">	            

				<!--first name-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Building Name:
					</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="bname" value="<?php echo $_SESSION['bname'];?>">
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