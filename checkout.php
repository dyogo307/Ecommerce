<!DOCTYPE html>
<?php
session_start();

include("functions/functions.php");

?>

<html> 
	<head>
		<title> Kaus Store </title>
		
		<link rel="stylesheet" href="styles/style.css" media="all"/>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
		
</head> 

<body>
		<div class="main_wrapper">


			<div class="logo">
				<h1> kaus </h1>
			</div>

			<div class="menubar">
				<ul id="menu">
					<li> <a href="index.php">Home</a></li>
					<li> <a href="customer/my_account.php">My Account</a></li>
					<li> <a href="#">Sign Up</a></li>
					<li> <a href="cart.php">Shopping Cart</a></li>					
				</ul>
				<ul id ="cats">
						
						<?php getCats(); ?>
				</ul>
			</div>
			
			
			<div class="content_wrapper">			
							
				<div id="content_area" margin-top="500px">			

					<?php
					/*if (!isset($_SESSION['user_email'])){
						include("login.php");
					}
					else{
						include("payment.php");
					}*/
					?>

				
				</div>
				
			</div>
				</div>
</body>
			
			
			<footer class="footer" style="margin-top:400px;">
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
  </footer>
</html>




