<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HIT3311</title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css" media="all">
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

<body id="main_body" >
	<h1>Assignment 1</h1>

	<p>Swinburne's location is -37.82, 145.04 </p>
	<p>Please enter a latitude and a longitude to get distance </p>

	<div id="form_container">	
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

	<div>
		<h1>Version 1</h1>
		<p> By 6555985 and 6595979 </p>
		
	</div>

</body>
</html>
