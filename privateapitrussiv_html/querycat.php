<?php
header('Content-Type: application/json');
include "db.php";


 $category=$_POST['category'];
 $subcategory=$_POST['subcategory'];
 $offset=(int)$_POST['offset'];
   $country=$_POST['country'];
   $tarama=$_POST['tarama'];
   $sizemin=(double)$_POST['sizemin'];
     $sizemax=(double)$_POST['sizemax'];
     $capmin=(double)$_POST['capmin'];
     $capmax=(double)$_POST['capmax'];
      $date= $_POST['date'];
      $date = date("Y-m-d",strtotime($date));


if($tarama == '5f49e9f6-f286-4170-a149-6cb7299adbc7')
{
$stmt = $db->prepare("SELECT name, image, image1, rating , uId, imageURL , category, brand, favourites  ,description, subcategory, adname,username,city,country,lat,lng, size,capacity,price FROM storeItems 

WHERE  
        category like'%".$category."%'
	AND	subcategory like'%".$subcategory."%'
	AND country like'%".$country."%'
		AND image1 >=  '$date'


		
        ORDER BY image1 DESC
         LIMIT 7 OFFSET $offset;
	
	");
	
$stmt->execute();
}
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
