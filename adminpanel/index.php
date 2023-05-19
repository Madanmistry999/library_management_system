<?php
    session_start();

	include ('connection.php');

	

    if($_SERVER["REQUEST_METHOD"]=="POST"){

		$username= mysqli_real_escape_String($con,$_POST['uname']);
		$password= mysqli_real_escape_String($con,$_POST['password']);

        $sql=mysqli_query($con,"Select * from admin_mst where username='$username' AND password='$password'") ;

        if(!(mysqli_num_rows($sql) > 0)){
			$errmessage[]="Incorrect Username And Password";
        }
        else{
			$row=mysqli_fetch_array($sql);

			if(($row['username']==$username) && ($row['password']==$password)){
				$_SESSION['username']=$username;
				header("location:dashboard.php");
				// echo "Your account not find.please register first";
			}
        }
    }

    if(isset($_SESSION['username'])){
	    header("location:dashboard.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="adminlogin.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="head">
        <h1 class="font-style">Library Management System(Admin Panel)</h1>
        <label class="font-style">Log IN</label>
    </div>

    <?php
		if(isset($errmessage)){
            foreach($errmessage as $msg){
                echo "<div class='errmsg'>$msg</div>";
            }
        }
    ?>

    <div class="form-field">
        <form method="POST">

        <div class="div-form">
            <label id="label">Username:</label>
            <input type="text" placeholder="Enter Username" id="uname"  name="uname" required>
        </div>

        <div class="div-form">
            <label id="label">Password:</label>
            <input type="password" placeholder="Enter Password" id="password" name="password" required>
        </div>

        <input type="submit" class="button" value="Sign IN">
        </form>
    </div>
</body>
</html>