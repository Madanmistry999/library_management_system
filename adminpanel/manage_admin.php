<?php 
    include '_sidemenu.php';
    // session_start();

    include ('connection.php');

    $usr=$_SESSION['username'];

    if(isset($_REQUEST['adminid'])){
        $adminid=$_GET['adminid'];
    }
    
    if(!isset($usr)){
        header('location:index.php');
    }

    if(isset($_GET['logout'])){
        unset($usr);
        session_destroy();
        header('location:index.php');
    }

    //adminid querystring


    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $admin_name=mysqli_real_escape_String($con,$_POST['admin_name']);
        $password=mysqli_real_escape_String($con,$_POST['password']);

        if(isset($_POST['edit_admin'])){

                if(!empty($_POST['admin_name'])){
                    $sql=mysqli_query($con,"update admin_mst set admin_name='$admin_name' where id='$adminid'") or die('error....');
                }
            
                if(!empty($_POST['password'])){
                    $sql=mysqli_query($con,"update admin_mst set password='$password' where id='$adminid'") or die('error....');
                }
                echo "<script language='javascript'>";
                echo "alert('Admin profile information updated....!!!!')";
                echo "</script>";
            
        }
    }

    if(isset($_GET['deleteid'])){
        $sql="delete from admin_mst where id='$adminid'";
	    mysqli_query($con,$sql);

        echo "<script language='javascript'>";
        echo "alert('Admin profile is deleted....!!!!')";
        echo "</script>";
    }

    //selecting other admins info 
    $sql="Select * from admin_mst where username not like '$usr'";

    $query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="manageadmin.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

        <div class="content">
            <div class="admin">
                <div class="title">
                    <h4>Manage admin Profiles</h4>
                </div>
        
                    <table>
                        <tr>
                            <th>Admin Name</th>
                            <th>Admin Dept</th>
                            <th>Admin Username</th>
                            <th>Action</th>
                        </tr>

                        <?php

                                while($row=mysqli_fetch_object($query)){
                        ?>

                        <tr>
                                    <td><?php echo $row->admin_name; ?></td>
                                    <td><?php echo $row->department; ?></td>
                                    <td><?php echo $row->username; ?></td>
                                    <td>
                                        <a href="?adminid=<?php echo $row->id?>">Edit</a> &nbsp;&nbsp;&nbsp;
                                        <a href="?deleteid=<?php echo $row->id?>">Delete</a>
                                    </td>

                        </tr>

                        <?php
                                }
                        ?>
                    </table>

                    <?php
                        if(isset($_GET['adminid'])){
                            
                        if(isset($_GET['adminid'])){    

                            $sql=mysqli_query($con,"select * from admin_mst where id='$adminid'");
                            $row1=mysqli_fetch_array($sql);

                        }

                    ?>

                    <form method="post">
                        <table>

                            <tr>
                            <td><h5>Admin Name:</h5><Input type="text" id="admin_name" name="admin_name" value="<?php echo $row1['admin_name']; ?>"></td>
                            </tr>
                            
                            <tr>
                            <td>
                                <select name="department" id="department" disabled>
                                    <option value="None"><?php echo $row1['department']; ?></option>
                                </select>
                            </td>
                            </tr>

                            <tr>
                            <td><h5>Admin Username:</h5><Input type="text" id="username" name="username" value="<?php echo $row1['username']; ?>" disabled></td>
                            </tr>
                            
                            <tr>
                            <td><h5>Admin Password:</h5><input type="password" id="password" name="password" value="<?php echo $row1['password']; ?>"></td>
                            </tr>

                            <tr rowspan="1">
                            <td><button type="submit" name="edit_admin">Edit Admin</button></td>
                            </tr>

                        </table>
                    </form>

                    <?php
                        }
                    ?>
                </div>
        </div>
</body>
</html>