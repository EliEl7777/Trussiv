<?php
header('Content-Type: application/json');
include "db.php";


          $category1=$_POST['category1'];
  $subcategory1=$_POST['subcategory1'];
     $brand1=$_POST['brand1'];
          $category2=$_POST['category2'];
  $subcategory2=$_POST['subcategory2'];
     $brand2=$_POST['brand2'];
          $category3=$_POST['category3'];
  $subcategory3=$_POST['subcategory3'];
     $brand3=$_POST['brand3'];
          $category4=$_POST['category4'];
  $subcategory4=$_POST['subcategory4'];
     $brand4=$_POST['brand4'];
          $category5=$_POST['category5'];
  $subcategory5=$_POST['subcategory5'];
     $brand5=$_POST['brand5'];
          $category6=$_POST['category6'];
  $subcategory6=$_POST['subcategory6'];
     $brand6=$_POST['brand6'];
          $category7=$_POST['category7'];
  $subcategory7=$_POST['subcategory7'];
     $brand7=$_POST['brand7'];
     
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
AND ((category like'%".$category1."%'AND subcategory like'%".$subcategory1."%'AND brand like'%".$brand1."%')
     OR (category like'%".$category2."%'AND subcategory like'%".$subcategory2."%'AND brand like'%".$brand2."%')
      OR (category like'%".$category3."%'AND subcategory like'%".$subcategory3."%'AND brand like'%".$brand3."%')
       OR (category like'%".$category4."%'AND subcategory like'%".$subcategory4."%'AND brand like'%".$brand4."%')
        OR (category like'%".$category5."%'AND subcategory like'%".$subcategory5."%'AND brand like'%".$brand5."%')
         OR (category like'%".$category6."%'AND subcategory like'%".$subcategory6."%'AND brand like'%".$brand6."%')
         OR (category like'%".$category7."%'AND subcategory like'%".$subcategory7."%'AND brand like'%".$brand7."%')
      )

AND country like'%".$country."%'




		
        ORDER BY image1 DESC
         LIMIT 7 OFFSET $offset;
	
	");
	
$stmt->execute();
}
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
