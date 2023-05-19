<?php
	include('connection.php');

    $collageid=$_GET['collage_id'];
	
	$sql="delete from lib_register_mst and issuebook_mst where lib_register_mst.collage_id='$collageid' And issuebook_mst.collage_id='$collageid'";
	// $sql1="delete from issuebook_mst where collage_id='$collageid'";
	mysqli_query($con,$sql);
	// mysqli_query($con,$sql1);
    echo "<script>";
    echo "alert('$collageid Issue Book data is Removed')";
    echo "</script>";
    header('location:profile.php');
?>