<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HIT3311</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/JavaScript" src="latlong.js"></script> 
</head>

<?php
	echo "Database test";
	
	$long =  $_POST['longitude'];
	$lat =  $_POST['latitude'];
			
	$swin = new LatLon(51.5136, -0.0983);
	$point = new LatLon($lat, $long);
			
	$dist = $swin.distanceTo($point);
			
	echo "$lat, $long, $dist";
?> 

</html>