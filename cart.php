<!DOCTYPE html>
<?php
include("functions/functions.php");

session_start();
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
					<li> <a href="#">Sign Up</a></li>
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
				
			<div/>
			</div>
			
			
			<div class="content_wrapper">			
							
				<div id="content_area">			

					<div id ="products_box">
					<br>
					<form action="" method="post" enctype="multipart/form-data">
					
					<table align="center" width="700" 
						
						<tr align="center" style="margin-top:100px; margin-left:100px">
							<th>Remover</th>
							<th>Produtos</th>
							<th>Quantidade</th>
							<th>Preço</th>
						</tr>
						<?php	
		$total = 0;
		global $con;
		$ip =getIp();
		$sell_price="select * from cart where ip_add='$ip'";
		$run_price=mysqli_query($con, $sell_price);
		
		while($p_price=mysqli_fetch_array($run_price)){
			$pro_id=$p_price['p_id'];
			$pro_price="select * from products where product_id='$pro_id'";
			
			$run_pro_price = mysqli_query($con,$pro_price);
			
		while ($pp_price=mysqli_fetch_array($run_pro_price)){
			$product_price=array ($pp_price['product_price']);
			$product_title=$pp_price['product_title'];
			$product_image=$pp_price['product_image'];
			$single_price = $pp_price['product_price'];
			$values = array_sum($product_price);
			$total += $values;

			?>
			
			
					<tr align="center" style="margin-top:100px; margin-left:100px">
							<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
							<td><?php echo $product_title;?><br>
							<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60"/>
							</td> 
							<td><input type="text" size="3" name="qty" value="<?php echo $_SESSION['qty'];?>" /></td>
							<?php
							if(isset($_POST['update_cart'])){
								$qty =$_POST['qty'];
								$update_qty="update cart set qty='$qty'";
								$run_qty = mysqli_query($con, $update_qty);
								
								$_SESSION['qty']=$qty;
								$total = $total*$qty;
							}
							?>
							<td><?php echo $single_price; ?></td>
						</tr>
						
						
		<?php } } ?>
		<tr align="right">
						<td colspan="5"> Total</td>
						<td colspan="5"><?php echo $total;?></td>
		</tr>				
		
						<tr align="center">
						<td><input type="submit" name="update_cart" value="Update Cart" /></td>
						<td><input type="submit" name="continue" value="Continue Shopping" /></td>
						<td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
						</tr>
					
					</table>
					</form>
				
					<?php
					function updatecart(){
						global $con;
						$ip =getIp();
						
					if(isset($_POST['update_cart'])){
						foreach($_POST['remove'] as $remove_id){
							$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
							$run_delete= mysqli_query($con, $delete_product);
							
							if($run_delete){
								echo "<script>window.open('cart.php','_self')</script>";
						}
					}
					}
					if(isset($_POST['continue'])){
					echo "<script>window.open('index.php','_self)</script>";
					}
					echo @$up_cart = updatecart();
					}
					?>
					
					

			</div>
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
  </footer>


</html>