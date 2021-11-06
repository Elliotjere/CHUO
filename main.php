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
<body id="body">

<a href="#"><img src="menu1.png" style="width: 30px; length: 30px"></a>

<p style="color:green; font-family: arial" id="welcome">welcome <b><?php if(isset($_SESSION['login'])){echo $_SESSION['name'];} ?></b></p>

<form method="post"> 
	<button type = "logout" name = "logout">logout</button>
	<?php 
		if (isset($_POST['logout'])) {
		 	session_destroy();
		 	header("location:loginhtml.php");
		 } 
	 ?>
</form>
<img src="defaultpic.png" style="width : 50px; length: 50px; position:absolute; top:5px; right:5px;" align="right">
</body>
</html>