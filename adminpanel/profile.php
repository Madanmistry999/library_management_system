<?php 
    include '_sidemenu.php';

    include ('connection.php');

    // $usr=$_SESSION['username'];

    if(!isset($usr)){
        header('location:index.php');
    }
    else if(isset($_GET['logout'])){
        unset($usr);
        session_destroy();
        header('location:index.php');
    }

    $sql="Select collage_id,book1_id,book2_id,book3_id,book4_id,book5_id,issue_date,book_status from issuebook_mst";
    // $row=mysqli_fetch_array($sql);
    $result=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Profile</title>
</head>
<body>

    <div class="desc">
        <div class="text-center">
            <h1>Return Students Issued Books</h1>
        </div>

        <div class="content2">
            <div class="issuebook">
                <div class="title">
                    <h4>Manage Books</h4>
                </div>
        
                    <table>
                        <tr>
                            <th>UserID</th>
                            <th>Book ID1</th>
                            <th>Book ID2</th>
                            <th>Book ID3</th>
                            <th>Book ID4</th>
                            <th>Book ID5</th>
                            <th>Book Isssue Date</th>
                            <th>Book Status</th>
                            <th>Action</th>
                        </tr>

                        <?php
                            $result1=array($result);

                            foreach($result1 as $data){

                                while($row=mysqli_fetch_object($data)){
                        ?>

                        <tr>
                                    <td><?php echo $row->collage_id; ?></td>
                                    <td><?php echo $row->book1_id; ?></td>
                                    <td><?php echo $row->book2_id; ?></td>
                                    <td><?php echo $row->book3_id; ?></td>
                                    <td><?php echo $row->book4_id; ?></td>
                                    <td><?php echo $row->book5_id; ?></td>
                                    <td><?php echo $row->issue_date; ?></td>
                                    <td><?php echo $row->book_status; ?></td>
                                    <td><a href="recieve_book.php?collage_id=<?php echo $row->collage_id?>">Recieve Book</a></td>

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