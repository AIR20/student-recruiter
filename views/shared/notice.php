<?php if (isset($flash['error'])): ?>
<div class="alert alert-dismissible alert-warning">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Warning</h4>
	<p><?php echo $flash['error']; ?></p>
</div>
<?php endif; ?>