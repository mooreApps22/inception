<?php
	session_start();
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
	<p>This is the login page</p>
	<form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
	<label>Username</label>
	<input type="text" name="username">
	<br>
	<input id="pusher" type="submit" name="login" value="Submit">
	</form>
</body>
</html>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST")
		echo "<p>{$_SERVER["PHP_SELF"]}</p>";
	include("footer.html");
?>
