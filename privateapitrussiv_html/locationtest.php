<?php
header('Content-Type: application/json');
include "db.php";

    
      $lat=0;
     $lng=0;
     



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

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
