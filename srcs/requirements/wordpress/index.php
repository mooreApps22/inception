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
	<form action="index.php" method="post">
		<label>How old are you?</label>	
		<input type="text" name="age">	
		<input type="submit" value="age">	
	</form>
</body>

</html>
<?php
	$age = $_POST["age"];

	if ($age >= 18)
		echo "<p>You may enter this site 👍</p>";
	elseif ($age == 0)
		echo "<p>You're a baby 👶</p>";
	elseif ($age < 0)
		echo "<p>That's not a valid age 🤔</p>";
	else
		echo "<p>You must be 18+ to enter ⛔<p>";
?>
