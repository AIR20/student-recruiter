<!DOCTYPE html>
<html>
	<?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
		<?php $numEvents = count($events) ?>
		<div class="container">
			<div class="bs-docs-section">
			<div class="row">
			<div class="main col-md-12">

				<h1 class="page-header">Upcoming events</h1>
				<div class="well col-md-8 col-md-offset-2">
					<?php foreach($students as $student) : ?>
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title"><?php echo $student>id;?><h3>
							</div>		
							<div class="panel-body">
								<p><?php echo $student->user_id?></p>
								</br>
							</div>
						</div>
					<?php  endforeach; ?>
				</div>
			</div>
			</div>
		</div>
  </body>
</html>

