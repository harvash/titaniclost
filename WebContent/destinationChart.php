<?php
include('connect.php');

	
$query = $connect->prepare("select destination, count(*) 
    from titanic.titanic3 t 
    where destination !=''
    group by destination 
    order by count(*) desc
    limit 10");
$query->execute();

$survivors = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($survivors);

?>