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
				<li   > <a href="search.php">| | Search  | |</a>  </li>
			</ul>
		</div>
        <div class="box1">
    <form action="recordval.php" method="POST">
		<fieldset >
			<legend align="center">Records</legend>
			<table>
            <tr>
					<td>Date:</td>
					<td><input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" /></td>
				</tr>
				<tr>
					<td><label>Patient ID:</label></td>
					<td><input type="number" name="pid" /></td>
				</tr>
				<tr>
					<td>Patient Name:</td>
					<td><input type="text" name="pname"/></td>
				</tr>
                <tr>
					<td>Medicine Name:</td>
					<td><input type="text" name="mname"/></td>
				</tr>
				<tr>
					<td>Contact no:</td>
					<td><input type="number" name="contact"/></td>
				</tr>
				<tr>
					<td>Price:</td>
					<td><input type="number" name="price"/></td>
				</tr>
                <tr>
					<td>Quantity:</td>
					<td><input type="number" name="qty"/></td>
				</tr>
				<tr>
					
					<td><input type="submit" name="submit" value="Submit"/></td>
					<td><input type="reset" name="reset"/></td>
				</tr>
			</table>
		</fieldset>
	</form>
</div></div>
</body>
</html>

<?php

function decreaseMedicineQuantity($mname, $qty) {
   
	include "connect.php";
   

    // Fetch the current quantity of the medicine
    $selectSql = "SELECT qty FROM purchase WHERE name = '$mname'";
    $selectResult = mysqli_query($conn, $selectSql);

    if ($selectResult->num_rows > 0) {
        $row = $selectResult->fetch_assoc();
        $currentQuantity = $row["qty"];

        if ($currentQuantity >= $quantity) {
            $newQuantity = $currentQuantity - $quantity;

            // Update the medicine's quantity in the database
            $updateSql = "UPDATE purchase SET qty = '$newQuantity' WHERE name = '$mname'";

            if ($conn->query($updateSql) === TRUE) {
                echo "Quantity decreased for $mname after sale. New quantity: $newQuantity";
            } else {
                echo "Error updating medicine quantity: " . $conn->error;
            }
        } else {
            echo "Insufficient quantity of $mname available.";
        }
    } else {
        echo "$mname not found in the pharmacy database.";
    }
}
?>