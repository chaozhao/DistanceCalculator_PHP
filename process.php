<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HIT3311</title>
<script type="text/JavaScript" src="latlong.js"></script> 
</head>

<?php

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

document.write(resulttxt);

</script>
<?php

	if (!$dbconn) 
	{
	  echo "An error occured while connecting.\n";
	  exit;
	}

	$dbins = "INSERT INTO coords VALUES ($long, $lat, CURRENT_TIMESTAMP)";
	pg_query($dbconn, $dbins);
	$result = pg_query($dbconn, "SELECT 'longitude', 'latitude', 'time_stamp' FROM `coords`");
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

echo "<tr>";
echo "<td> timest </font></td>";
echo "<td> lat </font></td>";
echo "<td> long </font></td>";
echo "<td> echo </font></td>";

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

</html>