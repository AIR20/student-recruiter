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

				<li class="dropdown">
					<a href="<?php echo $app->urlFor('list_event'); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Events<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?php echo $app->urlFor('list_event');?>">All events</a></li>

						<?php if(isset($user)): ?>
							<li class="divider"></li>
							<?php if($user->isAdmin()): ?>
							<li><a href="<?php echo $app->urlFor('pending_events');?>">Pending Events &nbsp<span class="badge"><?php echo Event::countPendingEvents(); ?></span></a></li>
							<?php endif; ?>
							<?php if($user->isTeacher() || $user->isStudent()): ?>
							<li><a href=#>My Events<span class="badge"></span></a></li>
							<?php endif; ?>
							<?php if($user->isStaff()): ?>
							<li><a href=#>My Events<span class="badge"></span></a></li>
							<?php endif; ?>
						<?php endif; ?>

					</ul>
		 		</li>


				<li>
					<a href="<?php echo $app->urlFor('map'); ?>">Map</a>
				</li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Teacher<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?php echo $app->urlFor('home');?>">My events</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo $app->urlFor('teacher_view_class');?>">Manage my class</a></li>
						<li><a href="<?php echo $app->urlFor('teacher_add_student');?>">Add new students to class</a></li>
						<li><a href="<?php echo $app->urlFor('teacher_add_registered_student');?>">Add existing students to class</a></li>
					</ul>
		 		</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Uni Staff<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href=#>Manage my events</a></li>
						<li><a href=#>View feedback</a></li>
						<li><a href=#>View statistics</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo $app->urlFor('create_event');?>">Propose new event</a></li>
					</ul>
				</li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administrator<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">

							<li><a href="<?php echo $app->urlFor('pending_events'); ?>">Pending events &nbsp<span class="badge"><?php echo Event::countPendingEvents(); ?></span></a></li>
							<li><a href=#>View statistics</a></li>
							<li><a href="<?php echo $app->urlFor('user_list');?>">View users</a></li>
							<li><a href="<?php echo $app->urlFor('department_list');?>">View departments</a></li>
							<li><a href=#>View schools</a></li>
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
					<a href="<?php echo $app->urlFor('account'); ?>"><?php echo $user->firstname . ' ('; if($user->isStudent()): echo 'Student'; elseif($user->isStaff()): echo 'Staff'; elseif($user->isTeacher()): echo 'Teacher'; elseif($user->isAdmin()): echo 'Admin'; endif; echo ')'; ?></a>
				</li>
				<li>
					<a href="<?php echo $app->urlFor('logout'); ?>">Logout</a>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>