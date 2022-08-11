<?php
header('Content-Type: application/json');
include "db.php";

     $category=$_POST['category'];
  $subcategory=$_POST['subcategory'];
     $brand=$_POST['brand'];
     $offset=(int)$_POST['offset'];
     $country=$_POST['country'];
     $tarama=$_POST['tarama'];

     $date= $_POST['date'];
     $date = date("Y-m-d",strtotime($date));
      
if($tarama == '5f49e9f6-f286-4170-a149-6cb7299adbc7')
{

$stmt = $db->prepare("SELECT name, image, image1, rating , uId, imageURL , category, brand, favourites  ,description,subcategory, adname,username,city,country,lat,lng, size, capacity,price FROM storeItems 

WHERE   
image1 >=  '$date'
AND category like'%".$category."%'
AND subcategory like'%".$subcategory."%'
AND brand like'%".$brand."%'
AND country like'%".$country."%'




		
        ORDER BY image1 DESC
         LIMIT 7 OFFSET $offset;
	
	");
	
$stmt->execute();
}
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
