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
	<p> This is an <strong>about</strong> page!!!</p>
	<p> This is an <strong>about</strong> page!!!</p>
	<p> This is an <strong>about</strong> page!!!</p>
	<p> This is an <strong>about</strong> page!!!</p>
	<p> This is an <strong>about</strong> page!!!</p>
	<p> This is an <strong>about</strong> page!!!</p>
	<p> This is an <strong>about</strong> page!!!</p>
	<p> This is an <strong>about</strong> page!!!</p>
	<p> This is an <strong>about</strong> page!!!</p>
	<p> This is an <strong>about</strong> page!!!</p>
	<p> This is an <strong>about</strong> page!!!</p>
	<p> This is an <strong>about</strong> page!!!</p>
	<p> This is an <strong>about</strong> page!!!</p>
	<p> This is an <strong>about</strong> page!!!</p>
</body>
</html>
<?php
	echo "<p>{$_SESSION["username"]}</p>";
	echo "<p>{$_SESSION["password"]}</p>";
	include("footer.html");
?>
