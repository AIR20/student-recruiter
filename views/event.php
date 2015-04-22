<!DOCTYPE html>
<html>
<?php require 'shared/head.php';?>

  <body>
    <?php require 'shared/navbar.php';?>

	
	<?php $numEvents = count($events) ?>
	<?php foreach($events as $event) : ?>
<div class="panel panel-primary">
  <div class="panel-heading">

    <h3 class="panel-title"><a href="<?php echo $app->urlFor('view_event', array('id' => $event->id)); ?>"><?php echo $event->title ?></a></h3>
  </div>
  <div class="panel-body">
	<big><b>Description:</b></big>
	
    <?php echo $event->description ?>
  </div>
</div>
<?php  endforeach; ?>


  </body>
</html>

