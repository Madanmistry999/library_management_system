<?php

    include ('_sidemenu.php');

    $usr=$_SESSION['username'];

    if(!isset($usr)){
        header('location:index.php');
    }
    else if(isset($_GET['logout'])){
        unset($usr);
        session_destroy();
        header('location:index.php');
    }
    

    include ('connection.php');

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $adminid=mysqli_real_escape_String($con,$_POST['adminid']);
        $admin_name=mysqli_real_escape_String($con,$_POST['admin_name']);
        $department=mysqli_real_escape_String($con,$_POST['department']);
        $username=mysqli_real_escape_String($con,$_POST['username']);
        $password=mysqli_real_escape_String($con,$_POST['password']);

        $match=mysqli_query($con,"select * from admin_mst where admin_name='$admin_name' && username='$username'");

        if(mysqli_num_rows($match) >0){
            $message[]="Admin data is already inserted.....!!!!";
            // $message[]="Book Issued to Student has Collage ID:$clgid";
        }else{
            $sql="insert into admin_mst Values ('$adminid','$admin_name','$department','$username','$password')";
            mysqli_query($con,$sql);           
            echo "<script>";
            echo "alert('Admin is Added in System')";
            echo "</script>";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="addadmin.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="content">
        <div class="cards">

            <?php
						if(isset($message)){
							foreach($message as $msg){
								echo "<div class='errmsg'>$msg</div>";
							}
						}
            ?>
        
        </div>

        <div class="content2">
            <div class="admin-input">
                <div class="title">
                    <h4>Add New Admin To Library System</h4>
                </div>
                <form method="post">
                    <table>

                        <tr>
                        <td><h3>Admin id:</h3><br><Input type="number-format" placeholder="Entern Admin id" id="adminid" name="adminid" required></td>
                        </tr>

                        <tr>
                        <td><h3>Admin Name:</h3><br><Input type="text" placeholder="Entern Admin Name" id="admin_name" name="admin_name" required></td>
                        </tr>
                        
                        <tr>
                        <td>
                            <select name="department" id="department">
                                <option value="None">Select Department</option>
                                <option value="BCA">BCA</option>
                                <option value="BBA">BBA</option>
                                <option value="MCA">MCA</option>
                                <option value="MBA">MBA</option>
                            </select>
                        </td>
                        </tr>

                        <tr>
                        <td><h3>Admin Username:</h3><br><Input type="text" placeholder="Entern username" id="username" name="username" required></td>
                        </tr>
                        
                        <tr>
                        <td><h3>Password:</h3><input type="password" placeholder="Enter Password" id="password" name="password" required></td>
                        </tr>
                        <tr rowspan="1">
                        <td><button type="submit" name="add_admin">Add Admin</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>

</body>
</html>