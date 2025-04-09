<?php
session_start();
require 'dbcon.php';

$college = $_SESSION['colleges'];

// Query 1: All users
$allUsers = $conn->query("SELECT program FROM users")->fetch_all(MYSQLI_ASSOC) ?: [];
$allWorkers = $conn->query("SELECT WorkStatus FROM personal")->fetch_all(MYSQLI_ASSOC) ?: [];

// Query 2: College-specific users
$stmt = $conn->prepare("SELECT * FROM users WHERE colleges = ?");
$stmt->bind_param("s", $college);
$stmt->execute();
$college_users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

$stmt = $conn->prepare("SELECT personal.WorkStatus
FROM personal
JOIN users ON personal.tempcode = users.tempcode 
WHERE users.colleges = ?");
$stmt->bind_param("s", $college);
$stmt->execute();
$college_workers = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Combine and output
echo json_encode([
    'all_users' => $allUsers,
    'all_workers' => $allWorkers,
    'college_users' => $college_users,
    'college_workers' => $college_workers, // Fixed: It should return an array, not a specific column
    'college_name' => !empty($college_users) ? $college_users[0]['colleges'] : 'Unknown College'
]);
?>
