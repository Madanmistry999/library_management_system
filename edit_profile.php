<?php
  session_start();

  include ('connection.php');
  $user=$_SESSION['username'];
  $id=$_SESSION['collageid'];

    if(!isset($user)){
        header('location:index.php');
    }

    if(isset($_GET['logout'])){
        unset($user);
        session_destroy();
        header('location:index.php');
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){

     $name= mysqli_real_escape_String($con,$_POST['name']);
     $cell= mysqli_real_escape_String($con,$_POST['mobile']);
     $username= mysqli_real_escape_String($con,$_POST['usrname']);

     if(!preg_match('/^[A-Za-z]/',$name)) {
        $message[]="Please Enter Name properely";
     }
     else if(!preg_match('/^[0-9]{10}+$/',$cell)){
        $message[]="Please Enter proper Mobile Number [10 digits]";
     }
     else{
     
            if(isset($_POST['edit'])){

                if((isset($_POST['name'])) || (isset($_POST['dept'])) || (isset($_POST['mobile']))
                    || (isset($_POST['email'])) || (isset($_POST['usrname']))){
                    if(isset($_POST['name'])){
                        $userprofile=mysqli_query($con,"update lib_register_mst set student_name='$name' where collage_id='$id'") or die('error....');
                    }
 
                    if(isset($_POST['mobile'])){
                        $userprofile=mysqli_query($con,"update lib_register_mst set cell_number='$cell' where collage_id='$id'") or die('error....');
                    }

                    if(isset($_POST['usrname'])){
                        $_SESSION['username']=$username;
                        $user=$username;
                        $userprofile=mysqli_query($con,"update lib_register_mst set username='$username' where collage_id='$id'") or die('error....');
                    }

                    echo "<script language='javascript'>";
                    echo "alert('profile information updated....!!!!')";
                    echo "</script>";
                }
                
            }
        }
    }

    $userprofile=mysqli_query($con,"select * from lib_register_mst where username='$user'");

    $row=mysqli_fetch_array($userprofile);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="editprofile.css">
</head>
<body>
    <div class="content">

        <h1><?php echo $row['student_name'];?> &nbsp; Edit your Profile</h1>

        <h5><?php echo $row['student_name'];?> &nbsp; contact to Admin or Web-site Manager </h5>
        <h5>to change CollageID and Email </h5>

        <?php
                if(isset($message)){
                    foreach($message as $msg){
                        echo "<div>$msg</div>";
                    }
                }
        ?>

        <div class="profile">

            <form method="post">
                
                        <table>

                            <tr>
                                <td>
                                    <label>Collage ID</label> <br>
                                    <input type="text" name="collageid" id="collageid" disabled value="<?php echo $row['collage_id'];?>" >
                                </td> 
                                <td>
                                    <label>Name</label> <br>
                                    <input type="text" name="name" id="name" value="<?php echo $row['student_name'];?>"  >
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <label>Department</label> <br>
                                    <select name="dept" id="dept" disabled>
                                        <option value=""><?php echo $row['department'];?></option>
                                    </select>
                                </td>
                                <td>
                                    <label>Cell No</label> <br>
                                    <input type="number-format" name="mobile" id="mobile" value="<?php echo $row['cell_number'];?>" >
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <label>Email ID</label> <br>
                                    <input type="email" name="email" id="email" value="<?php echo $row['email'];?>" disabled>
                                </td>
                                <td>
                                    <label>Username</label> <br>
                                    <input type="text" name="usrname" id="usrname" value="<?php echo $row['username'];?>" >
                                </td>                    
                            </tr>
                            
                        </table>

                        <div ><input type="submit" name="edit" value="Update Profile"></div>
            </form>
            
        </div>

    </div>
</body>
</html>