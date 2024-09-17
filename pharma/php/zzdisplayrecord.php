<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="../css/displayrecord.css">
	<title>Document</title>
	
</head>
<body>
<div class="container">
		<div class="box">	
            <h2 style="text-align:center;">Dashboard</h2>	
			<ul>
                <li   ><a href="dashboard.php">|  | Home</a></li>
				<li   ><a href="m.php">|  | Medicine Records</a></li>
				<li   > <a href="p.php">|  | Patient Records</a></li>
				<li   > <a href="n.php">|  | Notifications</a>  </li>
				<li   > <a href="search.php">| | Search  | |</a>  </li>
			</ul>
		</div>
        <div class="box1">
			<?php
	// session_start();
	include "connect.php";
	// if(isset($_SESSION['user'])||isset($_SESSION['pass'])){
        
	$disQuery="select * from records";
	$disExe=mysqli_query($conn,$disQuery);

	echo "<table border=1px>";
	echo "<tr>";
    echo "<th>Purchase_Date</th>";
    echo "<th>Patient_id</th>";
	echo "<th>Patient_Name</th>";
	echo "<th>Medicine_name</th>";
	echo "<th>Contact_No</th>";
	echo "<th>Price</th>";
    echo "<th>Quantity</th>";
	echo "</tr>";

	if ($disExe) {
		while ($row=mysqli_fetch_assoc($disExe)) {
			$Purchase_Date=$row['pdate'];
			$Patient_id=$row['p_id'];
			$Patient_Name=$row['p_name'];
			$Medicine_name=$row['m_name'];
			$Contact_No=$row['contact'];
			$Price=$row['price'];
            $Quantity=$row['qty'];

			echo "<tr>";
			echo "<td>$Purchase_Date</td>";
			echo "<td>$Patient_id</td>";
			echo "<td>$Patient_Name</td>";
			echo "<td>$Medicine_name</td>";
			echo "<td>$Contact_No</td>";
			echo "<td>$Price</td>";
            echo "<td>$Quantity</td>";

			echo "<td><a href='delrecord.php?p_id=$Patient_id '>Delete</a></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	
?>
</div>
</div>
</body>
</html>