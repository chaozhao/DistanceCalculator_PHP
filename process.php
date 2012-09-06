<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HIT3311</title>
<script type="text/JavaScript" src="latlong.js"></script> 
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
	$connstring .= "port=5432 ";
	$connstring .= "dbname=d5esbqm1g7orap ";
	$connstring .= "user=zmffjoapewndxl ";
	$connstring .= "password=r7mnCO1hMRPy2R8ask5BCsd3s7";
	
	$dbconn = pg_connect($connstring);
		
	$long =  $_POST['longitude'];
	$lat =  $_POST['latitude'];
?>	

<script type="text/javascript">

var swin = new LatLon(-37.82, 145.04); 
var point = new LatLon(<?php echo "$lat, $long"?>); 
			
var dist = swin.distanceTo(point);

var resulttxt = "Coordinates <?php echo "latitude $lat, longitude $long"?> is " + dist + " kilometres from Swinburne.";

//document.write(resulttxt);

</script>

<?php

	//echo "The distance is ". distance($lat, $long) . " Kilometers<br>";
	
	$distance = distance($lat, $long);

	if (!$dbconn) 
	{
	  echo "An error occured while connecting.\n";
	  exit;
	}

	$dbins = "INSERT INTO coords VALUES ($long, $lat, $distance, CURRENT_TIMESTAMP)";
	pg_query($dbconn, $dbins);
	$result = pg_query($dbconn, "SELECT longitude, latitude, distance, time_stamp FROM coords");
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
	$distance = $row[2];
	$timest = $row[3];
	
echo "<tr>";
echo "<td> $timest </td>";
echo "<td> $lat </td>";
echo "<td> $long </td>";
echo "<td> $distance </td>";

/*
<script type="text/javascript">
	var point = new LatLon(<?php echo "$lat, $long"?>); 
	var dist = swin.distanceTo(point);
	document.write(dist); 
</script>;
*/

echo "</tr>";
}

echo "</table>";	

?>
<a href="index.php">go back</a>
</html>