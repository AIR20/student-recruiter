<!DOCTYPE html>
<html>
<?php require 'shared/head.php';?>
<body>
<?php require 'shared/navbar.php';?>
<div class="container">
	<h1 class="page-header">Class Management</h1>
	<div class="row">
		<div class="col-sm-6">
			<div class="student panel panel-default">
				<div class="panel-heading">Student Name</div>
				<div class="panel-body">
					<div class="row">
					<div class="col-sm-8">
					<ul>
						<li>
							<i class="fa fa-envelope-o fa-fw"></i> Email: placeholder@example.com
						</li>
						<li>
							<i class="fa fa-phone fa-fw"></i> Phone: 1234567
						</li>
						<li>
							<i class="fa fa-map-marker fa-fw"></i> Address:
							<address>
								<strong>Twitter, Inc.</strong><br>
								795 Folsom Ave, Suite 600<br>
								San Francisco, CA 94107
							</address>
						</li>
					</ul>
					</div>
					<div class="col-sm-4 btn-group">
						<button type="button" class="btn btn-primary">
							<i class="fa fa-cog fa-lg fa-fw"></i> Operation
						</button>
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
						    <span class="caret"></span><span class="sr-only">Operation</span>
						</button>
						<ul class="dropdown-menu" role="menu">
						    <li><a href="#"><i class="fa fa-pencil fa-fw"></i> Edit</a></li>
						    <li><a href="#"><i class="fa fa-trash-o fa-fw"></i> Delete</a></li>
						</ul>
                    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require 'shared/footer.php';?>
</body>
</html>
