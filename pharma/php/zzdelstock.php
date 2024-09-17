<?php  
	include "connect.php";
	$delname=$_GET['m_name'];
	$delQuery="delete from purchase where m_name='$delname' ";
	$delExe=mysqli_query($conn,$delQuery);
	if ($delExe) {
		echo "Data deleted";
		header('location:stock.php');
	}else{
		echo "deletion failed";
	}
?>