<?php
	include('connection.php');
	
    $collageid=$_GET['collageid'];

    $sql=mysqli_query($con,"delete from lib_register_mst where collage_id='$collageid'") or die('error');
    $sql=mysqli_query($con,"delete from issuebook_mst where collage_id='$collageid'") or die('error');

    header('location:dashboard.php');
?>