<?php
header('Content-Type: application/json');
include "db.php";

$name = $_POST['name'];
$image = $_POST['image'];
$image1 = $_POST['image1'];
$rating = (float) $_POST['rating'];
$uId =  $_POST['uId'];
$imageURL = $_POST['imageURL'];
$category =  $_POST['category'];
$brand = $_POST['brand'];
$favourites = (int) $_POST['favourites'];
$description = $_POST['description'];
$subcategory =  $_POST['subcategory'];
$adname =  $_POST['adname'];
$username = $_POST['username'];
$city = $_POST['city'];
$country = $_POST['country'];
$lat = (double) $_POST['lat'];
$lng = (double) $_POST['lng'];
$size = (double) $_POST['size'];
$capacity = (double) $_POST['capacity'];
$price = (double) $_POST['price'];

  $tarama=$_POST['tarama'];
if($tarama == '5f49e9f6-f286-4170-a149-6cb7299adbc7')
{

$stmt = $db->prepare("INSERT INTO storeItems (name, image, image1, rating , uId, imageURL , category, brand, favourites  ,description, subcategory,adname,username,city,country,lat,lng, size,capacity,price ) VALUES (?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?)");
$result = $stmt->execute([$name , $image,$image1, $rating ,$uId  ,$imageURL  ,$category  , $brand ,$favourites ,$description, $subcategory,$adname, $username,$city,$country,$lat,$lng,$size ,$capacity,$price ]);

echo json_encode([
    'success' => $result
]);
}