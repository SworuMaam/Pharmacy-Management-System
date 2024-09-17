<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../css/dashboard2.css">
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
                <form method="POST" action="logout.php" style="margin-left:800px;">
                    <input type="submit" name="submit" value="logout">
                </form>
			</ul>
		</div>

                <div class="box1">
                <table >
                    <tr>
                        
                    </tr>
                    <tr><td></td></tr>
                  
                    <tr>
			<td><div class="box2"><a href="searchmedicine.php"><img src="../Images/searchmedicine.jpg"></a></div></td>
			<td><div class="box2"><a href="searchrecord.php"><img src="../Images/searchrecord.png"></a></div></td>
            
            </tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
           
        
    </div>
</body>
</html>