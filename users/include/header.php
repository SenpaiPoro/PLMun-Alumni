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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="Style/users-dashboard.css">
    <link rel="stylesheet" href="Style/prof.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>



<?php include('sidebar.php')?>