<?php
 $tarama=$_POST['tarama'];
     $location=$_POST['location'];
if($tarama == '5f49e9f6-f286-4170-a149-6cb7299adbc7')
{

$city = urlencode( $location );
$details_url="https://maps.googleapis.com/maps/api/place/textsearch/json?query=".$city."&key=AIzaSyAikdeJfirrSNVK7UPx6Raz1jgQ6s-mluU";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $details_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$geoloc = json_decode(curl_exec($ch), true);
//print_r($geoloc);
//$stringArray = print_r($geoloc, true);
//echo json_encode($geoloc);

foreach ($geoloc["results"] as $result) {
      $country = $result["formatted_address"];
      $geometry=$result["geometry"];
  $location= $geometry["location"];
            $lat = $location["lat"];
             $lng = $location["lng"];
}
echo( $country. "<br>". $lat. "<br>". $lng);
}