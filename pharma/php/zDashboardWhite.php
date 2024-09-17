<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../css/dash.css">
</head>
<body>
    <div class="container">
        <div class="box1">
            <div>
                <h1>Welcome to Pharma</h1>
                <h2>Dashboard</h2>
            </div>
            <div class="box0">
                <div class="box2">
                    <a href="m.php"><img src="../Images/medicinerecord.jpg" alt="Medicine Record"></a>
                </div>
                <div class="box2">
                    <a href="p.php"><img src="../Images/patientrecord.jpg" alt="Patient Record"></a>
                </div>
                <div class="box2">
                    <a href="n.php"><img src="../Images/notification.jpg" alt="Notification"></a>
                </div>
                <div class="box2">
                    <a href="../php/s.php"><img src="../Images/search.jpg" alt="Search"></a>
                </div>
            </div>
            <div class="inp">
                <form method="POST" action="logout.php">
                    <input type="submit" name="logout" value="Logout">
                </form>
            </div>
        </div>
    </div>

</body>
</html>