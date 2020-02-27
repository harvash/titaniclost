<?php
# FileName="connect.php"
$hostname = "localhost";
$database = "titanic";
$username = "root";
$password = "root";


// Create connection
$connect = new mysqli($hostname, $username, $password, $database);
mysqli_options($connect, MYSQLI_OPT_CONNECT_TIMEOUT, 10);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>