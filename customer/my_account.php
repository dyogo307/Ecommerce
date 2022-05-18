<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");

?>

<html>
	<head>
		<title> Kaus Store </title>
		
		<link rel="stylesheet" href="styles.css" media="all"/>
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
										
					<?php 
					if(!isset($_SESSION['user_email'])){
						echo "<a href='checkout.php'>Login</a>";
						}
						else{
							echo "<a href='logout.php'>Logout</a>";
						}
					?>	
				</ul>
				
			<div/>
		
		
			<div class
			<div class="account">
				<ul id ="account_management">
						
				<li><a href="my_account.php?my_orders"> Encomendas</a></li>
				<li><a href="my_account.php?edit_account"> Editar dados da Conta</a></li>
				<li><a href="my_account.php?change_pass"> Alterar Password</a></li>
				<li><a href="my_account.php?delete_account"> Eliminar Conta</a></li>

						
				</ul>
			
			
			<div class="content_wrapper">		
				<?php cart();?>		
							
				<div id="content_area">		
				
					<div id ="products_box">

					</div>
				
				</div>
				
			</div>


			
			<div id="footer">
			</div>
		</div>
	</div>	


</body>





