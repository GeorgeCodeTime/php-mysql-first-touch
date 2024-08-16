<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";
$port = ; 

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>

