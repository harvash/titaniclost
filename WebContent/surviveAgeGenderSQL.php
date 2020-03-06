<?php
	#Include the connect.php file
	include('connect.php');
	// Create connection
	$connect = new mysqli($hostname, $username, $password, $database);
	// Check connection
	if ($connect->connect_error) {
	    die("Connection failed: " . $connect->connect_error);
	}
	
	$query = "SELECT CASE
                when age between 0 and 17 then '0-17'
                when age between 17 and 25 then '18-25'
                when age between 25 and 35 then '26-35'
                when age between 35 and 55 then '36-55'
                when age between 55 and 69 then '56-69'
                when age > 69 then '70+'
            END AS Age_Range, 
            SUM(CASE WHEN Sex = 'female' THEN 1 ELSE 0 END) AS Males,
            SUM(CASE WHEN Sex = 'male' THEN 1 ELSE 0 END) AS Females
            FROM titanic.titanic3 t 
            GROUP BY CASE
                when age between 0 and 17 then '0-17'
                when age between 17 and 25 then '18-25'
                when age between 25 and 35 then '26-35'
                when age between 35 and 55 then '36-55'
                when age between 55 and 69 then '56-69'
                when age > 69 then '70+'
            END";
	$result = $connect->query($query);
	
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo $row["Age_Range"]. " " . $row["Males"]. " " . $row["Females"]. "<br>";
	    }
	} else {
	    echo "0 results";
	}
	$connect->close();

?>