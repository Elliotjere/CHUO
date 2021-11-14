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
		<?php if(isset($_SESSION['login'])){echo $_SESSION['name'];} ?>.	
	</div>

	<div class="banner">
		<div class=person-icon>
			<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
			<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
			<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
			</svg>
		</div>
		<div id="banner-box">
			<p class="banner-content">Payment receipt</p>
		<div>
		<div class="upload-icon">
		<label><input id="input" type="file"><svg class="upload-svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-upload" viewBox="0 0 16 16">
		<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
		<path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
		</svg></label>
		</div>

		
	</div>
</div>

</body>	
</html>