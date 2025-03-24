<?php
session_start();
require 'dbcon.php';
$college = $_SESSION['colleges'];

// Query 1: All users
$query = "SELECT * FROM users"; 
$result = $conn->query($query);
$database = $result->fetch_all(MYSQLI_ASSOC);

// Query 2: College-specific users
$stmt = $conn->prepare("SELECT * FROM users WHERE colleges = ?");
$stmt->bind_param("s", $college);
$stmt->execute();
$data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Combine and output
echo json_encode([
    'all_users' => $database,
    'college_users' => $data,
    'college_name' => $data[0]['colleges'] ?? 'Unknown College'
]);
?>