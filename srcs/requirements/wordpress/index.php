<?php
	function bday($name)
	{
		echo "<p>Happy Birthday to you.</p>";
		echo "<p>Happy Birthday to you.</p>";
		echo "<p>Happy Birthday dear <strong>$name</strong>.</p>";
		echo "<p>Happy Birthday to you.</p>";
		echo "<br>";
	}
	$names = array("Joe", "Pa", "Randy", "Keith");

	function is_even($n)
	{
		$result = $n % 2;
		return $result;
	}

	function hypotenuse($a, $b)
	{
		$c = sqrt($a ** 2 + $b ** 2);
		return $c;
	}

	function put_hypo($n)
	{
		echo "<p>The hypotenuse is <strong>" . round($n, 2)  . "</strong>.</p>";
	}

	$str = "All the small things work sucks I know";
	$words = explode(" ", $str);

	function read_off(array $words)
	{
		foreach($words as $word)
			echo "<p><strong>{$word}</strong></p>";
	}
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
	</form>
</body>
</html>
<?php
	
	for ($i = 0; $i < 4; $i++)
	{
		if (is_even($i))
			bday($names[$i]);
	}
	put_hypo(hypotenuse(4, 4));
	read_off($words);
?>
