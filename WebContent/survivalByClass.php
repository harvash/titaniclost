<?php
include('connect.php');

	
    $query = $connect->prepare("select 
	case t.pclass
	  when 1 then 'First'
	  when 2 then 'Second'
	  when 3 then 'Third'
	   end as pclass,
       count(t.pclass)
    from titanic.titanic3 t
    where t.survived = 1
    group by t.pclass
    order by pclass;");
    $query->execute();
	
	$survivors = $query->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($survivors);
?>