<?php
header('Content-Type: application/json');
include "db.php";

 $category=$_POST['category'];
 $country=$_POST['country'];
  $tarama=$_POST['tarama'];
       $date= $_POST['date'];
      $date = date("Y-m-d",strtotime($date));
if($tarama == '5f49e9f6-f286-4170-a149-6cb7299adbc7')
{
$stmt = $db->prepare("SELECT COUNT(*) FROM storeItems 

WHERE  
category like'%".$category."%'
AND image1 >=  '$date'
AND country like'%".$country."%'");
        
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
}