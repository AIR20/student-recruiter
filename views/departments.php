<!DOCTYPE html>
<html>
	<?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
   <div class="container">
	<h1 class="page-header">Department list</h1>
	<?php require 'shared/notice.php'; ?>
		<div class="row">
		<?php foreach($departments as $department) : ?>
		<div class="col-sm-4">
			<div class="student panel panel-default">
				<div class="panel-heading"><?php echo $department->name; ?></div>
				<div class="panel-body">
					<div class="row">
					<div class="col-md-8">
					<?php echo Building::getBuildingById($department->building_id)->name; ?> 
						</br>
						<?php echo $department->address_line1; ?>
						</br>
						<?php if(isset($department->address_line2)):
							echo $department->address_line2; ?>
							</br>
						<?php endif; ?>
						<?php echo $department->address_line3 . ' ' . $department->postcode; ?>
						</br>
						</br>
						Staff:
						</br>
			    		<?php foreach($staffs as $staff) :?>
			    		<?php if($staff->department_id==$department->id) : ?>
			    			<?php echo $staff->firstname. ' ' . $staff->lastname; ?>
			    			</br><?php endif; ?>
			    		<?php endforeach; ?>
					</div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<?php require 'shared/footer.php'; ?>
  </body>
</html>