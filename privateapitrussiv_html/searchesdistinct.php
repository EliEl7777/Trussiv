<?php

header('Content-Type: application/json');
include "db.php";

 $userid=$_POST['userid'];
 
  $tarama=$_POST['tarama'];
if($tarama == '5f49e9f6-f286-4170-a149-6cb7299adbc7')
{

$stmt = $db->prepare("SELECT DISTINCT  category, subcategory, brand  FROM searches 

WHERE userid like '%".$userid."%' 
        LIMIT 7
	");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
}