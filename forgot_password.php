<?php
	session_start();

	include ('connection.php');

    if($_SERVER["REQUEST_METHOD"]=="POST"){

		$email= mysqli_real_escape_String($con,$_POST['email']);
		$newpassword= mysqli_real_escape_String($con,md5($_POST['newpass']));
		$newconfirmpassword= mysqli_real_escape_String($con,md5($_POST['confirmnewpass']));

        $sql=mysqli_query($con,"Select * from lib_register_mst where email='$email'") ;
        $row=mysqli_fetch_array($sql);

        $oldpass=$row['password'];

        if(($newpassword==$oldpass) && ($newconfirmpassword==$oldpass)){
            $errmessage[]="This Password is old password...Enter New Password";
        }
        else if(!($newpassword==$newconfirmpassword)){
            $errmessage[]="Password not Match";
        }
        else{
            $sql=mysqli_query($con,"update lib_register_mst set password='$newpassword' where email='$email'") or die('error');
        }
        
       
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="forgot_password.css">
</head>
<body>
    <div class="container">

        <div class="head"><h1>Forgot Password</h1></div>

        <?php
						if(isset($errmessage)){
							foreach($errmessage as $msg){
								echo "<div class='errmsg'>$msg</div>";
							}
						}
        ?>

        <div class="form">
            
            <form method="post">

                <table class="tables">

                    <tr>
                        <td>Email ID</td>
                        <td>:</td>
                        <td><input type="email" name="email" id="email" placeholder="Enter Email ID"></td>
                    </tr>

                    <tr>
                        <td>New Password</td>
                        <td>:</td>
                        <td><input type="password" name="newpass" id="newpass" placeholder="Enter New Password"></td>
                    </tr>

                    <tr>
                        <td>Confirm New Password</td>
                        <td>:</td>
                        <td><input type="password" name="confirmnewpass" id="confirmnewpass" placeholder="Confirm New Password"></td>
                    </tr>

                </table>
                
                <div class="btn-container">
                    <input class="button-style" type="submit" value="Change Password">
                </div>
                
            </form>

        </div>
    </div>  
</body>
</html>