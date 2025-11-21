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
		<label>x:</label>
		<input type="text" name="x">
		<label>y:</label>
		<input type="text" name="y"><br>
		<label>z:</label>
		<input type="text" name="z"><br>
		<input type="submit" value="total">
	</form>

</html>
<?php
	$x = $_POST["x"];
	$y = $_POST["y"];
	$z = $_POST["z"];
	$total = null;
	$random = null;

//	$total = abs($x);
//	$total = round($x);
//	$total = floor($x);
//	$total = ceil($x);
//	$total = pow($x, $y);
//	$total = sqrt($x);
	$total = max($x, $y, $z);
//	$total = min($x, $y, $z);
//	$total = pi();
	$random = rand(1000, 5000);


	echo "<p>Random: {$random}</p>";
	echo "<p>Min: {$total}</p>";
	$total = round($random * $total);
	echo "<p>Product: {$total}</p>";
?>
