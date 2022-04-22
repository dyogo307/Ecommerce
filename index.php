<!DOCTYPE html>
<?php
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
					<li> <a href="#">Home</a></li>
					<li> <a href="#">My Account</a></li>
					<li> <a href="#">Sign Up</a></li>
					<li> <a href="#">Shopping Cart</a></li>					
				</ul>
				<ul id ="cats">
						
						<?php getCats(); ?>

				
			<div/>
			
			
			<div class="content_wrapper">			
							
				<div id="content_area">

					<div id ="products_box">
					
					<?php getPro();?>

					</div>
				
				</div>
				
			</div>


			
			<div id="footer">
			</div>
		</div>
	</div>	


</body>
