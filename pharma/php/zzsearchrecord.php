<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Reports</title>
	<link rel="stylesheet" href="../css/addrecord.css">
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
				<li   > <a href="s.php">| | Search  | |</a>  </li>
				
			</ul>	
				</div>
        <div class="box1">
    <form action="" method="POST">
		<fieldset>
			<legend align="center">Search Records</legend>
			<table>
				<tr>
					<td>Patient Name:</td>
					<td><input type="text" name="pname" /></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Search" /></td>
				</tr>
			</table>
		</fieldset>
	</form>

	<?php
	include "connect.php";

	if (isset($_POST['submit'])) {
		if (empty($_POST['pname'])) {
			echo "Please enter a patients name";
		} else {
			$pname = $_POST['pname'];

			$search_query = "SELECT * FROM records WHERE p_name LIKE '%$pname%'";
			$search_result = mysqli_query($conn, $search_query);

			if ($search_result) {
				// Display the search results
				echo "<table>";
				echo "<tr>";
				echo "<th>Date</th>";
				echo "<th>Patient ID</th>";
				echo "<th>Patient Name</th>";
				echo "<th>Medicine Name</th>";
				echo "<th>Contact No</th>";
				echo "<th>Price</th>";
				echo "<th>Quantity</th>";
				echo "</tr>";

				while ($row = mysqli_fetch_assoc($search_result)) {
					echo "<tr>";
					echo "<td>" . $row['pdate'] . "</td>";
					echo "<td>" . $row['p_id'] . "</td>";
					echo "<td>" . $row['p_name'] . "</td>";
					echo "<td>" . $row['m_name'] . "</td>";
					echo "<td>" . $row['contact'] . "</td>";
					echo "<td>" . $row['price'] . "</td>";
					echo "<td>" . $row['qty'] . "</td>";
					echo "</tr>";
				}

				echo "</table>";
			} else {
				echo "Search failed";
			}
		}
	}
	?>
</div></div>
</body>
</html>
