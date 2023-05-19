<?php
    session_start();

    $collegeid=$_GET['collage_id'];

    $usr=$_SESSION['username'];

    include ('connection.php');

    $date=date("Y-m-d");
    // date_format('');

    $match=mysqli_query($con,"select * from issuebook_mst where collage_id='$collegeid'");

    $row=mysqli_fetch_array($match);


    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $recievedate=mysqli_real_escape_String($con,$_POST['recievebook']);
        $bookstatus=mysqli_real_escape_String($con,$_POST['bookstatus']);
        // $department=mysqli_real_escape_String($con,$_POST['department']);

    if(isset($_POST['recieve'])){

        if((isset($_POST['bookstatus'])) || (isset($_POST['recievebook']))){
            if(isset($_POST['recievebook'])){
                $sql=mysqli_query($con,"update issuebook_mst set recieve_date='$recievedate' where collage_id='$collegeid'") or die('error....');
            }
            if(isset($_POST['bookstatus'])){
                $sql=mysqli_query($con,"update issuebook_mst set book_status='$bookstatus' where collage_id='$collegeid'") or die('error....');
            }
            
            echo "<script language='javascript'>";
            echo "alert('$collegeid book is Recieved....!!!!')";
            echo "</script>";
        }
       
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="recievebook.css">
</head>
<body>
    <div class="content">
        <div class="cards">

            <h3>Recieve Books from Students</h3>

            <?php
						if(isset($message)){
							foreach($message as $msg){
								echo "<div class='errmsg'>$msg</div>";
							}
						}
            ?>
        
        </div>

        <div class="content2">
            <div class="issuebook">
                <div class="title">
                    <h4>Recieve Book</h4>
                </div>
                <form method="post">
                    <table>

                        <tr>
                            <td><h3>Collage ID:</h3><br><Input type="text" id="collageid" name="collageid" value="<?php echo $row['collage_id']; ?>" ></td>
                            <td><h3>Book1 ID:</h3><br><Input type="number-format"  id="book1id" name="book1id" value="<?php echo $row['book1_id']; ?>"></td>
                            <td><h3>Book2 ID:</h3><br><Input type="number-format"  id="book2id" name="book2id" value="<?php echo $row['book2_id']; ?>"></td>
                        </tr>

                        <tr>        
                            <td><h3>Book3 ID:</h3><br><Input type="number-format"  id="book3id" name="book3id" value="<?php echo $row['book3_id']; ?>"></td>
                            <td><h3>Book4 ID:</h3><br><Input type="number-format"  id="book4id" name="book4id" value="<?php echo $row['book4_id']; ?>"></td>
                            <td><h3>Book5 ID:</h3><br><Input type="number-format"  id="book5id" name="book5id" value="<?php echo $row['book5_id']; ?>"></td>
                        </tr>

                        <tr>
                            <td><h3>Recieve Book Date:</h3><br><Input type="Date" name="recievebook" max="<?php echo $date;?>" min="<?php echo $date;?>" value="<?php echo $date;?>" ></td>

                            <td>
                                <select name="bookstatus" id="bookstatus">
                                    <option value="none"><?php echo $row['book_status']; ?></option>
                                    <option value="Book Issued">Book Issued</option>
                                    <option value="Book Recieved">Book Recieved</option>
                                </select>
                            </td>

                            <td><button type="submit" name="recieve">Recieve</button></td>
                        </tr>
                        
                    </table>
                </form>
            </div>
        </div>

    </div>
</body>
</html>