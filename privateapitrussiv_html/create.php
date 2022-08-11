<?php
header('Content-Type: application/json');
include "db.php";
require "safeCrypto.php"; 

 $token=$_POST['token'];
 
$userid = $_POST['userid'];
$documentId =  $_POST['documentId'];
$username = $_POST['username'];
$comment =  $_POST['comment'];
$time =  $_POST['time'];
  $tarama=$_POST['tarama'];
if($tarama == '5f49e9f6-f286-4170-a149-6cb7299adbc7')
{
$stmt = $db->prepare("INSERT INTO comments (userid, documentId,username ,comment, time) VALUES (?, ?,?,?,?)");
$result = $stmt->execute([$userid, $documentId,$username ,$comment,$time]);

echo json_encode([
    'success' => $result
]);
}