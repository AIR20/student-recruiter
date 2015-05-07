CTYPE html>
<html>
  <?php require 'shared/head.php';?>
  <body>
    <?php require 'shared/navbar.php';?>
		<div class="container">
			<h1 class="page-header">View feedback</h1>
			<?php require 'shared/notice.php'; ?>
			<div class="row">
				<div class="main col-sm-12 col-sm-offset-1">
				<?php $i=1; ?>
					<div class="content col-sm-5">
						<blockquote>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
							<small>Anonymous <?php echo $i++; ?></cite></small>
						</blockquote>
					</div>
				</div>
			</div>
		</div>
		<?php include 'shared/footer.php' ?>
  </body>
</html>
