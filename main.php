<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta charset="utf-8">
	<title></title>
</head>
<body>
<p style="color:green">welcome <?php echo $_SESSION['name']; ?></p>
</body>
</html>