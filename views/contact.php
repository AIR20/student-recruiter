<!DOCTYPE html>
<html>
	<?php require 'shared/head.php'; ?>
	<body>
	<?php require 'shared/navbar.php'; ?>
	<div class="container">
	<div class="bs-docs-section">
	<div class = "row">
	<div class="main col-md-12">
		<h1 class="page-header">Contact Us</h1>
			<?php require 'shared/notice.php'; ?>
		<div class="well col-md-8 col-md-offset-2">
		 	<form action="<?php echo $app->urlFor('teacher_store'); ?>" method="post" class="form-horizontal">

				<!-- Contact Details -->
				<div class="list-group">
  					<a href="#" class="list-group-item">
    					<h4 class="list-group-item-heading">Alex Y. Chan</h4>
   					<p class="list-group-item-text">A.Chan@student.liverpool.ac.uk</p>
  				</a>
  				<a href="#" class="list-group-item">
  			  <h4 class="list-group-item-heading">Rihan Yang</h4>
  			  <p class="list-group-item-text">R.Yang6@student.liverpool.ac.uk</p>
 			 </a>  				
 			 <a href="#" class="list-group-item">
  			  <h4 class="list-group-item-heading">Minhyung Adrian Kim</h4>
  			  <p class="list-group-item-text">M.Kim2@student.liverpool.ac.uk</p>
 			 </a>
 	 			<a href="#" class="list-group-item">
  			  <h4 class="list-group-item-heading">Thomas Sanguinetti</h4>
  			  <p class="list-group-item-text">T.L.Sanguinetti@student.liverpool.ac.uk</p>
 			 </a>
 				<a href="#" class="list-group-item">
  			  <h4 class="list-group-item-heading">Mohamed Balak</h4>
  			  <p class="list-group-item-text">M.Balak2@student.liverpool.ac.uk</p>
 			 </a>
			</div>
			</form>
	</div>
	</div>
	</div>
	</div>
	</div>
	<?php require 'shared/footer.php'; ?>
	</body>
</html>