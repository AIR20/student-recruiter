<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<?php require 'header.php';
			
			$error = "";
			if(!isset($_POST['email'])){
				$error = "Please enter your id";
			} else if(!isset($_POST['password'])){	
				$error = "Please enter your password";
				echo "no password";
			} else if($_POST['login']){
				$sql = "select count(email) from user where email='" . $_POST['email'] . "' and password ='" . $_POST['password'] ."'";
				$loginResult = mysqli_query($con, $sql);
				
				$loginResult || die("Database access failed: ".mysqli_error($con));
				$loginResultArr = mysqli_fetch_array($loginResult, MYSQLI_BOTH);
				$loginSuccess = $loginResultArr[0];
				
				if($loginSuccess==1)
					$error = "LOGIN SUCCESSFUL";
				else
					$error = "LOGIN UNSUCCESSFUL";
			}
	?>
	
			<head>
				<style>
					body { background: url("banner.jpg");
						    background-repeat: no-repeat;
							 background-size: 600px

							}
				</style>
			</head>
			
			<div class="twelve columns nav mobile_hidden" >
				<ul class="menu">
					<li><a href="index.php" class="top-link active">Home</a></li>
					<li><a href="register.php" class="top-link active">Register</a></li>
					<li><a href="register.php" class="top-link active">Events</a></li>
					<li><a href="register.php" class="top-link active">My Events</a></li>
					<li><a href="register.php" class="top-link active"">Account</a></li>
					<li><a href="register.php" class="top-link active"">Map</a></li>
				</ul>
			</div>

	<div style="float:right;"><form name="form3" method="POST" action="">
	Email: <input type="text" name="email" size="10" />
	Password: <input type="text" name="password" size="10" />
	<?php echo $error; ?>
	<input type="submit" name="login" value="login" size=""/>
	</form>
	</div>

</html>