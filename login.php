<?php

if (isset($_POST['submit']))
{
    $username= $_POST['user'];
    $password= $_POST['pass'];

    if(!empty($username) && !empty($password))
    {
        if($username=='Super_Admin' && $password=='hero')
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
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
  <div class="Container">
      <h1>Login</h1>
      <form method="post" action="">
          <div class="fiel">
              <input type="text" name="user" required> 
              <span></span>
              <label>Email</label>
          </div>
          <div class="fiel">
              <input type="password" name="pass" required>
              <span></span>
              <label>Password</label>
          </div>
          <input type="submit" value="Login" name="submit">
          <br>
      </form>
  </div>
</body>
</html>