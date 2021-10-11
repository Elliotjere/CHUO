<?php
	session_start();

	$_SESSION['form'] = $_POST['trialform'];
	$_SESSION['name'] = $_POST['name1'];
	$_SESSION['pwd'] = $_POST['password'];

	if (isset($_POST['trialform'])) {
	 	if ($_POST['name1'] == "" || $_POST['password'] == "") {
	 		header("location:trialhtml.php");
	 	}else{
	 		echo "the fields are filled";
	 	}

	 } 
 ?>  