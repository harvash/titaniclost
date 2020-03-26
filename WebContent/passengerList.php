<?php
include('connect.php');


$query = $connect->prepare("SELECT * FROM titanic.titanic3");

$query->execute();

$survivors = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($survivors);
?>