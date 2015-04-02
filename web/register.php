<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>Register—StudentRecruiter</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link rel="shortcut icon" href="http://www.liv.ac.uk/images/favicon.ico"/>
		<link href="http://fonts.googleapis.com/css?family=.|Lato:light,normal,bold|Oswald:light,normal,bold|Oswald:light,normal,bold|Open+Sans:light,normal,bold" rel="stylesheet" type="text/css">
		<style>.error{ color:#FF0000}</style>
	</head>
	
	<body>
		
		<!-- get navigation bar -->	
		<div id="navbar"><?php require 'navbar.php';?></div>	
	
		<!-- get mysql connection -->		
		<?php require 'header.php';?>
		
		<?php session_start();?>
		
		<!--input validation-->
		<?php	$fnameErr = $lnameErr = $emailErr = $dobErr = $addr1Err = $townErr = $postcodeErr = '';
			$fname = $lname = $email = $gender = $dob = $addr1 = $addr2 = $town = $postcode = '';
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				if(empty($_POST['fname']))
					$fnameErr = 'First name required.';
				if(!preg_match('/^[a-zA-Z]*$/', $_POST['fname']))
					$fnameErr = 'Only letters allowed.';
				if(empty($_POST['fname']))
					$lnameErr = 'Surname required.';
				if(!preg_match('/^[a-zA-Z]*$/', $_POST['lname']))
					$lnameErr = 'Only letters allowed.';
				if(empty($_POST['email']))
					$emailErr = 'Email required.';
				if(empty($_POST['dob']))
					$dobErr = 'Date of birth required.';
				if(empty($_POST['addr1']))
					$addr1Err = 'Address line 1 required.';
				if(empty($_POST['town']))
					$townErr = 'Town required.';
				if(!preg_match('/^[a-zA-Z]*$/', $_POST['town']))
					$townErr = 'Only letters allowed.';
				if(empty($_POST['postcode']))
					$postcodeErr = 'Postcode required.';
			}
		?>
	
		<?php 
			$_SESSION['fname'] = $_POST['fname']; 
			$_SESSION['lname'] = $_POST['lname']; 
			$_SESSION['email'] = $_POST['email']; 
			$_SESSION['gender'] = $_POST['gender']; 
			$_SESSION['year'] = $_POST['year']; 
			$_SESSION['month'] = $_POST['month']; 
			$_SESSION['day'] = $_POST['day']; 
			$_SESSION['addr1'] = $_POST['addr1']; 
			$_SESSION['addr2'] = $_POST['addr2']; 
			$_SESSION['town'] = $_POST['town']; 
			$_SESSION['postcode'] = $_POST['postcode']; 
		?>
	
		<!-- registration form -->
		<div id="form" style="width:475px; position: relative; left: 50px; top: 150px">
		<br><br>Register for an account.
		<br>
		<span class="error">* required</span>
		<form action="" method="post">
			
			<!--first name-->
			<div style="float:left;">First name: <span class="error">*<?php echo $fnameErr; ?></span> 
			<input type="text" name="fname" value="<?php echo $_SESSION['fname'];?>"></div>
			
			<!--last name-->
			<div style="float:left;">Surname: <span class="error">*<?php echo $lnameErr; ?></span>
			<input type="text" name="lname" value="<?php echo $_SESSION['lname'];?>"></div>
			
			<!--line break-->
			<div style="clear:both;"></div>
			
			<!--email-->
			E-mail: <span class="error">*<?php echo $emailErr; ?></span>
			<input type="text" name="email" value="<?php echo $_SESSION['email'];?>">
			
			<!--password-->
			Password: <span class="error">*<?php echo $passwErr; ?></span>
			<input type="text" name="password" value="<?php echo $users_pw;?>">

			<!--gender, drop down-->
			Gender: <span class="error">*</span>
			<select name="gender">
				<option value="M">Male</option>
				<option value="F">Female</option>
			</select>

			<!--date of birth-->
			DOB: <span class="error">*<?php echo $dobErr?></span>
			<div style="clear:both;"></div>
			<div style="float:left;width:60px">YYYY: <input type="text" name="year" value="<?php echo $_SESSION['year'];?>"></div>
			<div style="float:left;width:60px">MM: <input type="text" name="month" value="<?php echo $_SESSION['month'];?>"></div>
			<div style="float:left;width:60px">DD: <input type="text" name="day" value="<?php echo $_SESSION['day'];?>"></div>
			
			<!--address-->
			<div style="clear:both;"></div>
			Address line 1: <span class="error">*<?php echo $addr1Err; ?></span>
			<input type="text" name="addr1" value="<?php echo $_SESSION['addr1'];?>">
			Address line 2:
			<input type="text" name="addr2" value="<?php echo $_SESSION['addr2'];?>">
			Town: <span class="error">*<?php echo $townErr; ?> </span>
			<input type="text" name="town" value="<?php echo $_SESSION['town'];?>">
			Post code: <span class="error">*<?php echo $postcodeErr; ?></span>
			<input type="text" name="postcode" value="<?php echo $_SESSION['postcode'];?>">

			<!--line break-->
			<div style="clear:both;"></div>
			
			<!--submit form-->
			<input type="submit">
		</form>
		</div>
		
		<div style="position:relative; top:300px;">
		<!-- update the database -->
		<?php 
			$users_fname = $_POST['fname'];
			$users_lname = $_POST['lname'];
			$users_email = $_POST['email'];
			$users_pw = $_POST['password'];
			
			$users_gender = $_POST['gender'];
			
			$arr = array($_POST['year'], $_POST['month'], $_POST['day']);
			$users_dob = join("-", $arr);

			$users_addr1 = $_POST['addr1'];
			$users_addr2 = $_POST['addr2'];
			$users_town = $_POST['town'];
			$users_postcode= $_POST['postcode'];

			date_default_timezone_set('Europe/London');
			$users_join_date = date('Y/m/d H:i:s', time());
			echo( "join date is ".$users_join_date);

			/* check email is not duplicate */
			if(isset($_POST['email']))
				$sql = "INSERT INTO user (`firstname`, `lastname`, `email`, `password`, `gender`, `dob`, `address_line_1`, `address_line_2`, `town`, `postcode`, `join_date`) VALUES('$users_fname', '$users_lname', '$users_email', '$users_pw', '$users_gender', '$users_dob', '$users_addr1', '$users_addr2', '$users_town', '$users_postcode', '$users_join_date')";
			
			/* success message */ 
			if (mysqli_query($con, $sql))
				echo "New record created successfully";
			else
				echo "Error: " . $sql . "<br>" . mysqli_error($con);?>
		</div>	
			
	</body>
	
</html>
