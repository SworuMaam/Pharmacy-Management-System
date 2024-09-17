<?php  
	include "connect.php";
	$delid=$_GET['p_id'];
	$delQuery="delete from records where p_id='$delid' ";
	$delExe=mysqli_query($conn,$delQuery);
	if ($delExe) {
		echo "Data deleted";
		header('location:displayrecord.php');
	}else{
		echo "deletion failed";
	}
?>