
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
    <title>Document</title>
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

body{
	background: #f5f6fa;
}

button{
	padding: 12px;
	background: rgb(7, 105, 185);
	border-radius: 5px;
	border-color: rgb(7, 105, 185);
	color: white;
	border-style: none;
}

.checkout{
	float: right;
}

.product{
	position: relative;
	z-index: -2;
}

.product-details{
	position: absolute;
	display: inline-block;
	margin-top: 1rem;
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
	display: block;
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

 

body.active .wrapper .sidebar{
	left: -225px;
}

body.active .wrapper .section{
	margin-left: 0;
	width: 100%;
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
                    <a href="index.php">
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
                    <a href="cart.php" class="active">
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

<fieldset style="margin-left: 50px; margin-right: 50px; padding: 40px; border-radius: 10px;">
			<legend><h2 style="margin-top: 20px; margin-left: 30px;">CART</h2></legend>

			<?php
				// Get images from the database
				$userSession = $_SESSION['idnumber'];
				$query = $conn->query("SELECT * FROM products, Cart WHERE product_ID=Cart.productId AND Cart.sessionID='$userSession'");

				if($query->num_rows > 0){

					echo "<form action = '' method = 'post' enctype='multipart/form-data'>";
					echo "<div class='section_products'>";

					echo "<div class='ecommerce'>";

					$total_Chart;

				    while($row = mysqli_fetch_assoc($query)){

				        $imageURL = 'admin/uploads/'.$row["product_image"];
				        $imageName = $row["product_name"];
				        $prod_price = $row["product_price"];
				        $prod_id = $row['product_ID'];
				        $prod_desc = $row['product_desc'];

						echo " <div class='product' style='background:rgb(239, 234, 234); border-radius: 5px;'>
							      <img src='$imageURL' alt='Product 3'>
							      <p style='float:right; margin-top:190px; margin-right:20px'>$prod_price TSH</p>

							      <div class='product-details'>
							      <h3>$imageName</h3>
							      <p>$prod_desc</p>
							      </div>

							      <input type = 'text' style='display:none' name = 'prodId' value = '$prod_id'>
							    </div><br>";
						$total_Chart = $total_Chart + $prod_price;
					}
					echo "</div> 

					</div>";
					echo "<button class='checkout' name = 'checkout'>CHECKOUT $total_Chart</button>";
					echo "</form>";
			}else{
				echo "<p>you have not added products to cart";
			}
			?>
			</fieldset>  

</body>
</html>