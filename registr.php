<?php 
	//starting session variables
	session_start();

	$_SESSION['reg_submit'] = $_POST['reg_submit'];
	$_SESSION['fname'] = $_POST['fname'];
	$_SESSION['regnumber'] = $_POST['regnumber'];
	$_SESSION['program'] =  $_POST['program'];
	$_SESSION['phone-number'] =  $_POST['phone-number'];
	$_SESSION['password'] =  $_POST['password'];
	$_SESSION['conf-password'] =  $_POST['conf-password'];
	
	//connecting the user to the school database server.

	$conn = new mysqli("localhost", "root", "", "dit");


	//checking if user has clicked submit.
	if (isset($_POST['reg_submit'])) {

		//checking for any empty fields in the form.
		foreach ($_POST as $postvalue) {

			if (empty($postvalue)) {
				header("location:registration.php");
				exit();
			}
		}


		//checking if the two passwords match
		if ($_POST['conf-password'] != $_POST['password']) {
			header("location:registration.php");
			exit();
		}

		//checking if the ID entered already exists
		$cmd = "SELECT id FROM students";
		$result = $conn->query($cmd);

		while ($row = mysqli_fetch_assoc($result)) {
			if ($_POST['regnumber'] == $row['id']) {
				header("location:registration.php");
				exit();
			}
		}

		//registering user data to dbase.

			//escaping special characters to used by the database query

			$regno = $conn->real_escape_string( trim($_POST['regnumber']));
			$name = $conn->real_escape_string( trim($_POST['fname']));
			$program = $conn->real_escape_string( trim($_POST['program']));
			$phone = $conn->real_escape_string( trim($_POST['phone-number']));
			$pwd = $conn->real_escape_string( trim( md5($_POST['password'])));


			$sql = "INSERT INTO students (id, name, program, phonenumber, password)
			 VALUES ('$regno', '$name', '$program', '$phone', '$pwd')";

			 if ($conn->query($sql) == TRUE) {
				echo "<p style = 'color:green; font-size:20px'>you have succesfully created your account 
				<a href = 'loginhtml.php'>click here to</a> login 	</p>";
			 }else{
				echo "<p style = 'color:red; font-size:20px'>there was a problem creating your account please try again later</p>";
			}

	}
 ?>
