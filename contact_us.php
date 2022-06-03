
<!DOCTYPE html>
<?php
session_start();
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


			<div class="logo" align="left">
				<h1> kaus </h1>
			</div>

			<div class="menubar">
				<ul id="menu">
					<li> <a href="index.php">Home</a></li>
					<li> <a href="profile.php">My Account</a></li>
					<li> <a href="login.php">Sign Up</a></li>
					<li> <a href="cart.php">Shopping Cart</a></li>		
										
					<?php 
					if(!isset($_SESSION['user_email'])){
						echo "<a href='checkout.php'>Login</a>";
						}
						else{
							echo "<a href='logout.php'>Logout</a>";
						}
					?>	
				</ul>
				<ul id ="cats">
						
						<?php getCats(); ?>
						
				</ul>
			<div/>
			
			
			<div class="content_wrapper">		
				<?php cart();?>		
							
				<div id="content_area">		
				
					<body style="margin:0;padding:0;text-align:center;font-family:sans-serif; ">

	<div class="contact-title">
			<h1> Fala Connosco</h1>
	</div>		
	
	<div class="contact-form" align="center">
		<form id="contact-form" method="post" action="contact.php">
		<input name="name" type="text" class="form-control" placeholder="Nome" required>
		<br>
		<input name="email" type="email" class="form-control" placeholder="Email" required><br>
		<textarea name="message" class="form-control" placeholder="Mensagem" row="4" required></textarea><br>
		<input type="submit" class="form-control submit" value="Envia Mensagem">
		</form>
		</div>
				
				</div>
				
			</div>


			
			<footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>A nossa Loja</h4>
  	 			<ul>
  	 				<li><a href="#">ssss</a></li>
  	 				<li><a href="#">ssss</a></li>
  	 				<li><a href="#">ssss</a></li>
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
  	 			<h4>Segue-nos</h4>
  	 			<div class="social-links">
  	 				<a href="https://www.facebook.com/UniversidadeLusiadaFamalicao"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="https://www.instagram.com/ulusiadafam/"><i class="fab fa-instagram"></i></a>
  	 				<a href="https://www.linkedin.com/in/diogo-cunha-105940220/"><i class="fab fa-linkedin-in"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  </footer>
			</div>
		</div>
	</div>	


</body>

</html>

