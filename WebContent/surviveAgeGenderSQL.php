<?php
include('connect.php');

	
$query = $connect->prepare("SELECT * FROM (
            SELECT CASE
                when age between 0 and 17 then '0-17'
                when age between 17 and 25 then '18-25'
                when age between 25 and 35 then '26-35'
                when age between 35 and 55 then '36-55'
                when age between 55 and 69 then '56-69'
                when age > 69 then '70+'
                else 'Unknown'
            END AS Age_Range, 
            SUM(CASE WHEN Sex = 'female' THEN 1 ELSE 0 END) AS Males,
            SUM(CASE WHEN Sex = 'male' THEN 1 ELSE 0 END) AS Females
            FROM titanic.titanic3 t 
            WHERE survived = 1
            GROUP BY CASE
                when age between 0 and 17 then '0-17'
                when age between 17 and 25 then '18-25'
                when age between 25 and 35 then '26-35'
                when age between 35 and 55 then '36-55'
                when age between 55 and 69 then '56-69'
                when age > 69 then '70+'
                else 'Unknown'
        END) as tmp_table ORDER BY Age_Range");
$query->execute();

$survivors = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($survivors);

?>