<!-- start of navbar -->
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a href="#" class="navbar-brand">Student Recruiter System</a>
			<!-- for small devices -->
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse" id="navbar-main">
			<ul class="nav navbar-nav">
				<li>
					<a href="<?php echo $app->urlFor('home'); ?>">Home</a>
				</li>
				<li>
					<a href="<?php echo $app->urlFor('student_register'); ?>">Register</a>
				</li>
				<li>
					<a href="#">Events</a>
				</li>
				<li>
					<a href="#">My Events</a>
				</li>
				<li>
					<a href="#">Account</a>
				</li>
				<li>
					<a href="#">Map</a>
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="<?php echo $app->urlFor('login'); ?>">Login</a>
				</li>
			</ul>

		</div>
	</div>
</div>
<!-- end of navbar -->
