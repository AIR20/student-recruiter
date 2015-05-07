<!DOCTYPE html>
<html>
<?php require 'shared/head.php'; ?>
<body>
<?php require 'shared/navbar.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<!-- start of login panel -->
			<div class="login-panel">
				<?php require 'shared/notice.php';?>
			<div class="well">
				<form method="post" class="form-horizontal" action="<?php echo $app->urlFor('auth'); ?>">
					<fieldset>
						<legend>Login</legend>
						<div class="form-group">
							<label class="col-md-2 control-label">Email</label>
							<div class="col-md-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
									<input class="form-control" type="text" name="email" size="64" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Password</label>
							<div class="col-md-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
									<input class="form-control" type="password" name="password" size="64" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-10 col-md-offset-2">
								<input class="btn btn-primary" type="submit" name="submit" value="login" />
								<a href="#">Forgot password?</a>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			</div>
			<!-- end of login panel -->

		</div>
	</div>
</div>
<?php require 'shared/footer.php'; ?>
</body>
</html>
