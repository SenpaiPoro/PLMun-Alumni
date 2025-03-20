<?php
    require '../admin/config/func.php';
    //if id still exist, redirect to user-dashboarb 
    if (isset($_SESSION['id'])) {
        header('Location: UserDashboard.php');
        exit();
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tempcode = $_POST['tempcode'];
        $email = $_POST['email'];
        $sql = "SELECT * FROM users WHERE username = '$email' and tempcode = '$tempcode'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
             if ("student" == $row['level']) {
                 $id = $row[ 'id'];
                  $_SESSION['id'] = $row['id'];
                  $_SESSION['tempcode'] = $row['tempcode'];   
                 header('Location: userDashboard.php');
             } else {
                 $id = $row[ 'id'];
                 $_SESSION['id'] = $row['id'];
                 $_SESSION['tempcode'] = $row['tempcode'];   
                 $_SESSION['colleges'] = $row['colleges'];
                header('Location: ../admin/dean/index.php');             
            }
        } else {
            echo"<script> alert ('Incorect Code'); </script>";
        }  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style/FirstStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLMun Alumni System</title>
</head>
<header>
    <div class="head-container">
        <img src="Style/Photos/PlmunLogo.png" alt="PLMUN Logo" class="logo">
        <div class="institution">PLMUN</div>
        <div class="portal">Alumni <br>System</div>
    </div>
</header>
<body>
    <form class="login-container" action="" method="POST">
        <head class="header">
            <div class="header-container">
                <img src="Style/Photos/PlmunLogo.png" alt="PLMUN Logo" class="logo">
                <div class="institution-name">PLMUN</div>
                <div class="portal-title">Alumni <br>System</div>
            </div>
        </head>
 <hr>
 <input type="text" id="studentEmail" name="email" placeholder="Email" required>
        <br><br>
        <input type="password" id="studentNumber" name="tempcode" placeholder="Temporary Code" required>
        <br><br>
        <button value="Login" class="lgnBtn">Login</button>
        <hr>
        <div class="support-link">
            If you forgot your PIN or need assistance to activate your account, please email us at
            <a href="mailto:support@plmun.edu.ph">support@plmun.edu.ph</a> using your official IE account.
            We will only entertain messages coming from PLMun official IE.
        </div>
    </form>
</body>
</html>