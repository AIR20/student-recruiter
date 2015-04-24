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

				<h1 class="page-header">Events listing</h1>
				<p>A list of all events</p>
				<div class="well col-md-8 col-md-offset-2">
					<?php foreach($events as $event) : ?>
						<div class="panel panel-primary">
							<div class="panel-heading">
			    			<h3 class="panel-title"><a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>"><?php echo $event->title ?></a></h3>
					  	</div>
		
						<div class="panel-body">
								<big><b>Description:</b></big>
		  	  			<?php echo $event->description ?>
						</br>
						<div style="float:right">
						<a href="<?php echo $app->urlFor('home'); ?>" class="btn btn-primary">Book</a> 
						</div>
					  	</div>
						</div>
					<?php  endforeach; ?>
				</div>
			</div>
			</div>
		</div>
  </body>
</html>

