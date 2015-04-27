<!DOCTYPE html>
<html>
<?php require 'shared/head.php';?>
<body>
<?php require 'shared/navbar.php';?>
<div class="container">
	<h1 class="page-header">Class Management</h1>
	<p class="lead"><a class="btn btn-primary" href="<?php echo $app->urlFor('teacher_add_student'); ?>"><i class="fa fa-plus-circle fa-lg fa-fw"></i> Add Student</a> You have <?php echo count($students); ?> students in your class. </p>

	<div class="row">
		<?php foreach ($students as $st): ?>
		<div class="col-sm-6">
			<div class="student panel panel-default">
				<div class="panel-heading"><?php echo $st->firstname.' '.$st->lastname; ?></div>
				<div class="panel-body">
					<div class="row">
					<div class="col-md-8">
					<ul>
						<li>
							<i class="fa fa-envelope-o fa-fw"></i> Email: <?php echo $st->email; ?>
						</li>
						<li>
							<i class="fa fa-birthday-cake fa-fw"></i> DOB: <?php echo $st->dob; ?>
						</li>
						<li>
							<i class="fa fa-map-marker fa-fw"></i> Address:
							<address>
								<strong><?php echo $st->address_line1; ?></strong><br>
								<?php echo $st->address_line2; ?><br>
								<?php echo $st->address_line3; ?><br>
								<?php echo $st->postcode; ?>
							</address>
						</li>
					</ul>
					</div>
					<div class="col-md-4 btn-group">
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
		<?php endforeach; ?>
	</div>
</div>
<?php require 'shared/footer.php';?>
</body>
</html>
