<?php
header('Content-Type: application/json');
include "db.php";

 $searchKey=$_POST['$searchKey'];
 $offset=(int)$_POST['offset'];

  $tarama=$_POST['tarama'];
if($tarama == '5f49e9f6-f286-4170-a149-6cb7299adbc7')
{
$stmt = $db->prepare("SELECT name, image, image1, rating , uId, imageURL , category, brand, favourites  ,description, subcategory, adname,username,city,country,lat,lng, size, capacity,price FROM storeItems 

WHERE image1 ='2020-06-06'

       AND ( adname like '%".$searchKey."%' 

       OR description like '%".$searchKey."%') 

		
         ORDER BY image DESC
         LIMIT 7 OFFSET $offset;
    
");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
echo json_encode($result);
