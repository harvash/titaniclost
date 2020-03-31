<?php
# FileName="connect.php"
$hostname = "10.10.10.10";
$database = "titanicdb";
$username = "postgres";
$password = "changeme";

// Create PDO DSN
$dsn = "pgsql:host=$hostname;port=5432;dbname=$database;user=$username;password=$password";

// Create connection
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$connect = new PDO($dsn, $username, $password, $opt);
?>