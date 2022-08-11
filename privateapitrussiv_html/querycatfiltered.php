<?php
header('Content-Type: application/json');
include "db.php";

     $category=$_POST['category'];
  
     $offset=(int)$_POST['offset'];
     $country=$_POST['country'];
     $tarama=$_POST['tarama'];
     $sizemin=(double)$_POST['sizemin'];
     $sizemax=(double)$_POST['sizemax'];
     $capmin=(double)$_POST['capmin'];
     $capmax=(double)$_POST['capmax'];
      
     $date= $_POST['date'];
     $date = date("Y-m-d",strtotime($date));
     $pricemin=(double)$_POST['pricemin'];
     $pricemax=(double)$_POST['pricemax'];
                $searchKey=$_POST['searchKey'];
       $distmax=(double)$_POST['distmax'];
          $latitude2=(double)$_POST['latitude2'];
     $longitude2=(double)$_POST['longitude2'];
     
      
if($tarama == '5f49e9f6-f286-4170-a149-6cb7299adbc7')
{


$stmt = $db->prepare("SELECT name, image, image1, rating , uId, imageURL , category, brand, favourites  ,description,subcategory, adname,username,city,country,lat,lng, size, capacity,price FROM storeItems 

WHERE   
image1 >=  '$date'
AND category like'%".$category."%'
AND subcategory like'%".$subcategory."%'

AND country like'%".$country."%'

AND capacity>= $capmin AND capacity<=$capmax
AND size>= $sizemin AND size<=$sizemax
AND price>= $pricemin AND price<=$pricemax	
AND (description like '%".$searchKey."%' 
        OR adname like'%".$searchKey."%')


AND lat>= ($latitude2  - ($distmax / 111.1))
         AND lat<= ($latitude2  + ($distmax / 111.1))
AND
lng>= ($longitude2 - ($distmax / (111.1 * COS(RADIANS($latitude2)))))
     AND lng<= ($longitude2 + ($distmax / (111.1 * COS(RADIANS($latitude2)))))
    


        
        ORDER BY image1 DESC
         LIMIT 7 OFFSET $offset;
	
	");
	
$stmt->execute();
}
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
