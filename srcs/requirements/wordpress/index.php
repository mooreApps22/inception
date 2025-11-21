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
</body>
	<form action="index.php" method="post">
		<label>radius:</label>
		<input type="text" name="radius">
		<input type="submit" value="total">
	</form>

</html>
<?php
	$r = $_POST["radius"];
	$c = null;

	$c = 2 * pi() * $r;
	$c = round($c, 2);

	$a = pi() * pow($r, 2);	
	$a = round($a, 2);

	$v = (4 / 2) * pi() * pow($r, 3);
	$v = round($v, 2);

	echo "<p>Circumference: {$c}cm</p>";
	echo "<p>Area: {$a}cm<sup>2</sup></p>";
	echo "<p>Volume: {$v}cm<sup>3</sup></p>";
?>
