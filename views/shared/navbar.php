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
					<a href="<?php echo $app->urlFor('list_event'); ?>">Events</a>
				</li>
				<li>
					<a href="#">Map</a>
				</li>
				<li>
					<a href = "#">Calendar</a>
				</li>
			</ul>
      
      <ul class="nav navbar-nav navbar-right">
				<?php if(!isset($_SESSION['user'])): ?>
				<li>
					<a href="<?php echo $app->urlFor('student_register'); ?>">Register</a>
				</li>
				
				
				<li>
					<a href="<?php echo $app->urlFor('login'); ?>">Login</a>
				</li>
				<?php else: ?>
				<li>
					<a href="<?php echo $app->urlFor('account'); ?>">Account</a>
				</li>
				<li>
					<a href="<?php echo $app->urlFor('logout'); ?>">Logout</a>
				</li>
				<?php endif; ?>
        <li style="top:15px;"> 
          <a class="twitter-follow-button"
            href="https://twitter.com/StdntRecruiter"
            data-show-count="false"
            data-lang="en"
            data-align="right">

            Follow @StdntRecruiter
          </a>
          <script>window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return t;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));</script>
        </li>
			</ul>

		</div>
	</div>
</div>
<!-- end of navbar -->
