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
		<div>
			<input type="text" name="idnumber" placeholder="enter ID number" id="id-num">
			<br><br>
		</div>
		<input type="password" name="pwd" placeholder="enter password" id="pass">
		<br><br>
		<div id="loginbtn"><button name = "login">login</button>
		<div id="signUP">
			<a href="registration.php">Or Sign Up</a>
		</div>
		</div>
		<br>
		<div id="forgetlink"><a href="#" id="forgetlink">I forgot my password</a></div> <br><br>
		<!-- <?php 
			if (isset($_SESSION['login'])) {
			 	echo "<label for = 'loginform' style = 'color:red'>*invalid ID or password*</label>";	
			} 
		 ?> -->
		<!-- <p>or <a href="registration.php">create account</a></p> -->
		<!-- <div id="or-content"><p class="orcenter">or</p></div>
		<div id="goggle"><button name = "login" id="google-btn"><a href="https://accounts.google.com/o/oauth2/auth/oauthchooseaccount?client_id=689286984790-d8pi01ip72qttb4mugpli1bs2htc76g7.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Fdashboard.ngrok.com%2Flogin%2Fgoogle%2Fauthorize&response_type=code&scope=email&state=yPcylBKFGBAU0ej9SORDaJEtC8GFe9VEq70ooWRGeXI&flowName=GeneralOAuthFlow">Login with Goggle</a></button></div> -->
	    </form><br>
	</div>
</body>
</html>