<?php 
	session_start();

	$conn = new mysqli("localhost", "root", "", "dit");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asali App</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

*{
	list-style: none;
	text-decoration: none;
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Open Sans', sans-serif;
}

.product{
	text-align: center;
}

.searcher{
	float: right;
	margin-right: 30px;
}

.searcher input{
	padding: 10px;
}

button{
	padding: 12px;
	background: rgb(7, 105, 185);
	border-radius: 5px;
	border-color: rgb(7, 105, 185);
	color: white;
	border-style: none;
}

body{
	background: #f5f6fa;
	width: 100%;
	height: 100%;
	background-image: url('');
}

.wrapper .sidebar{
	background: rgb(5, 68, 104);
	position: fixed;
	top: 0;
	left: 0;
	width: 225px;
	height: 100%;
	padding: 20px 0;
	transition: all 0.5s ease;
}

img {
	width: 190px;
	height:190px;
	margin: 15px;
	border-radius: 5px;

}

.section_products{
	margin-left: 20px;
}
.ecommerce{
	width: 100%;
	height: 100%;
	display: grid;
	grid-template-columns: repeat(5, 1fr);
}

.wrapper .sidebar ul li a{
	display: block;
	padding: 13px 30px;
	border-bottom: 1px solid #10558d;
	color: rgb(241, 237, 237);
	font-size: 16px;
	position: relative;
}

.wrapper .sidebar ul li a .icon{
	color: #dee4ec;
	width: 30px;
	display: inline-block;
}

 

.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
	color: #0c7db1;

	background:white;
    border-right: 2px solid rgb(5, 68, 104);
}

.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
	color: #0c7db1;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
	display: block;
}

.wrapper .section{
	width: calc(100% - 225px);
	margin-left: 225px;
	transition: all 0.5s ease;
}

.wrapper .section .top_navbar{
	background: rgb(7, 105, 185);
	height: 50px;
	display: flex;
	align-items: center;
	padding: 0 30px;
 
}

.wrapper .section .top_navbar .hamburger a{
	font-size: 28px;
	color: #f4fbff;
}

.wrapper .section .top_navbar .hamburger a:hover{
	color: #a2ecff;
}

.wrapper .section .top_navbar a{
	font-size: 28px;
	color: #f4fbff;
}

 

body.active .wrapper .sidebar{
	left: -225px;
}

body.active .wrapper .section{
	margin-left: 0;
	width: 100%;
}

.wrapper{
	width: auto;
	height: auto;
}

    </style>
</head>
<body>
   
    <div class="wrapper">

        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
             
        </div>

        <div class="sidebar">
            <ul>
                <li>
                    <a href="index.php" class="active">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">HOME</span>
                    </a>
                </li>
                <li>
                    <a href="history.php">
                        <span class="icon"><i class="fas fa-history"></i></span>
                        <span class="item">HISTORY</span>
                    </a>
                </li>
                <li>
                    <a href="cart.php">
                        <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                        <span class="item">CART</span>
                    </a>
                </li>
                <li>
                    <a href="support.html">
                        <span class="icon"><i class="fas fa-phone"></i></span>
                        <span class="item">SUPPORT</span>
                    </a>
                </li>
            </ul>
        </div>
        
    </div>
  <script>
       var hamburger = document.querySelector(".hamburger");
	hamburger.addEventListener("click", function(){
		document.querySelector("body").classList.toggle("active");
	})
  </script>

  	<div class="header-top">

		<h1 id="header-title" style="margin-top: 20px; margin-left: 20px;">
			Welcome <?php if(isset($_SESSION['login'])){echo $_SESSION['name'];} ?>.
			<div class="searcher">
				<input type="search" name="search" placeholder="Search Products">
				<button type="search" name="search">search</button>
			</div>
			
		<h1> 

		

			<fieldset style="margin-left: 50px; margin-right: 50px; padding: 40px; border-radius: 10px;">
			<legend><h2 style="margin-top: 20px; margin-left: 30px;">Available Products:</h2></legend>

			<?php
				// Get images from the database
				$query = $conn->query("SELECT * FROM products");

				if($query->num_rows > 0){

					echo "<form action = 'cart_process.php' method = 'post' enctype='multipart/form-data'>";
					echo "<div class='section_products'>";

					echo "<div class='ecommerce'>";

				    while($row = mysqli_fetch_assoc($query)){

				        $imageURL = 'admin/uploads/'.$row["product_image"];
				        $imageName = $row["product_name"];
				        $prod_price = $row["product_price"];
				        $prod_id = $row['product_ID'];

						echo " <div class='product'>
							      <img src='$imageURL' alt='Product 3'>
							      <h3>$imageName</h3>
							      <p>$prod_price TSH</p>
							      <button type = 'submit' name ='cart' value='$prod_id'><i class='fas fa-shopping-cart'></i> Add To Cart</button>
							    </div>";
					}
					echo "</div>

					</div>";

					echo "</form>";
			}else{
				echo "<p>There are no products for now to shop";
			}
			?>
			</fieldset>
			
			
	</div>
</body>
</html>