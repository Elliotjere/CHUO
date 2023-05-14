<?php
	session_start();

	$conn = new mysqli("localhost", "root", "", "dit");

	$prod_name = $_POST['product_name'];
	$prod_img = $_POST['product_image'];
	$prod_desc = $_POST['product_desc'];
	$prod_price = $_POST['product_price'];
	$prod_disc = $_POST['product_discount'];



	// File upload path
	$targetDir = "uploads/";
	$fileName = basename($_FILES["file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

	if(isset($_POST["upload"]) && !empty($_FILES["file"]["name"])){

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');

    	if(in_array($fileType, $allowTypes)){

        // Upload file to server
	        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){

	            //Insert image file name into database
	            $insert = $conn->query("INSERT into products(product_name, product_desc, product_price, product_image, product_discount) 
	            	VALUES ('$prod_name', '$prod_desc', '$prod_price', '$fileName','$prod_disc')");

	            if($insert){
	                $statusMsg = "The file product has been uploaded successfully. <a href = 'inventory.php'>return</a>";
	            }else{
	                $statusMsg = "File upload failed, please try again.";
	            } 
	        }else{
	            $statusMsg = "Sorry, there was an error uploading your file.";
	        }
	    }else{
	        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
	    }
	}else{
	    $statusMsg = 'Please select a file to upload.';
	}

// Display status message
echo $statusMsg;


?>