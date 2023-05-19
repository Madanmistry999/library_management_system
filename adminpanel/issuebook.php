<?php

    include ('_sidemenu.php');
    // session_start();

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

    $issue=Date("Y-m-d");
    // date_format($issue);

    $recieve=Date("Y-m-d");
    // date_format($recieve);
    // $issue= $issue->format('d-m-Y');

    $matchbookid=mysqli_query($con,"select book1_id,book2_id,book3_id,book4_id,book5_id from issuebook_mst");
    $data=mysqli_fetch_array($matchbookid);


    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $clgid=mysqli_real_escape_String($con,$_REQUEST['clgid']);
        $book1id=mysqli_real_escape_String($con,$_REQUEST['book1id']);
        $book2id=mysqli_real_escape_String($con,$_REQUEST['book2id']);
        $book3id=mysqli_real_escape_String($con,$_REQUEST['book3id']);
        $book4id=mysqli_real_escape_String($con,$_REQUEST['book4id']);
        $book5id=mysqli_real_escape_String($con,$_REQUEST['book5id']);
        $issuedate=mysqli_real_escape_String($con,$_REQUEST['issuebook']);
        $recievedate=mysqli_real_escape_String($con,$_REQUEST['recievebook']);
        $bookstatus=mysqli_real_escape_String($con,$_REQUEST['bookstatus']);
        $department=mysqli_real_escape_String($con,$_REQUEST['department']);

        $bookidpattern='/^[0-9]+$/';

        $match=mysqli_query($con,"select * from lib_register_mst where collage_id='$clgid' && department='$department'");

        if(($book1id==$data['book1_id']) || ($book2id==$data['book2_id']) || ($book3id==$data['book3_id'])
                || ($book4id==$data['book4_id']) || ($book5id==$data['book5_id'])){
                    $message[]="book is already issued to student..!!!!";
        }
        elseif(!( (preg_match($bookidpattern,$book1id)) && (preg_match($bookidpattern,$book2id)) 
            && (preg_match($bookidpattern,$book3id)) && (preg_match($bookidpattern,$book4id))
            && (preg_match($bookidpattern,$book5id)))){
                $message[]="Please Enter Number only in Bookid";
        }
        else{

            if(!mysqli_num_rows($match) >0){
                $message[]="User Not Registered in the System or User Informations are Wrong.....!!!!";
            }
            else{
                $sql="insert into issuebook_mst Values ('$clgid','$book1id','$book2id','$book3id','$book4id','$book5id','$issuedate','$recievedate','$bookstatus','$department')";
                mysqli_query($con,$sql);           
                header("location:issuebook.php"); 
                // echo "<script>";
                // echo "alert('Book Issued to Student has Collage ID:$clgid')";
                // echo "</script>";
            }
        }
    }   

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="issuebook.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="content">
        <div class="cards">

            <h3>Issue Book To Students</h3>

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
                    <h4>Issue Book</h4>
                </div>
                <form method="post">
                    <table>
                        <tr>
                        <td><h3>Collage ID:</h3><br><Input type="text" placeholder="Enter Collage id" id="clgid" name="clgid" required></td>
                        <td><h3>Book1 ID:</h3><br><Input type="number-format" placeholder="Entern Book1 id" id="book1id" name="book1id" required></td>
                        <td><h3>Book2 ID:</h3><br><Input type="number-format" placeholder="Entern Book2 id" id="book2id" name="book2id" required></td>
                        </tr>
                        <tr>
                        <td><h3>Book3 ID:</h3><br><Input type="number-format" placeholder="Entern Book3 id" id="book3id" name="book3id" required></td>
                        <td><h3>Book4 ID:</h3><br><Input type="number-format" placeholder="Entern Book4 id" id="book4id" name="book4id" required></td>
                        <td><h3>Book5 ID:</h3><br><Input type="number-format" placeholder="Entern Book5 id" id="book5id" name="book5id" required></td>
                        </tr>
                        <tr>
                        <td><h3>Issued Book Date:</h3><br><Input type="Date" name="issuebook" max="<?php echo $issue; ?>" required></td>
                        <td><h3>Recieve Book Date:</h3><br><Input type="Date" name="recievebook"  min="<?php echo $recieve; ?>" required></td>
                        <td>
                        <select name="bookstatus" id="bookstatus">
                            <option value="none">Select a Option</option>
                            <option value="Book Issued">Book Issued</option>
                            <option value="Book Recieved">Book Recieved</option>
                        </select>
                        </td>
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
                        <td></td>
                        <td><button type="submit" name="issue_book">Issue Book</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>

</body>
</html>