<?php
session_start();
require 'dbcon.php';
$college = $_SESSION['colleges'];

$sql = "SELECT * FROM users where colleges = '$college' "; // Fetch only the required columns
$res = $conn->query($sql);

$data = [];
while ($row = $res->fetch_assoc()) {
    array_push($data, $row);
}

echo json_encode($data);
?>