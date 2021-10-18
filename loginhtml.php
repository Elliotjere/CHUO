<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="login.css">
	<title>login page</title>
</head>
<body>
	<div class="login-tab">
		<h1>Log In</h1>
		<form action = "login.php" method = "post" id = "loginform">

		<input type="text" name="idnumber" placeholder="enter ID number" id="id-num">
		<br><br>
		<input type="password" name="pwd" placeholder="enter password" id="pass">
		<br><br>
		<div id="loginbtn"><button name = "login">login</button></div>
		<br>
		<div id="forgetlink"><a href="#" id="forgetlink">I forgot my password</a></div> <br><br>
		<!-- <?php 
			if (isset($_SESSION['login'])) {
			 	echo "<label for = 'loginform' style = 'color:red'>*invalid ID or password*</label>";	
			} 
		 ?> -->
		<!-- <p>or <a href="registration.php">create account</a></p> -->
		<div id="or-content"><p class="orcenter">or</p></div>
		<div id="goggle"><button name = "login" id="goggle-btn"><a href="www.goggle.account.com">Login with Goggle</a></button></div>
	    </form>
	</di>
</body>
</html>