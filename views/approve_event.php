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
			<h1 class="page-header">Approve event</h1>

			<!-- Request form -->
			<div class="well col-md-8 col-md-offset-2">
			<form action="<?php echo $app->urlFor('store_approve_event', array('id' => $event->id));?>" method="post" class="form-horizontal">

				<!--Send a comment-->
				<div class="form-group">
					<label class="col-sm-2 control-label">
						Comments:
					</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="4" id=description type="comment" name="description"></textarea>
					</div>
				</div>
				<?php	$approved_by=$user->id; ?>
				<div class="col-sm-offset-2">
					<button class="btn btn-default">Cancel</button>
					<button type="submit" class="btn btn-success"><i class="fa fa-thumbs-o-up fa-lg fa-fw"></i> Approve</button>
				</div>			

			</form><!-- end of event form -->
			</div><!-- page end -->
		</div>
	</div>
	</div>
</div>
</body>
</html>
