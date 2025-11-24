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
	<form action="index.php" method="post">
	<label>Username</label>
	<input type="text" name="username">
	<label>Password</label>
	<input type="password" name="password">
	<br>
	<input id="pusher" type="submit" name="login" value="Submit">
	<input id="pusher" type="submit" name="logout" value="Logout">
	</form>
</body>
</html>
<?php
	if (isset($_POST["login"]))
	{
		if (!empty($_POST["username"]) && !empty($_POST["password"]))
		{
			$_SESSION["username"] = $_POST["username"];
			$_SESSION["password"] = $_POST["password"];
			header("Locations: about.php");
		}
		else
			echo "<p>Missing username/password</p>";
	}
	if (isset($_POST["logout"]))
	{
		session_destroy();
	}
	include("footer.html");
?>
