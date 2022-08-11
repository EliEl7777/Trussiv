<?php
header('Content-Type: application/json');
include "db.php";



 $tarama=$_POST['tarama'];
$name = $_POST['name'];

$image1 =  $_POST['image1'];

if($tarama == '5f49e9f6-f286-4170-a149-6cb7299adbc7')
{

$stmt = $db->prepare("UPDATE storeItems SET image1=? WHERE name = ? ");
$result =  $stmt->execute([ $image1, $name  ]);

echo json_encode([
    'success' => $result
]);
}