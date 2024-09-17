
<!DOCTYPE html>
<html>
<head>
    <title>Pharmacy Management System - Medicine Search</title>
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
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<fieldset>
			<legend align="center">Medicine Search</legend>
			<table>
				<tr>
					<td>Medicine Name:</td>
					<td><input type="text" name="search" placeholder="Enter medicine name" required></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Search"></td>
				</tr>
			</table>
		</fieldset>
	</form>
    <?php

include "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST["search"];

    $sql = "SELECT * FROM purchase WHERE m_name LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Medicine ID: " . $row["m_id"] . "<br>";
            echo "Medicine Name: " . $row["m_name"] . "<br>";
            echo "Batch No: " . $row["batch_no"] . "<br>";
            echo "Manufactured Date: " . $row["mft_date"] . "<br>";
            echo "Expiry Date: " . $row["exp_date"] . "<br>";
            echo "Suppliers Name: " . $row["s_name"] . "<br>";
            echo "Price: Rs." . $row["price"] . "<br>";
            echo "Description : " . $row["descript"] . "<br><br>";
        }
    } else {
        echo "No results found.";
    }
}

?>
    </div>
</body>
</html>
