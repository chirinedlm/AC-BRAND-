<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$host = 'localhost'; 
$username = 'root';
$password = '';
$dbname = 'brand'; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
