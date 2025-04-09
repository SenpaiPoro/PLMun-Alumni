<?php

if (isset($_POST['submit']))
{
    $username= $_POST['user'];
    $password= $_POST['pass'];

    if(!empty($username) && !empty($password))
    {
        if($username=='admin' && $password=='hero')
        {
            header("Location: admin/index.php");
        }
        else{
            echo"<script> alert ('Incorrect Username or Password'); </script>";
        }
    }else{
        echo"<script> alert ('Please, Fillup all the Fields'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Portal - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <img src="admin/assets/img/Login/PlmunLogo.png" alt="University Logo" class="logo">
            <h1>Admin Portal</h1>
            <p class="subtext">Login to access Admin dashboard</p>
            <form method="post" action="">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="user" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="pass" required>
                </div>
                <button type="submit" name="submit">Login</button>
            </form>
            <p class="footer-text">Can't Login? Contact the <a href="https://www.facebook.com/Lps.Sensei.0310"  target="_blank">Developer</a></p>
        </div>
    </div>
</body>
</html>

<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    height: 100vh;
    background: linear-gradient(to right,rgb(196, 206, 216),rgb(199, 209, 222));
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-container {
    background: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 350px;
}

.login-box .logo {
    width: 80px;
    margin-bottom: 15px;
}

h1 {
    color: #145DA0;
    font-size: 24px;
    margin-bottom: 5px;
}

.subtext {
    color: #555;
    font-size: 14px;
    margin-bottom: 20px;
}

.input-group {
    text-align: left;
    margin-bottom: 15px;
}

.input-group label {
    display: block;
    font-size: 14px;
    color: #333;
    margin-bottom: 5px;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    width: 100%;
    background: #145DA0;
    color: white;
    border: none;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
}

button:hover {
    background: #0E4C8C;
}

.footer-text {
    margin-top: 15px;
    font-size: 14px;
    color: #555;
}

.footer-text a {
    color: #145DA0;
    text-decoration: none;
    font-weight: bold;
}

.footer-text a:hover {
    text-decoration: underline;
}
</style>
