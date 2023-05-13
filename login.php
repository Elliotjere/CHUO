<?php 
session_start();

//create connection to the database server.
$conn = new mysqli("localhost", "root", "", "dit");


	//creating session variables.

	//removing html special characters from input
	$idnumber = htmlspecialchars($conn->real_escape_string($_SESSION['idnumber'] = $_POST['idnumber']));

	$pwd = htmlspecialchars($conn->real_escape_string($_SESSION['pwd'] = md5($_POST['pwd'])));

	$login = htmlspecialchars($conn->real_escape_string($_SESSION['login'] = $_POST['login']));

	//checking if user clicked login button
	if (isset($_SESSION['login'])) {
		$sql = "SELECT id, name, password FROM students WHERE id = '$idnumber'";
																	 			
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$_SESSION['name'] = $row['name'];

		if ($idnumber == $row['id'] && $pwd == $row['password'] ) {
			header("location:index.php");
		}else{
			header("location:loginhtml.php");
		}

	}
 ?>