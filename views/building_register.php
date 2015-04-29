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
			<?php require 'shared/notice.php'; ?>

			<!--form -->
			<div class="well col-md-8 col-md-offset-2">
			<form action="<?php echo $app->urlFor('building_store'); ?>" method="post" class="form-horizontal">	            

			<!--building name-->
			<div class="form-group">
				<label class="col-sm-2 control-label">
					Building name:
				</label>
				<div class="col-sm-10">
					<input class="form-control" type="text" name="name">
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
</body>
</html>
