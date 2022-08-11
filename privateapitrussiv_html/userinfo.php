<?php
header('Content-Type: application/json');
include "db.php";

 
 $guid=$_POST['guid'];
  $tarama=$_POST['tarama'];
if($tarama == '5f49e9f6-f286-4170-a149-6cb7299adbc7')
{
$stmt = $db->prepare("SELECT guid, date, token, ratingsum , ratingcount FROM usars 

WHERE  
        guid like'%".$guid."%'
         LIMIT 1");
        
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
}