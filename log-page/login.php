<?php

include '../dbConnection.php';
session_start();
// $msg = "";
// session_start();

if(isset($_POST['submit'])){

	$errors = array();

		if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ){
				$errors[] = 'Username is Missing or invalid!!';
		}

		if(!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ){
				$errors[] = 'Password is Missing or invalid!!';
		}

		if(empty($errors)){

			$email = mysqli_real_escape_string($con, $_POST['email']);
			$password = md5(mysqli_real_escape_string($con, $_POST['password']));


			$query = "SELECT * FROM user 
				WHERE email = '{$email}'
				AND password = '{$password}' 
				LIMIT 1";

				$result_set = mysqli_query($con,$query);
				if($result_set){
					$row = mysqli_fetch_assoc($result_set);

					if(mysqli_num_rows($result_set) == 1){
						$_SESSION['user'] = $row['email'];
						header('location:../Dashboard/dashboard.php');

					}else {
						
						$errors[] = 'Invalid Username or Password !';
					}

				}else{
					$errors[] = 'Database query failed';
				}

		}

}



// 	$username = $_POST['username'];
// 	$password = $_POST['password'];

// 	// echo $username;
// 	// echo $password;

// 	$sql = "SELECT * FROM user WHERE email='".$username."' AND password='".$password."'";
// 	$result = mysqli_query($con,$sql);
// 	$row = mysqli_fetch_array($result);
// 	if($row){
// 		header('location:../Dashboard/dashboard.php');
// 		// echo $row['email'];
// 		// echo $row['password'];
// 	}
// 	else{
// 		// header('location:LoginPageN.php?invalid');
// 		// $msg = '<div style="padding:5px; background:tomato; width:100%">Invalid Username Or Password</div>';
// 		echo '<div style="background:tomato; color:white">Invalid Username or Passowrd!!</div>';
// 	}
// }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
	<link rel="stylesheet" href="./style.css">
</head>
<body>
	<section>
		<div class="imgBx">
		<img src="image.jpg">
		</div>
		<div class="contentBx">
			<div class="formBx">
				<h2>Login</h2>

				<form action="#" method="POST">
					<?php 
					if(isset($errors) && !empty($errors)){
						echo '<p class="error">Invalid Username or Password </>';
					}
					?>
					<div class="inputBx">
						<span>Username</span>
						<input type="email" name="email" autocomplete="off">
					</div>
					<div class="inputBx">
						<span>Password</span>
							<input type="password" name="password" autocomplete="off">
						</div>
						<!-- <div class="remember">
							<label><input type="checkbox" name="">Remember me</label></br>
						</div> -->
						<div class="inputBx">
							<input type="submit" value="Sign in" name="submit">
							</div>
							<div class="inputBx">
							<!-- <p>Don't have an account? <a href="#">Sign up</a></p>	 -->
				</form>
			</div>
		</div>
	</section>
</body>
</html>