<?php
include('connect.php');

	
    $query = "select t.pclass, t.total, s.survivors, round(s.survivors/t.total,2) as '%saved'
              from (select pclass, count(*) as total from titanic.titanic3 group by pclass) as t,
              (select pclass, count(*) as survivors from titanic.titanic3 where survived = 1 group by pclass) as s
              where t.pclass = s.pclass
              group by t.pclass;";
	$result = $connect->query($query);
	
	$survivors = Array();
	
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($survivors[] = $result->fetch_assoc()) {}
	    array_pop($survivors);
	} else {
	    echo "0 results";
	}
	$connect->close();
	header('Content-type: application/json');
	echo json_encode($survivors);
?>