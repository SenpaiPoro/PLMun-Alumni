<?php

$conn = mysqli_connect("localhost","root","","alumnisystem");

 if(!$conn){ 
    die("Connecting in Database, Faildes.". mysqli_connect_error()); 
}

$sql  = "SELECT * FROM users";
$res = $conn->query($sql);
$data = [];
while($row = $res->fetch_assoc()){
    array_push($data, $row);
}
echo json_encode($data);

?>