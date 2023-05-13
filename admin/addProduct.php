<?php
	session_start();

	$conn = new mysqli("localhost", "root", "", "dit");

	$prod_name = $_POST['product_name'];
	$prod_img = $_POST['product_image'];
	$prod_desc = $_POST['product_desc'];
	$prod_price = $_POST['product_price'];
	$prod_disc = $_POST['product_discount'];


	$sql = "INSERT INTO products(product_name, product_desc, product_price, product_image, product_discount) 
			VALUES('$prod_name', '$prod_desc', '$prod_price', '$prod_img', '$prod_disc')";

	$conn->query($sql);
?>