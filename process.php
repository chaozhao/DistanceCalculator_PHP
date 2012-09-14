<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HIT3311</title>
</head>

<?php
function distance($lat, $lon) 
{
  //-37.82, 145.04
  $lat_swin = -37.82;
  $lon_swin = 145.04;

  $theta = $lon - $lon_swin;
  $dist = sin(deg2rad($lat)) * sin(deg2rad($lat_swin)) +  cos(deg2rad($lat)) * cos(deg2rad($lat_swin)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $kilometers = $miles * 1.609344;
  return $kilometers;
}

	$connstring = "host=ec2-23-23-92-180.compute-1.amazonaws.com "; 
	//$connstring = "host=localhost ";
	$connstring .= "port=5432 ";
	$connstring .= "dbname=d5esbqm1g7orap ";
	$connstring .= "user=zmffjoapewndxl ";
	$connstring .= "password=r7mnCO1hMRPy2R8ask5BCsd3s7";
	
	$dbconn = pg_connect($connstring);
		
	$long =  $_POST['longitude'];
	$lat =  $_POST['latitude'];
	
	if (!$dbconn) 
	{
	  echo "An error occured while connecting.\n";
	  exit;
	}

	$insert = "INSERT INTO coords (longitude,latitude,time_stamp,ID)VALUES ($long, $lat, CURRENT_TIMESTAMP, nextval('auto_ID'))";

	pg_query($dbconn, $insert);

	$result = pg_query($dbconn, "SELECT longitude, latitude, time_stamp FROM coords");
	if (!$result) 
	{
	  echo "An error occured when retrieving data.\n";
	  //exit;
	}

echo " <table border=1> ";
echo " <tr> ";
echo " <th>Time</th> ";
echo " <th>Latitude</th> ";
echo " <th>Longitude</th> ";
echo " <th>Distance</th> ";
echo " </tr> ";

while ($row = pg_fetch_row($result)) 
{
	$long = $row[0];
	$lat = $row[1];
	$timest = $row[2];
	$distance = distance($lat, $long);
	$distance =  number_format($distance, 4, '.', '');

echo "<tr>";
echo "<td> $timest </td>";
echo "<td> $lat </td>";
echo "<td> $long </td>";
echo "<td> $distance Kms</td>";

echo "</tr>";
}

echo "</table>";	

?>
<a href="index.php">go back</a>

	<div>
		<p>by 6555985 and 6595979 </p>
		<p>created on: 10/09/2012 </p>
	</div>

</html>