<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta charset="utf-8">
	<title>login page</title>
</head>
<body>
	<center>
		<form action = "login.php" method = "post" id = "loginform">

		<input type="text" name="idnumber" placeholder="enter ID number">
		<br><br>
		<input type="password" name="pwd" placeholder="enter password">
		<br><br>
		<button name = "login">login</button>
		<br>
		<?php 
			if (isset($_SESSION['login'])) {
			 	echo "<label for = 'loginform' style = 'color:red'>*invalid ID or password*</label>";	
			} 
		 ?>
		<p>or <a href="registration.php">create account</a></p>
	    </form>
	</center>
</body>
</html>