<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/displayrecord.css">
</head>
<body>
<div class="container">
		<div class="box">	
            <h2 style="text-align:center;">Stock</h2>	
			<ul>
                <li   ><a href="dashboard.php">|  | Home</a></li>
				<li   ><a href="m.php">|  | Medicine Records</a></li>
				<li   > <a href="p.php">|  | Patient Records</a></li>
				<li   > <a href="n.php">|  | Notifications</a>  </li>
				<li   > <a href="s.php">| | Search  | |</a>  </li>
				
			</ul>	
				</div>
        <div class="box1">
		<?php
	// session_start();
	include "connect.php";
	// if(isset($_SESSION['user'])||isset($_SESSION['pass'])){
        
	$disQuery="select * from purchase";
	$disExe=mysqli_query($conn,$disQuery);

	echo "<table border=1px>";
	echo "<tr>";
	echo "<th>Suppliers Name</th>";
	echo "<th>Medicine Name</th>";
	echo "<th>Batch No</th>";
	echo "<th>Price</th>";
    echo "<th>Quantity</th>";
	echo "</tr>";

	if ($disExe) {
		while ($row=mysqli_fetch_assoc($disExe)) {
			$Suppliers_name=$row['s_name'];
			$Medicine_name=$row['m_name'];
			$Batch_No=$row['batch_no'];
			$Price=$row['price'];
			$Suppliers_name=$row['s_name'];
            $Quantity=$row['qty'];
            

			echo "<tr>";
			echo "<td>$Suppliers_name</td>";
			echo "<td>$Medicine_name</td>";
			echo "<td>$Batch_No</td>";
			echo "<td>$Price</td>";
            echo "<td>$Quantity</td>";
			
			echo "<td><a href='updatestock.php? s_name=$Suppliers_name & m_name=$Medicine_name &
            	batch_no=$Batch_No & price=$Price & qty=$Quantity;'>Update</a></td>";
				
			echo "<td><a href='delstock.php?m_name=$Medicine_name '>Delete</a></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
?>
</div></div>

</body>
</html>

