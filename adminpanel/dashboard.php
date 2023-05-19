<?php 
    include ('_sidemenu.php');
    // session_start();
    include ('connection.php');

    $usr=$_SESSION['username'];

    if(!isset($usr)){
        header('location:index.php');
    }
    else if(isset($_GET['logout'])){
        unset($usr);
        session_destroy();
        header('location:index.php');
    }

    $count=mysqli_query($con,"select COUNT(*) as total from lib_register_mst");
    $resofcount=mysqli_fetch_assoc($count);

    $n=5;

    $sql="select * from lib_register_mst ORDER BY id DESC limit $n";

    $result=mysqli_query($con,$sql);

    
    // $total=mysqli_fetch_object($);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="dashboard.css">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <div class="cards">
            <div class="card1">
                <div class="box">
                    <img src="../user.jpg" height="70px" width="70px"> <br>
                    <?php echo "<h1> Total Students Registered: ".$resofcount['total']."</h1>"; ?>
                </div>
            </div>
        </div>

        <div class="content2">
            <div class="recent_registered">
                <div class="title">
                    <h2>Recent Registered Students</h2>
                    <a href="registered_student.php">View all</a>
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Email ID</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        $result1=array($result);

                        foreach($result1 as $data){

                            while($row=mysqli_fetch_object($data)){
                    ?>
                    <tr>
                        <td><?php echo $row->collage_id;?></td>
                        <td><?php echo $row->student_name;?></td>
                        <td><?php echo $row->department;?></td>
                        <td><?php echo $row->email;?></td>
                        <td><a href="delete_student.php?collageid=<?php echo $row->collage_id;?>">Remove Student</a></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </table>
            </div>
            <!-- <div class="newstudent">
                <div class="title">
                    <h2>New Student</h2>
                    <a href="#">View</a>
                </div>
            </div> -->
        </div>
    </div>
</body>
</html>