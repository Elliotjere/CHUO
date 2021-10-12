<?php 

session_start();

$link = new mysqli("localhost", "root", "", "dit");
     if (!$link) {
	     echo "there was an error connecting to the web-server";
     }

     class errors{
     	function missing_field($field){
     		if (isset($_SESSION['reg_submit'])) {
	    			if (empty($_SESSION[$field])) {
					echo "<label for = '$field' style = 'color:red'>*field is requied*</label>";
				}
			}
     	}
     	function value($value){
     		if (isset($_SESSION['reg_submit'])) {
     			echo $_SESSION[$value];
     		}
     	}
     }

 	$error = new errors();?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta charset="utf-8">
	<title>register</title>
</head>
<body>
	<center>
		<form method = "POST" action = "registr.php">

		<input type="text" name="fname"  value = "<?php $error->value("fname");?>" placeholder="enter name"  id = "fname" >
		<br>
				<?php $error->missing_field("fname"); ?>

		<br><br>
		<input type="text" name="regnumber" value = "<?php $error->value("regnumber");?>"  placeholder="registration number"  id="regnumber">
		<br>
				<?php $error->missing_field("regnumber"); ?>

				<?php 
					if (isset($_SESSION['reg_submit'])) {
						$cmd = "SELECT id FROM students";

						$result = $link->query($cmd);

						while ($row = mysqli_fetch_assoc($result)) {
							
							if ($_SESSION['regnumber'] == $row['id']) {
								echo "<label for = 'regnumber' style = 'color:red'>*user already exists*</label>";
							}
						}

					}
				 ?>
		<br><br>
		<input type="text" name="program" value = "<?php $error->value("program");?>" placeholder="program/course"  id="program">
		<br>
				<?php $error->missing_field("program"); ?>

		<br><br>
		<input type="text" name="phone-number"value = "<?php $error->value("phone-number");?>"  placeholder="enter phone number"  id="phone-number">
		<br>
				<?php $error->missing_field("phone-number"); ?>

		<br><br>
		<input type="password" name="password"  placeholder="enter password"  id="password">
		<br>
				<?php $error->missing_field("password"); ?>
		<br><br>
		<input type="password" name="conf-password"   placeholder="confirm password"  id="conf-password">
		<br>
		<?php 
		if (isset($_SESSION['reg_submit'])){

			if ($_SESSION['conf-password'] !=  $_SESSION['password']) {
				echo "<label for = 'conf-password' style = 'color:red'>*password doesnt match*</label>";
			} 
		}

		?>
				<?php $error->missing_field("conf-password"); ?>

		<br><br>
		<button type="submit" value="submited" name = "reg_submit" >submit</button>
		<p>or click here to <a href="loginhtml.php">login</a></p>
	</form>
	</center>

</body>
</html>