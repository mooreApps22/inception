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
		<label>Quantity: </label><br>
		<input type="text" name="quantity">
		<input type="submit" value="total">
	</form>

</html>
<?php
	$item = "pizza";
	$price = 5.99;
	$quantity = $_POST["quantity"];
	$total = null;

	echo "<p>You have ordered <strong>{$quantity}</strong> {$item}s</p>";
	$total = $price * $quantity;
	echo "<p>Your total is <strong>\${$total}</strong></p>";
?>
