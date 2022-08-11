<?php
header('Content-Type: application/json');
include "db.php";

     $tarama=$_POST['tarama'];
      $lat=$_POST['lat'];
     $lng=$_POST['lng'];
     
if($tarama == '5f49e9f6-f286-4170-a149-6cb7299adbc7')
{

$stmt = $db->prepare("SELECT iso, city,  lat, lng, 
SQRT(
    POW(69.1 * (lat - $lat ), 2) +
    POW(69.1 * ( $lng  - lng) * COS(lat / 57.3), 2)) AS distance
FROM `countriesCoordinates`
USE INDEX (lat, lng)
WHERE lat >= $lat -.5 AND lat <= $lat +.5
AND lng >= $lng -.5 AND lng <= $lng +.5
HAVING distance < 25 ORDER BY distance ASC, city DESC
LIMIT 1
	");
	
$stmt->execute();
}
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
