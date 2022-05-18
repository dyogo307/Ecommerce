<!DOCTYPE html>
<?php
include("functions/functions.php");

?>
<html>
	<head>
		<title> Kaus Store </title>
		
		<link rel="stylesheet" href="style.css" media="all"/>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

	<head/>

<body>
		<div class="main_wrapper">


			<div class="logo">
				<h1> kaus </h1>
			</div>

			<div class="menubar">
				<ul id="menu">
					<li> <a href="index.php">Home</a></li>
					<li> <a href="my_account.php">My Account</a></li>
					<li> <a href="login.php">Sign Up</a></li>
					<li> <a href="cart.php">Shopping Cart</a></li>					
				</ul>
				<ul id ="cats">
						
						<?php getCats(); ?>
				</ul>
			</div>
			
			<div class="content_wrapper">			
							
				<div id="content_area">			

					<?php
					if(isset($_GET['pro_id'])){
						
						$product_id = $_GET['pro_id'];
						
						$get_pro = "select * from products where product_id='$product_id'";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price']; 
		$pro_image = $row_pro['product_image'];
		$pro_desc = $row_pro['product_desc'];
	
		
		echo "
			<div id='single_product'>
			
				<h3><b>$pro_title<b></h3>
				<img src='admin_area/product_images/$pro_image' width='400' height='300'/>
				<p> $pro_price </p>
				<p> $pro_desc</p>
				<a href='index.php' style='float:left; color:blue;'>Go Back</a>
				<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
			
			</div>
		
		 ";
	}
					}
?>
				</div>
				
			</div>


			
			<div id="footer">
			</div>
	</div>


</body>
			
			<footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>A nossa Loja</h4>
  	 			<ul>
  	 				<li><a href="#">sssss</a></li>
  	 				<li><a href="#">sssss</a></li>
  	 				<li><a href="#">sssss</a></li>
  	 				<li><a href="contact_us.php">Contacta-nos</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Loja Online</h4>
  	 			<ul>
					<li> <a href="index.php">Home</a></li>
					<?php getCats(); ?>
  	 			</ul>
  	 		</div>
			<div class="footer-col">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="https://www.facebook.com/UniversidadeLusiadaFamalicao"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="https://www.instagram.com/ulusiadafam/"><i class="fab fa-instagram"></i></a>
  	 				<a href="https://www.linkedin.com/in/diogo-cunha-105940220/"><i class="fab fa-linkedin-in"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
		</div>
  </footer>
	</html>




