<?php
header('Content-Type: application/json');
include "db.php";

$userid = $_POST['userid'];
$category =  $_POST['category'];
$subcategory = $_POST['subcategory'];
$brand =  $_POST['brand'];
$time =  $_POST['time'];
$imageURL =  $_POST['imageURL'];
  $tarama=$_POST['tarama'];
if($tarama == '5f49e9f6-f286-4170-a149-6cb7299adbc7')
{
$stmt = $db->prepare("INSERT INTO searches (userid, category,subcategory ,brand, time,imageURL) VALUES (?, ?,?,?,?,?)");
$result = $stmt->execute([$userid, $category,$subcategory ,$brand,$time,$imageURL]);

echo json_encode([
    'success' => $result
]);
}