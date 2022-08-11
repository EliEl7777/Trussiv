<?php

header('Content-Type: application/json');
include "db.php";

 $documentId=$_POST['documentId'];
 
  $tarama=$_POST['tarama'];
if($tarama == '5f49e9f6-f286-4170-a149-6cb7299adbc7')
{

$stmt = $db->prepare("SELECT userid, documentId, username, comment , time FROM comments 

WHERE documentId like '%".$documentId."%' 
       
	");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
}