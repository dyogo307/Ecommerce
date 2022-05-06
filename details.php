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
					<li> <a href="cart.php">Shopping Cart</a></li>					
				</ul>
				<ul id ="cats">
						
						<?php getCats(); ?>
				
			<div/>
			
			
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
			
				<h3>$pro_title</h3>
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
	</div>	


</body>




