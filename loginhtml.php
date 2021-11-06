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
            
            <input type="password" placeholder="Enter strong password" name="pwd" required><br><br>

			<div class="cofirm">
				<input type="checkbox" id="confirm" name="confirm" value="tick">
				<label for=confirm id="label">Remember me </label>	
				<a href="#" id="forgetpsw" > forget password?</a><br> 
			</div>

           <button class="btn"  type="submit" value="submited" name ="login">LOGIN </button>
            <h4>Still not connected? <a href="registration.php" target="_blank" style="text-decoration: none;">Sign Up</a></h4>	
		<?php 
			if (isset($_SESSION['login'])) {
				
				if ($_SESSION['idnumber'] != $row['id'] || $_SESSION['pwd'] != $row['password'] ) {

					echo "<label for = 'loginform' style = 'color:red'>*invalid ID or password</label>";	

				}
			} 
		 ?>
	</div>		
</form>
</body>
</html>