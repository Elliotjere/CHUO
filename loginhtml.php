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

<form action="login.php" method="post" id="loginform" class="bigbox">
	<div class="content-box">
            <h1>Log In</h1>
            
            <input type="text" name="idnumber" placeholder="enter ID number" required><br>

            
            <input type="text" placeholder="Enter your Email" name="Email" required><br>

            
            <input type="password" placeholder="Enter strong password" name="password" required><br><br>

			<div class="cofirm">
				<input type="checkbox" id="confirm" name="confirm" value="tick">
				<label for=confirm id="label">Remember me </label>	
				<a href="#" id="forgetpsw" > forget password?</a><br> 
			</div>

           <button class="btn"  type="submit" value="submited" name = "login">LOGIN </button>
            <h4>Still not connected? <a href="registration.php" target="_blank" style="text-decoration: none;">Sign Up</a></h4>	
			<script>
		<?php 
			if (isset($_SESSION['login'])) {
			 	echo "<label for = 'loginform' style = 'color:red'>*invalid ID or password</label>";	
			} 
		 ?>
	</script>
	</div>		
</form>
</body>
</html>