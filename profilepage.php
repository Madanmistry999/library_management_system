<?php
  session_start();
  include ('connection.php');

  $user=$_SESSION['username'];

    if(!isset($user)){
        header('location:index.php');
    }

    if(isset($_GET['logout'])){
        unset($user);
        session_destroy();
        header('location:index.php');
    }

    $userdata=mysqli_query($con,"select collage_id,student_name,department,cell_number,email,username from lib_register_mst where username='$user'");

    $row=mysqli_fetch_array($userdata);
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
            <a href="homepage.php">Home</a>
            <a href="profilepage.php" class="active">Profile</a>
            <a href="?logout=<?php echo "logged out"; ?>">Log OUT</a>
          </div>
      </div>
    <!-- Header code ends -->

    <!-- Body start -->
    <div class="body">
    <img src="lib1 (2).jpg" height="700px" width="100%">

      <h1>Profile Page</h1>

      <div class="profile">

            <div class="profile-data">

                <div class="title">

                    <h4><?php echo $user;?> &nbsp; your Profile for Library System</h4>

                </div>
        
                    <table>

                      <tr>
                        <th>Collage ID </th><td><?php echo $row['collage_id'];?></td>
                      </tr>

                      <tr>
                        <th>Name </th><td><?php echo $row['student_name'];?></td>
                      </tr>

                      <tr>
                        <th>Department </th><td><?php echo $row['department'];?></td>
                      </tr>

                      <tr>
                        <th>Cell Number </th><td><?php echo $row['cell_number'];?></td>
                      </tr>

                      <tr>
                        <th>Email </th><td><?php echo $row['email'];?></td>
                      </tr>

                      <tr>
                        <th>Username </th><td><?php echo $row['username'];?></td>
                      </tr>

                      <tr>
                        <td colspan="2"><a href="edit_profile.php">Edit Profile</a></td>
                      </tr>

                    </table>
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