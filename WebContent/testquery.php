<head>
  <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-base.min.js" type="text/javascript"></script>
</head>
<?php
	#Include the connect.php file
	include('connect.php');
	// Create connection
	$connect = new mysqli($hostname, $username, $password, $database);
	// Check connection
	if ($connect->connect_error) {
	    die("Connection failed: " . $connect->connect_error);
	}
	
	$query = "SELECT age from titanic3 LIMIT 5";

    $result = $connect->query($query);
	
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "Count: " . $row["age"] . "<br>";
	    }
	} else {
	    echo "0 results";
	}
	$connect->close();

?>