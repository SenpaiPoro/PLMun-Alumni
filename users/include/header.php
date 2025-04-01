<?php
require '../admin/config/func.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}if (!isset($_SESSION['id'])) {
    header('Location:users.php');
    exit();
}
$tempcode = $_SESSION['tempcode'];  
$sql = "SELECT * 
        FROM users
        INNER JOIN personal ON users.tempcode = personal.tempcode
        INNER JOIN contacts ON users.tempcode = contacts.contactId 
        WHERE users.tempcode = '$tempcode' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../admin/admin/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../admin/admin/assets/img/favicon.png">
  <title>
  Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- Nucleo Icons -->
  <link href="../admin/admin/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../admin/admin/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../admin/admin/assets/css/nucleo-svg.css" rel="stylesheet" />
    <link rel="stylesheet" href="Style/users-dashboard.css">
    <link rel="stylesheet" href="Style/prof.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link id="pagestyle" href="../admin/admin/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />

</head>
<body>



<?php include('sidebar.php')?>