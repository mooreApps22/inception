<?php
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
	<form action="index.php" method="post">
		<label>username:</label>
		<input type="text" name="username">
		<label>password:</label>
		<input type="password" name="password">
		<br>
		<input type="submit" name="login" value="Log_in">
	</form>
</body>
</html>
<?php

	if (isset($_POST["login"]))
	{
		$user = $_POST["username"];
		$pw = $_POST["password"];
		if (empty($user))
			echo "<p> Username is missing.</p>";
		elseif (empty($pw))
			echo "<p>You did not enter a password .</p>";
		else
			echo "<p> <strong>{$user}</strong> is your username.</p>";
	}
?>
