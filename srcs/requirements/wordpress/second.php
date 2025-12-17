<?php
	include("header.html");
?>
<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Inception</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>

<body>
<?php
	$age = 34;
	$income = 1234.5678;
	$name = "Skyy";
	function stats($name, $age, $income) {
		echo "<p>Name is: $name</p>";
		echo "<p>Age is :$age</p>";
		echo "<p>Income in \$$income</p>";
		if ($age >= 21)
			echo "<p>You can drink sake!!!</p>";
	}
	stats($age, $income, $name);
	
?>
</body>
</html>
<?php
	include("footer.html");
?>
