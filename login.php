<?php 
session_start();

//create connection to the database server.
$conn = new mysqli("localhost", "root", "", "dit");


	//creating session variables.
	$idnumber = $conn->real_escape_string($_SESSION['idnumber'] = $_POST['idnumber']);
	$pwd = $conn->real_escape_string($_SESSION['pwd'] = md5($_POST['pwd']));
	$login = $conn->real_escape_string($_SESSION['login'] = $_POST['login']);

	//checking if user clicked login button
	if (isset($_SESSION['login'])) {
		$sql = "SELECT id, name, password FROM students WHERE id = '$idnumber'";
																	 			
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$_SESSION['name'] = $row['name'];

		if ($idnumber == $row['id'] && $pwd == $row['password'] ) {
			header("location:main.php");
		}else{
			header("location:loginhtml.php");
		}

	}
 ?>