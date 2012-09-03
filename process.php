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
	
	$databaseconn = pg_connect($connstring);
		
	$long =  $_POST['longitude'];
	$lat =  $_POST['latitude'];
?>		
<script type="text/javascript">

var swin = new LatLon(51.5136, -0.0983); 
var point = new LatLon(<?php echo "$lat, $long"?>); 
			
var dist = swin.distanceTo(point);

var resulttxt = "Coordingates <?php echo "latitude $lat, longitude $long"?> is " + dist + " kilometres from Swinburne.";

document.write(resulttxt);

</script>

</html>