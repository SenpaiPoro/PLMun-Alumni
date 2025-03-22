<?php
session_start();
require 'Database.php'; // Include the Database class

// Initialize the database connection
$db = new Database("localhost", "root", "", "alumnisystem");

// Fetch data based on the college (dynamic input)
$colleges = $_GET['colleges']; // Use a default value if not provided
$query = "SELECT * FROM users WHERE colleges = '$colleges'";
$data = $db->fetchData($query);

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>