<?php
    session_start();
    
    include ('connection.php');

    if($_SERVER["REQUEST_METHOD"]=="POST"){

     $collageid= mysqli_real_escape_String($con,$_POST['collageid']);
     $name= mysqli_real_escape_String($con,$_POST['name']);
     $dept= mysqli_real_escape_String($con,$_POST['dept']);
     $cell= mysqli_real_escape_String($con,$_POST['mobile']);
     $email= mysqli_real_escape_String($con,$_POST['email']);
     $username= mysqli_real_escape_String($con,$_POST['usrname']);
     $password= mysqli_real_escape_String($con,md5($_POST['password']));
     $confirmpassword= mysqli_real_escape_String($con,md5($_POST['confirm']));
 
     $match=mysqli_query($con,"select collage_id,username from lib_register_mst where collage_id='$collageid' && username='$username'") or die('Error');
     //$row=mysqli_fetch_array($match);
     // $result=mysqli_query($con,$match);
 
     if(mysqli_num_rows($match) > 0){
         $message[]="User Already exist";
     }
     else if(!preg_match('/^[0-9]*[bca]*[0-9]+$/',$collageid)){
        $message[]="Please Enter Collageid properely [ex:20bca000]";
     }
     else if(!preg_match('/^[A-Za-z]/',$name)) {
        $message[]="Please Enter Name properely";
     }
     else if(!preg_match('/^[0-9]{10}+$/',$cell)){
        $message[]="Please Enter proper Mobile Number";
     }
     else if(!preg_match('/^[a-zA-Z0-9]{6,10}$/',$username)){
        $message[]="Please Enter Proper Username [ex:madanG123]";
     }
    //  else if(!preg_match('/^[_a-zA-Z0-9]+(\.[0-9a-z])*/'))
     else{

            if($confirmpassword!=$password){
                 $message[]="Password Not Match";
            }else{
                     $sql=mysqli_query($con,"Insert Into lib_register_mst Values('','$collageid','$name','$dept','$cell','$email','$username','$password')") or die('Not Registered');
                     header("location:index.php");
            }
     }
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="registeration.css">
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            
            <div class="text">
                <h1>Regisration</h1>
                <h1>Page</h1>
                <h5>Create Account to Library System</h5>
            </div>

            <?php
                if(isset($message)){
                    foreach($message as $msg){
                        echo "<div>$msg</div>";
                    }
                }
            ?>

            
            <form method="post">

                <table class="form-table">

                <tr>
                    <td><label>Collage ID</label></td>
                    <td><label>:</label></td>
                    <td><input type="text" name="collageid" id="collageid" placeholder="Enter Collage ID" ></td>
                </tr>
                
                <tr>
                    <td><label>Name</label></td>
                    <td><label>:</label></td>
                    <td><input type="text" name="name" id="name" placeholder="Enter Name" ></td>
                </tr>
                
                <tr>
                    <td><label>Department</label></td>
                    <td><label>:</label></td>
                    <td>
                        <select name="dept" id="dept" required>
                            <option value="none">Select Department</option>
                            <option value="BCA">BCA</option>
                            <option value="BBA">BBA</option>
                            <option value="MCA">MCA</option>
                            <option value="MBA">MBA</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><label>Cell No</label></td>
                    <td><label>:</label></td>
                    <td><input type="number-format" name="mobile" id="mobile" placeholder="Enter Mobile Number" ></td>
                </tr>
                
                <tr>
                    <td><label>Email ID</label></td>
                    <td><label>:</label></td>
                    <td><input type="email" name="email" id="email" placeholder="Enter Email ID" ></td>
                </tr>
                
                <tr>
                    <td><label>Username</label></td>
                    <td><label>:</label></td>
                    <td><input type="text" name="usrname" id="usrname" placeholder="Enter your username" > </td>
                </tr>

                <tr>
                    <td><label>Password</label></td>
                    <td><label>:</label></td>
                    <td><input type="password" name="password" id="password" placeholder="Enter password" ></td>
                </tr>
    
                <tr>
                    <td><label>Confirm Password</label></td>
                    <td><label>:</label></td>
                    <td><input type="password" name="confirm" id="confirm" placeholder="Confirm password" ></td>
                </tr>
                
                </table>

                <div ><input type="submit" name="signup" value="Sign UP" class="button-css"></div>

            </form>

        </div>
    </body>
</html>