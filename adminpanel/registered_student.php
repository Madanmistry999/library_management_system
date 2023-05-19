<?php
    include ('connection.php');

    // $usr=$_SESSION['username'];

    // if(!isset($usr)){
    //     header('location:index.php');
    // }
    // else if(isset($_GET['logout'])){
    //     unset($usr);
    //     session_destroy();
    //     header('location:index.php');
    // }

    $sql="select * from lib_register_mst";

    $result=mysqli_query($con,$sql);

    
    // $total=mysqli_fetch_object($);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registered Students</title>
    <link rel="stylesheet" href="registered_students.css">
</head>
<body>
    <div class="content">
        <div class="cards">
            <div class="card1">
               All Registered Students Profile
            </div>

                <div class="box">
                <table class="newstudent">
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
        </div>
    </div>

</body>
</html>