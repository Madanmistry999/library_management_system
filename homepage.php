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


    $select1=mysqli_query($con,"select * from issuebook_mst where collage_id='$id'");

    if(!mysqli_num_rows($select1) > 0){
      $message="You have no Issued Book ....!!!!";
    }else{
      $data1=mysqli_fetch_array($select1);
    }
    $select2=mysqli_query($con,"select * from lib_register_mst where collage_id='$id'");

    $data2=mysqli_fetch_array($select2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="pagesstyle.css">
</head>
<body>
  <div class="content">

    <!-- Header code with css -->
      <div class="header">
          <img src="booklogo.png" height="50px" width="60px"><label>Collage Library System</label>

          <div>
            <a href="homepage.htm" class="active">Home</a>
            <a href="profilepage.php">Profile</a>
            <a href="?logout=<?php echo "logged out"; ?>">Log OUT</a>
          </div>
      </div>
    <!-- Header code ends -->

    <!-- Body start -->
    <div class="body">
      <div class="content1">
        <img src="lib1 (2).jpg" height="600px"width="100%">
        <h1>Welcome  <?php echo $data2['student_name'];?></h1>
      </div>

      <div class="bookinfo">

            <div class="issuedbook">

                <div class="title">

                    <h4><?php echo $data2['student_name'];?> &nbsp; your Issued Book Information</h4>

                </div>

                <h1>
                        <?php
                          if(isset($message)){
                            echo "$message";
                          }
                        ?>
                </h1>

                <?php
                  if(mysqli_num_rows($select1) > 0){
                ?>
        
                    <table>

                      <tr>

                        <th>Collage ID</th>
                        <th>Book1 ID</th>
                        <th>Book2 ID</th>
                        <th>Book3 ID</th>
                        <th>Book4 ID</th>
                        <th>Book5 ID</th>
                        <th>Book Issue Date</th>
                        <th>Book Recieve Date</th>
                        <th>Book Status</th>
                        <th>Department</th>

                      </tr>

                      <tr>

                        <td><?php echo $data1['collage_id'];?> </td>
                        <td><?php echo $data1['book1_id'];?> </td>
                        <td><?php echo $data1['book2_id'];?> </td>
                        <td><?php echo $data1['book3_id'];?> </td>
                        <td><?php echo $data1['book4_id'];?> </td>
                        <td><?php echo $data1['book5_id'];?> </td>
                        <td><?php echo $data1['issue_date'];?> </td>
                        <td><?php echo $data1['recieve_date'];?></td>
                        <td><?php echo $data1['book_status'];?> </td>
                        <td><?php echo $data1['dept'];?> </td>

                      </tr>

                    </table>

                  <?php
                    }
                  ?>


            </div>
            
        </div>

    </div>
    <!-- Body End -->

    <!-- Footer start -->
    <div class="footer">
      <label>All Rights Are Reserved By Collage</label>
      <h4>&copy; 2022</h4>
    </div>
    <!-- Footer end -->
      
  </div>
</body>
</html> 