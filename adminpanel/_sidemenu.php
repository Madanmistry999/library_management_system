<?php
    session_start();

    include ('connection.php');

    $usr=$_SESSION['username'];

    $sql=mysqli_query($con,"select * from admin_mst where username='$usr'");

    $row=mysqli_fetch_array($sql);

    // if("<a>"){
    //     "<a class='active'>";
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="_menu.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
  
   <!-- <section>
    <header class="row bg-light">
            <h1>Library Management System</h1>

            <!-- <div class="ml-auto">
                <a href="http://">alert</a>
                <a href="http://">alert</a>
                <a href="http://">alert</a>
            </div> aj
        </header>
   </section> -->

        <div class="side-menu">
            <div class="profile">
                <h1><?php echo $row['admin_name'];?></h1>
            </div>

                <ul>
                <a href="dashboard.php"><li>Dashboard</li></a>
                <a href="profile.php" ><li>Return Books</li></a>
                <a href="issuebook.php" ><li>Issue Books</li></a>
                <a href="add_admin.php" ><li>Add Admin</li></a>
                <a href="manage_admin.php" ><li>Manage Admin</li></a>
                <a href="?logout=<?php echo "logged out"; ?>"><li>Log OUT</li></a>
                <a ><li class="active"></li></a>
                </ul>
        </div>

        <div class="container bg-light">

            <div class="header">
                <div class="nav">
                    <div class="text">
                        <h1>Library Management System (Admin Panel)</h1>
                    </div>
                    <!-- <div class="row">
                        <label for="">first icon</label>
                        <label for="">first icon</label>
                        <label for="">first icon</label>
                    </div> -->
                </div>
            </div>

        </div>
  
</body>
</html>