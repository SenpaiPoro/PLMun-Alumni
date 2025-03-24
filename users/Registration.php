<?php
include 'db.php';
session_start();
if (isset($_SESSION['username'])) {
    header('Location: Dashboard.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['ConfirmPassword'];

    if ($password === $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', 
        '$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            echo"<script> alert ('Registration Success'); </script>";
        } else {
            echo"<script> alert ('Error: ' . $sql . '   ' . $conn->error); </script>";
        }
    } else {
        echo"<script> alert ('Password didn\'t Match'); </script>";
    }
}
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
   <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="ContainerRegister">
        <h1>Login</h1>
        <form method="post" action="">
            <div class="fiel">
                <input type="text" name="username" required> 
                <span></span>
                <label>Username</label>
            </div>
            <div class="fiel">
                <input type="text" name="email" required> 
                <span></span>
                <label>E-mail</label>
            </div>
            <div class="fiel">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="fiel">
                <input type="password" name="ConfirmPassword" required>
                <span></span>
                <label>Confirm Password</label>
            </div>
            <input type="submit" value="Register" name="submit">
            <br>
            <a href="Login.php">SingUp</a>
        </form>
    </div>
</body>
</html>