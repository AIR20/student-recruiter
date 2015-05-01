<!DOCTYPE html>
<html>
	<?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
	<div class="container">
		<h1 class="page-header">Department list</h1>
		<?php require 'shared/notice.php'; ?>
		<div class="row">
			<div class="main col-sm-11 col-md-offset-1">
				
				<div class="content col-sm-5">
					<?php foreach($departments as $department) : ?>
					<div class="panel panel-default">
						<div class="panel-heading"><?php echo $department->name; ?></div>
	  					<div class="panel-body">
	  						<?php echo Building::getBuildingById($department->id)->name . "\r\n" . $department->address_line1 . "\r\n" . $department->address_line2; ?>

	    					<?php foreach($staffs as $staff) :?>
	    						<?php if($staff->department_id==$department->id) : ?>
	    							<?php echo $staff->id; ?>
	    							<?php echo $staff->firstname. ' ' . $staff->name; ?>
	    						<?php endif; ?>
	    					<?php endforeach; ?>
	    				</div>	
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<?php require 'shared/footer.php'; ?>
  </body>
</html>
