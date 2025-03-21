<?php
$conn = mysqli_connect("localhost", "root", "", "alumnisystem");

if (!$conn) {
    die("Connection to Database Failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users where colleges = 'CITCS' "; // Fetch only the required columns
$res = $conn->query($sql);

$data = [];
while ($row = $res->fetch_assoc()) {
    array_push($data, $row);
}

echo json_encode($data);

mysqli_close($conn); // Close the connection
?>