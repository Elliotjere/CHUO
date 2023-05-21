<?php 
	session_start();

	$conn = new mysqli("localhost", "root", "", "dit");

	$userSession = $_SESSION['idnumber'];

	

	if (isset($_POST['checkout'])) {
		echo $_POST['prodId'];
	}

	$sql = "INSERT INTO Orders(userId, productId) VALUES('$userSession', )";

?>