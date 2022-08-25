<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<meta charset="utf-8">
	<title>
		#6_1
	</title>
	
</head>
<body>
<?php

	$txt = file("dataFile.txt");
	foreach($txt as $line_num => $line){
		echo trim($line,"1234567890)")."<br>";
	}
?>
</body>
</html>