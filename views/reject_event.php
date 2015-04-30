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
			<h1 class="page-header">Reject event</h1>

			<!-- Request form -->
			<div class="well col-md-8 col-md-offset-2">
			<form action="<?php echo $app->urlFor('event_store');?>" method="post" class="form-horizontal">

				<!--Reason-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Reason for rejection:
					</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="4" id=description type="comment" name="description"></textarea>
					</div>
				</div>

				<<div class="col-sm-offset-2">
					<button type="reset" class="btn btn-default">Reset</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>			
			</form><!-- end of event form -->
			</div><!-- page end -->
		</div>
	</div>
	</div>
</div>
</body>
</html>
