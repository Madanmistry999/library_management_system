<?php
	session_start();

	include ('connection.php');
	

    if($_SERVER["REQUEST_METHOD"]=="POST"){

		$username= mysqli_real_escape_String($con,$_POST['username']);
		$password= mysqli_real_escape_String($con,md5($_POST['password']));

        $sql=mysqli_query($con,"Select * from lib_register_mst where username='$username' AND password='$password'") ;

        if(!(mysqli_num_rows($sql) > 0)){
			$errmessage[]="Incorrect Username And Password";
        }
        else{
			$row=mysqli_fetch_array($sql);

			$_SESSION['collageid']=$row['collage_id'];

			if(($row['username']==$username) && ($row['password']==$password)){
				$_SESSION['username']=$username;
				header('location:homepage.php');
			}
        }
    }

	if((isset($_SESSION['collageid'])) && (isset($_SESSION['username']))){
		header('location:homepage.php');
	}

?>

<html>
	<head>
		<link rel="stylesheet" href="loginhome.css">
		<link rel="stylesheet" href="bootstrap.min.css">
	</head>
	<body>
		<div class="body">

			<div class="image">

				<img src="assets/lib.jpg" height="20%" width="30%">
				
			</div>

			<div class="div2">

				<div class="form">

					<h1 class="font-style head" >Library Management System</h1>

					<label class="font-style">Log IN</label>

					<?php
						if(isset($errmessage)){
							foreach($errmessage as $msg){
								echo "<div class='errmsg'>$msg</div>";
							}
						}
            		?>

					<form method="post">

						<div class="div-form">
							<label id="label">Username:</label>
							<input type="text" name="username" id="username" placeholder="Enter Username" require>
						</div>
						
						<div class="div-form">
							<label id="label">Password:</label>
							<input type="password" placeholder="Enter Password" name="password" id="password"  require>
						</div>
						
						<input type="submit" class="button" value="Sign IN">
						<label class="forgot-pass"><a href="forgot_password.php">Forgot Password?</a></label>

					</form>

					<div class="register">
						<label id="label">Not Have An Account?</label>
						<a href="registerationpage.php" id="label">Sign UP</a>
					</div>
					
				</div>

			</div>

		</div>
	</body>
</html>