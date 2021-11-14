<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta charset="utf-8">
	<link rel="stylesheet" href="main.css">

	<title></title>
</head>
<body>
<div id=body>
	<div class="header-top">
		<h1 id="header-title">Welcome,<h1> 
		<?php if(isset($_SESSION['login'])){echo $_SESSION['name'];} ?>
	</div>

</div>
</body>	
</html>