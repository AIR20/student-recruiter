<!DOCTYPE html>
<html>
<?php require 'shared/head.php';?>

  <body>
    <?php require 'shared/navbar.php';?>


	
    <div class="container">
      <div class="well col-md-9 col-md-offset-1">
        <h1>Account Details</h1>
        <h3></h3>
        

        <div class="panel panel-default">
          <div class="panel-body">
            
            <p><big><b>Name : </b><?php echo $user->firstname;?> <?php echo $user->lastname;?></big> </p>
			<p><big><b>Email : </b> <?php echo $user->email;?> </big> </p>
			<p><big><b>DOB : </b> <?php echo $user->dob;?> </big> </p>
			<p><big><b>Gender : </b> <?php if($user->gender == 0) echo "Male"; else echo "Female";?> </big> </p>
			<p><big><b>Registered Date : </b> <?php echo $user->registered_at?> </big> </p>
          </div>
        </div>

        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Event details</h3>
          </div>
          <div class="panel-body">
            <ul>
            <?php foreach ($events as $e): ?>
              <li><?php echo $e->title;?></li>
            <?php endforeach; ?>
            </ul>
          </div>
        </div>

        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">DELETE ACCOUNT</h3>
          </div>
          <div class="panel-body">
            </div>
        </div>


      </div>

    </div>

	
  </body>
</html>

