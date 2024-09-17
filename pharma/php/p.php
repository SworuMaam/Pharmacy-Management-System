<?php 
    session_start();
    if(isset($_SESSION['user'])){
        include "connect.php";
    } else{
        session_destroy();
        echo "<script>window.location.href='login.php';</script>";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pharma</title>
    <link rel="stylesheet" href="../css/dash.css">
	<link rel="stylesheet" href="../css/displayS.css">
	<link rel="stylesheet" href="../css/search.css">
    <style>

        .container{
			margin-left: 10px;
		}

        .inp {
            position: relative;
            top: 2px;
            left: 200px;
        }

        .box2 {
			background-color: #E5E4E2;
			margin: 20px;
			margin-top: 70px;
			border-radius: 20px;
			padding: 15px;
    		box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
		}
        
    </style>
</head>
<body>

    <header>Patient Records</header>

    <nav>

		<a href="dashboard.php">Home</a>
		<a href="m.php">Medicine Records</a>
		<a href="p.php">Patient Records</a>
		<a href="adminTransaction.php">Transaction History</a>
		<a href="n.php">Notifications</a>

		<div class="inp">
			<form method="POST" action="logout.php">
				<input type="submit" name="logout" value="Logout">
			</form>
		</div>

	</nav>

    <div class="search-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="text" name="search" class="search-bar" placeholder="Search Patient">
            <button type="submit" name="submit" class="search-btn">Search</button>
        </form>
    </div>

    <div class="container">

        <div class="box2">

            <?php

                if(isset($_POST['submit'])) {
                    // Check if the search query is set
                    $search = isset($_POST['search']) ? $_POST['search'] : '';

                    $searchQuery = $_POST["search"];

                    $sqlSearch = "select * from user u join transaction t on u.id = t.u_id join purchase p on t.m_id = p.m_id where username LIKE '%$searchQuery%'";
                    $sqlSearchExe = $conn->query($sqlSearch);

                    echo "<table border=1px>";
                    echo "<tr>";
                        echo "<th>Id</th>";
                        echo "<th>Name</th>";
                        echo "<th>Medicine Name</th>";
                        echo "<th>Contact</th>";
                        echo "<th>Purchase Date</th>";
                        echo "<th>Price</th>";
                        echo "<th>Quantity</th>";
                        echo "<th>Status</th>";
                    echo "</tr>";

                    if (!$sqlSearchExe) {
                        die("Query search failed: " . mysqli_error($conn));
                    }elseif($sqlSearchExe->num_rows > 0) {
                        while ($row = $sqlSearchExe->fetch_assoc()) {
                            $Purchase_Date=$row['t_date'];
                            $Patient_id=$row['id'];
                            $Patient_Name=$row['username'];
                            $Medicine_name=$row['m_name'];
                            $Contact_No=$row['contact'];
                            $Price=$row['total_price'];
                            $Quantity=$row['quty'];
                            $stat=$row['status'];   
                
                            echo "<tr>";
                                echo "<td>$Patient_id</td>";
                                echo "<td>$Patient_Name</td>";
                                echo "<td>$Medicine_name</td>";
                                echo "<td>$Contact_No</td>";
                                echo "<td>$Purchase_Date</td>";
                                echo "<td>$Price</td>";
                                echo "<td>$Quantity</td>";
                                echo "<td>$stat</td>";
                    
                            echo "</tr>";
                        }
                    }else {
                        echo "No patient found.";
                    }
				}else{

                    $disQuery="select * from user u join transaction t on u.id = t.u_id join purchase p on t.m_id = p.m_id";
                    $disExe=mysqli_query($conn,$disQuery);
                
                    echo "<table border=1px>";
                        echo "<tr>";
                            echo "<th>Id</th>";
                            echo "<th>Name</th>";
                            echo "<th>Medicine Name</th>";
                            echo "<th>Contact</th>";
                            echo "<th>Purchase Date</th>";
                            echo "<th>Price</th>";
                            echo "<th>Quantity</th>";
                            echo "<th>Status</th>";
                        echo "</tr>";
                    
                        if ($disExe) {
                            while ($row=mysqli_fetch_assoc($disExe)) {
                                $Purchase_Date=$row['t_date'];
                                $Patient_id=$row['id'];
                                $Patient_Name=$row['username'];
                                $Medicine_name=$row['m_name'];
                                $Contact_No=$row['contact'];
                                $Price=$row['total_price'];
                                $Quantity=$row['quty'];
                                $stat=$row['status'];   
                    
                                echo "<tr>";
                                    echo "<td>$Patient_id</td>";
                                    echo "<td>$Patient_Name</td>";
                                    echo "<td>$Medicine_name</td>";
                                    echo "<td>$Contact_No</td>";
                                    echo "<td>$Purchase_Date</td>";
                                    echo "<td>$Price</td>";
                                    echo "<td>$Quantity</td>";
                                    echo "<td>$stat</td>";
                        
                                echo "</tr>";
                            }
                        }
                    echo "</table>";
                }
            ?>

        </div>

    </div>

</body>
</html>