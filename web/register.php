<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>StudentRecruiter - Main</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link rel="shortcut icon" href="http://icons.iconseeker.com/ico/europe/scotland-2.ico"/>
		<link href="http://fonts.googleapis.com/css?family=.|Lato:light,normal,bold|Oswald:light,normal,bold|Oswald:light,normal,bold|Open+Sans:light,normal,bold" rel="stylesheet" type="text/css">
	</head>
	
	<body>
	<?php require 'header.php';?>
	<div id="navbar"><?php require 'navbar.php';?></div>	
		
		<!-- registration form -->
	<div id="form" style="width:200px">
		<form action="" method="post">
		Name: <input type="text" name="name"><br>
		E-mail: <input type="text" name="email"><br>
		<input type="submit">
		</form>
	</div>
	
	<!-- update database -->
	<?php
	  mysqli_select_db("x4ry", $con);
		$users_name = $_POST['name'];
		$users_email = $_POST['email'];
	
		if(isset($_POST['email'])){
			$sql = "INSERT INTO user (`firstName`, `email`) VALUES('$users_name', '$users_email')";
			if (mysqli_query($con, $sql)) {
				echo "New record created successfully";
			} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	}
	?>
	</body>

	
</html>
