<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HIT3311</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="all">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
</script>

<script> 
$(document).ready(function() {
	$("#myform").validate({
	rules: {
		latitude: 
		{
		required: true,
		range: [-180.0, +180.0]
		},
		longitude: 
		{
		required: true,
		range: [-180.0, +180.0]
		}
	}
	});

  });
</script>
</head>

<body>
	

	<div class="container" >
	<h1>Assignment 1</h1>

	<p>Swinburne's location is -37.82, 145.04 </p>
	<p>Please enter a latitude and a longitude to get distance </p>	
		<form id="myform" method="post" action="process.php">
			<p>
			<label for="latitude">Latitude </label>
			<input id="latitude" name="latitude"  type="text" /> 
			</p>		
			<p>
			<label for="longitude">Longitude </label>
			<input id="longitude" name="longitude"  type="text" /> 
			</p>		
			<p>
			<input id="saveForm" type="submit" name="submit" value="Calculate" />
			</p>	
		</form>
	</div>

	<div class="footer">
		<p>Version 1</p>
		<p>by 6555985 and 6595979 </p>
		<p>created on: 10/09/2012 </p>
	</div>

</body>
</html>
