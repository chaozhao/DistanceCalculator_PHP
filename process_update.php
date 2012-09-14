<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="all">
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
	//$connstring  = "host=localhost ";
	$connstring .= "port=5432 ";
	$connstring .= "dbname=d5esbqm1g7orap ";
	$connstring .= "user=zmffjoapewndxl ";
	$connstring .= "password=r7mnCO1hMRPy2R8ask5BCsd3s7 ";
	$connstring .= "sslmode=require ";
	
	$dbconn = pg_connect($connstring);
	
	$long =  $_POST['longitude'];
	$lat =  $_POST['latitude'];

	if (!$dbconn) 
	{
	  echo "An error occured while connecting";
	}

	$nextvalquery = "select nextval('auto_ID');";
	//$nextvalresult = pg_query($dbconn, $nextvalquery);
	//$row = pg_fetch_row($result);
	//$nextval = $row[0];
	
	$insert  = "INSERT INTO latitude_table (lat_ID,  latitude) Values ($nextval, $lat);";
	$insert .= "INSERT INTO longitude_table (long_ID, longitude) Values ($nextval, $long);";
	$insert .= "INSERT INTO time_table (Time_ID, time_stamp) Values ($nextval, CURRENT_TIMESTAMP);";

	//pg_query($dbconn, $insert);

	$query  = "SELECT longitude_table.longitude, latitude_table.latitude, time_table.time_stamp ";
	$query .= "FROM Time_table, longitude_table, latitude_table ";
	$query .= "WHERE Time_table.time_id = longitude_table.long_id and longitude_table.long_id = latitude_table.lat_id;";

	$result = pg_query($dbconn, $query);
	if (!$result) 
	{
	  echo "An error occured when retrieving data.";
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
		<p>created on: 14/09/2012 </p>
	</div>

</html>