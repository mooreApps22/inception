<!doctype html>
	<?php
	?>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Uploads</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>

<body>
	
	<a id="secret" href="index.php">
		<p><strong>Home</strong></p>
	</a>
	<form action="uploads.php" method="post" enctype="multipart/form-data">
		<label>Upload File</label>
		<input type="file" name="file">
		<button type="submit" name="submit">SUBMIT</button>
	</form>
	<?php
	if (isset($_POST['submit']))
	{
		$name = $_FILES['file']['name'];
		$size = $_FILES['file']['size'];
		$type = $_FILES['file']['type'];
		$tmp_name = $_FILES['file']['tmp_name'];
		$error = $_FILES['file']['error'];
		$ext = explode('.', $name);
		$ext = strtolower(end($ext));

		echo "<p>Name: " . $name  . "</p>";
		echo "<p>Size: " . $size  . "</p>";
		echo "<p>Type: " . $type . "</p>";
		echo "<p>Tmp: " . $tmp_name . "</p>";
		echo "<p>Error: " . $error . "</p>";
		echo "<p>Ext: " . $ext . "</p>";
		$isAllowed = array('jpg', 'jpeg', 'png', 'pdf');

		if (in_array($ext, $isAllowed))
		{
			if ($error === 0)
			{
				if ($size < 30000)
				{
					$newFileName = uniqid('', true) . "." . $ext;
					$fileDest = "uploads/" . $newFileName;
					echo "<p>Your file has been uploaded.</p>";
					if (move_uploaded_file($tmp_name, $fileDest))
					{
						echo "<p>Preview</p>";
						echo "<img src=\"$fileDest\">";
					}
					
				}
				else	
					echo "<p>Sorry, file size too big.</p>";
			}
			else
				echo "<p>Sorry, there was an error submitting.</p>";
		}
		else
			echo "<p>Sorry, file extension not allowed.</p>";
	}
	?>
</body>
<?php
	require("footer.html");
?>
</html>
