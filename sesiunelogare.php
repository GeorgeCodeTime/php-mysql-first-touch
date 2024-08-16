<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
    
}
$utilizator = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>
