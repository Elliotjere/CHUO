<?php 
	session_start();

	$conn = new mysqli("localhost", "root", "", "dit");



		if(isset($_POST['cart'])){

			$prod_id = $_POST['cart'];

			$session_id =  $_SESSION['idnumber'];

			if(isset($session_id)){
				$cart_status = 0;

				$sql = "INSERT INTO Cart(SessionID,	productId, status) VALUES ('$session_id', '$prod_id', '$cart_status')";

				if($conn->query($sql)){
					header("location: cart.php");
				}else{
					header("location: registration.php");
					echo "bad";
				}
				
			}else{
					$cart_status = 0;

					$sql = "INSERT INTO Cart(SessionID,	productId, status) VALUES ('$session_id', '$prod_id', '$cart_status')";

					if($conn->query($sql)){
						header("location: cart.php");
					}else{
						header("location: registration.php");
						echo "bad";
					}
			}
		}else{
			echo "this is bad";
		}
?>