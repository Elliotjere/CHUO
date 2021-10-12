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
<p style="color:green">welcome <b><?php echo $_SESSION['name']; ?></b></p>

<form method="post">
	<button type = "logout" name = "logout">logout</button>
	<?php
		if (isset($_POST['logout'])) {
		 	session_destroy();
		 	header("location:loginhtml.php");
		 } 
	 ?>
</form>

</body>
</html>