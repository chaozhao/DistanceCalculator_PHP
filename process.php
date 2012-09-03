<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HIT3311</title>
<script type="text/JavaScript" src="latlong.js"></script> 
</head>

<?php
//connect to a locahost database
	//$connstring = "host=localhost "; 
	//connect to remote database
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

var swin = new LatLon(51.5136, -0.0983); 
var point = new LatLon(<?php echo "$lat, $long"?>); 
			
var dist = swin.distanceTo(point);

var resulttxt = "Coordinates <?php echo "latitude $lat, longitude $long"?> is " + dist + " kilometres from Swinburne.";

document.write(resulttxt);

</script>
<?php

	if (!$dbconn) {
  echo "An error occured while connecting.\n";
  exit;
}
pg_query($dbconn, "INSERT INTO Coords VALUES ($long, $lat)");

$result = pg_query($dbconn, "SELECT * FROM Coords");
if (!$result) {
  echo "An error occured when retrieving data.\n";
  exit;
}
?>
	<table border="0" cellspacing="2" cellpadding="2">
<tr>
<td><font face="Arial, Helvetica, sans-serif">Time</font></td>
<td><font face="Arial, Helvetica, sans-serif">Latitude</font></td>
<td><font face="Arial, Helvetica, sans-serif">Longitude</font></td>
<td><font face="Arial, Helvetica, sans-serif">Distance</font></td>
</tr>


<?php
/*
while ($row = pg_fetch_row($result)) {
	$lat = $row[1];
	$long = $row[0];
	$timest = $row[2];
?>
<script type="text/javascript">
	var point = new LatLon(<?php echo "$row[1], $row[0]"?>); 
			
	var dist = swin.distanceTo(point);

	</script>
<tr>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $timest; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $lat; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $long; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><script type="text/javascript">document.write(dist);</script></font></td>
</tr>
}
*/
?>

</html>