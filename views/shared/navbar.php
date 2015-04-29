<!-- start of navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
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
					<a href="<?php echo $app->urlFor('map'); ?>">Map</a>
				</li>
				<li>
					<a href = "#">Calendar</a>
				</li>
				
				<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Teacher<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo $app->urlFor('teacher_view_class');?>">View students</a></li>
            <li><a href="<?php echo $app->urlFor('home');?>">View my events</a></li>
						<li class="divider"></li>
            <li><a href="<?php echo $app->urlFor('teacher_add_student');?>">Add students</a></li>
          </ul>
				</li>

				<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Staff<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo $app->urlFor('home');?>">View my events</a></li>
						<li><a href="<?php echo $app->urlFor('create_event');?>">Propose new event</a></li>
					</ul>
				</li>
				
				<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administrator<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
					<li><a href="<?php echo $app->urlFor('user_list');?>">View users</a></li>
					<li><a href="">Pending events &nbsp<span class="badge"><?php echo Event::countPendingEvents(); ?></span></a></li>
					<li class="divider"></li>
					<li><a href="<?php echo $app->urlFor('create_staff');?>">Add new staff</a></li>
					<li><a href="<?php echo $app->urlFor('add_department');?>">Add new department</a></li>
					<li><a href="<?php echo $app->urlFor('add_building');?>">Add new building</a></li>
					<li><a href="<?php echo $app->urlFor('add_room');?>">Add new room</a></li>
					<li><a href="<?php echo $app->urlFor('add_school');?>">Add new school</a></li>
          </ul>
        </li>
			</ul>
      
      <ul class="nav navbar-nav navbar-right">
				<?php if(!isset($_SESSION['user'])): ?>
				<li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Register<span class="caret"></span></a>
        			<ul class="dropdown-menu" role="menu">
            			<li><a href="<?php echo $app->urlFor('student_register');?>">Student</a></li>
           				<li><a href="<?php echo $app->urlFor('teacher_register');?>">Teacher</a></li>
					</ul>
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
			</ul>

		</div>
	</div>
</nav>
<!-- end of navbar -->
