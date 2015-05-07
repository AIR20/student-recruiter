<!DOCTYPE html>
<html>
<?php require 'shared/head.php'; ?>
<body>
<?php require 'shared/navbar.php'; ?>
<div class="container">
	<div class="bs-docs-section">
	<div class="row">
		<div class="main col-md-12">

			<h1 class="page-header">Cancel event</h1>

			<div class="well col-md-8 col-md-offset-2">
			<form action="<?php echo $app->urlFor('store_cancel_event', array('id' => $event->id));?>" method="post" class="form-horizontal">

				<div class="form-group">
					<label class="col-sm-2 control-label">
						Reason for cancellation:
					</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="4" id=comment type="comment" name="comment"></textarea>
					</div>
				</div>
				<?php	$approved_by=$user->id; ?>
				<div class="col-sm-offset-2">
					<button class="btn btn-default">Cancel</button>
					<button type="submit" class="btn btn-danger"><i class="fa fa-close fa-lg fa-fw"></i> Cancel</button>
				</div>			

			</form>
			</div>
		</div>
	</div>
	</div>
</div>
</body>
</html>
