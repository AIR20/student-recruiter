<?php if (isset($flash['error'])): ?>
<div class="alert alert-dismissible alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Error</h4>
	<p><?php echo $flash['error']; ?></p>
</div>
<?php endif; ?>

<?php if (isset($flash['warning'])): ?>
<div class="alert alert-dismissible alert-warning">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Warning</h4>
	<p><?php echo $flash['warning']; ?></p>
</div>
<?php endif; ?>

<?php if (isset($flash['success'])): ?>
<div class="alert alert-dismissible alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Well done</h4>
	<p><?php echo $flash['success']; ?></p>
</div>
<?php endif; ?>

<?php if (isset($flash['info'])): ?>
<div class="alert alert-dismissible alert-info">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Notice</h4>
	<p><?php echo $flash['info']; ?></p>
</div>
<?php endif; ?>